const slides = document.querySelectorAll('.slide');
const carouselSlide = document.querySelector('.carousel-slide');

function updateCarousel(index) {
  const currentSlide = slides[index];
  const currentCardBackground = currentSlide.style.backgroundImage;
  carouselSlide.style.backgroundImage = currentCardBackground;
}

function showSlide(index) {
  slides.forEach((slide, i) => {
    if (i === index) {
      slide.classList.add('active');
    } else {
      slide.classList.remove('active');
    }
  });
  updateCarousel(index);
}

let currentIndex = 0;

function nextSlide() {
  currentIndex++;
  if (currentIndex === slides.length) {
    currentIndex = 0;
  }
  showSlide(currentIndex);
}

setInterval(nextSlide, 5000);

showSlide(currentIndex);
