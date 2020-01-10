window.onload = ((onloadEvent) => {
    function clickCallback(event) {
        var maskOut = document.getElementById('ripple-outer');
        var maskIn = document.getElementById('ripple-inner');
        maskOut.setAttribute('cx', event.clientX);
        maskOut.setAttribute('cy', event.clientY);
        maskIn.setAttribute('cx', event.clientX);
        maskIn.setAttribute('cy', event.clientY);
        animate(maskOut, maskIn);
    }

    // Calculate number of characters to generate
    var widthInCh = window.innerWidth / 10;  // We'll guess more than 10px per char
    var heightInCh = window.innerHeight / 10;  // We have linewidth set to 10px
    var totalChars = widthInCh * heightInCh; 

    generateText(widthInCh, heightInCh);
    document.getElementById('ripple-background').onclick = clickCallback;
});

function animate(outer, inner) {
    var kMaxRadius = 1000;
    var kDuration = 2000;
    var kAnimationSteps = 30;
    // var velocity = 1 / 15;

    // Get our easing functions
    // var innerEase = getCubicBezier({x: 0.8, y: 0.02}, {x: 0.63, y: 0.7});
    var innerEase = getCubicBezier({x: 0.9, y: -0.01}, {x: 0.66, y: 0.91});
    var outerEase = getCubicBezier({x: 0.0, y: 0}, {x: 0.7, y: 1});

    var begin = performance.now();
    requestAnimationFrame(function ripple(time) {
        var progress = (time - begin) / kDuration;
        if (progress > 1) { progress = 1; }  // Cap progress at 1

        // progress = discretize(progress, kAnimationSteps);

        // Redraw our circles
        // var radius = kMaxRadius * sineInOut(progress);
        // var weight = 0.3 * bellInOut(progress);
        // outer.setAttribute('r', radius);
        // inner.setAttribute('r', (1 - weight) * radius);
        const innerRadius = kMaxRadius * innerEase(progress);
        const outerRadius = kMaxRadius * outerEase(progress);
        outer.setAttribute('r', outerRadius);
        // inner.setAttribute('r', innerRadius);

        // Wiggle the letters
        wiggle(progress, 0.01);

        // Continue animation
        if (progress < 1) {
            requestAnimationFrame(ripple);
        } else {
            outer.setAttribute('r', 0);
            inner.setAttribute('r', 0);
        }
    });
}

function discretize(progress, steps) {
    var remapped = progress * steps;
    return (Math.floor(remapped) / steps);
}

function sineInOut(t) {
    t = 0.8 * t + 0.2;
    t = 0.73 * t + 0.27;
    return Math.pow(0.5 * (Math.sin((t - 0.5) * Math.PI) + 1), 5);
}

function bellInOut(t) {
    t = 0.8 * t + 0.2;
    return Math.exp(-20 * Math.pow(t - 0.5, 2));
}

function generateText(widthInCh, heightInCh) {
    // Generate the text
    var generatedText = '';
    for (var i = 0; i < heightInCh; i++) {
        for (var j = 0; j < widthInCh; j++) {
            generatedText += generateCharacter();
        }
        generatedText += '\n';
    }

    // Update text
    var text = document.getElementById('ripple-text');
    text.textContent = generatedText;
}

function wiggle(progress, permutationChance) {
    var text = document.getElementById('ripple-text');
    var string = text.textContent;
    var length = string.length;

    var permuted = '';
    for (var i = 0; i < length; i++) {
        if (string.charAt(i) == '\n') { 
            permuted += '\n'; 
        } else if (Math.random() < permutationChance) {
            permuted += generateCharacter();
        } else {
            permuted += string.charAt(i);
        }
    }

    text.textContent = permuted;
}

function generateCharacter() {
    return String.fromCharCode(Math.floor(93 * Math.random() + 33));
}





