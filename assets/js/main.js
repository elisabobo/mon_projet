document.addEventListener('DOMContentLoaded', function () {
  // Code pour la navigation
  const navToggle = document.getElementById('nav-toggle');
  const navMenu = document.getElementById('nav-menu');
  navToggle.addEventListener('click', function () {
      navMenu.classList.toggle('active');
      navToggle.classList.toggle('active');
  });

  // Code pour le modal
  var modal = document.getElementById("myModal");
  var btn = document.getElementById("myBtn");
  var span = document.getElementsByClassName("close")[0];

  // Vérifier si le bouton existe avant d'y attacher un événement
  if(btn) {
      btn.onclick = function() {
        modal.style.display = "block";
      };
  } else {
      console.error("L'élément avec l'id 'myBtn' est introuvable.");
  }

  function closeModal() {
      // Réinitialiser le formulaire contenu dans la modal
      var form = modal.querySelector('form');
      if(form){
          form.reset();
      }
      modal.style.display = "none";
  }

  if(span) {
      span.onclick = closeModal;
  } else {
      console.error("L'élément avec la classe 'close' est introuvable.");
  }

  // Fermer la modal si on clique à l'extérieur
  window.onclick = function(event) {
    if (event.target == modal) {
      closeModal();
    }
  };
});
