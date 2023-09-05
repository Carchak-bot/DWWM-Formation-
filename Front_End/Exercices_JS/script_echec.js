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