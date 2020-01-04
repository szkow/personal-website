<!DOCTYPE html>
<html>
<head>
<script src="https://kit.fontawesome.com/6dc1dfc54e.js" crossorigin="anonymous"></script>
<link rel='stylesheet' href='/css/site_style.css'></link>
<link rel='stylesheet' href='css/header.css'></link>
<style type='text/css'>
    div.tile {
        border-left: solid coral;
        height: 250px;
        margin-top: 2%;
        margin-left: 15%;
        margin-right: 15%;
    }
    div.tile img {
        float: left;
        width: auto;
        height: auto;
        max-width: 45%;
        max-height: 100%;
    }
    div.tile div.center {
        line-height: 1em;
        float: left;
        max-width: 47%;
        max-height: 90%;
        overflow: hidden;
    }
    div.tile div.tileLink {
        background-color: lightcoral;
        float: right;
        width: 8%;
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }
</style>
</head>

<body>
<?php include "html/header.html" ?>
<div id='page-title'>
    <h1>Projects</h1>
</div>

<div class="tile">
    <img src="resources/placeholder.png" alt="a placeholder image">
    
    <div class="center">
        <h2>Raytracer</h2>
            <p> As a part of my computer graphics coursework I wrote a 
                program which renders using ray tracing--a 
                physically- and mathematically-based technique to create
                photorealistic scenes.
            </p>
            <p> Written in C++ from (nearly) scratch, including an image 
                writer (to ascii .ppm format) and input file parser.
            </p>
    </div>

    <a href="raytracer.php">
        <div class="tileLink">
            <i class="fas fa-chevron-right"></i>
        </div>
    </a>
</div>
</body>
</html>
