# TP Tableau

Soit un tableau `catalogue` qui contient la liste des produits d'un hypermarché :
**"Lait", "Beurre", "Confiture", "Café", "Légumes", "Viande", "Desserts", "Surgelés", "Produits d'entretien"**.  
Soit un tableau `stock` qui contient la liste des produits présents dans vos placards :
**"Confiture", "Café", "Desserts", "Surgelés"**.  
Ecrire une fonction `listeCourses` qui va remplir un tableau `aAcheter` des produits à acheter lors de la prochaine visite à l'hypermarché et ensuite afficher :  
**"Il faut penser à acheter : xxxx, xxxx, …"**.

Algorithme :  

_____Parcourir le catalogue  
__________Parcourir le stock  
______________L'élément du catalogue est-il le même que celui de mon stock?  
___________________Je l'ai trouvé !  
______________.  
__________.  
_____Si je ne l'ai pas trouvé  
_________Ajouter l'élément à mon post-it "À acheter"  
_____.  

Evolution du TP précédent avec nos tableaux `catalogue` et `stock` :  
Vous avez fait vos courses.  
Vous allez donc mettre à jour votre stock.  
Créez un tableau `coursesFaites` qui va contenir les produits issus du tableau `aAcheter`.  
Créez une fonction `remplirPlacards` qui va mettre à jour le tableau `stock` du contenu du tableau `coursesFaites`.  
L'évolution du TP des 3 tableaux est plus une invitation à vous détacher de ce sur quoi vous travaillez plutôt qu'un réel challenge "technique" (je vous expliquerez pourquoi jeudi), donc voici une évolution qui elle va nécessiter de nouveau votre réflexion :  

Votre enfant qui suit des études universitaires vous demande de l'aide.  
Il aurait besoin de :  

- Café (oui il faut lutter contre le sommeil😴 pour travailler tard et terminer la préparation des partiels😋) ;
- Viande (Les protéines c'est bien et ça change du MacDo🍔) ;
- Desserts (Faut aussi savoir se faire plaisir🥮).  

Commencez par créer 2 tableaux, `produitsDemandes` et `colisAlimentaire`.  
Ensuite, créez une fonction `preparerColis` qui extrait les produits demandés du stock (en se référant au contenu de `produitsDemandes`) pour les ajouter au tableau `colisAlimentaire`.  

Ceci fait il vous faudra réutiliser la fonction `listeCourses` pour préparer le réassort.  
Mais cette fois, par précaution, vous veillerez à doubler tout le contenu du tableau `aAcheter` dans le cas où votre enfant réitèrerait sa demande ultérieurement.  
PS : Vous ajouterez un argument à votre fonction `listeCourses` qui contiendra le nombre d'exemplaires de produits que vous souhaitez mettre dans le réassort (un chiffre qui s'appliquera à tous les produits, je suis pas sadique 😁 ).  

```js
console.log("\n" + "#### ON FAIT LES COURSES ####");
console.log("Stock avant courses : ", stock);
coursesFaites = coursesFaites.concat(aAcheter);
aAcheter.splice(0, aAcheter.length); // On vide la liste des produits à acheter
console.log("Courses faites : ", coursesFaites);
remplirPlacards();
coursesFaites.splice(0, coursesFaites.length); // On vide la liste des courses faites
console.log("Stock après courses : ", stock);
/**/
/* Préparer colis */
/**/
console.log("\n" + "#### ON PREPARE LE COLIS ####");
console.log("Stock avant colis : ", stock);
preparerColis();
console.log("Colis : ", colisAlimentaire);
console.log("Stock après colis : ", stock);
/**/
/* Produits à acheter en double exemplaire*/
/**/
console.log("\n" + "#### ON REFAIT LA LISTE DES COURSES ####");
aAcheter = listeCourses(2);
console.log("Il faut penser à acheter : " + aAcheter.join(", "));
```

## ON FAIT LA LISTE DES COURSES

"Il faut penser à acheter : Beurre, Lait, Légumes, Produits d'entretien, Viande"

## ON FAIT LES COURSES

"Stock avant courses : ", ["Confiture", "Café", "Desserts", "Surgelés"]
"Courses faites : ", ["Beurre", "Lait", "Légumes", "Produits d'entretien", "Viande"]
"Ancien stock : ", ["Confiture", "Café", "Desserts", "Surgelés"]
"Courses faites : ", ["Beurre", "Lait", "Légumes", "Produits d'entretien", "Viande"]
"Nouveau stock : ", ["Beurre", "Café", "Confiture", "Desserts", "Lait", "Légumes", "Produits d'entretien", "Surgelés", "Viande"]
"Stock après courses : ", ["Beurre", "Café", "Confiture", "Desserts", "Lait", "Légumes", "Produits d'entretien", "Surgelés", "Viande"]

## ON PREPARE LE COLIS

"Stock avant colis : ", ["Beurre", "Café", "Confiture", "Desserts", "Lait", "Légumes", "Produits d'entretien", "Surgelés", "Viande"]
"Colis : ", ["Café", "Viande", "Desserts"]
"Stock après colis : ", ["Beurre", "Confiture", "Lait", "Légumes", "Produits d'entretien", "Surgelés"]

## ON REFAIT LA LISTE DES COURSES

"Il faut penser à acheter : Beurre, Café, Café, Desserts, Desserts, Lait, Légumes, Produits d'entretien, Viande, Viande, Viande"
