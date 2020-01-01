window.onload = ((onloadEvent) => {
    function clickCallback(event) {
        var maskOut = document.getElementById('ripple-outer');
        var maskIn = document.getElementById('ripple-inner');
        maskOut.setAttribute('cx', event.clientX);
        maskOut.setAttribute('cy', event.clientY);
        maskIn.setAttribute('cx', event.clientX);
        maskIn.setAttribute('cy', event.clientY);
        animate(maskOut, maskIn, 8000);
    }

    document.getElementById('ripple-background').onclick = clickCallback;
});

function animate(outer, inner, duration) {
    var maxRadius = 1000;
    var animationSteps = 20;
    // var velocity = 1 / 15;

    var begin = performance.now();
    requestAnimationFrame(function ripple(time) {
        var progress = (time - begin) / duration;
        if (progress > 1) { progress = 1; }  // Cap progress at 1

        progress = discretize(progress);

        // Redraw our outer
        var radius = maxRadius * sineInOut(progress);
        var weight = 0.3 * bellInOut(progress);
        outer.setAttribute('r', radius);
        inner.setAttribute('r', (1 - weight) * radius);

        // Continue animation
        if (progress < 1) {
            requestAnimationFrame(ripple);
        } else {
            outer.setAttribute('r', 0);
            inner.setAttribute('r', 0);
        }
    });

    function discretize(progress) {
        var remapped = progress * animationSteps;
        return (Math.floor(remapped) / animationSteps);
    }
}

function sineInOut(t) {
    t = 0.73 * t + 0.27;
    return Math.pow(0.5 * (Math.sin((t - 0.5) * Math.PI) + 1), 5);
}

function bellInOut(t) {
    return Math.exp(-20 * Math.pow(t - 0.5, 2));
}