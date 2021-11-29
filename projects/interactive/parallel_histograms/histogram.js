
function setCallbacks(data, __data){
  //SELECT
  __data.forEach(k => k['___selected']!==false ? k['___pcp'] = true: k['___pcp'] = false)
}

function translate(x, y){
    return 'translate('+x+','+y+')'
}

function drawHistograms(data, __data, redrawLines, width=1600, height=1600/3){
    let num_charts = data.length
    let padding = {
        left: 30,
        right: 30,
        top: 30,
        bottom: 30
    }
    let marginBtn = 15
    let marginIn = 7
    let bottomHeight = 30

    // let totalWidth = data.map(k => k.property.width).reduce((a, b) => (a + b), 0) + marginBtn * data.length + padding.left + padding.right
    let totalWidth = width - padding.left - padding.right
    // let totalHeight = eachHeight + bottomHeight + padding.top + padding.bottom
    let totalHeight = height - padding.top - padding.bottom
    let eachHeight = totalHeight - bottomHeight

    d3.select("body")
        .on('keydown', function(k){
            if(d3.event.shiftKey){
                d3.select('#others').selectAll('.drag').style('visibility', 'visible')
            }
        })
        .on('keyup', function(k){
            d3.select('#others').selectAll('.drag').style('visibility', 'hidden')
        })

    let currentPivot = data.filter(k => k.pivot)[0].name
    // let isMaxOut = !d3.select('#enableGrayOut').select('input').property('checked')
    let isMaxOut = false

    let prop_width = totalWidth / num_charts - marginBtn
    console.log(prop_width)
    data.forEach(function(k, i){
        k.property = {
            width: prop_width,
            translateX: prop_width *i,
            order: i,
            innerZoomRatio: 1
        }
        k.xScale = d3.scaleLinear().domain([0, d3.max(k, kk => kk.dataLength)]).range([0, k.property.width])
        k.yScale = d3.scaleLinear().domain([k.min, k.max]).range([eachHeight, 0])
        k.eachHeight = eachHeight/k.length
    })

    __data.forEach(function(k){
        k['___lineData']= d3.line()(data.map((d, i) => [d.property.translateX + marginBtn*i, d.yScale(k[d.name])]))
    })

    d3.select('#histogram').attr('width', width).attr('height', height)
    d3.select('#others').attr('width', width).attr('height', height)
    if(redrawLines){
        d3.select('#line').attr('width', width - padding.left).attr('height', height - padding.top)
        d3.select('#line_highlight').attr('width', width - padding.left).attr('height', height - padding.top)
        d3.select('#line').style('left', padding.left+'px').style('top', padding.top+'px')
        d3.select('#line_highlight').style('left', padding.left+'px').style('top', padding.top+'px')
    }
    d3.select('#background').attr('width', width).attr('height', height)
        .on('click', function(){
            removeWidget()
        })
        
    let svg = d3.select('#histogram').select('.wrapper').attr('transform', translate(padding.left, padding.top))  
    d3.select('#widgetArea').attr('transform', translate(padding.left, padding.top))
    d3.select('.line_hover').attr('transform', translate(padding.left, padding.top))
    d3.select('#others').select('.wrapper').attr('transform', translate(padding.left, padding.top))

    let eachAttr = svg.selectAll('g.eachAttr').data(data, k=>k.name)
    // eachAttr.exit().remove()
    let enterAttr = eachAttr.enter().append('g').classed('eachAttr', true)

    enterAttr.append('rect').classed('background', true)
    enterAttr.append('g').classed('backHoverArea', true)
    enterAttr.append('g').classed('backHistoArea', true)
    enterAttr.append('g').classed('backHistoSmallArea', true)
    enterAttr.append('g').classed('foregroundArea', true)

    let histAttrs = eachAttr.merge(enterAttr)
        .attr('transform', (k) => translate(k.property.translateX + marginBtn * k.property.order, 0))

    eachAttr.exit().remove()

    histAttrs.each(function(d, i){
        let chartArea = d3.select(this)
        chartArea.select('rect.background')
            .attr('width', d.property.width + marginIn)
            .attr('height', totalHeight)

        let backHover = chartArea.select('.backHoverArea').selectAll('rect').data(k => k)
        backHover = backHover.enter()
            .append('rect').classed('backHover', true).merge(backHover)
            .attr('width', k => k.dataLength > 0 ? d.property.width + marginIn : 0)
            .attr('height', d.eachHeight)
            .attr('transform', (k, i) => translate(0, d.eachHeight * i))
            .on('click', k => k.dataLength > 0 ? widget(k, d3.mouse(svg.node())) : null)
        backHover.exit()
            .remove()

        let backHisto = chartArea.select('.backHistoArea').selectAll('rect').data(k => k)
        backHisto.enter()
            .append('rect').classed('backHisto', true).merge(backHisto)
            .attr('width', (k, i) => d.xScale(k.dataLength))
            .attr('height', d.eachHeight)
            .attr('transform', (k, i) => translate(0, d.eachHeight * i))
        backHisto.exit()
            .remove()
        
        // let isBackChecked = d3.select('#option').select('#enableGhost').select('input').property('checked')
        let isBackChecked = true
        let backHistoSmall = chartArea.select('.backHistoSmallArea').selectAll('rect').data(k => k)
        backHistoSmall.enter()
            .append('rect').classed('backHistoSmall', true).merge(backHistoSmall)
            .attr('width', (k, i) => d.xScale(k.dataLength) > 3 || k.dataLength == 0 ? 0 : 4)
            .attr('height', d.eachHeight)
            .attr('transform', (k, i) => translate(0, d.eachHeight * i))
            .style('visibility', () => isBackChecked ? 'visible': 'hidden')
        backHistoSmall.exit()
            .remove()
       
        let foregroundGroup = chartArea.select('.foregroundArea').selectAll('g').data(k => k)

        //console.log(isMaxOut)

        let foreground = foregroundGroup.enter()
            .append('g').merge(foregroundGroup)
            .attr('transform', (k, i) => translate(0, d.eachHeight * i)).style('visibility', 'visible')
            .each(function(k, j){
                let foregroundEach = d3.select(this).selectAll('rect').data(k => k.data.sort((a, b) => +a.key -b.key), k => k.key)         
                foregroundEach.enter()
                    .append('rect').merge(foregroundEach)
                    .attr('width', function(kk){
                        if(k.selectedLength * d.property.innerZoomRatio > d.xScale.domain()[1]){
                            return d.xScale(d.xScale.domain()[1]*kk.values.filter(k => k['___selected'] !== false).length/k.selectedLength)
                        } 
                        else return d.xScale(kk.values.filter(k => k['___selected'] !== false).length * d.property.innerZoomRatio)
                    })
                    .attr('height', d.eachHeight)
                    .attr('transform', function(k, l, nodes){
                        if(l == 0) return translate(0, 0)
                        else{
                            let prev = d3.select(nodes[l-1])
                            return translate(Number(prev.attr('width'))+Number(prev.attr('transform').split(',')[0].split('(')[1]) , 0)
                        }
                    })
                    .attr('class', (kk) => (isMaxOut && k.selectedLength * d.property.innerZoomRatio > d.xScale.domain()[1]) ? 'gmax' : 'g'+kk.key)
                    .classed('foreground', true).classed('clicked', false)
                    .attr('id', (k) => 'i_'+k.key+'_'+i+'_'+j)
                    .on('click', function(k){
                        if(d3.select(this).classed('clicked')){
                            d3.select(this).classed('clicked', false)
                            pcp_hl(null)
                            //removeLine(k.values)
                        }
                        else{
                            d3.selectAll('.foreground').classed('clicked', false)
                            d3.select(this).classed('clicked', true)
                            //addLine(k.values)
                            //console.log(k.values)
                            pcp_hl(k.values)
                        }
                    })
                
                foregroundEach.exit()
                    .attr('width', 0)     
            })
        foregroundGroup.exit().style('visibility', 'hidden')
    })
    
    eachAttr = d3.select('#others').select('.wrapper').selectAll('g.eachAttr').data(data, k=>k.name)
    enterAttr = eachAttr.enter().append('g').classed('eachAttr', true)
    enterAttr.append('line').classed('axis', true)
    enterAttr.append('text').classed('bottomText', true)
    enterAttr.append('rect').classed('highlightBorder', true)
    enterAttr.append('line').classed('drag', true)
    enterAttr.append('g').classed('brush', true)

    let otherAttrs = eachAttr.merge(enterAttr)
        .attr('transform', (k) => translate(k.property.translateX + marginBtn * k.property.order, 0))

    otherAttrs.exit().remove()

    otherAttrs.each(function(k, i){
        let otherAttr = d3.select(this)
        let axis = otherAttr.select('.axis')
            .attr('x0', 0).attr('y0', 0).attr('x1', 0).attr('y1', eachHeight)
            .style('stroke-width', 2)

        let _brush = d3.brushY().extent([[-marginIn, 0], [0, eachHeight]])
            .on('end', function(attr, i){
                let selected = d3.event.selection
                __data.forEach(function(k){
                    let yVal = attr.yScale(k[attr.name])
                    let isSelected = true
                    if(selected == null || selected[0] == selected[1]) k['___brush'+attr.name] = true
                    else k['___brush'+attr.name] = yVal >= selected[0] && yVal <= selected[1]
                    histAttrs.each(function(kk){
                        isSelected = isSelected && (k['___brush'+kk.name] == undefined ? true : k['___brush'+kk.name])
                    })
                    k['___selected'] = isSelected
                })
                //if(selected === null || selected[0] === selected[1]) data[i]['___isBrushed'] = false
                //else data[i]['property']['___isBrushed'] = true
                let newData = updateData(data, __data, currentPivot)
                drawHistograms(newData, __data, true, width, height)
            })

        let brush = otherAttr.select('.brush').call(_brush)

        let belowText = otherAttr.select('.bottomText')
            .attr('transform', translate(0, eachHeight + bottomHeight))
            .style('pointer-events', 'all')
            .text(k => k.property.innerZoomRatio == 1 ? k.name : k.name+'*')
            .classed('pivot', k => k.pivot)
            .on('click', function(k){
                if(d3.event.ctrlKey){
                    k.property.width *= 2
                    data.forEach(function(kk){
                        if(kk.property.order > k.property.order) kk.property.translateX += k.property.width/2
                    })
                    drawHistograms(data, __data, false, width, height)
                }
                else if(d3.event.shiftKey){
                    k.property.innerZoomRatio *= 2
                    drawHistograms(data, __data, false, width, height)
                }
                else{
                    let newData = updateData(data, __data, k.name)
                    drawHistograms(newData, __data, false, width, height)
                }
            })
            .call(d3.drag()
                    .on('end', dragMoveEnd)
                    .on("drag", (k, i, nodes) => dragMove(k.property.order, nodes[i])
            ))

        let highlightBorder = otherAttr.select('.highlightBorder')
            .attr('width', k => k.property.width + marginIn * 2)
            .attr('height', eachHeight + marginIn * 2)
            .attr('transform', translate(-marginIn, -marginIn))
            .classed('pivot', k => k.pivot).classed('notPivot', k => !k.pivot)
            
        let dragBar = otherAttr.select('.drag')
            .attr('x0', 0).attr('y0', 0).attr('x1', 0).attr('y1', eachHeight + bottomHeight)
            .attr('transform', k => translate(k.property.width, 0))
            .style('visibility', 'hidden')
            .style('pointer-events', 'auto')
            .call(d3.drag()
                    .on("drag", (k, i, nodes) => dragZoom(k, nodes[i]))
                    .on("end", (k, i, nodes) => dragZoomEnd(nodes[i])))
    })
   
    setCallbacks(data, __data)

    // WIDGET
    // function widget(d, mouse){
    //     if(d3.select('#widget').size() > 0) removeWidget()

    //     let widget = d3.select('#widgetArea').append('g').attr('id', 'widget').attr('transform', translate(mouse[0], mouse[1]))
    //     widget.append('rect').attr('width', 10 * (widgetEachWidth + widgetBtnWidth) + widgetBtnWidth*3).attr('height', 20)
    //     widget.selectAll('rect.widget').data(d.data).enter()
    //         .append('rect')
    //         .attr('width', widgetEachWidth)
    //         .attr('height', 14)
    //         .attr('transform', k => translate(widgetBtnWidth*2 + (widgetEachWidth + widgetBtnWidth)*k.key, 3))
    //         .attr('class', k => "g"+k.key)
    //         .style('pointer-events', 'all')
    //         .on('click', function(k){
    //             if(d3.select(this).classed('clicked')){
    //                 d3.select(this).classed('clicked', false)
    //                 pcp_hl(null)
    //             }
    //             else{
    //                 d3.selectAll('#widget rect').classed('clicked', false)
    //                 d3.select(this).classed('clicked', true)
    //                 pcp_hl(k.values)
    //             }
    //         })
    //         .classed('clicked', k => k.values.filter(kk => kk['___pcp']).length !== k.values.length)
    // }
    // function removeWidget(){
    //     d3.select('#widgetArea').select('#widget').remove()
    // }

    // MOVE
    function dragMove(i, _this){
        d3.select(_this).classed('dragging', true)
        let mousePosition = d3.mouse(_this)[0]
        if(i < data.length - 1 && mousePosition > (data[i+1].property.translateX - data[i].property.translateX)/2){
            [data[i+1], data[i]] = [data[i], data[i+1]]
            data[i].property.translateX = data[i+1].property.translateX
            data[i+1].property.translateX += data[i].property.width
            data[i].property.order = i
            data[i+1].property.order = i+1
            histAttrs.attr('transform', (k, i) => translate(k.property.translateX + marginBtn * k.property.order, 0))
            otherAttrs.attr('transform', (k, i) => translate(k.property.translateX + marginBtn * k.property.order, 0))
        }
        else if(i > 0 && mousePosition < (data[i-1].property.translateX - data[i].property.translateX)/2){
            [data[i-1], data[i]] = [data[i], data[i-1]]
            data[i-1].property.translateX = data[i].property.translateX
            data[i].property.translateX += data[i-1].property.width
            data[i].property.order = i
            data[i-1].property.order = i-1
            histAttrs.attr('transform', (k, i) => translate(k.property.translateX + marginBtn * k.property.order, 0))
            otherAttrs.attr('transform', (k, i) => translate(k.property.translateX + marginBtn * k.property.order, 0))
        }
    }
    function dragMoveEnd(){
        d3.selectAll('.dragging').classed('dragging', false)
        if(isLines) pcp(__data)
    }

    function dragZoom(k, _this){
        let mousePosition = d3.mouse(_this)[0]
        if(k.property.width + mousePosition > 10){
            k.property.width += mousePosition
            data.forEach(function(kk){
                if(kk.property.order > k.property.order) kk.property.translateX += mousePosition
            })
            histAttrs.attr('transform', (k, i) => translate(k.property.translateX + marginBtn * k.property.order, 0))
            otherAttrs.attr('transform', (k, i) => translate(k.property.translateX + marginBtn * k.property.order, 0))
            d3.select(_this).attr('transform', translate(k.property.width ,0)).style('opacity', 1)
        }
    }

    function dragZoomEnd(_this){
        drawHistograms(data, __data, true, width, height)
    }

    function addLine(_data){
        let ids = new Set(_data.map(kk => kk['___id']))
        __data.forEach(k => ids.has(k['___id']) ? k['___pcp'] = true : k['___pcp'])
        pcp(__data)
        setCallbacks(data, __data)
    }
    
    function removeLine(_data){
        let ids = new Set(_data.map(kk => kk['___id']))
        __data.forEach(k => ids.has(k['___id']) ? k['___pcp'] = false : k['___pcp'])
        pcp(__data)
        setCallbacks(data, __data)
    }
}

