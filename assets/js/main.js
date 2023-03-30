// Menu Btn
const menuBtn = document.querySelector('.menu-btn');
const mainMenu = document.querySelector('.main-menu');

menuBtn.addEventListener('click', () => {
  menuBtn.classList.toggle('fa-times');
  mainMenu.style.display !== 'flex'
    ? (mainMenu.style.display = 'flex')
    : (mainMenu.style.display = 'none');
});
