
        document.addEventListener('DOMContentLoaded', function() {
            const hamburger = document.querySelector('.hamburger-menu');
            const navLinks = document.querySelector('.nav-links');
        
            hamburger.addEventListener('click', function() {
                hamburger.classList.toggle('active');
                navLinks.classList.toggle('active');
            });
        });