function parameterizeCubicBezier({x: p0_x, y: p0_y}, {x: p1_x, y: p1_y}, {x: p2_x, y: p2_y}, {x: p3_x, y: p3_y}) {
    // taken from https://pomax.github.io/bezierinfo/#extremities
    // Now then: given cubic coordinates {pa, pb, pc, pd} find all roots.
    function getCubicRoots(pa, pb, pc, pd) {
        // A helper function to filter for values in the [0,1] interval:
        function accept(t) {
            return t >= 0 && t <= 1;
        }

        function approximately(a, b) {
            return Math.abs(a - b) < 0.01;
        }
        
        // A real-cuberoots-only function:
        function cuberoot(v) {
            if (v < 0) { return -Math.pow(-v, 1/3); }
            return Math.pow(v, 1/3);
        }

        var a = (3*pa - 6*pb + 3*pc),
            b = (-3*pa + 3*pb),
            c = pa,
            d = (-pa + 3*pb - 3*pc + pd);

        // do a check to see whether we even need cubic solving:
        if (approximately(d,0)) {
            // this is not a cubic curve.
            if (approximately(a,0)) {
            // in fact, this is not a quadratic curve either.
            if (approximately(b,0)) {
                // in fact in fact, there are no solutions.
                return [];
            }
            // linear solution
            return [-c / b].filter(accept);
            }
            // quadratic solution
            var q = sqrt(b*b - 4*a*c);
            return [(q-b)/(2*a), (-b-q)/(2*a)].filter(accept)
        }

        // at this point, we know we need a cubic solution.

        a /= d;
        b /= d;
        c /= d;

        var p = (3*b - a*a)/3,
            p3 = p/3,
            q = (2*a*a*a - 9*a*b + 27*c)/27,
            q2 = q/2,
            discriminant = q2*q2 + p3*p3*p3;

        // and some variables we're going to use later on:
        var u1, v1, root1, root2, root3;

        // three possible real roots:
        if (discriminant < 0) {
            var mp3  = -p/3,
            mp33 = mp3*mp3*mp3,
            r    = Math.sqrt( mp33 ),
            t    = -q / (2*r),
            cosphi = (t < -1) ? -1 : ((t > 1) ? 1 : t),
            phi  = Math.acos(cosphi),
            crtr = cuberoot(r),
            t1   = 2*crtr;
            root1 = t1 * Math.cos(phi/3) - a/3;
            root2 = t1 * Math.cos((phi+2*Math.PI)/3) - a/3;
            root3 = t1 * Math.cos((phi+4*Math.PI)/3) - a/3;
            return [root1, root2, root3].filter(accept);
        }

        // three real roots, but two of them are equal:
        if(discriminant === 0) {
            u1 = q2 < 0 ? cuberoot(-q2) : -cuberoot(q2);
            root1 = 2*u1 - a/3;
            root2 = -u1 - a/3;
            return [root1, root2].filter(accept);
        }

        // one real root, two complex roots
        var sd = Math.sqrt(discriminant);
        u1 = cuberoot(sd - q2);
        v1 = cuberoot(sd + q2);
        root1 = u1 - v1 - a/3;
        return [root1].filter(accept);
    }

    function tToY(t) {
        const cubic = Math.pow(1 - t, 3);
        const quadratic = 3 * Math.pow(1 - t, 2) * t;
        const linear = 3 * (1 - t) * Math.pow(t, 2);
        const constant = Math.pow(t, 3);

        // const bezierX = cubic * p0_x + quadratic * p1_x + linear * p2_x + constant * p3_x;
        const bezierY = cubic * p0_y + quadratic * p1_y + linear * p2_y + constant * p3_y;

        return bezierY;
    }

    return (x => {
        const cubic = -p0_x + 3 * p1_x - 3 * p2_x + p3_x;
        const quadratic = 3 * p0_x - 6 * p1_x + 3 * p2_x;
        const linear = -3 * p0_x + 3 * p1_x;
        const constant = p0_x - x;

        // Find t given x
        const roots = getCubicRoots(cubic, quadratic, linear, constant);
        var closestT = Number.POSITIVE_INFINITY;
        for (var i = 0; i < roots.length; i++) {
            const root = roots[i];
            if (root < 0 || root > 1) continue;
            if (Math.abs(root - x) < Math.abs(closestT - x)) {
                closestT = root;
            }
        }
        return tToY(closestT);
    });
}

function getCubicBezier(c_1, c_2) {
    const start = {x: 0, y: 0};
    const end = {x: 1, y: 1};
    return parameterizeCubicBezier(start, c_1, c_2, end);
}
