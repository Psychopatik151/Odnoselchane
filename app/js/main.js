const hamburgerButton = document.querySelector('.hamburger-menu__button');
const navMenu = document.querySelector('.hamburger-menu__nav');

function closeNavMenu() {
  hamburgerButton.classList.remove('is-active');
  navMenu.classList.remove('is-active');
}

hamburgerButton.addEventListener('click', function () {
  this.classList.toggle('is-active');
  navMenu.classList.toggle('is-active');
});

document.addEventListener('keydown', function(event) {
  if (event.key === 'Escape' && navMenu.classList.contains('is-active')) {
    closeNavMenu();
  }
});





// ПОКРАС 

const textarea = document.querySelector('.message__input textarea');
const inputBtn = document.querySelector('.message__input-btn svg');

textarea.addEventListener('input', () => {
    if (textarea.value.trim() !== '') {
        inputBtn.classList.add('active');
    } else {
        inputBtn.classList.remove('active');
    }
});