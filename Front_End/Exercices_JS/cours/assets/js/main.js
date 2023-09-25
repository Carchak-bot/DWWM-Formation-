let monTableau = ["pommes", "poires", "raisins", "courgettes", "abricots", "bananes", "carottes"];
let trouve = false;
let argVersionFor = "abricots";
let argVersionForEach = "pommes";
let argVersionForOf = "tomates";

/* Version for */
for (let i=0; i<= monTableau.length; i++) {
    parcourirTableau(monTableau[i], argVersionFor);
}
if (trouve === true) {
    console.log("J'ai trouvé des " + argVersionFor);
} else {
    console.log("Je n'ai pas trouvé de " + argVersionFor);
}
trouve = false;
/* Version for…of */
for (const element of monTableau) {
    parcourirTableau(element, argVersionForOf)
}
if (trouve === true) {
    console.log("J'ai trouvé des " + argVersionForOf);
} else {
    console.log("Je n'ai pas trouvé de " + argVersionForOf);
}
/* Version forEach */
trouve = false;
monTableau.forEach(function (e) {
	parcourirTableau(e, argVersionForEach)
});
if (trouve === true) {
    console.log("J'ai trouvé des " + argVersionForEach);
} else {
    console.log("Je n'ai pas trouvé de " + argVersionForEach);
}

function parcourirTableau (item, arg) {
	if (item === arg) {
    trouve = true;
    }
}