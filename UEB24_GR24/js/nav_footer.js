function toggleNavOnScroll() {
    const nav = document.querySelector('nav');

    window.addEventListener('scroll', () => {

        if (window.scrollY > 200) {
            nav.classList.add('scrolled'); 
        } else {
            nav.classList.remove('scrolled');  
        }
    });
}

document.addEventListener('DOMContentLoaded', toggleNavOnScroll);







