const catalogue = {
	"Produits ménagers" : [
        "Liquide vaisselle",
        "Eponges",
        "Papier WC"
    ],
    "Produits laitiers" : [
        "Yaourts",
        "Fromage",
        "Crême fraîche"
    ],
    "Viandes" : [
        "Steak-hachés",
        "Escalope de veau",
        "Cotelettes d'Agneau"
    ],
    "Fruits et légumes" : [
        "Haricots",
        "Salade",
        "Oranges",
        "Courgettes",
        "Tomates"
    ]
};

const stock = {
	"Produits ménagers" : [
        "Liquide vaisselle",
        "Eponges",
        "Papier alu"
    ],
    "Produits laitiers" : [
        "Mozzarella",
        "Fromage",
        "Crême fraîche"
    ],
    "Viandes" : [
        "Faux-filets",
        "Escalope de veau",
        "Cotelettes d'Agneau"
    ],
    "Fruits et légumes" : [
        "Salade",
        "Tomates"
    ]
};
let aAcheter = [];
let trouve = false;
console.log(catalogue);
console.log(stock);

/* Fonction qui boucle sur chacun des produits du tableau produitsCatalogue */
function loopProduitsCatalogue (produitsCatalogue) {
    for (const produitCatalogue of produitsCatalogue) {
        for (const produitsStock in stock) {
            trouve = loopProduitsStock(produitCatalogue, stock[produitsStock]);
        }
        if (trouve === false) {
            aAcheter.push(produitCatalogue);
        }
    trouve = false;
    }
}
/* Fonction qui boucle sur chacun des produits du tableau produitsStock */
function loopProduitsStock (produitCatalogue, produitsStock) {
	for (const produitStock of produitsStock) {
        if (produitCatalogue === produitStock) {
            trouve = true;
        }
    }
    return trouve;
}
/* Fonction principale */
function listeCourses () {
	for (const produitsCatalogue in catalogue) {
        loopProduitsCatalogue(catalogue[produitsCatalogue])
	}
}
listeCourses();
console.log("Il faut penser à acheter : " + aAcheter.join(", "));