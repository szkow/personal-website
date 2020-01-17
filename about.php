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
            <h1>About</h1>
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
                <h2>Introduction</h2>
                <p>

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