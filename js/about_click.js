current_text = null; 
current_header = null;
window.onload = (loadEvent) => {
    current_text = document.getElementById('about-me-text');
    current_text.style.visibility = 'visible';
    current_text.style.opacity = 1;

    current_header = document.getElementById('about-me');
    current_header.style.transform = 'translateY(-150%)';
}

function change_text(tab_id) {
    old_text = current_text;
    current_text = document.getElementById(tab_id + '-text');

    old_text.style.opacity = 0;
    window.setTimeout(
        () => { 
            current_text.style.visibility = 'visible';
            current_text.style.opacity = 1;
            old_text.style.visibility = 'hidden';
        }, 
        300);
    
    old_header = current_header;
    current_header = document.getElementById(tab_id);

    old_header.style.transform = 'translateY(0)';
    current_header.style.transform = 'translateY(-150%)';
}