<!DOCTYPE html>
<html>
    <head>
        <script src="https://kit.fontawesome.com/6dc1dfc54e.js" crossorigin="anonymous"></script>
        <link rel='stylesheet' href='css/site_style.css'></link>
        <link rel='stylesheet' href='css/header.css'>
        <script src='js/lastfm_request.js'></script>
        <!-- <script src='js/ripple.js'></script>
        <link rel='stylesheet' href='css/ripple.css'></link> -->

        <style type='text/css'>
            :root {
                --track-width: 20vw;
                --track-height: 13vh;
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
            }
            #recently-played .recent-entry img {
                float: left;
                height: 100%;
                max-height: 100%;
            }
            #recently-played .recent-entry .recent-text-container {
                float: left;
                max-width: calc(100% - var(--track-height));
                position: relative;
                white-space: nowrap;
                overflow: hidden;
            }

            #recently-played .recent-track {
                font-size: large;
            }
            #recently-played .recent-artist, .recent-album {
                font-size: medium;
            }
            #recently-played .recent-date {
                color: grey;
                font-size: small;
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
                    <img src='http://www.tapmusic.net/collage.php?user=szkow&type=7day&size=3x3&caption=true'
                         alt='the top 9 albums I listened to this week'>
                </div>
                <figcaption>
                    Chart generated via <a href='http://www.tapmusic.net'>tapmusic.net</a>
                </figcaption>
            </figure>

            <h2>Recently played:</h2>
            <div id='recently-played'></div>
        </div>
    </body>
</html>