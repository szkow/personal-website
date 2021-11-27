<!DOCTYPE html>
<html>
<head>
    <script src="https://d3js.org/d3.v5.min.js"></script>
    <script src="https://kit.fontawesome.com/6dc1dfc54e.js" crossorigin="anonymous"></script>
    <link rel='stylesheet' href='style.css'></link>
    <link rel='stylesheet' href='../../../css/site_style.css'></link>
    <link rel='stylesheet' href='../../../css/header.css'>
    <style>
       
    </style>
    <title>April Roszkowski &CenterDot; Tiny Parallel Histogram Plots</title>
</head>

<body>
    <?php 
        include '../../../html/header.html' 
    ?>

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

    <script src='histogram.js'></script>
    <script src='main.js'></script>
</body>