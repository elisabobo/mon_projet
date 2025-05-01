document.addEventListener('DOMContentLoaded', function () {
    const form = document.querySelector('form');
    form.addEventListener('submit', function (e) {
    const email = document.getElementById('email').value.trim();
    const password = document.getElementById('passphrase').value.trim();
    const errors = [];

      // format valide de l'email
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        errors.push("L'adresse email n'est pas valide.");
    }

      // longueur
    if (password.length < 5) {
        errors.push("Le mot de passe doit contenir au moins 5 caractères.");
    }

    if (errors.length > 0) {
        e.preventDefault(); // Bloque l'envoi
        alert(errors.join('\n'));
    }
    });
});