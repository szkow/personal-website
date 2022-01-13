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
            <div>
                <p>
                    <b>Download:</b> <a href='https://chrome.google.com/webstore/detail/jndchalbfebjhgfllgdigdcfpocoahoe'>Chrome</a>,
                    <a href='https://addons.mozilla.org/en-US/firefox/addon/merriams-webpage/'>Firefox</a>
                </p>
            </div>
        </div>
        <div id='words'>
            <p>
                Like everyone, I read a lot of text online. Like many, I have the vocabulary of a 4th grader. As such, I find dictionary
                extensions for web browsers a necessary tool in everyday life. I primarily use Firefox, and was surprised by the lack
                of well-designed word-lookup add-ons available -- even Google's dictionary extension is a mess and cumbersome to use.
                So, I designed and created a dictionary extension using Merriam Webster's definitions with the goals of having an unobtrusive
                and intuitive user interface. The project is open-source and available on the 
                <a href='https://chrome.google.com/webstore/detail/jndchalbfebjhgfllgdigdcfpocoahoe'>Chrome webstore</a> and 
                <a href='https://addons.mozilla.org/en-US/firefox/addon/merriams-webpage/'>Firefox's add-on marketplace</a>, featuring an
                icon designed by Desmond Kamas (the best designer).
            </p>
            <p>
                The primary mode of interaction with the extension is integrated into the website. When you highlight text,
                a book icon pops up near the selection. Clicking the book brings up an overlay with the word's definition and a link to
                the entry on Merriam Webster. I aimed to make this as integrated into the website as possible, so as to not distract from
                reading and encourage quick, everyday use.
            </p>
            <p>
                Alternatively, the extension adds a button to the browser's toolbar which can be clicked to manually look up words. This version
                also has a 5-word search history, for convenience.
            </p>
            <p>
                This was a pretty fun project, since I learned how to write an extension from scratch and also got to do some
                neat JSON parsing of Merriam Webster's dictionary entries. Since I developed this in my free time, the extension may be 
                a bit rough aesthetically, and the text-highlighting interaction may not work as intended on all websites.
            </p>
        </div>
    </div>
</body>
</html>