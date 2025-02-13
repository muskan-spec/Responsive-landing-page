
    document.getElementById("contactForm").addEventListener("submit", function(event) {
        let isValid = true;

        // Name validation
        let name = document.getElementById("name").value.trim();
        let nameError = document.getElementById("nameError");
        if (name.length < 3) {
            nameError.classList.remove("d-none");
            isValid = false;
        } else {
            nameError.classList.add("d-none");
        }

        // Email validation
        let email = document.getElementById("email").value.trim();
        let emailError = document.getElementById("emailError");
        let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailPattern.test(email)) {
            emailError.classList.remove("d-none");
            isValid = false;
        } else {
            emailError.classList.add("d-none");
        }

        // Message validation
        let message = document.getElementById("message").value.trim();
        let messageError = document.getElementById("messageError");
        if (message === "") {
            messageError.classList.remove("d-none");
            isValid = false;
        } else {
            messageError.classList.add("d-none");
        }

        // Prevent form submission if invalid
        if (!isValid) {
            event.preventDefault();
        }
    });

