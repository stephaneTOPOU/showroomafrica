var recherches = document.querySelectorAll('.recherche');
let currentSlide = 1;

// Javascript for image slider1 autoplay navigation
var repeat = function (activeClass) {
    let active = document.getElementsByClassName('active');
    let t = 1;

    var repeater = () => {
        setTimeout(function () {
            [...active].forEach((activeSlide) => {
                activeSlide.classList.remove('active');
            });
            
            recherches[t].classList.add('active');
            t++;

            if (recherches.length == t) {
                t = 0;
            }
            if (t >= recherches.length) {
                return;
            }

            repeater();
        }, 10000);
    }
    repeater();
}
repeat();
