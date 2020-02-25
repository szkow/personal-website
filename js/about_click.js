current_text = null; 
current_header = null;
current_image = null;
window.onload = (loadEvent) => {
    current_text = document.getElementById('about-me-text');
    current_text.style.visibility = 'visible';
    current_text.style.opacity = 1;

    current_header = document.getElementById('about-me');
    current_header.style.transform = 'translateY(-150%)';

    current_image = document.getElementById('about-me-image');
    current_image.style.visibility = 'visible';
    current_image.style.opacity = 1;
}

function change_text(tab_id) {
    // Swap the old element handle for the new one
    old_text = current_text;
    current_text = document.getElementById(tab_id + '-text');

    // Update text opacities
    old_text.style.opacity = 0;
    // Dispach for crossfading opacity
    window.setTimeout(  // Crossfade images
        () => { 
            current_text.style.visibility = 'visible';
            current_text.style.opacity = 1;
            old_text.style.visibility = 'hidden';
        }, 
        300);
    
    // Update the headers for the section
    old_header = current_header;
    current_header = document.getElementById(tab_id);

    old_header.style.transform = 'translateY(0)';
    current_header.style.transform = 'translateY(-150%)';

    // Update background
    old_image = current_image;
    current_image = document.getElementById(tab_id + '-image');

    old_image.style.opacity = 0;
    window.setTimeout(
        () => {
            current_image.style.visibility = 'visible';
            current_image.style.opacity = 1;
        },
        700);
    window.setTimeout(
        () => {
            old_image.style.visibility = 'hidden';
        },
        900);
}