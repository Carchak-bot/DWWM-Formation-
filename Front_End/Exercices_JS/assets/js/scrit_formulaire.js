console.log('script chargé')
let dateAjd = new Date();

const cible = document.querySelector('input[type="date"]').value
console.log(cible)

let prochain = new Date(cible);



let calculAge = prochain.getTime() - dateAjd.getTime()



let distance = Math.floor((((calculAge/1000)/60)/60)/24)
console.log("Il reste ", distance, " jours avant l'anniversaire pour moi")

