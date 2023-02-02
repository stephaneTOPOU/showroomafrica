var slides = document.querySelectorAll('.slide');
var slides_2 = document.querySelectorAll('.slide-two');
var slides_3 = document.querySelectorAll('.slide-three');
var slides_4 = document.querySelectorAll('.slide-four');
var slides_5 = document.querySelectorAll('.slide-five');
var slides_6 = document.querySelectorAll('.slide-six');
let currentSlide = 1;

// Javascript for image slider autoplay navigation
var repeat = function(activeClass){
  let active = document.getElementsByClassName('active');
  let i = 1;

  var repeater = () => {
    setTimeout(function(){
      [...active].forEach((activeSlide) => {
        activeSlide.classList.remove('active');
      });

    slides[i].classList.add('active');
    slides_2[i].classList.add('active');
    slides_3[i].classList.add('active');
    slides_4[i].classList.add('active');
    slides_5[i].classList.add('active');
    slides_6[i].classList.add('active');
    i++;

    if(slides.length == i){
      i = 0;
    }
    if(i >= slides.length){
      return;
    }
    repeater();
  }, 10000);
  }
  repeater();
}
repeat();
