//garantit que tout le contenu html a été chargé
document.addEventListener('DOMContentLoaded', function () {
    const navToggle = document.getElementById('nav-toggle');
    const navMenu = document.getElementById('nav-menu');

    //chaque fois que le bouton est cliqué la fonction est exécutée
    navToggle.addEventListener('click', function () {
        //active ou désactuve le style css
        navMenu.classList.toggle('active');
        navToggle.classList.toggle('active');
    });
});

// avoir le modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// ouvrir le modal quand on clique sur le bouton ajouter un patron
btn.onclick = function() {
  modal.style.display = "block";
}

//fermer le model quand on appuie sur la croix
function closeModal() {
  // Réinitialiser le formulaire contenu dans la modal
  var form = modal.querySelector('form');
  if(form){
      form.reset();
  }
  modal.style.display = "none";
}
span.onclick = closeModal;
//quand on clique nimporte où ca ferme le modal
window.onclick = function(event) {
  if (event.target == modal) {
    closeModal();
  }
}