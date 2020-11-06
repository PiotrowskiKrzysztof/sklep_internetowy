class Slider {
    constructor(images) {
        this.images = images;
        this.slide = null;
        this.prevButton = null;
        this.nextButton = null;
        this.image = null;
        this.currentSlide = 0;

        this.UiSelectors = {
            slide: '[data-slide]',
            buttonPrev: '[data-button-prev]',
            buttonNext: '[data-button-next]',
        }
    }

    initializeSlider() {
       this.slide = document.querySelector(this.UiSelectors.slide);
        this.prevBtn = document.querySelector(this.UiSelectors.buttonPrev);
        this.nextBtn = document.querySelector(this.UiSelectors.buttonNext);

        this.image = document.createElement('img');
        this.image.classList.add('slide__image');  

        this.setSlideAttribute(0);

        this.slide.appendChild(this.image);
        this.addListeners();
    }

    changeSlide(index) {
        if(index < 0) index = imageArr.length - 1;
        if(index > imageArr.length - 1) index = 0;
        this.currentSlide = index;
        this.setSlideAttribute(index);
    }

    setSlideAttribute(index) {        
        this.image.setAttribute(
            'src',
            Array.isArray(this.images) && this.images.length && this.images[index],
        );
        this.image.setAttribute('alt', `Slide ${index + 1}`);
    }

    addListeners() {
        this.prevBtn.addEventListener('click', () =>
            this.changeSlide(this.currentSlide - 1),
        );
        this.nextBtn.addEventListener('click', () =>
            this.changeSlide(this.currentSlide + 1),
        );        
    }
}

const imageArr = [
        './img/baner1.jpg',
        './img/baner2.jpg',
      ];

const slider = new Slider(imageArr);
slider.initializeSlider();