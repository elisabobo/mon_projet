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
