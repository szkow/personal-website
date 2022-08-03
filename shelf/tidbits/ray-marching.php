<!DOCTYPE html>
<html>
<head>
    <script src="https://kit.fontawesome.com/6dc1dfc54e.js" crossorigin="anonymous"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
    <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>
    <link rel='stylesheet' href='../../css/site_style.css'></link>
    <link rel='stylesheet' href='../../css/header.css'>
    <style>
        #nav-projects{
            border-bottom: 2px coral solid;
        }
        #column {
            height: auto;
            margin: 0 var(--column-margin);
        }
        #words {
            background: white;
            text-indent: 1.5em;
            padding: 20px;
        }
        #words h2 {
            text-indent: 0;
        }
        #wave-img {
            float: left;
            position: center center;
            object-fit: cover;
            max-width: 33%;
            min-width: 200px;
            margin: 0 20px 20px 0;
        }
    </style>
    <title>April Roszkowski &CenterDot; Tidbit: Ray Marching</title>
</head>

<body>
    <?php 
        include '../../html/header.html' 
    ?>

    <div id='page-title'>
        <div class='tidbit-header'>
            <div>Tidbit</div>
            <h1>Ray Marching</h1>
            <h3>April 6, 2021</h3>
        </div>
    </div>
    
    <div id='column'>
        <div id='words'>
            <h2>Background and Motivations</h2>
            <p>
                If you've heard anything about computer graphics, odds are you've heard of raytracing&mdash;a method of rendering where
                each pixel has a ray shot through it into the scene and bounced around a few times, simulating a ray of light. Because
                of how this problem is formulated, though, ray tracing is really slow since you must explicitly compute intersections
                between objects and rays. Ray marching is very similar to raytracing, except instead of computing ray-object intersections,
                we simply step the ray forward bit by bit until we hit something. Thus we turn our explict-and-difficult method for rendering
                into an iterative-and-easy method.
            </p>

            <p>
                <img id='wave-img' src='../../resources/tidbits/ray_marching/wave.png'>

                I first got interested in ray marching after watching <a href='https://www.youtube.com/watch?v=svLzmFuSBhk'>this video
                on rendering 3D fractals</a>. However, I know next to nothing about fractals and wasn't particularly interested in
                rendering them, but I love differential equations and thought it would be a nice exercise to write a ray marching shader
                to render solutions to the wave equation. After spending a few hours poking around online, particularly 
                <a href='https://www.iquilezles.org/www/articles/distfunctions/distfunctions.htm'>Inigo Quilez's website</a>, I was able to throw something together which works okay (see image to left).
            </p>
            
            <h2>Problem Setup</h2>
            <p>
                So, the trick to getting a realtime render with raymarching is to find an accurate and efficient distance estimator (a lower bound on the Euclidean distance from any point to the closest point on the surface) for
                whatever you're trying to render. In my case, I'm rendering solutions \(u(x,y)\) to the 2D wave equation: \[u_{tt} = \Delta u\]
                The boundary and initial conditions don't really matter so long as a solution exists.
            </p>
            <p>
                Now, one would hope that there's some neat simplification we can make to find a distance estimator and render super quick, based
                solely on our assumption about \(\Delta u\). All this really tells us, though, is that for a time \(t\), \(u_{xx} + u_{yy} = c_t\) where \(c_t\) is some constant. I couldn't find any way this helped us simplify the expression for Euclidean distance, but
                maybe I'm just not smart enough. So, I moved on to plan B, which was to brute force a distance estimator and see where it 
                got me.
            </p>

            <h2>Brute Forcing a Distance Estimate</h2>
            <p>
                I've not yet defined exactly what it means to be a distance estimator, so let's begin by considering that. Basically, we want 
                some function \(d(x_0,y_0,z_0)\) which will tell us the distance from the point \(\left(x_0, y_0, z_0\right)\) to the closest point on
                our solution curve, \(u(x,y,z)\). Formulated as a minimization problem, the distance function is given by
                \[ d(x_0,y_0,z_0) = \min_{x,y} \sqrt{(x_0 - x)^2 + (y_0 - y)^2 + (z_0 - u(x,y))^2} \]
                Note that I've omitted \(t\) from all of these expressions, since it is constant across each frame of our render.
                However, since we only need an <em>estimate</em> of this distance for the ray marching algorithm to converge, we really just
                need to put a lower bound on \(d(x,y,z)\). That's where things get interesting.
            </p>
            <p>
                So, since finding \(d\) is a minimization problem, a really simple solution is to just use gradient descent to find the minimum.
                
            </p>
        </div>
    </div>
</body>
</html>