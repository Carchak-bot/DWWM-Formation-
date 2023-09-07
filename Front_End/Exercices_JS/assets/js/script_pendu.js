/* 
On trouve le bouton

On détecte si le bouton a été cliqué

On vérifie si la lettre est bonne

On ajoute un morceau au pendu si c'est pas bon
On affiche la lettre dans le mot secret si c'est bon
*/

console.log('script chargé');
// transforme le en Underscore
// function underscore(words) {
//     let underScore = [];
//     for (let i = 0; i < words.length; i ++) {
//         underScore[i] = "_";
//     }
//     return underScore;
// }
// Check si joueur met qu'une seule lettre
// function checkLetter (letter) {
//     while(letter.length > 1) {
//         letter = prompt("Doucement sur le clavier !" + " " + String.fromCodePoint(0x1F609) + " " + "Une seule lettre à la fois.");
//     }
//     while(letter.length === 0) {
//         letter = prompt("Veuillez entrer une lettre pour jouer.");
//     }
//     return letter;
// }

//___________________________________________________

const motTrouvable = "Ultramar";
console.log(motTrouvable);

let motTrouveLe = motTrouvable.split('');
console.log(motTrouveLe);

//Générer les boutons en js parce que gngngngn
let boutonId = 1;
let jeu = document.getElementById('jeu')

let divLettre = document.createElement('div')
divLettre.setAttribute("id", "lettre")
//console.log(divLettre)

jeu.appendChild(divLettre);
//Trouve les caractères Ascii et crée les boutons
for (let i=65; i <= 90; i++) {
    var imposteurClavier = document.createElement('button');
    let lettre = String.fromCharCode(i)
    imposteurClavier.textContent = lettre;
    imposteurClavier.setAttribute("id", boutonId);
    imposteurClavier.classList.add("bouton-lettre");

    //console.log(imposteurClavier);
    
    divLettre.appendChild(imposteurClavier);
    boutonId++;
}
console.log(imposteurClavier);
//Crontroler si y'a un clic
document.querySelectorAll(".bouton-lettre").forEach(bouton => {
    bouton.addEventListener("click", function(eventDetail) {
        console.log(eventDetail.target.innerText);
    })
});
//Recup texte bouton
//chercher correspondance dans l'array 
