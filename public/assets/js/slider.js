var slides = document.querySelectorAll('.slide');
var slides_2 = document.querySelectorAll('.slide-two');
var slides_3 = document.querySelectorAll('.slide-three');
let currentSlide = 1;

// Javascript for image slider1 autoplay navigation
var repeat = function(activeClass){
  let active = document.getElementsByClassName('active');
  let active2 = document.getElementsByClassName('active-two');
  let active3 = document.getElementsByClassName('active-three');
  let i = 1;
  let j = 1;
  let k = 1;

  var repeater = () => {
    setTimeout(function(){
      [...active].forEach((activeSlide) => {
        activeSlide.classList.remove('active');
      });
      [...active2].forEach((activeSlide) => {
        activeSlide.classList.remove('active-two');
      });
      [...active3].forEach((activeSlide) => {
        activeSlide.classList.remove('active-three');
      });

    slides[i].classList.add('active');
    slides_2[j].classList.add('active-two');
    slides_3[k].classList.add('active-three');
    i++;
    j++;
    k++;

    if(slides.length == i){
      i = 0;
    }
    if(i >= slides.length){
      return;
    }

    if(slides_2.length == j){
      j = 0;
    }
    if(j >= slides_2.length){
      return;
    }

    if(slides_3.length == k){
      k = 0;
    }
    if(k >= slides_3.length){
      return;
    }

    repeater();
  }, 10000);
  }
  repeater();
}
repeat();
