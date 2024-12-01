document.getElementById("login-form").addEventListener("submit", function(event) {
    let username = document.getElementById("username").value;
    let password = document.getElementById("password").value;
    let valid = true;

    document.getElementById("username-error").textContent = "";
    document.getElementById("password-error").textContent = "";

    let usernameRegex = /^[a-z]{8,20}$/;
    if (!username.match(usernameRegex)) {
        document.getElementById("username-error").textContent = "Username-ul trebuie să conțină între 8 și 20 de caractere și doar litere mici.";
        valid = false;
    }

    if (password.length < 6) {
        document.getElementById("password-error").textContent = "Parola trebuie să aibă cel puțin 6 caractere.";
        valid = false;
    }

    if (!valid) {
        event.preventDefault();
    }
});
