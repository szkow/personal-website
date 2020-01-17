<!DOCTYPE html>
<html>
    <head>
        <script src="https://kit.fontawesome.com/6dc1dfc54e.js" crossorigin="anonymous"></script>
        <script src='resources/libs/moment.min.js'></script>
        <link rel='stylesheet' href='css/site_style.css'></link>
        <link rel='stylesheet' href='css/header.css'>
        <script src='js/lastfm_request.js'></script>
        <script src='js/ripple.js'></script>
        <link rel='stylesheet' href='css/ripple.css'></link>

        <style type='text/css'>
            :root {
                --track-width: 20vw;
                --track-height: 13vh;
                --track-text-margin: 2%;
            }
            #content-container {
                margin: 0 var(--column-margin);
            }
            #chart-container {
                text-align: center;
                margin: 0 13%;
            }
            #chart-container figcaption {
                text-align: left;
                font-size: small;
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
            #recently-played {
                overflow-x: auto;
                overflow-y: hidden;
                display: flex;
                flex-flow: column wrap;
                align-items: center;
                height: var(--track-height);
                scrollbar-width: none;
                -ms-overflow-style: none;
                margin: 2% 0;
                padding: 5px 0;
            }
            #recently-played::-webkit-scrollbar {
                display: none;
            }
            #recently-played .recent-entry {
                margin: 0 1%;
                border: thin solid black;
                flex: 0 0 100%;
                width: var(--track-width);
                max-height: 100%;
                overflow: hidden;
            }
            #recently-played .recent-entry img {
                float: left;
                height: 100%;
                max-height: 100%;
            }            
            #recently-played .recent-entry .recent-text-container {
                float: left;
                max-width: calc(100% - (2 * var(--track-text-margin)) - var(--track-height));
                overflow: hidden;
                margin: 0 var(--track-text-margin);
            }
            #recently-played .recent-entry  .recent-text-container .recent-title, .recent-artist, .recent-album, .recent-date {
                /* overflow: hidden; */
                white-space: nowrap;
            }
            #recently-played .recent-entry .recent-text-container a {
                color: currentColor;
            }
            #recently-played .recent-entry .recent-text-container .recent-title {
                font-size: large;
                line-height: 2em;
                /* transition: transform 1s linear; */
            }
            /* #recently-played .recent-entry .recent-text-container .recent-title:hover {
                transform: translate(-100%, 0);
            } */
            #recently-played .recent-entry .recent-text-container .recent-artist, .recent-album {
                font-size: small;
            }
            #recently-played .recent-entry .recent-text-container .recent-date {
                color: grey;
                font-size: small;
            }
        </style>
    </head>
    <body>
        <?php
            include 'html/ripple.html';
            include 'html/header.html'
        ?>
        <div id='page-title'>
            <h1>Music: I like it</h1>
        </div>
        <div id='content-container'>
            <figure id='chart-container'>
                <h2>My week in music</h2>
                <div>
                    <img src='http://www.tapmusic.net/collage.php?user=szkow&type=7day&size=3x3&caption=true'
                         alt='the top 9 albums I listened to this week'>
                </div>
                <figcaption>
                    Chart generated via <a href='http://www.tapmusic.net'>tapmusic.net</a>
                </figcaption>
            </figure>

            <div id='recently-played'>Loading...</div>
        </div>
    </body>
</html>