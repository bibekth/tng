// Get all the links in the navbar
const navLinks = document.querySelectorAll('.navbar-nav .nav-link');

// Add a scroll event listener
window.addEventListener('scroll', () => {
    let current = '';

    // Loop through each section and determine which one is in the viewport
    navLinks.forEach(link => {
        const section = document.querySelector(link.hash);
        const sectionTop = section.offsetTop;
        const sectionHeight = section.clientHeight;

        if (window.scrollY >= sectionTop - sectionHeight / 3) {
            current = link.hash;
        }
    });

    // Remove active class from all links
    navLinks.forEach(link => link.classList.remove('active'));

    // Add active class to the current section's link
    const activeLink = document.querySelector(`.navbar-nav a[href="${current}"]`);
    if (activeLink) {
        activeLink.classList.add('active');
    }
});
