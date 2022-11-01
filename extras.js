//sliderOne 
const slideOne = {
 slides : document.querySelectorAll('.slide'),
 btnLeft : document.querySelector('.slider_btn-left'),
 btnRight : document.querySelector('.slider_btn-right'),
 dotContainer :document.querySelector('.dots1'),
 slideClass : "dots_dot1"
}

//sliderTwo
const slideTwo ={
 slides : document.querySelectorAll('.slide2'),
 btnLeft : document.querySelector('.secondLeft'),
 btnRight : document.querySelector('.secondRight'),
 dotContainer : document.querySelector('.dots2'),
 slideClass : "dots_dot2"
}

const slider3 = function ({slides, btnLeft, btnRight, dotContainer, slideClass}) {
 

  let curSlide = 0;
  const maxSlide = slides.length;

  // Functions
  const createDots = function () {
    slides.forEach(function (_, i) {
      dotContainer.insertAdjacentHTML(
        'beforeend',
        `<button class="dots_dot ${slideClass}" data-slide="${i}"></button>`
      );
    });
  };

  const activateDot = function (slide2) {
    document
      .querySelectorAll(`.${slideClass}`)
      .forEach(dot => dot.classList.remove('dots_dot-active'));

    document
      .querySelector(`.${slideClass}[data-slide="${slide2}"]`)
      .classList.add('dots_dot-active');
  };

  const goToSlide = function (slide) {
    curSlide = slide;
    slides.forEach(
      (s, i) => (s.style.transform = `translateX(${100 * (i - slide)}%)`)
    );
  };

  // Next slide
  const nextSlide = function () {
    if (curSlide === maxSlide - 1) {
      curSlide = 0;
    } else {
      curSlide++;
    }

    goToSlide(curSlide);
    activateDot(curSlide);
  };

  const prevSlide = function () {
    if (curSlide === 0) {
      curSlide = maxSlide - 1;
    } else {
      curSlide--;
    }
    goToSlide(curSlide);
    activateDot(curSlide);
  };

  const init = function () {
    goToSlide(0);
    createDots();

    activateDot(0);
  };
  init();

  // Event handlers
  btnRight.addEventListener('click', nextSlide);
  btnLeft.addEventListener('click', prevSlide);

  document.addEventListener('keydown', function (e) {
    if (e.key === 'ArrowLeft') prevSlide();
    e.key === 'ArrowRight' && nextSlide();
  });

  dotContainer.addEventListener('click', function (e) {
    if (e.target.classList.contains(`${slideClass}`)) {
      const { slide } = e.target.dataset;
      goToSlide(slide);
      activateDot(slide);
      
    }
  });
};
slider3(slideOne);
slider3(slideTwo);


function checkAllExtrasBoxes() {
  var checkboxes = document.querySelectorAll('input[type="checkbox"]');
  for (var checkbox of checkboxes) {
    checkbox.checked = true;
  }
}

function checkFourBoxes(){
  console.log("checkFourBoxes() is triggered ");
  var checkboxes = document.querySelectorAll('input[type="checkbox"]');
  for (var checkbox of checkboxes) {
      checkbox.checked = true;
  }
}

