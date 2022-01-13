<!DOCTYPE html>
<html>
<head>
    <script src="https://kit.fontawesome.com/6dc1dfc54e.js" crossorigin="anonymous"></script>
    <script src='../js/image_gallery.js'></script>
    <link rel='stylesheet' href='../css/site_style.css'></link>
    <link rel='stylesheet' href='../css/header.css'>
    <link rel='stylesheet' href='../css/gallery.css'>
    <style>
        #nav-projects{
            border-bottom: 2px coral solid;
        }
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
        #words h2 {
            text-indent: 0;
        }
        #words li {
            text-indent: 0;
        }
    </style>
    <title>April Roszkowski &CenterDot; Bouncing Spheroids</title>
</head>

<body>
    <?php 
        include '../html/header.html' 
    ?>

    <div id='page-title'>
        <h1>Intuitive Physics of Bouncing Spheroids</h1>
    </div>
    
    <div id='column'>
        <div id='gallery'>
            <div class='gallery-thumbnail-container'>
                <div><img class='thumbnail' src='../resources/comp_vis/abstract.png'
                            alt='a screenshot of the abstract of the paper' onclick='expandImage(this)'></div>
                <div><img class='thumbnail' src='../resources/comp_vis/concept_slide.png'
                            alt='the "concept" slide of our presentation of the paper' onclick='expandImage(this)'></div>
            </div>
            <div class='gallery-main'>
                <img id='main-image-handle' src='../resources/comp_vis/abstract.png' 
                            alt='a screenshot of the abstract of the paper'>
            </div>
        </div>

        <div id='links'>
            <div>
                <p>
                    <i class="fab fa-github-square"></i> <a href='https://github.com/miniyoung/balls'>Source code</a>
                </p>
            </div>
            <div>
                <p>
                    <b>Languages:</b> Python
                </p>
            </div>
        </div>
        <div id='words'>
            <p>
              In a course on computer vision, 3 peers and I created a convolutional neural network
              to predict the motion of a bouncing spheroid. The idea here was that you could take a video
              of any ball or ball-like object colliding with a ground plane, preprocess it to some extent,
              then feed it into this network, which would spit out the location of where the ball will land
              and what direction it will bounce in after landing (all relative to the camera). We had mixed results,
              which tracks, since our approach wasn't particularly robust. That said, we got to learn
              a ton about machine learning, convolutional neural networks, and implementing deep learning
              networks with PyTorch.
            </p>
            <p>
              Download the paper <a href='../resources/comp_vis/report.pdf'>here</a> for the full picture.
            </p>
        </div>
    </div>
</body>
</html>