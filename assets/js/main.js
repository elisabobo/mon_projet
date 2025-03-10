document.addEventListener('DOMContentLoaded', function () {
//burger menu
  const navToggle = document.getElementById('nav-toggle');
  const navMenu = document.getElementById('nav-menu');
  navToggle.addEventListener('click', function () {
      navMenu.classList.toggle('active');
      navToggle.classList.toggle('active');
  });


  var modal = document.getElementById("myModal");
  var btn = document.getElementById("myBtn");
  var span = document.getElementsByClassName("close")[0];


  if(btn) {
      btn.onclick = function() {
        modal.style.display = "block";
      };
  } else {
      console.error("L'élément avec l'id 'myBtn' est introuvable.");
  }

  function closeModal() {

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

  window.onclick = function(event) {
    if (event.target == modal) {
      closeModal();
    }
  };
});
