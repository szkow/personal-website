<!DOCTYPE html>
<html>
<head>
    <script src="https://kit.fontawesome.com/6dc1dfc54e.js" crossorigin="anonymous"></script>
    <script src='../js/image_gallery.js'></script>
    <link rel='stylesheet' href='../css/site_style.css'></link>
    <link rel='stylesheet' href='../css/header.css'>
    <link rel='stylesheet' href='../css/gallery.css'>
    <link rel='stylesheet' href='../css/ripple.css'></link>
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
    <title>April Roszkowski &CenterDot; Merriam's Webpage</title>
</head>

<body>
    <?php 
        include '../html/ripple.html';
        include '../html/header.html' 
    ?>

    <div id='page-title'>
        <h1>Merriam's Webpage</h1>
    </div>
    
    <div id='column'>
        <div id='gallery'>
            <div class='gallery-thumbnail-container'>
                <div><img class='thumbnail' src='../resources/merriams_webpage/merriam_webster_is_subtle.jpg'
                            alt='a screenshot of the add-on' onclick='expandImage(this)'></div>
                <div><img class='thumbnail' src='../resources/merriams_webpage/in_action.jpg'
                    alt='a screenshot of the add-on with a definition' onclick='expandImage(this)'></div>
            </div>
            <div class='gallery-main'>
                <img id='main-image-handle' src='../resources/merriams_webpage/merriam_webster_is_subtle.jpg' 
                            alt='a screenshot of the add-on'>
            </div>
        </div>

        <div id='links'>
            <div>
                <p>
                    <i class="fab fa-github-square"></i> <a href='https://github.com/szkow/merriam-webpage'>Source code</a>
                </p>
            </div>
            <div>
                <p>
                    <b>Languages:</b> Javascript
                </p>
            </div>
        </div>
        <div id='words'>
            <p>
                I created a dictionary extension for Firefox that pops up a book icon when highlighting words on a 
                webpage. Clicking the book brings up an overlay with the word's definition and a link to
                the entry on Merriam Webster. It's a bit rough around the edges, but you can download it
                <a href='../resources/merriams_webpage/merriams_webpage.xpi'>here</a>.

                Also, newer versions of the plugin include a small icon (designed by Desmond Kamas, the best designer) 
                in your toolbar where you can explicitly look up words.
            </p>
            <p>
                This was a pretty fun project, since I learned how to write an extension from scratch for Firefox and also got to do some
                neat JSON parsing of Merriam Webster's dictionary entries. It's uing my personal API key, though, so if too many people use
                it and it exceeds like 1000 lookups/day, they get mad at me.
            </p>
        </div>
    </div>
</body>
</html>