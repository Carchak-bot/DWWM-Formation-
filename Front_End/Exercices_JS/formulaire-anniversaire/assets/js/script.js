console.log("Script chargé !");
// Déclaration des fonctions utilisées
// Récupération du contenu du formulaire
function getValues(event) {
    event.preventDefault();
    console.log("THIS : ", this);
    controlValues(this);
}
//
// Validation des données saisies par l'utilisateur
function controlValues(formulaire) {
    let isValid = true;
    let actualYear = new Date();
    actualYear = actualYear.getFullYear();
    for (let index = 0; index < formulaire.length; index++) {
        const element = formulaire[index];
        if (element.tagName == "INPUT" && element.getAttribute("type") == "text") {
            // if (parseInt(element.value) !== NaN) { //Moins fiable selon les cas 
                // console.log("ParseInt : ", parseInt(element.value));
            if (Number(element.value) !== NaN) {
                element.style.color = "";
                switch (element.id) {
                    case "jour_naissance":
                        isValid = element.value > 0 && element.value <= 31 ? true : false;
                        break;
                    case "mois_naissance":
                        isValid = element.value > 0 &&  element.value <= 12 ? true : false;
                        break;
                    case "annee_naissance":
                        isValid = element.value < actualYear ? true : false;// La demande de l'année implique beaucoup trop de traitement de validation
                        break;
                    default:
                        break;
                }
            } else {
                isValid = false;
            }
        }
        if (!isValid) {
            element.style.color = "red";
            element.focus();
            break;
        }
    }
    if (isValid == false) {
        alert("Saisie incorrecte, recommencez !");
    } else {
        alert("Saisie correcte, merci !");
    }
}
//
let monFormulaire = document.forms["formDateNaissance"];
console.log(monFormulaire);
monFormulaire.addEventListener("submit", getValues); // Remarquez que l'on n'envoie rien et que l'on appelle la fonction sans les parenthèses
