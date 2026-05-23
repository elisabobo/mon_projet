(function(){
    var DELIMITER= ',';
    var NEWLINE='\n';
    var i=document.getElementById('nom_entreprise');
    var table=document.getElementById('entreprise-info');
    if (!i){
        return;

    }
    //définir une fonction qui sera appelée chaque fois que l'évènement défini est envoyé à la cible
    i.addEventListener('change',function(){
        //checker si le fichier existe
        if (i.files && i.files.length>0){
            parseCSV(i.files[0]);

        }

    });
    
    function parseCSV(file){
        //si erreur
        if (!file || !FileReader){
            return;
        }
        var reader=new FileReader();
        reader.onload=function(e){
            toTable(e.target.result);

        };
        reader.readAsText(file);

    }
    function toTable(text){
        //en cas derreur
        if (!text|| !table){
            return;
        }
        //clear la table et en creer une nouvelle
        while(table.lastElementChild){
            table.removeChild(table.lastElementChild);

        }
        //on prend ensuite toutes les lignes
        var rows=text.split(NEWLINE);
        //aarray de tous les headers
        var headers=rows.shift().split(DELIMITER);
        var htr= document.createElement('tr');

        headers.forEach(function(h){

        });

    }

})();