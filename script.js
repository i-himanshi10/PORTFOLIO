document.addEventListener('DOMContentLoaded', function() {
    const navLogo = document.querySelector('.nav-logo');
    const navLinks = document.querySelector('.nav-links');

    if (navLogo && navLinks) {
        navLogo.addEventListener('click', function(e) {
            if (window.innerWidth <= 768) {  // Only toggle on mobile screens
                e.preventDefault();  // Prevent the logo link from being followed
                navLinks.classList.toggle('active');
            }
        });
    }
});