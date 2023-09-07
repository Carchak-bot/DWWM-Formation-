//_________________________________

/*  
CSS stylé pour les échecs :

* {
  border-collapse: collapse;
}

.caseBlanc, .caseNoir{
height: 35px;
width: 35px;
border: 1px solid #000000;
}

.caseNoir {
background-color: black;
}

.caseBlanc {
background-color: #ffffff;
}

*/ 

//Document.write déjà asynchrone ne fonctionne pas avec un script en defer ou async

console.log("Script chargé");
//let maTable = document.createElement("table");
//document.body.appendChild(maTable);
let nombre=1; // Donner une valeur impair à la première case
let genID=1;
document.write('<table>'); //Créer la table principale
for(let ligne=1; ligne<9; ligne++) { //Première boucle pour les lignes
    document.write('<tr>'); //Ouverture de l'élément ligne de tableau
    for(let caseEchec=1; caseEchec<9; caseEchec++) {    //Seconde boucle pour les cases (obligé de mettre echec car case seul fait conflit)
        if (nombre/2 == Math.round(nombre/2)) { //Changer d'une case à l'autre pour nombre pair/impair
        var classe="case-noir" //Si impair = Noir
        } else {
        var classe="case-blanc" //Si pair = Blanc
        }
        document.write('<td class="'+classe+'" id="'+genID+'"></td>'); //création des divs pour les cases de tableau
        nombre++; //Itération nécessaire pour calculer si pair ou impair
        genID++;
    }
    nombre++; //Itération nécéssaire pour alterner entre les deux lignes
    document.write('</tr>'); //Fin de l'élément Ligne
}
document.write('</table>'); //Fin de l'élément table

let maTable = document.querySelector('table');

maTable.addEventListener("click", function(eventDetail) {    //on écoute le clic
console.log(eventDetail); //on regarde si la ou est le curseur c'est case-blanc ou case-noir
eventDetail.target.classList.toggle('case-noir'); //On met la class casenoir ou on l'enlève fonction->cible->élément ciblé->ce qu'on change
})      //on fait un switch


//done

