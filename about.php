<!DOCTYPE html>
<html>
<head>
<script src="https://kit.fontawesome.com/6dc1dfc54e.js" crossorigin="anonymous"></script>
<link rel='stylesheet' href='css/site_style.css'></link>
<link rel='stylesheet' href='css/header.css'>
<script src='js/about_click.js'></script>
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
        height: 90vh;
        float: left;
    }
    #center-column #center-image {
        margin-top: 1%;
        background-color: darkgrey;
        height: 85%;
        position: relative; 
        overflow: hidden;
    }

    #center-column #center-image img {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        max-width: 100%;
        opacity: 0;
        transition: opacity 900ms ease;
        visibility: hidden;
    }

    #center-column #center-image div {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 50%;
        max-height: 90%;
        /* font-size: x-large; */
        opacity: 0;
        background-color: rgba(50,50,50,0.7);
        visibility: hidden;
        transition: opacity 500ms;
        padding: 1% 5%;
        color: lightgrey;
        overflow-y: auto;
        scrollbar-width: thin;
    }

    #center-column #center-image div a {
        color: aliceblue;
    }

    #center-column #tabs {
        display: flex;
        flex-direction: row;
        justify-content: space-evenly;
        list-style: none;
        margin: 0;
        padding: 0;
        width: 100%;
        overflow-y: hidden;
    }
    #center-column #tabs li {
        position: relative;
        padding: 1% 0;
        max-width: 15%;
        text-align: center;
        cursor: pointer;
        transition: transform 500ms ease;
    }

    #center-column #tabs li h2 {
        margin: 0;
    }
</style>
<title>April Roszkowski &CenterDot; About</title>
</head>

<body>
    <?php 
        include 'html/header.html'
    ?>
    
    <div id='page-title'>
        <h1>April Roszkowski</h1>
        <h2>I live here</h2>
    </div>
    
    <div id='center-column'>
        <div id='center-image'>
            <img id='about-me-image' src='resources/about/ithaca_sunset.jpg' 
                alt='me standing on a bride in Ithaca, New York at sunset'/>
            <img id='about-resume-image' src='resources/about/jobs!!!.png'
                alt='jobs! work! great!'/>
            <img id='about-identity-image' src='resources/about/pride.jpg'
                alt='the nonbinary pride flag'/>
            <img id='about-interests-image' src='resources/about/cicada.jpg'
                alt='a freshly-molted cicada in my front yard'/>
            <img id='about-research-image' src='resources/about/MATH!!!.jpg'
                alt='esoteric math scribbles on a blackboard in Cornell'/>
            <div id='about-me-text'>
                <h2>Me</h2>
                <p>
                    I'm April, a student, musician, self-made entrepreneur, creative, and influencer. 
                    Sorry, the last few are a joke.
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
            <div id='about-resume-text'>
                <h2>R&eacute;sum&eacute;</h2>
                <p>
                    <a href='resources/resume.pdf' download='april_roszkowski_resume.pdf'>
                    It kinda speaks for itself. <i class="fas fa-download"></i>
                    </a>
                </p>
            </div>
            <div id='about-identity-text'>
                <h2>Identity</h2>
                <p>
                    I feel stifled by professionalism&mdash;the only place it seems appropriate to discuss my
                    identity as a queer person is here. It's annoying, because being trans and being bisexual
                    is a really big part of me and has informed my personality and development immeasurably.
                </p>
                <p>    
                    So, basically, I'm transgender (nonbinary, since I use any pronouns). It matters to me
                    that you know since I'm lucky enough to be in a position where I can be fully open about it.
                </p>
            </div>
            <div id='about-interests-text'>
                <h2>Interests</h2>
                <p>
                    I play piano, listen to music, and do small coding projects in my free time. Music
                    is what I spend the majority of time on, though. My music tastes are pretty varied,
                    but the most common theme is that I love contemporary music and more experimental
                    stuff. You can see what I've been listening to recently <a href='music.php'>here</a>
                    or on my Last.fm account, found among my social links.
                </p>
            </div>
            <div id='about-research-text'>
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
                    <a href="https://en.wikipedia.org/wiki/Optimal_control">optimal control theory</a> and the problem of how to make
                    many robots to move similarly. It's difficult to explain this clearly <em>and</em> briefly, so it may be
                    more enlightening if you're curious to skim my final presentation for the REU: download as
                    <a href='resources/optimal_control/Cornell Final Presentation.pdf' download='Cornell Final Presentation.pdf'>PDF</a> or
                    <a href='resources/optimal_control/Cornell Final Presentation.pptx' download='Cornell Final Presentation.pptx'>PowerPoint</a>.
                </p>
            </div>
        </div>
        <ul id='tabs'>
            <li id='about-me' onclick='change_text(this.id)'>
                <h2>Me</h2>
            </li>
            <li id='about-resume' onclick='change_text(this.id)'>
                <h2>R&eacute;sum&eacute;</h2>
            </li>
            <li id='about-identity' onclick='change_text(this.id)'>
                <h2>Identity</h2>
            </li>
            <li id='about-interests' onclick='change_text(this.id)'>
                <h2>Interests</h2>
            </li>
            <li id='about-research' onclick='change_text(this.id)'>
                <h2>Research</h2>
            </li>
        </ul>
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
</body>
</html>