function pcp(data){
    if(lastrq != undefined) lastrq.invalidate()
    
    let lines = data.filter(k => k['___pcp'] === true)
    let canvas = document.getElementById('line')
    
    let ctx = canvas.getContext('2d')
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    
    ctx.strokeStyle = '#fff'
    ctx.lineWidth = 1
    ctx.globalAlpha = 0.1

    let rq = renderQueue(function(k){let p = new Path2D(k['___lineData']); ctx.stroke(p)})
    rq.add(lines)
    rq.render()
    lastrq = rq
}


function pcp_hl(data, isHighlight){
    if(lastrq_highlight != undefined) lastrq_highlight.invalidate()

    let lines = data
    let canvas = document.getElementById('line_highlight')
    
    let ctx = canvas.getContext('2d')
    ctx.clearRect(0, 0, canvas.width, canvas.height);
    
    ctx.strokeStyle = '#000'
    ctx.lineWidth = 1.5
    ctx.globalAlpha = 0.2
    ctx.fillStyle = '#fff'

    let rq = renderQueue(function(k){let p = new Path2D(k['___lineData']); ctx.stroke(p)})
    rq.add(lines)
    rq.render()
    lastrq_highlight = rq
}


function tableHover(datum){
    let hoverArea = d3.select('#others').select('.line_hover')
    hoverArea.html("")
    if(datum == null) return
    hoverArea.append('path').attr('d', datum['___lineData'])
}

