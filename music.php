<!DOCTYPE html>
<html>
    <head>
        <script src="https://kit.fontawesome.com/6dc1dfc54e.js" crossorigin="anonymous"></script>
        <link rel='stylesheet' href='css/site_style.css'></link>
        <link rel='stylesheet' href='css/header.css'>
        <!-- <script src='js/ripple.js'></script>
        <link rel='stylesheet' href='css/ripple.css'></link> -->

        <style type='text/css'>
            #content-container {
                margin: 0 var(--column-margin);
            }
            #chart-container {
                text-align: center;
                margin: 0 13%;
            }
            #chart-container figcaption {
                text-align: left;
            }
            #chart-container div {  /* This is the aspect ratio box */
                position: relative;
                background: black;
                height: 0;
                padding-top: 100%;
            }
            #chart-container div img {  /* This is the image with fixed aspect ratio */
                position: absolute;
                max-width: 100%;
                top: 0;
                left: 0;
            }
        </style>
    </head>
    <body>
        <div id='page-title'>
            <h1>Music: I like it</h1>
        </div>
        <div id='content-container'>
            <figure id='chart-container'>
                <h2>My week in music</h2>
                <div>
                    <img src='http://www.tapmusic.net/collage.php?user=szkow&type=7day&size=3x3&caption=true'>
                </div>
                <figcaption>
                    Chart generated via <a href='http://www.tapmusic.net'>tapmusic.net</a>
                </figcaption>
            </figure>
        </div>
    </body>
</html>