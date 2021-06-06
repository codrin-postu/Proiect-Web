const hamburger = document.getElementById('hamburger');
const navUL = document.getElementById('nav-bar');

hamburger.addEventListener('click', () => {
    navUL.classList.toggle('show');
})

