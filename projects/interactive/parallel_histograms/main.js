d3.select('#file').on('change', function(){
  let fileReader = new FileReader()
  fileReader.addEventListener('load', function(){
      d3.selectAll('.wrapper g').remove()
      let data = fileReader.result
      //console.log(data)
      data = d3.csvParse(data)
      data.map(function(k, i){
          Object.keys(data[0]).forEach(function(attr){
              if(attr[0] == '_') return
              else k[attr] = +k[attr].replace(/\s/g, '').replace('%', '')
          })
          k['___id'] = i
          return k
      })
      data.nColor = 10
      let histData = preprocess(data, Object.keys(data[0]).filter(k => k[0] != '_')[0])
      drawHistograms(histData, data, true)    
  })
  fileReader.readAsText(this.files[0])
})

function preprocess(data, pivot){
  let nColor = data.nColor
  
  data.sort((a, b) => b[pivot] - a[pivot])

  for(let i = 0; i < data.length; i++){
      if ((i+1 < data.length) && (data[i][pivot] == data[i+1][pivot])){
          let start = i
          let end = i + 1
          
          for(let j = i + 2 ; j < data.length; j++){
              end = j;
              if(data[i][pivot] != data[j][pivot]) break
          } 
          for(j = start; j < end; j++) data[j]['___group'] = Math.floor((start + end) / 2 / data.length * nColor)
          i = end - 1 
      }
      else data[i]['___group'] = Math.floor(i / data.length * nColor)
  }
  
  // let numBin = d3.select('#setBin').property('value')
  // if(numBin == "") numBin = 50
  // else if(numBin < 10) numBin = 10
  numBin=50

  let histData = []
  Object.keys(data[0]).forEach(function(attr){
      if(attr[0] != '_'){
          let eachHist = d3.histogram().value(k => k[attr]).thresholds(numBin)(data)
          let eachHistSep = eachHist.map(function(d){
              return {data: d3.nest().key(k => k['___group']).entries(d), dataLength: d.length, selectedLength: d.filter(k => k['___selected'] !== false).length}
          })
          eachHistSep.name = attr
          eachHistSep.pivot = (attr == pivot)
          eachHistSep.min = eachHist[0].x0
          eachHistSep.max = eachHist[eachHist.length-1].x1
          histData.push(eachHistSep.reverse())
      }
  })
  return histData
}

d3.csv('leaderboard.csv').then(function(data){
  data.map(function(k, i){
      Object.keys(data[0]).forEach(function(attr){
          if(attr[0] == '_') return
          else k[attr] = +k[attr].replace(/\s/g, '').replace('%', '')
      })
      k['___id'] = i
      return k
  })
  data.nColor = 10
  let histData = preprocess(data, Object.keys(data[0]).filter(k => k[0] != '_')[0])
  drawHistograms(histData, data, true)

  const aspect_ratio = 3
  document.getElementById('size_slider').addEventListener('change', (e) => {
      let chart_width = e.target.value
      let chart_height = chart_width / aspect_ratio
      d3.selectAll('g.eachAttr').remove()
      drawHistograms(histData, data, true, chart_width, chart_height)
  })
})
