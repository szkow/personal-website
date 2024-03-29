<!DOCTYPE html>
<html>
<head>
    <script src="https://kit.fontawesome.com/6dc1dfc54e.js" crossorigin="anonymous"></script>
    <script src='../../util/image_gallery/image_gallery.js'></script>
    <link rel='stylesheet' href='../../css/site_style.css'></link>
    <link rel='stylesheet' href='../../css/header.css'>
    <link rel='stylesheet' href='../../util/image_gallery/gallery.css'>
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
    <title>April Roszkowski &CenterDot; This website</title>
</head>

<body>
    <?php 
        include '../../html/header.html' 
    ?>

    <div id='page-title'>
        <h1>Personal Website</h1>
    </div>
    
    <div id='column'>
        <div id='gallery'>
            <div class='gallery-thumbnail-container'>
                <div><img class='thumbnail' src='../../resources/website/code_snippet.jpg'
                            alt='a code snippet from this website' onclick='expandImage(this)'></div>
            </div>
            <div class='gallery-main'>
                <img id='main-image-handle' src='../../resources/website/code_snippet.jpg' 
                            alt='a code snippet from this website'>
            </div>
        </div>

        <div id='links'>
            <div>
                <p>
                    <i class="fab fa-github-square"></i> <a href='https://github.com/szkow/personal-website'>Source code</a>
                </p>
            </div>
            <div>
                <p>
                    <b>Languages:</b> HTML, CSS, Javascript
                </p>
            </div>
        </div>
        <div id='words'>
            <p>
                You can see most of the stuff I did for yourself, just by browsing these pages. I'm particularly
                proud of my music page since it uses an XML HTTP request which is something I've never implemented before. 
                It was interesting to see how web requests work and actually have it function in the end.
            </p>
            <p>
                I'm new to web development, so I ended up writing everything without a framework. And 
                this was really fun to do, actually. I hate HTML a little bit less and I somewhat 
                understand Javascript now; although, there are definitely things I'd change about the former.
                I also learned that sometimes simple effects are very, very
                hard to achieve (lookin' at you, <code>&lt;details&gt;</code> with CSS transitions...) and
                that Mozilla is your friend.
            </p>
        </div>
    </div>
</body>
</html>