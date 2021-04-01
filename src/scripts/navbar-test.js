const hamburger = document.getElementById('navbar-click');
const navUL = document.getElementById('test-nav');
const content = document.getElementById('content');

hamburger.addEventListener('click', () => {
    navUL.classList.toggle('show');

    content.classList.toggle('open');
})