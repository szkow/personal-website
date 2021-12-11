<!DOCTYPE html>
<html>
<head>
    <script src="https://d3js.org/d3.v5.min.js"></script>
    <script src="https://kit.fontawesome.com/6dc1dfc54e.js" crossorigin="anonymous"></script>
    <link rel='stylesheet' href='../../../css/site_style.css'></link>
    <link rel='stylesheet' href='style.css'></link>
    <link rel='stylesheet' href='../../../css/header.css'>
    <style>
       #chart_container {
           height: 634px;
           width: 1900px;
           margin: 10px;
           margin-bottom: 0;
           border-bottom: black thin solid;
           overflow: hidden;
       }
    </style>
    <title>April Roszkowski &CenterDot; Tiny Parallel Histogram Plots</title>
</head>

<body>
    <?php 
        include '../../../html/header.html' 
    ?>

    <div id='chart_container'>
        <svg id = 'others' height = '400px'>
            <g class ="line_hover"></g>
            <g class = 'wrapper'></g>
            <g id = 'widgetArea'></g>
        </svg>
        <canvas id='line_highlight'></canvas>
        <canvas id='line' style="visibility:hidden"></canvas>
        <svg id = 'histogram' height='400px'>
            <rect id = 'background'></rect>
            <g class = 'wrapper'></g>
        </svg>
    </div>
    <div id='controls'>
        <div>
            <label for='size_slider'>Chart width</label>
            <input type='range' id='size_slider' name='size' min='200' max='1900' step='1' value='1900'>
            <p id='heightwidth_label'>Current size: 1900 &#215; 633</p>
            <div></div>
            <h3>Size-reduction options</h3>
            <input type='checkbox' id='violin_checkbox' name='violins' checked>
            <label for='violin_checkbox'>Draw violin plots</label>
            <br>
            <input type='checkbox' id='color_checkbox' name='colors' checked>
            <label for='color_checkbox'>Reduce color palette</label>
        </div>
    </div>

    <script src='histogram.js'></script>
    <script src='main.js'></script>
</body>