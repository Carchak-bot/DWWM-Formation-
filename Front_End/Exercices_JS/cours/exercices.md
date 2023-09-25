---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 22/04/2022  

---

# **Exercices**

>**Navigation**  
>  
> - [Précédent](./stockage-dans-navigateur.md/api-stockage-indexedDB.md#utiliser-lapi-de-stockage-indexeddb-en-javascript)
> - [Menu principal](./menu.md#menu-general)

## **Les chaînes de caractères**

### **Exercice chaînes-1**

Pour les questions suivantes, utiliser la déclaration de variables ci-dessous comme base.

```js
const title = 'Harry Potter';
```

<mark>Question</mark>
> Afficher la lettre `y` à partir de la variable `title`.  
<details>
  <summary><em>Indice</em></summary>

La syntaxe `title[indice]` permet de récupérer un caractère particulier. Les indices commencent à `0`, et `y` est le cinquième caractère.
</details>  

<mark>Question</mark>
> Afficher la longueur de `title`.  

### **Exercice chaînes-2**

Pour les questions suivantes, on utilisera les déclarations ci-dessous qui définissent deux titre de livres adaptés au cinéma :  

```js
const title1 = 'Alice au pays des merveilles';
const title2 = 'Charlie et la chocolaterie';
```

<mark>Question</mark>
> Vérifier si la chaîne `title1` contient la sous chaîne `des` à l'aide d'une fonction.  

<mark>Question</mark>
> Tester si la chaîne title2 commence par la lettre charl à l'aide d'une fonction.  

<mark>Question</mark>
> Afficher les chaîne `title1` et `title2` de façon à ce qu'elles ne contiennent que des majuscules à l'aide d'une fonction.  

### **Exercice chaînes-3**

Pour répondre aux questions suivantes, utiliser les définitions ci dessous :  

```js
const name = 'X-men';
const movie1 = 'Le commencement';
const movie2 = 'Apocalypse';
const movie3 = 'Dark phoenix';
```

<mark>Question</mark>
> Concaténer les deux premières chaînes, en les espaçant, avec la méthode de votre choix.  
> Le programme doit afficher « `X-men Le commencement` ».  

<mark>Question</mark>
> Concaténer les chaînes 1 et 3 en les séparant avec le symbole : en utilisant la méthode de votre choix.  
> Le programme doit afficher « `X-men:Apocalypse` ».  

<mark>Question</mark>
> Concaténer toutes les chaînes de façon à afficher : `X-men : Le commencement, Apocalypse, Dark phoenix`.  
<details>
  <summary><em>Indice</em></summary>
Attention à la différence de séparateurs entre les différentes chaînes.
</details>  

## **Les nombres**

### **Exercice nombres-1**

<mark>Question</mark>
> Écrire un programme qui affecte la valeur 4,1 à une variable note et affiche la variable.  

<mark>Question</mark>
> Afficher les types des nombres 123456, -4 et 3.14159.  

### **Exercice nombres-2**

<mark>Question</mark>
> Écrire un programme qui calcule le nombre de repas mangés en une semaine à raison de 3 repas par jour.  
<details>
  <summary><em>Indice</em></summary>

Il est préférable d'utiliser une multiplication, en utilisant le symbole `*`.
</details>  

<mark>Question</mark>
> Écrire un programme qui affiche le nombre de chocolats de Noël achetés par 3 familles avec 1, 3 et 4 enfants, à raison de 7 chocolats par enfants, en utilisant le moins d'opérateurs possibles.  
<details>
  <summary><em>Indice</em></summary>

Il pourrait être tentant de multiplier le nombre d'enfants de la première famille avec le nombre de chocolats et de faire de même pour les autres familles.  

L'utilisation de **parenthèses** permet de **factoriser** ces opérations, en calculant d'abord le nombre total d'enfants.
</details>  

### **Exercice nombres-3**

Pour calculer la longueur de l’hypoténuse (c'est à dire le côté le plus long) d'un triangle rectangle, on utilise le théorème de Pythagore.  

Ce théorème dit que la longueur de l'hypoténuse correspond à la racine carrée de la somme des longueurs au carrés des deux autres côtés.  

[Théorème de Pythagore](https://fr.wikipedia.org/wiki/Th%C3%A9or%C3%A8me_de_Pythagore)  

Compléter ce programme pour qu'il calcule et affiche la longueur de l’hypoténuse d'un triangle rectangle dont les deux autres côtés font respectivement 4 et 3 cm.  

<mark>Question</mark>
> Quelle est la longueur de l'hypoténuse ?  

```js
const length1 = 3;
const length2 = 4;
```

Pour calculer le volume d'un cube on multiplie la longueur de son côté par elle-même pour trouver l'aire de la base du cube.  

Enfin, on multiplie cette aire par la longueur du côté pour trouver le volume du cube.  

<mark>Question</mark>
> Calculer et afficher le volume d'un cube de côté 5cm.  
<details>
  <summary><em>Indice</em></summary>
Il faut multiplier la longueur du côté trois fois par elle-même.  
Si cette opération peut être réalisée uniquement à l'aide de multiplications, il pourrait être plus pertinent de calculer directement la puissance 3 de ce nombre…
</details>  

<mark>Question</mark>
> Écrire un programme qui affiche le reste de la division entière de 42 par 2.  
<details>
  <summary><em>Indice</em></summary>

L'opération permettant de calculer le reste dans une division s'appelle le `modulo`.  
</details>  

### **Exercice nombres-4**

<mark>Question</mark>
> Déclarer une variable `average` initialisée à 14.8 et calculer l'écart entre la moyenne et la note d'un étudiant qui a eu 9.1.  

<mark>Question</mark>
> Écrire un programme qui affiche le résultat de la multiplication de 0.1 par 0.1.  
> Que peut-on constater ?  

### **Exercice nombres-4**

<mark>Question</mark>
> Quel est le résultat de l'opération `ET` entre un booléen `vrai` et un booléen `faux` en JavaScript ?  

<details>
  <summary><em>Indice</em></summary>

L'opération `ET` s'écrit `&&` en JavaScript.  
</details>  

<mark>Question</mark>
> Afficher l'inverse d'un booléen `faux` en JavaScript.  
<details>
  <summary><em>Indice</em></summary>

L'opération inverse s'écrit `!` en JavaScript.

</details>  

<mark>Question</mark>
> Quel est le résultat d'une opération `OU` entre une chaîne de caractères vide et le nombre 0, en JavaScript ?  

<details>
  <summary><em><em>Indice</em></em></summary>

On utilise la fonction `Boolean()` pour convertir une chaîne ou un entier en booléen.  
</details>  
<details>
  <summary><em>Indice</em></summary>

L'opération `OU` s'écrit `||` en JavaScript.
</details>  

## **Les dates**

### **Exercice Dates-1**

<mark>Question</mark>
> Déclarer une variable `today` qui récupère la date du jour et afficher son contenu.  

<mark>Question</mark>
> Déclarer la valeur `springDay` et l'initialiser (avec des paramètres numériques) avec la date du printemps 2021, le 20 mars . Afficher sa valeur.  

### **Exercice Dates-2**

Le calendrier révolutionnaire est créé pendant la Révolution française et utilisé jusqu'en 1806. Il comporte 12 mois que l'on peut à peu près convertir comme cela :  

- Vendémiaire (22 septembre ~ 21 octobre)
- Brumaire (22 octobre ~ 21 novembre)
- Frimaire (22 novembre ~ 21 décembre)
- Nivôse (22 décembre ~ 20 janvier)
- Pluviôse (21 janvier ~ 19 février)
- Ventôse (20 février ~ 21 mars)
- Germinal (22 mars ~ 19 avril)
- Floréal (20 avril ~ 19 mai)
- Prairial (20 mai ~ 18 juin)
- Messidor (19 juin ~ 18 juillet)
- Thermidor (19 juillet ~ 17 août)
- Fructidor (18 août ~ 17 septembre)  

Les jours situés entre Fructidor et Vendémiaire sont appelés les Jours supplémentaires.  
<mark>Question</mark>
> Réaliser le programme JavaScript qui permet d'afficher le mois dans le calendrier révolutionnaire correspondant à la date du jour.  
<details>
  <summary><em>Indice</em></summary>

Utiliser des structures conditionnelles `if` avec des opérateurs booléens `&&` et `||` pour définir le bon mois en fonction du jour et du mois courant.
</details>
<details>
  <summary><em>Indice</em></summary>

On peut récupérer le jour et le mois d'une date avec les méthodes `getDay()` et `getMonth()`.
</details>
<details>
  <summary><em>Indice</em></summary>

Supposons que le jour soit stocké dans la variable day et le mois dans la variable month. On pourra vérifier si cette date est comprise entre le 22 septembre et le 21 octobre avec la condition suivante :  

```js
// Septembre est représenté par 8 et non par 9
(day >= 22 && month == 8) || (day <= 21 && month == 9);
```

</details>

### **Exercice Dates-3**

<mark>Question</mark>
> On souhaite réaliser un mini agenda qui regroupe les événements du jour et du lendemain.  
> Pour cela, stocker la date courante dans une constante `today` pour l'afficher.  

<mark>Question</mark>
> Ajouter au programme une nouvelle variable tomorrow et lui affecter la date courante plus 1 jour pour l'afficher.  
<details>
  <summary><em>Indice</em></summary>

On peut récupérer le jour du mois grâce à `getDate()` et le modifier grâce à `setDate()`.
</details>  

### **Exercice Dates-3**

Les organisateurs d'un festival veulent afficher sur leur site web le décompte en secondes pour l'événement qui a lieu le 21 mai 2030.  
<mark>Question</mark>
> Créer le programme JavaScript qui calcule le nombre de secondes entre aujourd'hui et la date et l'affiche.  
> On utilisera la fonction Math.round() si besoin pour arrondir un nombre décimal.  
<details>
  <summary><em>Indice</em></summary>

On peut récupérer les deux timestamps requis avec la fonction `getTime()`. Ces `timestamps` étant de simples nombres, on peut les soustraire facilement.
</details>
<details>
  <summary><em>Indice</em></summary>
Le nombre de millisecondes est égal au nombre de secondes divisé par 1000.
</details>

<mark>Question</mark>
> Le site web doit maintenant également afficher « J-X », avec `X` le nombre de jours jusqu'au festival.  
> Ajouter au programme l'affichage demandé. On utilisera la fonction `Math.floor()` pour arrondir un nombre décimal à l'entier inférieur.  
<details>
  <summary><em>Indice</em></summary>

Un jour contient 24 heures de 60 minutes de 60 secondes chacune, soit `24 * 60 * 60` secondes.  
On peut donc faire la division du nombre de secondes total par le nombre de secondes par jour pour avoir le nombre de jours.
</details>

## **Les entrées et sorties**

### **Exercice Entrées/Sorties-1**

<mark>Question</mark>
> On veut réaliser un test de culture générale auquel les joueurs répondent sur papier. La première question demande la valeur de PI.  
> Stocker la valeur « Question 1 : Quelle est la valeur de PI ? »dans une constante question1, puis l'afficher.  

<mark>Question</mark>
> Il faut ensuite donner la réponse. Afficher la bonne réponse en utilisant une constante **PI** avec un message « `Réponse à la question 1 : 3.14` ».  

### **Exercice Entrées/Sorties-2**

<mark>Question</mark>
> On souhaite demander le mot de passe d'un utilisateur lorsqu'il crée son compte.  
> Récupérer la réponse de l'utilisateur dans une variable password, en lui ayant demandé « Veuillez entrer votre mot de passe : ».  
> Afficher enfin « Le mot de passe "xxx" est-il correct ? »en remplaçant par le mot de passe donné.  

<mark>Question</mark>
> Ajouter un test, juste après avoir récupéré le mot de passe, permettant de vérifier que le résultat entré par l'utilisateur ne soit pas vide, et n'afficher la deuxième instruction que si le test est vérifié.  
<details>
  <summary><em>Indice</em></summary>

Une chaîne vide vaut ''. Avec un `if`, on peut comparer la valeur de password avec la chaîne vide ''.
</details>

### **Exercice Entrées/Sorties-3**

<mark>Question</mark>
> On veut vérifier qu'un client a le droit d’accéder à une attraction à sensations fortes.  
> Réaliser un programme JavaScript qui demande à l'utilisateur de renseigner sa taille et la récupère dans une variable height.  
> Convertir cette taille en nombre ; si la taille est mal donnée, height sera mis à zéro.  
<details>
  <summary><em>Indice</em></summary>

Ne pas oublier de vérifier que la conversion de la taille donne bien un nombre et ne vaut pas `NaN`.
</details>

<mark>Question</mark>
> À partir du code Précédent, afficher un message « C'est bon, vous pouvez passer »si la taille atteint au moins 1m52.
> Si ce n'est pas le cas, afficher « Désolé, il vous manque x cm pour pouvoir passer »en indiquant la taille manquante pour atteindre la taille requise.  

### **Exercice Entrées/Sorties-4**

<mark>Question</mark>
> On veut réaliser un quiz qui pose une question et la répète tant que la réponse n'est pas trouvée.  
>La première question est : « En quelle année fut signé le décret d'abolition de l'esclavage en France ? »  
>La bonne réponse, « 1848 », est stockée dans une constante .  
>Écrire le programme qui pose la question une fois, récupère la réponse dans une variable et la compare à la bonne réponse, puis affiche « Bonne réponse »si le joueur trouve.  
> Tant que la réponse n'est pas la bonne, afficher « Réessayez ».  

<mark>Question</mark>
> Ajouter une limite de 4 tentatives pour trouver la réponse. « Bonne réponse »ne doit être affiché que si le joueur a trouvé la réponse. Sinon, afficher « Dommage ».  
<details>
  <summary><em>Indice</em></summary>

On utilise un compteur incrémenté de 1 à chaque boucle. La condition du compteur inférieur à 4 doit être prise en compte dans la condition du while.
</details>

## **Les enregistrements**

Pour un développeur, il peut être pratique de stocker plusieurs valeurs ayant un lien au sein d'une même variable.  
Pour réussir cela, il est nécessaire d'utiliser des enregistrements.  

Un enregistrement est un type correspondant à un agrégat de variables (appelées champs) de types déjà définis.  
Ainsi, une seule variable aura plusieurs composantes ayant chacune son propre type. On peut donc voir un enregistrement comme une collection de variables.  

Dans un programme, on peut définir le type structuré `voiture` qui aura les composantes suivantes : « `marque` », « `couleur` » et « `année de production` ».  
Les deux premiers sont des chaînes de caractères et le dernier un entier.  
Toutes les variables de type `voiture` dans le programme posséderont ces composantes.  
Type `voiture`:

- marque: chaine de caractères
- couleur: chaine de caractères
- année: entier  

Implémentation:  

```js

/* Modifie l'enregistrement de la voiture d'Alain'. */
const carAlain = { // On initialise toutes les composantes
  brand: 'Lamgorghini',
  color: 'noire',
  year: 2021
};
carAlain.year = 2020; // On met à jour une composante
console.log(carAlain.color); // On affiche une des composantes
```

### **Exercice Enregistrements-1**

<mark>Question</mark>
> Voici un extrait de code. Le compléter pour qu'il affiche « Bonjour Alain ORLUK ».  

```js
const user = {?};
console.log("Bonjour", user.firstName, user.lastName);
```

<details>
  <summary><em>Indice</em></summary>

`user` est un objet qui doit contenir deux variables : une représentant le prénom, et une autre représentant le nom.
</details>

### **Exercice Enregistrements-2**

<mark>Question</mark>
> Compléter le code suivant pour qu'il affiche les valeurs de toutes les composantes de cet enregistrement, sauf pseudo.
> Utiliser une boucle for.  
<details>
  <summary><em>Indice</em></summary>

La syntaxe `for…in` est à privilégier, car une condition est posée sur le nom d'une composante.
</details>

### **Exercice Enregistrements-3**

<mark>Question</mark>
> Ce tableau d'enregistrements décrit une liste d'employés.  
> Compléter ce code pour calculer l'âge moyen des ingénieurs.  

```js
const employees = [
  { firstName: 'Alain', lastName: 'ORLUK', age: 50, job: 'formateur' },
  { firstName: 'Alex', lastName: 'TERIEUR', age: 28, job: 'jardinier' },
  { firstName: 'Jean', lastName: 'NEYMAR', age: 74, job: 'retraité' },
  { firstName: 'Marc', lastName: 'ETSOFIE', age: 59, job: 'formateur' },
  { firstName: 'Jésus', lastName: 'CHRIST', age: 33, job: 'prophète' },
];
```

<details>
  <summary><em>Indice</em></summary>

On pourra utiliser la syntaxe `for…of` pour parcourir le tableau employees et accéder aux enregistrements individuels.
</details>

<mark>Question</mark>
> Quel est le résultat pour l'enregistrement donné comme exemple ?  

### **Exercice Enregistrements-3**

<mark>Question</mark>  
> Écrire la définition de la classe `Utilisateur` afin que le code suivant soit fonctionnel :  
<details>
  <summary><em>Indice</em></summary>

L'objet jean fait référence à deux attributs : `lastName` et `firstName`.  
Ces attributs doivent être déclarés dans la classe, c'est-à-dire dans le squelette que respectent les objets `User`.
</details>

## **Les tests**

### **Exercice Tests-1**

```js
console.log(1 == 1.0);
```

<mark>Question</mark>
> Quel résultat produit le programme suivant ?  

### **Exercice Tests-2**

<mark>Question</mark>
> On dispose d'un programme incomplet et on veut qu'il affiche le résultat de la comparaison « **âge supérieur ou égal à 18** ».  
> Compléter l'instruction `console.log` pour cela.  

```js
let age = 50;
console.log();
```

### **Exercice Tests-3**

<mark>Question</mark>
> Quel résultat produit le programme ?  

```js
console.log(50 !== '50');
```

<mark>Question</mark>
> Quelle propriété des opérandes est regardée par les opérateurs strictes au contraire des opérateurs classiques ?  

### **Exercice Tests-4**

<mark>Question</mark>
> Quel résultat renvoie la condition de l'instruction `if` ? Le bloc d'instruction est-il exécuté ?  

```js
if (5 + 0 === 50) {
  console.log('Je va Script');
}
```

<mark>Question</mark>
> Par quel(s) opérateur(s) pourrait-on remplacer « `===` » pour avoir le résultat inverse dans l'exemple Précédent, c'est à dire une comparaison vraie ?  

### **Exercice Tests-5**

<mark>Question</mark>
> Ajouter une **alternative** au programme suivant pour effectuer un affichage pour les nombres strictement inférieurs à 100 mais pas inférieurs à 10.  

```js
let number = 99;
if (number < 10) {
  console.log(number, 'strictement inférieur à 10');
}
```

<details>
  <summary><em>Indice</em></summary>

Un second `if` ne suffit pas, car un nombre tel que 9 déclencherait deux affichages.
</details>  

<mark>Question</mark>
> Ajouter une alternative par défaut affichant simplement le numéro.  
<details>
  <summary><em>Indice</em></summary>
Cette alternative doit s'exécuter uniquement si les deux conditions Précédentes sont fausses.
</details>  

## **Algèbre booléenne**

### **Exercice bool-1**

<mark>Question</mark>
> Compléter le code suivant pour afficher le résultat de la proposition logique suivante : « age est compris entre 18 et 70 ».  

```js
const age = 15;
```

<details>
  <summary><em>Indice</em></summary>

*« compris entre 18 et 70 »* peut s'interpréter comme : « plus grand que 18 **et** plus petit que 70 ».
</details>  

### **Exercice bool-2**

<mark>Question</mark>
> Remplacer les « `…` » par la condition suivante : « température comprise entre 10 inclus et 30 exclus ».  

```js
const temperature = 35;
if (temperature < 0) {
  console.log(temperature, 'Gelées');
} else if (…) {
  console.log(temperature, 'Journée tempérée');
}
```

<mark>Question</mark>
> Ajouter l'état "Fortes chaleurs" quand la température est comprise entre 40° et 50° exclus et l'état "Inconnu" dans tous les autres cas.  

<mark>Question</mark>
> Ajouter l'état "Température recherchée" quand la température est entre 5° et 9° inclus ou quand elle est de 21°.  

## **Les boucles `for`**

### **Exercice for-1**

```js
let count = 3;
for (let i = 0; i < count; i++) {
  console.log('Pause');
}
```

<mark>Question</mark>
> Qu'est-ce qui est affiché par le programme ?  
<details>
  <summary><em>Indice</em></summary>

`i` représente un compteur initialisé à 0. Il sera **augmenté** de 1 à chaque **itération**, jusqu'à ce qu'il soit égal à 3.

L'instruction entre les accolades s'exécute à chaque itération.
</details>  

### **Exercice for-2**

```js
for (let i = 3; i >= 0; i--) {
  console.log('Temps restant', i, 'secondes');
}
```

<mark>Question</mark>
> Qu'est-ce qui est affiché par le programme ?  
<details>
  <summary><em>Indice</em></summary>

`i` représente un compteur initialisé à 3. Il sera **diminué** de 1 à chaque **itération**, jusqu'à ce qu'il soit inférieur à 0.

L'instruction entre les accolades s'exécute à chaque itération.
</details>  

### **Exercice for-3**

```js
let result = '';
for (let i = 0; i < 4; i++) {

  result = result + 'Toc ';
}
console.log(result);
```

<mark>Question</mark>
> Quel est le résultat affiché ?  

### **Exercice for-4**

Ce programme affiche le même résultat.  
<mark>Question</mark>
> Quelle opération est faite sur le compteur ?  

```js
let result = '';
for (let i = 4; i > 0; i--) {
  result = result + 'Toc ';
}
console.log(result);
```

### **Les boucles `While`**

Un coffre fort ne peut être ouvert qu'avec un mot de passe composé de 4 chiffres.  
Voici son programme :

```js
const secretPassword = '4842';
let answer = '';
console.log('Mot de passe requis');
while (answer !== secretPassword) {
  // Attend une réponse
  answer = prompt('**** ');
}
console.log('Ouverture du coffre');
```

Ce coffre n'est pas très sécurisé.  
<mark>Question</mark>
> Modifier son programme pour qu'un nombre de mauvaises réponses maximum soit autorisé : au bout de 4 tentatives qui échouent, le coffre affiche *Tentatives dépassées. Blocage de toutes les issues*.  
<details>
  <summary><em>Indice</em></summary>

Utiliser un compteur incrémenté à chaque tentative et ajouter une condition au `while`.  
</details>  
<details>
  <summary><em>Indice</em></summary>
L'affichage des messages se fera une fois que l'on est sorti de la boucle : soit parce que le mot de passe est bon, soit parce que le nombre d'essai maximum est dépassé.
</details>  

## **Les boucles imbriquées**

Un étudiant s'amuse à réaliser des programmes permettant de dessiner des formes à partir de caractères « `*` ». Il a mis au point un programme qui affiche un triangle.  

```js
const heigth = 15;
const width = 15;
for (let h = 0; h < heigth; h++) {
  let line = '';
  for (let w = 0; w < width - h; w++) {
    line = line + '*'; // Ajoute une étoile à la ligne à afficher
  }
  console.log(line)
}
```

Il vous demande de modifier son programme de manière à affiche un rectangle 15x15.  

<mark>Question</mark>
> Donner le code modifié.  
<details>
  <summary><em>Indice</em></summary>
Modifier la boucle imbriquée pour que la largeur dessinée soit égale à la longueur.
</details>  

## **Les tableaux**

### **Exercice tableaux-1**

On veut réaliser un riz au lait. On dispose pour cela de la liste des ingrédients :  

- 1L de lait,
- 100g de riz blanc rond,
- 5 cuillères à soupe de sucre,
- 1 sachet de sucre vanillé,
- 1 zeste de citron.  

<mark>Question</mark>
> Réaliser un programme JavaScript qui déclare un tableau et stocke les éléments dedans.  

Pour alléger la recette, on souhaite réduire la quantité de sucre.  
<mark>Question</mark>
> Reprendre le programme Précédent et ajouter une instruction permettant de remplacer la case « 5 cuillères à soupe de sucre »par « 2,5 cuillères à soupe de sucre ».  

### **Exercice tableaux-2**

Un emploi du temps vous est transmis sous la forme de deux listes :  

- Une première liste contient les matières,
- Une seconde contient les horaires de chaque matière.

Chaque matière de la première liste va de pair avec l'horaire de la seconde liste qui se trouve au même index : la première matière correspond au premier horaire, la seconde matière au deuxième horaire, etc.  

```js
const subjects = ['Maths', 'Anglais', 'Sport', 'Sciences économiques'];
const schedule = ['8h30', '10h30', '14h00', '17h00'];
```

<mark>Question</mark>
> Compléter le programme pour afficher une à une les matières associées à leur horaire.  
<details>
  <summary><em>Indice</em></summary>

Un seul index est nécessaire pour accéder à l'élément de `subjects` et de `schedule`.
</details>  

Une erreur s'est glissée dans l'emploi du temps et les matières sont en fait dans l'ordre inverse.  
<mark>Question</mark>
> Modifier la boucle pour afficher les matières dans l'ordre inverse.  
<details>
  <summary><em>Indice</em></summary>

On peut accéder à l'élément d'index opposé en soustrayant la valeur du compteur au dernier index du tableau, soit `tableau.length - 1 - compteur`.
</details>  

### **Exercice tableaux-3**

Une enseignante conserve la liste des notes obtenues par chacune de ses classes dans un tableau.  
Elle veut calculer la moyenne des notes pour chaque classe et l'afficher.  

```js
[
  [15, 8, 11, 16], // classe 1
  [11, 10, 9, 13], // classe 2
  [12, 15, 15, 9], // classe 3
  [17, 8, 13, 16], // classe 4
  [13, 7, 15, 11]  // classe 5
]
```

<mark>Question</mark>
> Réaliser le programme JavaScript qui parcours le tableau pour calculer la moyenne de chaque classe.  
> Afficher cette moyenne à côté du numéro de la classe et son numéro.  
<details>
  <summary><em>Indice</em></summary>
La moyenne se calcule en faisant la somme des notes de toute une classe divisée par le nombre de notes.

Le nombre de notes correspond au nombre d'éléments de chaque sous-tableau, accessible avec `.length`.
</details>  

### **Exercice tableaux-4**

On souhaite informatiser l'appel des élèves dans une classe.  
Pour cela, on a besoin de récupérer les noms des élèves dans un tableaux pour les envoyer à l'application.  

<mark>Question</mark>
> Réaliser un programme JavaScript qui déclare un tableau students.  
>Il doit ensuite réaliser autant d'itérations qu'il y a d'élèves et afficher « Élève n°x : »  à chaque itération, avec le bon numéro.  
> On connaît le nombre d'élèves au total : 3.  
<details>
  <summary><em>Indice</em></summary>

Pour l'instant, comme les élèves ne sont pas connus, on n'accède pas aux éléments du tableau `students`, qui reste vide.
</details>  

Il faut maintenant demander le nom de l'élève à chaque itération pour l'ajouter au tableau (si le nom donné n'est pas vide).  
<mark>Question</mark>
> Modifier la boucle pour cela.  
> Le programme finira par afficher le nombre total d'élèves réellement présents et le contenu du tableau d'appel par ordre alphabétique.  

## **Les fonctions**

### **Exercice fonctions-1**

Voici un code avec des recopies inutiles.  

<mark>Question</mark>
> Définir une fonction et donner la version factorisée de ce programme.  

```js
let choice = ['Pierre', 'Feuille', 'Ciseaux'];
console.log('Une petite partie?');
let index = Math.floor(Math.random() * choice.length);
console.log(choice[index]);
console.log('Une autre?');
index = Math.floor(Math.random() * choice.length);
console.log(choice[index]);
console.log('Une dernière!');
index = Math.floor(Math.random() * choice.length);
console.log(choice[index]);

```

<details>
  <summary><em>Indice</em></summary>

L'ensemble du code **dupliqué** doit être factorisé à l'intérieur d'une unique fonction.
</details>  

### **Exercice fonctions-2**

<mark>Question</mark>
> Écrire une fonction `htToTtc` qui prend en paramètre une liste de prix hors taxes et qui retourne la liste des prix TTC.  
> Il faut ajouter 20 % à un prix hors taxes pour avoir le prix TTC.  
<details>
  <summary><em>Indice</em></summary>
La syntaxe pour créer une fonction en JavaScript est la suivante :  

```js
function nomFonction (param1, param2, …) {
  // Instructions de la fonction
}
```

</details>
<details>
  <summary><em>Indice</em></summary>

```js
function htToTtc (htPriceList) {
  const ttcPriceList = [];
  for (let i = 0; i < htPriceList.length; i++) {
    …
  }
}
```

</details>
<details>
  <summary><em>Indice</em></summary>

Calcul du prix TTC pour une valeur : `ttcPrice = htPrice * 1.2`
</details>
<details>
  <summary><em>Indice</em></summary>

```js
function htToTtc (htPriceList) {
  const ttcPriceList = [];
  for (let i = 0; i < htPriceList.length; i++) {
    const ttcPrice = htPriceList[i] * 1.2;
    ttcPriceList.push(ttcPrice);
  }
  …
}
```

</details>
<details>
  <summary><em>Indice</em></summary>
L'instruction pour retourner une valeur depuis une fonction est la suivante :  

```js
return nomVariable;
```

</details>
<mark>Question</mark>
> Que retourne la fonction lorsqu'on envoie `[2, 5, 10]` comme paramètre ?
<details>
  <summary><em>Indice</em></summary>

```js
function htToTtc (htPriceList) {
  …
}
console.log(…);
```

</details>
<details>
  <summary><em>Indice</em></summary>

```js
function htToTtc (htPriceList) {
  …
}
console.log(htToTtc(…));
```

</details>

### **Exercice fonctions-3**

Voici un code qui ne retourne pas le résultat prévu :  

```js
function htToTtc (htPrice) {
  priceToPay = 1.2 * htPrice;
  return priceToPay;
}
const prices = [10, 20, 5];
let priceToPay = 0;
for (let i = 0; i < prices.length; i++) {
  const currentPrice = htToTtc(prices[i]);
  priceToPay = priceToPay + currentPrice;
}
console.log('Vous devez payer ', priceToPay);
```

<mark>Question</mark>
> Exécuter le code et donner le résultat affiché.  

<mark>Question</mark>
> Quel résultat devrait être retourné ?  
<details>
  <summary><em>Indice</em></summary>
Pour passer du prix TTC au prix HT, il faut ajouter 20 % au prix hors taxes.
</details>

<mark>Question</mark>
> Corriger le bug et proposer le code corrigé.  
<details>
  <summary><em>Indice</em></summary>
Il y a un problème lié à la portée d'une des variables.
</details>

### **Exercice fonctions-4**

La fonction JS pré-définie `prompt()` affiche la chaîne de caractères fournie en paramètre et retourne ce que l'utilisateur entre dans la console.  
Lien vers la documentation :  
[Documentation fonction `Prompt()`](https://developer.mozilla.org/fr/docs/Web/API/Window/prompt)  

```js
const name = prompt("Entrer votre nom");
// Affiche le message et la variable nom prendra pour valeur ce que l'utilisateur a entré
```

<mark>Question</mark>
> Écrire un programme qui utilise la fonction `prompt()` pour demander la date de naissance de l'utilisateur et afficher ensuite : « Vous êtes né.e le JJ/MM/AAAA ».  

<mark>Question</mark>
> Combien de fonctions pré-définies différentes sont utilisées dans ce programme ?

Fin des exercices.  

>**Navigation**  
>  
> - [Précédent](./stockage-dans-navigateur.md/api-stockage-indexedDB.md#utiliser-lapi-de-stockage-indexeddb-en-javascript)
> - [Menu principal](./menu.md#menu-general)
