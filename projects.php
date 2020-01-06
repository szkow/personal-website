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
            width: var(--entry-height);
            height: 100%;
            margin: 0 2% 0 5px;
            overflow: hidden;
            position: relative;
        }
            div.tile div.image-container img {
                position: absolute;
            }
                #thumbnail-raytracer {
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%) scale(0.35);
                }
                #thumbnail-website {
                    top: 0;
                    left: 0;
                    transform-origin: left top;
                    transform: translateX(-10px) scale(0.2);
                }
        div.tile div.center {
            line-height: 1em;
            float: left;
            width: 60%;
            overflow: hidden;
        }
        div.tile .tileLink div {
            background-color: coral;
            text-decoration: none;
            /* color: coral; */
            float: right;
            width: 8%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
            div.tile a.tileLink:visited, div.tile a.tileLink:link {
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
        <img id='thumbnail-raytracer' 
             src="/resources/raytracer/two_spheres.png" alt="sample output from my ray tracer">
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

    <a class='tileLink' href="/projects/raytracer.php">
        <div>
            <i class="fas fa-chevron-right"></i>
        </div>
    </a>
</div>

<div class="tile">
    <div class='image-container'>
        <img id='thumbnail-website'
             src="/resources/website/code_snippet.jpg" alt="a code snippet from this website">
    </div>
    
    <div class="center">
        <h2>This website</h2>
        <p> 
            What you're reading right now is something I wrote December 2019 through January 2020
            in my free time. I think it's pretty neat!
        </p>
    </div>

    <a class='tileLink' href="/projects/website.php">
        <div>
            <i class="fas fa-chevron-right"></i>
        </div>
    </a>
</div>
</body>
</html>
