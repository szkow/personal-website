<!DOCTYPE html>
<html>
<head>
    <script src="https://kit.fontawesome.com/6dc1dfc54e.js" crossorigin="anonymous"></script>
    <script src='js/image_gallery.js'></script>
    <link rel='stylesheet' href='css/header.css'></link>
    <style>
        #column {
            border: solid grey;
            width: 60%;
            height: auto;
            margin: 5% 20%;
        }
        #gallery {
            overflow: hidden;
            width: 100%;
            height: 500px;
        }
        .gallery-thumbnail-container {
            width: 100%;
            height: 10%;
            margin-bottom: 1.5%;
            display: flex;
            flex-direction: row;
            justify-content: space-evenly;
            align-content: center;
        }
        .gallery-thumbnail-container div {
            height: 100%;
            opacity: 0.7;
        }
        .thumbnail {
            max-height: 100%;
            max-width: 100%;
        }
        .gallery-main {
            text-align: center;
            width: 100%;
            height: 88%;
        }
        .gallery-main img {
            max-width: 100%;
            max-height: 100%;
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
    </style>
</head>

<body>
    <?php include 'html/header.html' ?>

    <div id='page-title'>
        <h1>ProjectView</h1>
    </div>
    
    <div id='column'>
        <div id='gallery'>
            <div class='gallery-thumbnail-container'>
                <div><img class='thumbnail' src='resources/placeholder.png' alt='placeholder image' onclick='expandImage(this)'></div>
                <div><img class='thumbnail' src='resources/stone.jpg' alt='placeholder image' onclick='expandImage(this)'></div>
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
                <p><b>Languages:</b> C++</p>
            </div>
        </div>
        <div id='words'>
            <h2>Summary</h2>

            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
                Velit dignissim sodales ut eu. Pretium quam vulputate dignissim suspendisse in est ante in. Egestas egestas fringilla 
                phasellus faucibus. Eget felis eget nunc lobortis mattis aliquam faucibus purus in. Commodo quis imperdiet massa 
                tincidunt. Arcu dictum varius duis at consectetur lorem donec. Scelerisque purus semper eget duis at. Mattis nunc sed 
                blandit libero volutpat sed cras. Quisque sagittis purus sit amet volutpat consequat mauris nunc congue. Nisl purus in 
                mollis nunc sed id. Amet cursus sit amet dictum sit amet justo donec enim. Arcu non odio euismod lacinia at quis risus sed 
                vulputate. Amet aliquam id diam maecenas ultricies mi eget mauris.</p>
            <p>Donec adipiscing tristique risus nec feugiat in fermentum. Elit duis tristique sollicitudin nibh. A condimentum vitae sapien 
                pellentesque habitant morbi tristique senectus et. Amet nisl purus in mollis nunc sed id. Sed enim ut sem viverra aliquet 
                eget sit amet. Tellus pellentesque eu tincidunt tortor aliquam nulla. Aenean et tortor at risus. Eu sem integer vitae justo. 
                In egestas erat imperdiet sed euismod nisi porta. Posuere morbi leo urna molestie at. Tempus quam pellentesque nec nam 
                aliquam. Phasellus egestas tellus rutrum tellus.</p>    
            <p>Vel risus commodo viverra maecenas accumsan lacus. Convallis convallis tellus id interdum velit laoreet id. Enim nulla
                aliquet porttitor lacus luctus accumsan tortor. Massa massa ultricies mi quis hendrerit dolor magna eget est. Scelerisque 
                felis imperdiet proin fermentum leo vel orci. Tortor pretium viverra suspendisse potenti nullam ac tortor vitae. Turpis 
                egestas integer eget aliquet. Ac tortor dignissim convallis aenean et tortor. Fringilla phasellus faucibus scelerisque 
                eleifend donec pretium vulputate sapien nec. Vehicula ipsum a arcu cursus vitae. Amet justo donec enim diam vulputate. 
                Fusce id velit ut tortor pretium viverra suspendisse. Vitae auctor eu augue ut lectus arcu bibendum at. Rhoncus est 
                pellentesque elit ullamcorper dignissim cras tincidunt. Dolor magna eget est lorem ipsum dolor sit amet. Scelerisque 
                viverra mauris in aliquam sem fringilla ut. Amet purus gravida quis blandit turpis. Nisl tincidunt eget nullam non.</p>
            <p>Ultricies mi quis hendrerit dolor magna eget. Ipsum a arcu cursus vitae congue mauris rhoncus aenean vel. Morbi tincidunt 
                augue interdum velit. Massa massa ultricies mi quis. Rhoncus aenean vel elit scelerisque mauris pellentesque pulvinar. Sed 
                libero enim sed faucibus turpis in eu mi. Egestas erat imperdiet sed euismod nisi. Vel fringilla est ullamcorper eget nulla 
                facilisi etiam dignissim. Mattis vulputate enim nulla aliquet. Diam ut venenatis tellus in metus. Maecenas pharetra 
                convallis posuere morbi leo. Quisque non tellus orci ac auctor augue mauris augue. Eget nullam non nisi est sit amet. 
                Vulputate dignissim suspendisse in est. Lacinia quis vel eros donec ac. Facilisis gravida neque convallis a cras semper.
                Gravida neque convallis a cras semper auctor neque.</p>
            <p>Lobortis mattis aliquam faucibus purus in. Consequat id porta nibh venenatis cras sed felis. Velit aliquet sagittis id 
                consectetur purus ut faucibus. Eu scelerisque felis imperdiet proin fermentum leo vel orci. Dictum non consectetur a erat
                nam at lectus urna. Vitae auctor eu augue ut lectus arcu bibendum at varius. Eget egestas purus viverra accumsan in nisl 
                nisi. Et ligula ullamcorper malesuada proin libero nunc consequat interdum. Rhoncus dolor purus non enim praesent elementum
                facilisis. Consequat interdum varius sit amet mattis vulputate. Proin nibh nisl condimentum id venenatis a condimentum.</p>
        </div>
    </div>
</body>
</html>