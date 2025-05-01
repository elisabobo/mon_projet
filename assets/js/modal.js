var dialog = document.querySelector("dialog")
var btn = document.querySelector("dialog + button");
var span = document.querySelector(".close");

btn.addEventListener("click", ()=>{
    dialog.showModal();
});

span.addEventListener("click", () => {
    dialog.close(); 
});

window.onclick = function(event) {
    if (event.target == dialog) {
        dialog.close();
    }
};

document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('modal-form');
    if (form) {
    form.addEventListener('submit', function (e) {
        let errors = [];
        const title = form.querySelector('input[name="title"]').value.trim();
        const description = form.querySelector('textarea[name="description"]').value.trim();
        const image = form.querySelector('input[name="image"]').files[0];
        const type = form.querySelector('select[name="type"]').value;
        const difficulty = form.querySelector('select[name="difficulte"]').value;

        if (!title) {
        errors.push('Le titre est requis.');
        }

        if (!description) {
        errors.push('La description est requise.');
        }
        if (!image) {
        errors.push('Une image doit être téléchargée.');
        }

        if (!type) {
            errors.push('Le type doit être sélectionné.');
        }

        if (!difficulty) {
            errors.push('La difficulté doit être sélectionnée.');
        }

        if (errors.length > 0) {
          e.preventDefault(); // Empêche l'envoi
          alert(errors.join('\n')); // Affiche toutes les erreurs
        }
});
    }
});
