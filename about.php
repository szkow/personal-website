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
        /* border: solid black; */
        font-size: small;
        min-width: 15%;
        max-width: 25%;
        margin-top: 10%;
        margin-right: 1%;
        float: right;
    }
    #social-links i {
        font-size: medium;
    }
    #social-links a {
        text-decoration: none;
        color: grey;
    }
    #center-column {
        margin-top: 5%;
        margin-left: 27%;
        width: 47%;
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
            <p>Welcome to my website!</p>
            <p>My name is April Roszkowski, a Computer Science student
                at the University of Minnesota-Twin Cities. This page
                is most definitely under construction, but for the
                time being, feel free to view  
                <a href='resources/resume.pdf'>my resume</a>.
            </p>
        </div>
        
        <div id='social-links'>
            <p>
            <a href='mailto:roszk008@umn.edu'>
                    <i class="far fa-envelope" style='color: black'></i> roszk008@umn.edu</a><br>
            <a href='https://www.linkedin.com/in/april-roszkowski'>
                <i class="fab fa-linkedin" style='color: black'></i> april-roszkowski</a><br>
            <a href='https://www.github.com/szkow'>
                <i class="fab fa-github-square" style='color: black'></i> szkow</a><br>
        
            <a href='https://www.last.fm/user/szkow'>
                <i class="fab fa-lastfm-square" style='color: black'></i> szkow</a><br>
            </p>
        </div>
    </div>
    
    <footer>
            All content and design by <a href='about.php'>me</a> &#183 icons 
            by <a href='https://fontawesome.com'>fontawesome</a>.
    </footer>
</div>
</body>
</html>