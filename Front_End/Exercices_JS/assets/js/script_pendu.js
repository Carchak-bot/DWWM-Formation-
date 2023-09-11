/* 
On trouve le bouton

On détecte si le bouton a été cliqué

On vérifie si la lettre est bonne

On ajoute un morceau au pendu si c'est pas bon
On affiche la lettre dans le mot secret si c'est bon
*/

console.log('script chargé');

const motTrouvable = "ULTRAMAR";
console.log(motTrouvable);

const motTrouveLe = motTrouvable.split('');
console.log(motTrouveLe);

//Générer les boutons en js parce que gngngngn
let boutonId = 1;
let jeu = document.getElementById('jeu');

let divLettre = document.createElement('div');
divLettre.setAttribute("id", "lettre");
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

//div ou y'aura le jeu
let divPendu = document.createElement('div');
divPendu.setAttribute("id", "Pendu");


for (let index = 0; index < motTrouveLe.length; index++) {
    let spanLettre = document.createElement("span");
    spanLettre.textContent = "-";
    spanLettre.classList.add("span-lettre");
    divPendu.append(spanLettre);

}

jeu.appendChild(divPendu);


const arrayTirets = document.querySelectorAll(".span-lettre");
let compteur = 1;
//Crontroler si y'a un clic
document.querySelectorAll(".bouton-lettre").forEach(bouton => {
    bouton.addEventListener("click", function(eventDetail) {
        console.log(eventDetail.target.innerText);
        let lettreChoisie = eventDetail.target.innerText;
        eventDetail.target.disabled=true;
        console.log("Lettre choisie : ",lettreChoisie);

       let lettreTrouvee = false
       let gagne = true;
        for (let l=0; l < motTrouveLe.length; l++) {
            console.log("MotTrouveLe : ", motTrouveLe);
            if (lettreChoisie == motTrouveLe[l]) {
                arrayTirets[l].textContent = lettreChoisie;
                      //Pitié les crochets
                lettreTrouvee = true
            }
        }
        if (lettreTrouvee == false) { //Le compteur de pendaison
            compteur++;
            console.log(compteur);
        } else {
            // Vérifiez la victoire
            arrayTirets.forEach(spanLettre => {
                if (spanLettre.innerText == "-") {
                    console.log('konar')
                    gagne = false;
                }
            })
            if (gagne === true) {
                alert('Gagné conar')
            }
        }
        if (compteur == 8) { //La pendaison
            alert("T'es mort")
        }
    })
});

