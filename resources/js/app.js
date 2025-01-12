import './bootstrap';
import '../css/app.css';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
/*document.addEventListener("DOMContentLoaded", () => {
    const readMoreButtons = document.querySelectorAll(".btn-standard");
    readMoreButtons.forEach((button) => {
        button.addEventListener("click", (event) => {
            const parent = button.closest(".blog-card");
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
        });
    });
});
*/