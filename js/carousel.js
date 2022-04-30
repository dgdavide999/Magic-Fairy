var slideTab = [1, 1];
var slideId = []
var slides = document.getElementsByClassName("carosello");
slideId.push("slide1");

creaSlide(1, 0);
creaSlide(1, 1);

function cambiaSlide(n, no) {
    creaSlide(slideTab[no] += n, no);
}

function creaSlide(n, no) {
    var i;
    var x = document.getElementsByClassName(slideId[no]);
    if (n > x.length) {
        slideTab[no] = 1
    }
    if (n < 1) {
        slideTab[no] = x.length
    }
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none";
    }
    x[slideTab[no] - 1].style.display = "block";
}