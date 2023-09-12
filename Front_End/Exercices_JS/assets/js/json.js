console.log("Script chargé !");
const allUsers = {
    "utilisateurs" : {
        "usr0001" : {
            "nom": "TERIEUR",
            "prenom": "Alain",
            "telephone": ["0699552043"],
            "adresse e-mail" : "",
        },
        "usr0002" : {
            "nom": "TERIEUR",
            "prenom": "Alex",
            "telephone": []
        },
        "usr0003" : {
            "nom": "DELOIN",
            "prenom": "Alain",
            "telephone": []
        },

    },
    "administrateurs" : {
        "adm0001" : {
            "nom": "SIGNORET",
            "prenom": "Simone",
            "telephone": ["0756231217"],
            "statut" : null
        },
        "adm0002" : {
            "nom": "MONTAND",
            "prenom": "Yves",
            "telephone": []
        },
        "adm0003" : {
            "nom": "BOURVIL",
            "prenom": "",
            "telephone": ["0678523639"]
        },

    },
}
console.log("allUsers : ", allUsers);
console.log("allUsers.administrateurs : ", allUsers.administrateurs);
console.log("allUsers.administrateurs.adm0001 : ", allUsers.administrateurs.adm0001.statut);
console.log("allUsers.utilisateurs : ", allUsers.utilisateurs);