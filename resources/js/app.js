import './bootstrap';
import '../css/app.css';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

// Function for toggling content
function toggleContent(event) {
    const button = event.target; // The clicked button
    const parent = button.closest(".content-container"); // The parent container of the button
    const shortContent = parent.querySelector(".short-content");
    const fullContent = parent.querySelector(".full-content");

    // Toggle visibility
    if (fullContent.style.display === "none") {
        fullContent.style.display = "block";
        shortContent.style.display = "none";
        button.textContent = "Read Less"; // Change button text
    } else {
        fullContent.style.display = "none";
        shortContent.style.display = "block";
        button.textContent = "Read More"; // Change button text
    }
}

// Ensure DOM is ready before running the code
document.addEventListener("DOMContentLoaded", () => {
    const readMoreButtons = document.querySelectorAll(".btn.btn-standard");
    readMoreButtons.forEach((button) => {
        button.addEventListener("click", toggleContent);
    });
});
