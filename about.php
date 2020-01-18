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
    #center-column div {
        float: left;
        max-width: 40%;
        margin: 2%;
        /* background-color: azure; */
        background-color: ghostwhite;
        border-top: thin solid coral;
        padding: 1%;
    }
    #center-column #about-resume {
        /* width: 12%; */
        width: 40%;
        text-align: center;
    }
    #center-column #about-resume h2, p {
        text-align: left;
    }
    #center-column #about-resume a {
        color: currentColor;
    }
    #center-column #about-website {
        max-width: 28%;
    }
    #center-column #about-website::after {
        clear: both;
    }
    #center-column #about-identity {
        float: left;
    }
    #center-column #about-research {
        position: relative;
        bottom: 70px;
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
            <div id='about-me'>
                <h2>Me</h2>
                <p>
                    I'm April, a student, musician, self-made entrepreneur, creative, and innovator. 
                    Sorry, last few are a joke.
                </p>
                <p>
                    Currently, I'm a third-year student at the University of Minnesota studying computer
                    science with a minor in math. I've found I really like the mathy side of computer
                    science, hence the minor and my interest in computer graphics/visualization and 
                    robotics (kinda, maybe not sure yet).
                </p>
                <p>
                    Anyways, welcome to my site; take a look around!
                </p>
            </div>
            <a href='resources/resume.pdf'>
            <div id='about-resume'>
                <h2>R&eacute;sum&eacute;</h2>
                <p>
                    It kinda speaks for itself.
                </p>
            </div>
            </a>
            <!-- <div id='about-website'>
                <h2>This website</h2>
                <p>
                    The site is meant to be an archive of my personal work to supplement
                    my resume. All the design/content is fresh off the presses so there's
                    not too much to see for now.
                </p>
            </div> -->
            <div id='about-identity'>
                <h2>Identity</h2>
                <p>
                    I feel stifled by professionalism&mdash;the only place it seems appropriate to discuss my
                    identity as a queer person is here. It's annoying, because being trans and being bisexual
                    is a really big part of me and has informed my personality and development immeasurably.
                    So, basically, I'm transgender (nonbinary, since I use any pronouns). It matters to me
                    that you know since I'm lucky enough to be in a position where I can be fully open about it.
                </p>
            </div>
            <div id='about-research'>
                <h2>Research</h2>
                <p>
                    As an undergrad, I've been involved in quite a bit of research, mostly through REU programs.
                    Reasearch is fun and lets me learn a lot of specific and useful concepts. Sadly, it comes
                    with the side effect that I've fallen hopelessly in love with LaTeX.
                </p>
                <p>
                    My first undergraduate position was as a research assistant to a UMN professor who does 
                    visualization research (the <a href="http://ivlab.cs.umn.edu/">IV/Lab</a>). My work specifically was an application which
                    recreates traditional Micronesian seafaring techniques in VR. It was a fun concept which
                    united some humanities fields with computation and was motivated by cultural heritage.
                </p>
                <p>
                    Most recently, I worked in a mathematics research lab. There, I studied 
                    <a href="https://en.wikipedia.org/wiki/Optimal_control">optimal control theory</a>, or, how to control
                    many robots to move similarly. It's difficult to explain this clearly <em>and</em> briefly, so it may be
                    more enlightening if you're curious to skim my final presentation for the REU: download as
                    <a href='resources/optimal_control/Cornell Final Presentation.pdf'>PDF</a> or
                    <a href='resources/optimal_control/Cornell Final Presentation.pptx'>PowerPoint</a>.
                </p>
            </div>
            <div id='about-interests'>
                <h2>Interests</h2>
                <p>
                    I play piano, listen to music, and do small coding projects in my free time. Music
                    is what I spend the majority of time on, though. My music tastes are pretty varied,
                    but the most common theme is that I love contemporary music and more experimental
                    stuff. You can see what I've been listening to recently <a href='music.php'>here</a>
                    or on my Last.fm account, found among my social links.
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