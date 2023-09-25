/**/
/* Déclaration/Initialisation des variables/constantes */
/**/
const catalogue = ["Lait", "Beurre", "Confiture", "Café", "Légumes", "Viande", "Desserts", "Surgelés", "Produits d'entretien"];
let stock = ["Confiture", "Café", "Desserts", "Surgelés"];
let aAcheter = [];
let trouve = false;
const produitsDemandes = ["Café", "Viande", "Desserts"];
let colisAlimentaire = [];
/**/
/* Déclaration des fonctions */
/**/
function listeCourses (exemplaire = 1) {
    catalogue.forEach((produitCatalogue) => {
        for (const produitStock of stock) {
        if (produitStock === produitCatalogue) {
            trouve = true;
        }
    }
        if (trouve === false) {
            let count = 1;
            while (count <= exemplaire) {
                aAcheter.push(produitCatalogue);
                count++;
            }
        }
    trouve = false;
    });
}
/**/
function remplirPlacards () {
    console.log("Stock avant courses : ", stock);
    console.log("Courses faites : ", coursesFaites);
    stock = stock.concat(coursesFaites); // On met à jour le stock des courses faites
    stock = stock.sort();
    console.log("Stock après courses : ", stock)
}
/**/
function preparerColis () {
    let dejaAjoute = false
    for (const produitDemande of produitsDemandes) {
        stock.forEach(function (produitStock, index) {
            if (produitDemande === produitStock && !dejaAjoute) {
                colisAlimentaire.push(produitStock);
                stock.splice(index, 1);
                dejaAjoute = true;
            }
        });
        dejaAjoute = false;
    }
}
/**/
/**************TRAITEMENTS**************/
/**/
/**/
/* Lister les produits à acheter */
/**/
console.log("\n" + "#### ON FAIT LA LISTE DES COURSES ####");
listeCourses();
console.log("Il faut penser à acheter : " + aAcheter.join(", "));
/**/
/* Remplir les placards */
/**/
let coursesFaites = [];
console.log("\n" + "#### ON FAIT LES COURSES ####");
coursesFaites = coursesFaites.concat(aAcheter); // On achète ce qu'il y a sur la liste aAcheter
aAcheter.splice(0, aAcheter.length); // On vide la liste des produits à acheter
remplirPlacards();
coursesFaites.splice(0, coursesFaites.length); // On vide la liste des courses faites
;
/**/
/* Préparer le colis alimentaire*/
/**/
console.log("\n" + "#### ON PREPARE LE COLIS ####");
console.log("Stock avant colis : ", stock);
preparerColis();
console.log("Colis : ", colisAlimentaire);
console.log("Stock après colis : ", stock);
/**/
/* Lister les produits à acheter en … exemplaire*/
/**/
console.log("\n" + "#### ON REFAIT LA LISTE DES COURSES (PRODUITS EN … EXEMPLIARES) ####");
let exemplaireProduits = 2;
listeCourses(exemplaireProduits);
console.log(aAcheter);