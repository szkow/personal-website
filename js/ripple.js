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
    const kMaxRadius = 1000;
    const kDuration = 7000;
    const kAnimationSteps = 100;
    // var velocity = 1 / 15;

    var begin = performance.now();
    requestAnimationFrame(function ripple(time) {
        var progress = (time - begin) / kDuration;
        if (progress > 1) { progress = 1; }  // Cap progress at 1

        // progress = discretize(progress, kAnimationSteps);

        // Redraw our circles
        const radius = kMaxRadius * sineInOut(progress);
        const weight = 0.3 * bellInOut(progress);
        outer.setAttribute('r', radius);
        inner.setAttribute('r', (1 - weight) * radius);

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
    const remapped = progress * steps;
    return (Math.floor(remapped) / steps);
}

function parameterizeCubicBezier({x: p0_x, y: p0_y}, {x: p1_x, y: p1_y}, {x: p2_x, y: p2_y}, {x: p3_x, y: p3_y}) {
    return (t => {
        const cubic = Math.pow(1 - t, 3);
        const quadratic = 3 * Math.pow(1 - t, 2) * t;
        const linear = 3 * (1 - t) * Math.pow(t, 2);
        const constant = Math.pow(t, 3);

        const bezierX = cubic * p0_x + quadratic * p1_x + linear * p2_x + constant * p3_x;
        const bezierY = cubic * p0_y + quadratic * p1_y + linear * p2_y + constant * p3_y;
        return {bezierX, bezierY};
    });
}

function getCubicBezier(c_1, c_2) {
    const start = {x: 0, y: 0};
    const end = {x: 1, y: 1};
    return parameterizeCubicBezier(start, c_1, c_2, end);
}

function sineInOut(t) {
    const j = 0.8 * t + 0.2;
    const s = 0.73 * j + 0.27;
    return Math.pow(0.5 * (Math.sin((s - 0.5) * Math.PI) + 1), 5);
}

function bellInOut(t) {
    const j = 0.8 * t + 0.2;
    return Math.exp(-20 * Math.pow(j - 0.5, 2));
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
    const text = document.getElementById('ripple-text');
    const string = text.textContent;
    const length = string.length;

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