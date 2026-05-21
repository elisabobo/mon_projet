
//charger les donnes
async function loadCompanies() {
    const reponse= await fetch("/assets/dataset/corporate_rating_clean.csv")
    //transformer en texte
    ///cut
    displayCompanies(companies)
    
}

//affichage entreprise

function displayCompanies(companies){
    //selectionner le conteneur html
    //boucle
    //creer une carte par entreprise
    //ajouter dans la page

}



