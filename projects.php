<!DOCTYPE html>
<html>
<head>
<script src="https://kit.fontawesome.com/6dc1dfc54e.js" crossorigin="anonymous"></script>
<link rel='stylesheet' href='/css/site_style.css'></link>
<link rel='stylesheet' href='/css/header.css'></link>
<style type='text/css'>
:root {
    --entry-height: 200px;
}
    div.tile {
        border-left: solid coral;
        height: var(--entry-height);
        margin: 1% var(--column-margin) 1% var(--column-margin);
    }
        div.tile div.image-container {
            float: left;
            width: calc(var(--entry-height) + 2%);
            height: 100%;
            overflow: hidden;
            position: relative;
        }
            div.tile div.image-container img {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%) scale(0.35);
            }
        div.tile div.center {
            line-height: 1em;
            float: left;
            width: 47%;
            overflow: hidden;
        }
        div.tile .tileLink div {
            background-color: coral;
            /* color: coral; */
            float: right;
            width: 8%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
            div.tile a.tileLink:visited {
                color: currentColor;    
            }
</style>
</head>

<body>
<?php include "html/header.html" ?>
<div id='page-title'>
    <h1>Projects</h1>
</div>

<div class="tile">
    <div class='image-container'>
        <img src="/resources/raytracer/two_spheres.png" alt="sample output from my ray tracer">
    </div>
    
    <div class="center">
        <h2>Raytracer</h2>
        <p> 
            As a part of my computer graphics coursework I wrote a 
            program which creates images using ray tracing&mdash;a 
            physics-based rendering technique&mdash;to create
            photorealistic scenes.
        </p>
        <p> 
            Written in C++ from scratch, including an image 
            writer and input file parser.
        </p>
    </div>

    <a class='tileLink' href="/raytracer.php">
        <div>
            <i class="fas fa-chevron-right"></i>
        </div>
    </a>
</div>
</body>
</html>