let renderQueue = (function(func) {
    var _queue = [],                  // data to be rendered
        _rate = 75,                 // number of calls per frame
        _invalidate = function() {},  // invalidate last render queue
        _clear = function() {};       // clearing function
  
    var rq = function(data) {
      if (data) rq.data(data);
      _invalidate();
      _clear();
      rq.render();
    };
  
    rq.render = function() {
      var valid = true;
      _invalidate = rq.invalidate = function() {
        valid = false;
      };
  
      function doFrame() {
        if (!valid) return true;
        var chunk = _queue.splice(0,_rate);
        chunk.map(func);
        timer_frame(doFrame);
      }
  
      doFrame();
    };
  
    rq.data = function(data) {
      _invalidate();
      _queue = data.slice(0);   // creates a copy of the data
      return rq;
    };
  
    rq.add = function(data) {
      _queue = _queue.concat(data);
    };
  
    rq.rate = function(value) {
      if (!arguments.length) return _rate;
      _rate = value;
      return rq;
    };
  
    rq.remaining = function() {
      return _queue.length;
    };
  
    // clear the canvas
    rq.clear = function(func) {
      if (!arguments.length) {
        _clear();
        return rq;
      }
      _clear = func;
      return rq;
    };
  
    rq.invalidate = _invalidate;
  
    var timer_frame = window.requestAnimationFrame
      || window.webkitRequestAnimationFrame
      || window.mozRequestAnimationFrame
      || window.oRequestAnimationFrame
      || window.msRequestAnimationFrame
      || function(callback) { setTimeout(callback, 17); };
  
    return rq;
  });

let lastrq
let lastrq_highlight

function updateData(data, __data, pivot){
    let newData = preprocess(__data, pivot)
    newData.sort((a, b) => data.findIndex(k => k.name == a.name) - data.findIndex(k => k.name == b.name)) 
    newData.forEach(function(k, j){newData[j].property = data[j].property})
    return newData
}