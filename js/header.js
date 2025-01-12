// Mobile Menu Toggle
document.addEventListener("DOMContentLoaded", () => {
    const menuToggle = document.querySelector(".menu-toggle");
    const navMenu = document.querySelector(".ai-nav");

    menuToggle.addEventListener("click", () => {
        navMenu.classList.toggle("active");
    });
});
