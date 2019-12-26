<!DOCTYPE html>
<html>
<head>
    <script src="https://kit.fontawesome.com/6dc1dfc54e.js" crossorigin="anonymous"></script>
    <script src='js/image_gallery.js'></script>
    <link rel='stylesheet' href='css/header.css'>
    <link rel='stylesheet' href='css/gallery.css'>
    <style>
        #column {
            border: solid grey;
            width: 60%;
            height: auto;
            margin: 5% 20%;
        }
        #links {
            border-bottom: solid grey;
            border-top: solid grey;
            font-size: small;
            width: 100%;
            height: 5%;
            display: flex;
            flex-direction: row-reverse;
            align-content: center;
        }
        #links a {
            text-decoration-color: black;
        }
        #links div {
            min-width: 15%;
            margin: 0 2.5%;
        }
        #words {
            text-indent: 1.5em;
            padding: 20px;
        }
        #words li {
            text-indent: 0;
            text-
        }
    </style>
</head>

<body>
    <?php include 'html/header.html' ?>

    <div id='page-title'>
        <h1>Raytracing</h1>
    </div>
    
    <div id='column'>
        <div id='gallery'>
            <div class='gallery-thumbnail-container'>
                <div><img class='thumbnail' src='resources/placeholder.png' alt='placeholder image' onclick='expandImage(this)'></div>
            </div>
            <div class='gallery-main'>
                <img id='main-image-handle' src='resources/placeholder.png' alt='placeholder image'>
            </div>
        </div>

        <div id='links'>
            <div>
                <p>
                    <i class="fab fa-github-square"></i> <a href='https://github.com'>Source code</a>
                </p>
            </div>
            <div>
                <p>
                    <b>Language:</b> C++
                </p>
            </div>
        </div>
        <div id='words'>
            <h2>Summary</h2>
            <h3>Background</h3>
            <p>
                Raytracing is a method of rendering a virtual scene which is typically used for photorealistic styles. This is
                because the technique attempts to simulate the paths that light rays take through the scene before entering 
                one's eye (more info <a href='https://en.wikipedia.org/wiki/Ray_tracing_(graphics)'>here</a>). What this means,
                practically speaking, is that we can render physically-accurate scenes at an increased computational cost.
                However, there has been growing interest in raytracing as hardware manufacturers have begun developing graphics
                cards which optimize basic raytracing computation. 
            </p>

            <h3>My work</h3>
            <p>
                Over half a semester, everyone in my class wrote their own raytracing program from essentially scratch.
                Specifically, we wrote:
                <ol>
                    <li>
                        An image writer. This was a relatively short function in C/C++ which writes a given array of colors to
                        a file in ASCII .ppm format. Highly inefficient; ridiculously simple (compared to .jpg or .png).
                    </li>
                    <li>
                        A raycaster. This is a few functions which shoots rays into a scene who return the color of whatever 
                        object they hit.
                    </li>
                    <li>
                        A scene description file reader. Some standard C file parsing used to read the objects (e.g. spheres or 
                        .obj triangle meshes) in a scene, as well as parameters like field of view of the camera.
                    </li>
                    <li>
                        The physics. This was the really difficult part. We had to model a number of visual phenomena. For 
                        example, reflection/refraction through materials, total internal reflection, Fresnel effects, 
                        Phong local illumination, or shadows. Most of these are very difficult to achieve in scan-conversion 
                        rendering, while raytracing excels in this area.
                    </li>
                </ol>
            </p>
            <p>
                I developed in Visual Studio 15 and the project ended up being basically the largest piece I'd written so far.
                The class hierarchy and such is probably extremely jank, but I haven't had other eyes on it. I am particularly
                proud of how I dealt with some odd interactions between classes: it ended up paying off since I had one of the
                fasted raytracers in the class.
            </p>
        </div>
    </div>
</body>
</html>