<!DOCTYPE html>
<html>
<head>
    <script src="https://kit.fontawesome.com/6dc1dfc54e.js" crossorigin="anonymous"></script>
    <script src='../js/image_gallery.js'></script>
    <link rel='stylesheet' href='../css/site_style.css'></link>
    <link rel='stylesheet' href='../css/header.css'>
    <link rel='stylesheet' href='../css/gallery.css'>
    <script src='../js/ripple.js'></script>
    <link rel='stylesheet' href='../css/ripple.css'></link>  
    <style>
        #column {
            /* border: solid grey; */
            height: auto;
            margin: 0 var(--column-margin);
        }
        #links {
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
            background: white;
            text-indent: 1.5em;
            padding: 20px;
        }
        #words li {
            text-indent: 0;
        }
    </style>
    <title>April Roszkowski &CenterDot; Raytracing</title>
</head>

<body>
    <?php 
        include '../html/ripple.html';
        include '../html/header.html' 
    ?>

    <div id='page-title'>
        <h1>Raytracing</h1>
    </div>
    
    <div id='column'>
        <div id='gallery'>
            <div class='gallery-thumbnail-container'>
                <div><img class='thumbnail' src='../resources/raytracer/two_spheres.png' alt='placeholder image' onclick='expandImage(this)'></div>
                <div><img class='thumbnail' src='../resources/raytracer/teapot.png' alt='placeholder image' onclick='expandImage(this)'></div>
            </div>
            <div class='gallery-main'>
                <img id='main-image-handle' src='../resources/raytracer/teapot.png' alt='placeholder image'>
            </div>
        </div>

        <div id='links'>
            <div>
                <p>
                    <i class="fab fa-github-square"></i> <a href='https://github.com/szkow/raytracer-csci5607'>Source code</a>
                </p>
            </div>
            <div>
                <p>
                    <b>Language:</b> C++
                </p>
            </div>
        </div>
        <div id='words'>
            <h2><i class="fas fa-mountain"></i> Background</h2>
            <p>
                Raytracing is a method of rendering a virtual scene which is typically used for photorealistic styles. This is
                because the technique attempts to simulate the paths that light rays take through the scene before entering 
                one's eye (more info <a href='https://en.wikipedia.org/wiki/Ray_tracing_(graphics)'>here</a>). What this means,
                practically speaking, is that we can render physically-accurate lighting in exchange for higher computational cost.
                However, there has been growing interest in raytracing as hardware manufacturers have begun developing graphics
                cards which optimize basic raytracing computation so, who knows! Maybe in 3 years we'll all be raytracing our apps.
            </p>

            <h2><i class="fas fa-hammer"></i> What I did</h2>
            <p>
                From scratch, I made:
                <ol>
                    <li>
                        The physics. This was the really difficult part. We had to model a number of visual phenomena. For 
                        example, reflection/refraction through materials, total internal reflection, Fresnel effects, 
                        Phong local illumination, or shadows.
                    </li>
                    <li>
                        An image writer in ASCII .ppm format. Highly inefficient; ridiculously simple (compared to .jpg or .png).
                    </li>
                    <li>
                        A raycaster. This is a few functions which shoot rays into a scene that return the color of whatever object they hit.
                    </li>
                    <li>
                        A scene description file reader. Some standard C file parsing used to read the objects (e.g. spheres or 
                        .obj triangle meshes) in a scene, as well as parameters like field of view of the camera.
                    </li>
                </ol>
            </p>

            <h2><i class="fas fa-graduation-cap"></i> What I learned</h2>
            <p>
                I developed in Visual Studio 15 and the project ended up being basically the largest piece I'd written so far.
                The class hierarchy and such is probably extremely jank&mdash;I haven't had other eyes on it&mdash;but I am 
                proud of how I dealt with a few weird class interactions. I think it all paid off since I had one of the
                fastest raytracers in the class :)
            </p>
        </div>
    </div>
</body>
</html>