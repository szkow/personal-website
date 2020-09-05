<!DOCTYPE html>
<html>

<head>
    <script src="https://kit.fontawesome.com/6dc1dfc54e.js" crossorigin="anonymous"></script>
    <link rel='stylesheet' href='css/site_style.css'>
    </link>
    <link rel='stylesheet' href='css/header.css'>
    </link>
    <script src='js/ripple.js'></script>
    <link rel='stylesheet' href='css/ripple.css'>
    </link>
    <style type='text/css'>
        @media screen and (orientation: portrait) {
            :root {
                --entry-height: 15vw;
            }
        }

        @media screen,
        screen and (orientation: landscape) {
            :root {
                --entry-height: 23vh;
            }
        }

        div.tile-container {
            margin: 1% var(--column-margin) 1% calc(var(--column-margin) - 10px);
            padding-left: 10px;
            width: calc(100% - 2 * var(--column-margin));
            border-left: solid coral 3px;
        }

        div.tile-year {
            width: var(--entry-height);
            font-size: 20pt;
            line-height: 2.5em;
            transform: rotate(-90deg) translateY(-100%);
            position: absolute;
            text-align: right;
            margin: 1%;
        }

        div.tile-year h1 {
            color: coral;
            font-weight: bold;
        }
            
        div.tile {
            /* border-left: solid coral; */
            margin: 0 0 2% 0;
            height: var(--entry-height);
            overflow: hidden;
            background: white;
        }

        @media (max-width: 750px) {
            div.tile div.image-container {
                width: 0;
            }
        }
        
        @media (min-width: 750px) {
            div.tile div.image-container {
                width: var(--entry-height);
            }
        }

        div.tile div.image-container {
            float: left;
            /* width: var(--entry-height); */
            height: 100%;
            margin: 0 0 0 5px;
            overflow: hidden;
            position: relative;
            /* padding-top: 100%; */
            background: grey;
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
            width: calc(100% - var(--entry-height) - 8% - 2% - 5px);
            height: 100%;
            padding: 0 1%;
            overflow: hidden;
            position: relative;
        }

        div.tile div.center ul.project-tags {
            position: absolute;
            bottom: 3px;
            /* width: 100%; */
            height: 1.3em;
            padding: 0;
            margin: 0 0 0 0;
            list-style: none;
            color: grey;
        }
        
        div.tile div.center ul.project-tags li {
            display: inline;
            margin: 0 0.5ch;
            padding: 0 0.3em;
            border: solid lightgrey thin;
            border-radius: 3px;
            font-size: small;
        }

        div.tile div.center h2 span.project-date {
            /* border: thin solid lightgrey; */
            color: grey;
            font-weight: normal;
            font-size: small;
            position: relative;
            bottom: 3px;
            vertical-align: middle;
            padding: 0.6%;
            margin: 0 3%;
        }

        div.tile .tileLink div {
            background-color: coral;
            text-decoration: none;
            float: left;
            width: 8%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        div.tile .tileLink div::after {
            clear: right;
        }

        div.tile a.tileLink:visited,
        div.tile a.tileLink:link {
            color: currentColor;
        }
    </style>
    <title>April Roszkowski &CenterDot; Projects</title>
</head>

<body>
    <?php 
        include 'html/ripple.html'; 
        include 'html/header.html' 
    ?>
    <div id='page-title'>
        <h1>Projects: I try sometimes</h1>
    </div>

    <div class='tile-container'>
        <div class='tile-year'><h1>2020</h1></div>
        <div class="tile">
            <div class='image-container'>
                <img id='thumbnail-website' src="resources/website/code_snippet.jpg" alt="a code snippet from this website">
            </div>

            <div class="center">
                <h2>Merriam's Webpage</h2>
                <p>
                    I wrote a neat lil unobtrusive dictionary add-on for Firefox.
                </p>
                <ul class='project-tags'>
                    <li>JavaScript</li>
                </ul>
            </div>

            <a class='tileLink' href="projects/merriams-webpage.php">
                <div>
                    <i class="fas fa-chevron-right"></i>
                </div>
            </a>
        </div>
        <div class="tile">
            <div class='image-container'>
                <img id='thumbnail-website' src="resources/website/code_snippet.jpg" alt="a code snippet from this website">
            </div>

            <div class="center">
                <h2>This website</h2>
                <p>
                    What you're reading right now is something I wrote December 2019 through January 2020
                    in my free time. I think it's pretty neat!
                </p>
                <ul class='project-tags'>
                    <li>HTML</li>
                    <li>CSS</li>
                    <li>JavaScript</li>
                    <li>Git</li>
                </ul>
            </div>

            <a class='tileLink' href="projects/website.php">
                <div>
                    <i class="fas fa-chevron-right"></i>
                </div>
            </a>
        </div>
    </div>
    <div class='tile-container'>
        <div class='tile-year'><h1>2019</h1></div>
        <div class="tile">
            <div class='image-container'>
                <img id='thumbnail-raytracer' src="resources/raytracer/two_spheres.png"
                    alt="sample output from my ray tracer">
            </div>

            <div class="center">
                <h2>Raytracer</h2>
                <p>
                    As a part of my computer graphics coursework I wrote a
                    program which creates images using ray tracing&mdash;a
                    physics-based rendering technique&mdash;to create
                    photorealistic scenes.
                </p>
                <ul class='project-tags'>
                    <li>C++</li>
                    <li>C</li>
                </ul>
            </div>

            <a class='tileLink' href="projects/raytracer.php">
                <div>
                    <i class="fas fa-chevron-right"></i>
                </div>
            </a>
        </div>
    </div>

</body>

</html>