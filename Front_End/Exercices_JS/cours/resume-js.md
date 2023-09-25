---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 13/05/2022  

---
# **Résumé JavaScript**

Ce fichier est destiné à être un pense-bête sous forme de rappel des grandes notions JavaScript. 

## **Les variables**

- Déclarer une variable :

    ```js
    let maVariable;
    ```

- Affecter une valeur à une variable :

    ```js
    maVariable = []; // maVariable contient un tableau vide
    ```

- Tester le contenu d'une variable :

    ```js
    let maVariable = "10";
    if (maVariable == 10) {
        console.log("La condition est vérifiée");// Condition vérifiée car la valeur des 2 éléments à comparer est identique, sans considération du type (test exprimé par l'emploi des 2 "=")
    }
    if (maVariable === 10) {
        console.log("La condition est vérifiée"); // Condition non vérifiée car la valeur des 2 éléments à comparer est identique, mais pas le type (test exprimé par l'emploi des 3 "=")
    }
    ```

- Déclarer une fonction :

    ```js
    function maFonction () {
        console.log("Bonjour !");
    }
    ```

- Déclarer une fonction qui renvoie un résultat :

    ```js
    function maFonctionAvecResultatRenvoye () {
        let maVariable1 = 10;
        let maVariable2 = 5;
        return ("L'addition du contenu des 2 variables est égal à : : " + (maVariable1 + maVariable2));
    }

- Appeler une fonction :

    ```js
    maFonction(); // La console du navigateur affiche "Bonjour !"
    ```

- Appeler une fonction et récupérer le résultat renvoyé :

    ```js
    let resultat = maFonctionAvecResultatRenvoye();
    console.log(resultat); // La console du navigateur affiche "L'addition du contenu des 2 variables est égal à : : 15"
    ```

- Boucler sur un tableau :

    ```js
    let monTableau = ["élément1", "élément2", "élément3"];
    for (let indexTableau = 0; indexTableau < monTableau.length; indexTableau++) {
        console.log(monTableau[indexTableau]);
    }
    // La console du navigateur affiche 3 lignes : 
    //"élément1"
    //"élément2"
    //"élément3"
    ```

- Afficher le contenu d'un objet :

    ```js
    let monObjet = {
        nom: "Alain",
        prenom: "ORLUK"
    }
    console.log(monObjet.nom); // La console du navigateur affiche "Alain"
    console.log(monObjet["nom"]); // La console du navigateur affiche "Alain"
    ```

- Boucler sur un tableau qui contient des objets :

    ```js
    let monTableauQuiContientDesObjets = [
  {
    nom: "Alain",
    prenom: "ORLUK"
  },
  {
    nom: "Alex",
    prenom: "TERIEUR"
  },
    ];
    monTableauQuiContientDesObjets.forEach(objet => {
        console.log(objet);
        
        console.log(objet.nom + " " + objet.prenom); 
        /* La console du navigateur affiche : 
        {
        nom: "Alain",
        prenom: "ORLUK"
        }
        "Alain ORLUK"
        {
        nom: "Alex",
        prenom: "TERIEUR"
        }
        "Alex TERIEUR" 
        */
    });
    ```

- Boucler sur un objet :

    ```js
    const formateur = {
        firstName: 'Alain', lastName: 'ORLUK', age: 50, job: 'formateur'
    }
    for (const infos in formateur) {
        console.log(formateur[infos]);
    }
    /* La console du navigateur affiche :
    {
    "Alain"
    "ORLUK"
    50
    "formateur"
    */
    ```
