document.addEventListener("DOMContentLoaded", () => {
    // Basic client-side validation for contact form
    const contactForm = document.querySelector("section#contact form");
    if (contactForm) {
        contactForm.addEventListener("submit", (event) => {
            const name = document.getElementById("name").value.trim();
            const email = document.getElementById("email").value.trim();
            const message = document.getElementById("message").value.trim();

            if (!name || !email || !message) {
                event.preventDefault();
                alert("Please fill out all fields in the contact form.");
            }
        });
    }
});
