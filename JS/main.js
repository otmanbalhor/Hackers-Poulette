document.addEventListener("DOMContentLoaded", function () {
    const form = document.querySelector("form");
    const nameInput = form.querySelector('input[name="name"]');

    // Script pour le nom de famille
    nameInput.addEventListener("input", function () {
        const name = nameInput.value;
        const errorDiv = nameInput.parentNode.querySelector(".error-message");
        if (errorDiv) {
            errorDiv.remove();
        }
        if (name.length < 2 || name.length > 255) {
            const InvalidName = document.createElement("div");
            InvalidName.textContent = "Le nom doit contenir entre 2 et 255 caractères.";
            InvalidName.style.color = "red";
            InvalidName.classList.add('error-message');
            nameInput.parentNode.appendChild(InvalidName);
        }
        else if (!/^[a-zA-ZÀ-ÿ\s\-']+$/.test(name)) {
            const InvalidName = document.createElement("div");
            InvalidName.textContent = "Le nom ne doit contenir que des lettres.";
            InvalidName.style.color = "red";
            InvalidName.classList.add('error-message');
            nameInput.parentNode.appendChild(InvalidName);
        }
    });

    // Script pour le prénom
    firstnameInput.addEventListener("input", function () {
        const firstname = firstnameInput.value;
        const errorDiv = firstnameInput.parentNode.querySelector(".error-message");
        if (errorDiv) {
            errorDiv.remove();
        }
        if (firstname.length < 2 || firstname.length > 255) {
            const InvalidfirstName = document.createElement("div");
            InvalidfirstName.textContent = "Le prénom doit contenir entre 2 et 255 caractères.";
            InvalidfirstName.style.color = "red";
            InvalidfirstName.classList.add('error-message');
            firstnameInput.parentNode.appendChild(InvalidfirstName);
        }
        else if (!/^[a-zA-ZÀ-ÿ\s\-']+$/.test(firstname)) {
            const InvalidfirstName = document.createElement("div");
            InvalidfirstName.textContent = "Le prénom ne doit contenir que des lettres.";
            InvalidfirstName.style.color = "red";
            InvalidfirstName.classList.add('error-message');
            firstnameInput.parentNode.appendChild(InvalidfirstName);
        }
    });

    // Script pour l'e-mail
    emailInput.addEventListener("input", function () {
        const email = emailInput.value;
        const errorDiv = emailInput.parentNode.querySelector(".error-message");
        if (errorDiv) {
            errorDiv.remove();
        }
        if (email.length < 2 || email.length > 255) {
            const InvalidEmail = document.createElement("div");
            InvalidEmail.textContent = "Votre adresse e-mail n'est pas valide.";
            InvalidEmail.style.color = "red";
            InvalidEmail.classList.add('error-message');
            emailInput.parentNode.appendChild(InvalidEmail);
        }
        else if (!/\S+@\S+\.\S+/.test(email)) {
            const InvalidEmail = document.createElement("div");
            InvalidEmail.textContent = "Votre adresse e-mail n'est pas valide.";
            InvalidEmail.style.color = "red";
            InvalidEmail.classList.add('error-message');
            emailInput.parentNode.appendChild(InvalidEmail);
        }
    });

    // Script pour la description
    descriptionInput.addEventListener("input", function () {
        const description = descriptionInput.value;
        const errorDiv = descriptionInput.parentNode.querySelector(".error-message");
        if (errorDiv) {
            errorDiv.remove();
        }
        if (description.length < 2 || description.length > 255) {
            const InvalidDescription = document.createElement("div");
            InvalidDescription.textContent = "La description doit contenir entre 2 et 1000 caractères.";
            InvalidDescription.style.color = "red";
            InvalidDescription.classList.add('error-message');
            descriptionInput.parentNode.appendChild(InvalidDescription);
        }
    });

});