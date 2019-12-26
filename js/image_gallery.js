function expandImage(thumb) {
    var mainImg = document.getElementById('main-image-handle');
    
    mainImg.src = thumb.src;
    mainImg.alt = thumb.alt;
}