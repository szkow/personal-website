<!DOCTYPE html>
<html>
<head>
<script src="https://kit.fontawesome.com/6dc1dfc54e.js" crossorigin="anonymous"></script>
<link rel='stylesheet' href='css/site_style.css'></link>
<link rel='stylesheet' href='css/header.css'>
<script src='js/ripple.js'></script>
<link rel='stylesheet' href='css/ripple.css'></link>
<style type=text/css>
    #social-links {
        /* border: thin solid black; */
        font-size: small;
        /* min-width: 15%; */
        max-width: 25%;
        margin-top: 10%;
        margin-right: 7%;
        float: right;
    }
    #social-links ul {
        margin-left: 0;
        padding-left: 0;    
    }
    #social-links li {
        list-style: none;
    }
    #social-links i {
        font-size: medium;
    }
    #social-links a {
        text-decoration: none;
        color: grey;
    }
    #center-column {
        margin-left: var(--column-margin);
        width: calc(100% - 2 * var(--column-margin));
        float: left;
    }
</style>
</head>

<body>
    <?php 
        include 'html/ripple.html' 
    ?>
<div id="page-container">
    <?php 
        include 'html/header.html'
    ?>
    
    <div id="about-container">
        <div id='page-title'>
            <h1>April Roszkowski: I live here</h1>
        </div>
        
        <div id='center-column'>
            <!-- <p>Welcome to my website!</p>
            <p>My name is April Roszkowski, a Computer Science student
                at the University of Minnesota-Twin Cities. This page
                is most definitely under construction, but for the
                time being, feel free to view  
                <a class='pdf-link' href='resources/resume.pdf'>my resume</a>.
            </p> -->
            <div>
                <h2>Me</h2>
                <p>
                    I'm April, a student and self-made entrepreneur. Sorry, that last one was a joke 
                    actually.
                    
                    Currently, I'm a third-year student at the University of Minnesota studying computer
                    science with a minor in math. I've found I really like the mathy side of computer
                    science, hence the minor and my interest in computer graphics/visualization and 
                    robotics (kinda, maybe not sure yet).

                    Anyways, welcome to my site; take a look around, check out my 
                    <a class='pdf-link' href="resources/resume.pdf">resume</a>!
                </p>
            </div>
            <div>
                <h2>Interests</h2>
                <p>
                    I play piano, listen to music, and do small coding projects in my free time. Music
                    is what I spend the majority of time on, though. My music tastes are pretty varied,
                    but the most common theme is that I love contemporary music and more experimental
                    stuff. You can see what I've been listening to recently <a href='music.php'>here</a>
                    or on my Last.fm account, found among my social links.
                </p>
            </div>
            <div>
                <h2>This website</h2>
                <p>
                    The site is meant to be a little archive of my personal work and supplement to
                    my resume. All the design/content is pretty fresh off the presses so there's
                    not too much to see for now, however.
                </p>
            </div>
        </div>
        
        <div id='social-links'>
            <ul>
                <a href='mailto:roszk008@umn.edu'>
                        <li>
                            <i class="far fa-envelope" style='color: black'></i> roszk008@umn.edu
                        </li>
                </a>
                <a href='https://www.linkedin.com/in/april-roszkowski'>
                    <li>
                        <i class="fab fa-linkedin" style='color: black'></i> april-roszkowski
                    </li>
                </a>
                <a href='https://www.github.com/szkow'>
                    <li>
                        <i class="fab fa-github-square" style='color: black'></i> szkow
                    </li>
                </a>
            
                <a href='https://www.last.fm/user/szkow'>
                    <li>
                        <i class="fab fa-lastfm-square" style='color: black'></i> szkow
                    </li>
                </a>
            </ul>
        </div>
    </div>
    
    <footer>
            All content and design by <a href='about.php'>me</a> &#183 icons 
            by <a href='https://fontawesome.com'>fontawesome</a>.
    </footer>
</div>
</body>
</html>