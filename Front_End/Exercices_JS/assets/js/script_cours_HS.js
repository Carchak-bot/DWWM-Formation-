//_________________________________
//Cours 05/09/2023

/*Ne pas oublier de mettre a dans le head du HTML
Le defer est important car permet de déclencher les scripts que quand la page a été chargée entièrement */

<script src="./assets/js/script.js" defer></script>

/* Variables types :
var : Variables globales
let : Variables locales à un bloc de code (typiquement séparées par { blablabla } )
*/

let monAge = 0;
const CLE_SECRET = "dfdfdgd4564dfsdf4sd";

function construireNomComplet(nom, prenom) {
    let nomComplet = nom + " " + prenom;
    return nomComplet;
}

/* Déclaration des variables en local n'affectant pas les fonctions */

let inputPrenom = "Alain";
let inputNom = "ORLUK";
let nomCompletConstruit = "";

/* Appel de la fonction et fait une correspondance de 1 pour 1 de contenu de variables ici : 
 inputNom -> nom / inputPrenom -> prenom */

nomCompletConstruit = construireNomComplet(inputNom, inputPrenom);

/* Log tout sur la console 
Et cherche dans le document l'ID "mon_bouton"
Le trouve et le log dans la console */

console.log(nomCompletConstruit);

let buttonElt = document.getElementById("mon_bouton");
console.log(buttonElt);

/* Quand le bouton est cliqué
Parce qu'il est écouté
Change sa couleur en rouge 
Modifie le texte à renvoyer */

buttonElt.addEventListener("click", function() {
    console.log("bouton cliqué !");
});
let compteur = 0;
buttonElt.addEventListener("click", () => {
    console.log(compteur);
    console.log("bouton cliqué !");
    compteur++;
    switch (compteur) {
        case 1:
            buttonElt.innerText = "1 fois";
    	    buttonElt.style.backgroundColor = "red";
            break;
        case 2:
            buttonElt.innerText = "2 fois";
            buttonElt.style.backgroundColor = "green";
            break;
        case 3:
            buttonElt.innerText = "3 fois";
      	    buttonElt.style.backgroundColor = "blue";
            break;
        case 4:
            buttonElt.innerText = "4 fois";
      	    buttonElt.style.backgroundColor = "white";
              let newParagraph = document.createElement("p");
              newParagraph.innerText = "t kon";
              let myHeader = document.getElementById("header");
              myHeader.appendChild(newParagraph);
            break;
        case 5:
            document.getElementById("header").style.fontFamily = "Impact,Charcoal,sans-serif"
            document.getElementById("header").style.fontSize = "xx-large";
            compteur=0;
            break;
    };
});

buttonElt.innerText = "RENVOYER";


//_________________________________
//Cours 06/09/2023


//Boucler les multiplications


console.log("Script chargé <br><br>")
for (let x = 1; x <= 10; x++) { //get Boucled
    console.log("itération");
    let uneTable = document.createElement("div"); //Crée une div
    uneTable.setAttribute("id", "table" + x); //Crée un ID pour chaque div crée
    document.body.appendChild(uneTable); //Les div sont les bébés du body
    let maDiv = document.querySelector("div#table"+x); //On définie la variable madiv dans cette boucle par l'id de la table crée précédement
    for(let y = 1; y <=10; y++) { //get boucled 2
        console.log("ligne");
        let unMultiple = document.createElement("p"); //on crée des lignes de multiplications
        unMultiple.textContent= x+" x "+y+" = "+x*y; //big maths
        maDiv.appendChild(unMultiple); //les lignes sont les bébés des divs
    };
};


//_________________________________

/*  
Faire un damier de 8x8 cases
a, b, c, d, e, f, g, h,
1, 2, 3, 4, 5, 6, 7, 8,  

crée une grande div pour le plateau

pour ligne = 12345678 {
    pour case = 12345678 {
        if case pair {
            alors case blanche
        } sinon {
            alors case noire
        }
        est l'enfant de ligne
    }
    est l'enfant de grande div
}
*/
console.log("Script chargé")

let divGrande = document.createElement("div");
divGrande.setAttribute("id", "divGrande");
for (let ligne = 1; ligne < 9; ligne++) {
    console.log("Ligne "+ ligne)
    for (let cellule = 1; cellule < 9; cellule++) {
        console.log("cellule "+cellule)
    }
}

//Cours du 12/09/2023

let dateAjd = new Date();
//Date d'au jour d'aujourd'hui du jour présent
let prochain = new Date(2024, 6, 19);
//Date anniv prochain d'Alain térieur
let calculAge = prochain.getTime() - dateAjd.getTime()
//Faire diff entre date théorique prochain anniv et ajd
let distance = Math.floor((((calculAge/1000)/60)/60)/24)
console.log("Il reste ", distance, " jours avant l'anniversaire d'Alain")
//Transformer la diff en jour en arrondissant a l'inférieur

