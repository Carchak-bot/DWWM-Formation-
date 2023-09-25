---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 22/04/2022  

---

# **Exercices**

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

La syntaxe `title[indice]` permet de récupérer un caractère particulier. Les indices commencent à 0, et y est le cinquième caractère.
</details>  

<details>

  <summary><b>Solution</b></summary>

```js
const title = 'Harry Potter';
console.log(title[4]);
```

Les indices commencent à 0, donc l'indice de y est 4.
</details>

<mark>Question</mark>
> Afficher la longueur de `title`.  
<details>
  <summary><b>Solution</b></summary>

```js
const title = 'Harry Potter';
console.log(title.length);
```

</details>

### **Exercice chaînes-2**

Pour les questions suivantes, on utilisera les déclarations ci-dessous qui définissent deux titre de livres adaptés au cinéma :  

```js
const title1 = 'Alice au pays des merveilles';
const title2 = 'Charlie et la chocolaterie';
```

<mark>Question</mark>
> Vérifier si la chaîne `title1` contient la sous chaîne `des` à l'aide d'une fonction.  

<details>
  <summary><b>Solution</b></summary>

```js
const title1 = 'Alice au pays des merveilles';
console.log(title1.includes('des'));
```

Le programme affiche `true`.

La fonction `includes()` ne cherche pas des mots, elle cherche des groupes de lettres, qui forment un mot ou pas.
</details>

<mark>Question</mark>
> Tester si la chaîne title2 commence par la lettre charl à l'aide d'une fonction.  
<details>
  <summary><b>Solution</b></summary>

```js
const title2 = 'Charlie et la chocolaterie';
console.log(title2.startsWith('charl'));
```

Le programme affiche `false`.

La fonction `startsWith()` respecte la casse et différencie les majuscules et les minuscules.
</details>

<mark>Question</mark>
> Afficher les chaîne `title1` et `title2` de façon à ce qu'elles ne contiennent que des majuscules à l'aide d'une fonction.  
<details>
  <summary><b>Solution</b></summary>

```js
const title1 = 'Alice au pays des merveilles';
const title2 = 'Charlie et la chocolaterie';
console.log(title1.toUpperCase());
console.log(title2.toUpperCase());
```

Le programme affiche `false`.

La fonction `startsWith()` respecte la casse et différencie les majuscules et les minuscules.
</details>

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
<details>
  <summary><b>Solution</b></summary>

```js
const name = 'X-men';
const movie1 = 'Le commencement';
const completeName = name.concat(' ', movie1);
console.log(completeName);
```

On aurait aussi pu écrire :  

```js
const name = 'X-men';
const movie1 = 'Le commencement';
const completeName = name + ' ' + movie1;
console.log(completeName);
```

</details>

<mark>Question</mark>
> Concaténer les chaînes 1 et 3 en les séparant avec le symbole : en utilisant la méthode de votre choix.  
> Le programme doit afficher « `X-men:Apocalypse` ».  
<details>
  <summary><b>Solution</b></summary>

```js
const name = 'X-men';
const movie2 = 'Apocalypse';
const completeName = name.concat(':', movie2);
console.log(completeName);
```

On aurait aussi pu écrire :  

```js
const name = 'X-men';
const movie2 = 'Apocalypse';
const completeName = name + ':' + movie2;
console.log(completeName);
```

</details>

<mark>Question</mark>
> Concaténer toutes les chaînes de façon à afficher : `X-men : Le commencement, Apocalypse, Dark phoenix`.  
<details>
  <summary><em>Indice</em></summary>
Attention à la différence de séparateurs entre les différences chaînes.
</details>  

<details>
  <summary><b>Solution</b></summary>

```js
const name = 'X-men';
const movie1 = 'Le commencement';
const movie2 = 'Apocalypse';
const movie3 = 'Dark phoenix';
const list = name.concat(' : ', movie1, ', ', movie2, ', ', movie3, '.');
console.log(list);
```

On aurait aussi pu écrire :  

```js
const name = 'X-men';
const movie1 = 'Le commencement';
const movie2 = 'Apocalypse';
const movie3 = 'Dark phoenix';
const list = name + ' : ' + movie1 + ', ' + movie2 + ', ' + movie3 + '.';
console.log(list);
```

Ou aussi  

```js
const name = 'X-men';
const movie1 = 'Le commencement';
const movie2 = 'Apocalypse';
const movie3 = 'Dark phoenix';
const list = `${name} : ${movie1}, ${movie2}, ${movie3}.`;
console.log(list);
```

</details>

## **Les nombres**

### **Exercice nombres-1**

<mark>Question</mark>
> Écrire un programme qui affecte la valeur 4,1 à une variable note et affiche la variable.  
<details>
  <summary><b>Solution</b></summary>

```js
const note = 4.1;
console.log(note);
```

</details>

<mark>Question</mark>
> Afficher les types des nombres 123456, -4 et 3.14159.  
<details>
  <summary><b>Solution</b></summary>

```js
console.log(typeof(123456));
console.log(typeof(-4));
console.log(typeof(3.14159));
```

Le programme affiche 3 fois le type `number` car tous les nombres ont le même type en JavaScript.
</details>

### **Exercice nombres-2**

<mark>Question</mark>
> Écrire un programme qui calcule le nombre de repas mangés en une semaine à raison de 3 repas par jour.  
<details>
  <summary><em>Indice</em></summary>

Il est préférable d'utiliser une multiplication, en utilisant le symbole `*`.
</details>  

<details>
  <summary><b>Solution</b></summary>

```js
const nbMeals = 3;
const nbDays = 7;
console.log(nbMeals * nbDays);
```

</details>

<mark>Question</mark>
> Écrire un programme qui affiche le nombre de chocolats de Noël achetés par 3 familles avec 1, 3 et 4 enfants, à raison de 7 chocolats par enfants, en utilisant le moins d'opérateurs possibles.  
<details>
  <summary><em>Indice</em></summary>

Il pourrait être tentant de multiplier le nombre d'enfants de la première famille avec le nombre de chocolats, et de faire de même pour les autres familles.  

L'utilisation de **parenthèses** permet de **factoriser** ces opérations, en calculant d'abord le nombre total d'enfants.
</details>  

<details>
  <summary><b>Solution</b></summary>

```js
const children1 = 1;
const children2 = 3;
const children3 = 4;
console.log((children1 + children2 + children3) * 7);
```

On utilise des parenthèses pour limiter le nombre d'opérateurs et faire l'addition du nombre d'enfants en premier.
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

<details>
  <summary><b>Solution</b></summary>

```js
    const hyp = Math.sqrt(Math.pow(length1, 2) + Math.pow(length2, 2))
    console.log("Longueur de l'hypothenuse: " + hyp)
```

Le programme affiche une longueur de 5.
</details>  
Pour calculer le volume d'un cube on multiplie la longueur de son côté par elle-même pour trouver l'aire de la base du cube.  

Enfin, on multiplie cette aire par la longueur du côté pour trouver le volume du cube.  

<mark>Question</mark>
> Calculer et afficher le volume d'un cube de côté 5cm.  
<details>
  <summary><em>Indice</em></summary>
Il faut multiplier la longueur du côté trois fois par elle-même.  
Si cette opération peut être réalisée uniquement à l'aide de multiplications, il pourrait être plus pertinent de calculer directement la puissance 3 de ce nombre…
</details>  

<details>
  <summary><b>Solution</b></summary>

```js
console.log(Math.pow(5, 3));
```

</details>  

<mark>Question</mark>
> Écrire un programme qui affiche le reste de la division entière de 42 par 2.  
<details>
  <summary><em>Indice</em></summary>

L'opération permettant de calculer le reste dans une division s'appelle le `modulo`.  
</details>  

<details>
  <summary><b>Solution</b></summary>

```js
console.log(42 % 2);
```

</details>  

### **Exercice nombres-4**

<mark>Question</mark>
> Déclarer une variable `average` initialisée à 14.8 et calculer l'écart entre la moyenne et la note d'un étudiant qui a eu 9.1.  
<details>
  <summary><b>Solution</b></summary>

```js
const average = 14.8;
const note = 9.1;
console.log('Ecart: ', note - average);
```

</details>  

<mark>Question</mark>
> Écrire un programme qui affiche le résultat de la multiplication de 0.1 par 0.1.  
> Que peut-on constater ?  
<details>
  <summary><b>Solution</b></summary>

```js
console.log(0.1 * 0.1);
```

Le résultat n'est pas exact car le nombre 0.1 ne peut pas être encodé correctement. On obtient donc une approximation de cette multiplication.
</details>  

### **Exercice nombres-4**

<mark>Question</mark>
> Quel est le résultat de l'opération `ET` entre un booléen `vrai` et un booléen `faux` en JavaScript ?  

<details>
  <summary><em>Indice</em></summary>

L'opération ET s'écrit `&&` en JavaScript.  
</details>  

<details>
  <summary><b>Solution</b></summary>

```js
console.log(true && false);
```

Il est possible de créer des variables booléennes et de leur affecter la valeur `true` et la valeur `false`.
</details>

<mark>Question</mark>
> Afficher l'inverse d'un booléen `faux` en JavaScript.  
<details>
  <summary><em>Indice</em></summary>

L'opération inverse s'écrit `!` en JavaScript.

</details>  

<details>

  <summary><b>Solution</b></summary>

```js
console.log(!false);
```

Le programme affiche `true`.
</details>

<mark>Question</mark>
> Quel est le résultat d'une opération `OU` entre une chaîne de caractères vide et le nombre 0, en JavaScript ?  

<details>
  <summary><em><em>Indice</em></em></summary>

On utilise la fonction `Boolean()` pour convertir une chaîne ou un entier en booléen.  
</details>  
<details>
  <summary><em>Indice</em></summary>

L'opération OU s'écrit `||` en JavaScript.
</details>  

<details>
  <summary><b>Solution</b></summary>

```js
const str = "";
const nb = 0;
console.log(Boolean(str) || Boolean(nb));
```

Le résultat du test est **false**, car l'opération renvoie la valeur `false`.
</details>

## **Les dates**

### **Exercice Dates-1**

<mark>Question</mark>
> Déclarer une variable `today` qui récupère la date du jour et afficher son contenu.  
<details>
  <summary><b>Solution</b></summary>

```js
let today = new Date();
console.log(today);
```

</details>

<mark>Question</mark>
> Déclarer la valeur `springDay` et l'initialiser (avec des paramètres numériques) avec la date du printemps 2021, le 20 mars . Afficher sa valeur.  
<details>
  <summary><b>Solution</b></summary>

```js
let springDay = new Date(2021, 2, 20);
console.log(springDay);
```

</details>

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

<details>
  <summary><b>Solution</b></summary>

Chaque numéro de mois correspond à un nom, en faisant attention au fait que la numérotation commence à 0 en JavaScript.  

```js
const today = new Date();
const day = today.getDate();
const month = today.getMonth();
let revolutionaryMonth;
if ((day >= 22 && month == 8) || (day <= 21 && month == 9)) {
  revolutionaryMonth = 'Vendémiaire'
} else if ((day >= 22 && month == 9) || (day <= 21 && month == 10)) {
  revolutionaryMonth = 'Brumaire';
} else if ((day >= 22 && month == 10) || (day <= 21 && month == 11)) {
  revolutionaryMonth = 'Frimaire';
} else if ((day >= 22 && month == 11) || (day <= 20 && month == 0)) {
  revolutionaryMonth = 'Nivôse';
} else if ((day >= 21 && month == 0) || (day <= 19 && month == 1)) {
  revolutionaryMonth = 'Pluviôse';
} else if ((day >= 20 && month == 1) || (day <= 21 && month == 2)) {
  revolutionaryMonth = 'Ventôse';
} else if ((day >= 22 && month == 2) || (day <= 19 && month == 3)) {
  revolutionaryMonth = 'Germinal';
} else if ((day >= 20 && month == 3) || (day <= 19 && month == 4)) {
  revolutionaryMonth = 'Floréal';
} else if ((day >= 20 && month == 4) || (day <= 18 && month == 5)) {
  revolutionaryMonth = 'Plairial';
} else if ((day >= 19 && month == 5) || (day <= 18 && month == 6)) {
  revolutionaryMonth = 'Messidor';
} else if ((day >= 19 && month == 6) || (day <= 17 && month == 7)) {
  revolutionaryMonth = 'Thermidor';
} else if ((day >= 18 && month == 7) || (day <= 17 && month == 8)) {
  revolutionaryMonth = 'Fructidor';
} else {
  revolutionaryMonth = 'Jours supplémentaires';
}
console.log(revolutionaryMonth);
```

</details>

### **Exercice Dates-3**

<mark>Question</mark>
> On souhaite réaliser un mini agenda qui regroupe les événements du jour et du lendemain.  
> Pour cela, stocker la date courante dans une constante `today` pour l'afficher.  
<details>
  <summary><b>Solution</b></summary>

```js

const today = new Date();
console.log(today);
```

</details>
<mark>Question</mark>
> Ajouter au programme une nouvelle variable tomorrow et lui affecter la date courante plus 1 jour pour l'afficher.  
<details>
  <summary><em>Indice</em></summary>

On peut récupérer le jour du mois grâce à `getDate()` et le modifier grâce à `setDate()`.
</details>  

<details>
  <summary><b>Solution</b></summary>

```js
const today = new Date();
const tomorrow = new Date(today);
tomorrow.setDate(tomorrow.getDate() + 1);
console.log(today);
console.log(tomorrow);
```

On commence par copier la date actuelle dans une variable.  
On modifie la valeur de son jour en ajoutant 1 au jour récupéré.
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

<details>
  <summary><b>Solution</b></summary>

Chaque numéro de mois correspond à un nom, en faisant attention au fait que la numérotation commence à 0 en JavaScript.  

```js
const today = new Date();
const festivalDate = new Date(2030, 4, 21);
const seconds = Math.round((festivalDate.getTime() - today.getTime()) / 1000);
console.log(seconds, 'secondes avant le début du festival');
```

</details>

<mark>Question</mark>
> Le site web doit maintenant également afficher « J-X », avec `X` le nombre de jours jusqu'au festival.  
> Ajouter au programme l'affichage demandé. On utilisera la fonction `Math.floor()` pour arrondir un nombre décimal à l'entier inférieur.  
<details>
  <summary><em>Indice</em></summary>

Un jour contient 24 heures de 60 minutes de 60 secondes chacune, soit `24 * 60 * 60` secondes.  
On peut donc faire la division du nombre de secondes total par le nombre de secondes par jour pour avoir le nombre de jours.
</details>

<details>
  <summary><b>Solution</b></summary>

Chaque numéro de mois correspond à un nom, en faisant attention au fait que la numérotation commence à 0 en JavaScript.  

```js
const today = new Date();
const festivalDate = new Date(2030, 4, 21);
const oneDay = 24 * 60 * 60; // nombre de secondes par jour
const seconds = Math.round((festivalDate.getTime() - today.getTime()) / 1000);
console.log(seconds, 'secondes avant le début du festival');
console.log('J-' + Math.floor(seconds / oneDay));
```

</details>

## **Les entrées et sorties**

### **Exercice Entrées/Sorties-1**

<mark>Question</mark>
> On veut réaliser un test de culture générale auquel les joueurs répondent sur papier. La première question demande la valeur de PI.  
> Stocker la valeur « Question 1 : Quelle est la valeur de PI ? »dans une constante question1, puis l'afficher.  
<details>
  <summary><b>Solution</b></summary>

```js
const question1 = 'Question 1 : Quelle est la valeur de Pi ?';
console.log(question1);
```

</details>

<mark>Question</mark>
> Il faut ensuite donner la réponse. Afficher la bonne réponse en utilisant une constante **PI** avec un message « `Réponse à la question 1 : 3.14` ».  
<details>
  <summary><b>Solution</b></summary>

```js
const question1 = 'Question 1 : Quelle est la valeur de Pi ?';
const solution1 = 3.14;
console.log(question1);
console.log('Réponse à la question 1 :', solution1);
```

On remarquera qu'écrire '3.14' comme chaîne ou 3.14 comme nombre est possible sur la sortie standard, bien qu'ils soient de types différents.
</details>

### **Exercice Entrées/Sorties-2**

<mark>Question</mark>
> On souhaite demander le mot de passe d'un utilisateur lorsqu'il crée son compte.  
> Récupérer la réponse de l'utilisateur dans une variable password, en lui ayant demandé « Veuillez entrer votre mot de passe : ».  
> Afficher enfin « Le mot de passe "xxx" est-il correct ? »en remplaçant par le mot de passe donné.  
<details>
  <summary><b>Solution</b></summary>

```js
const password = prompt('Veuillez entrer votre mot de passe');
console.log('Le mot de passe "' + password + '" est-il correct?');
```

Le mot de passe doit bien être stocké dans une variable pour pouvoir être réutilisé.
</details>
<mark>Question</mark>
> Ajouter un test, juste après avoir récupéré le mot de passe, permettant de vérifier que le résultat entré par l'utilisateur ne soit pas vide, et n'afficher la deuxième instruction que si le test est vérifié.  
<details>
  <summary><em>Indice</em></summary>

Une chaîne vide vaut ''. Avec un `if`, on peut comparer la valeur de password avec la chaîne vide ''.
</details>

<details>
  <summary><b>Solution</b></summary>

```js
const password = prompt('Veuillez entrer votre mot de passe');
if (password !== '') {
  console.log('Le mot de passe "' + password + '" est-il correct?');
}
```

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

<details>
  <summary><b>Solution</b></summary> 

```js
let height = prompt('Combien mesurez-vous?');
if (!isNaN(height)) {
  height = Number(height);
} else {
  height = 0;
}
```

Si la réponse n'est pas un nombre valable, 0 est affecté à la variable.
</details>

<mark>Question</mark>
> À partir du code Précédent, afficher un message « C'est bon, vous pouvez passer »si la taille atteint au moins 1m52.
> Si ce n'est pas le cas, afficher « Désolé, il vous manque x cm pour pouvoir passer »en indiquant la taille manquante pour atteindre la taille requise.  
<details>
  <summary><b>Solution</b></summary>  

```js
let height = prompt('Combien mesurez-vous?');
if (!isNaN(height)) {
  height = Number(height);
} else {
  height = 0;
}
if (height >= 152) {
  console.log('C\'est bon, vous pouvez passer');
} else {
  console.log('Désolé, il vous manque ' + (152 - height) + ' cm pour pouvoir passer');
}
```

Grâce à la conversion en nombre, on peut faire une comparaison avec un autre nombre et effectuer la soustraction.
</details>

### **Exercice Entrées/Sorties-4**

<mark>Question</mark>
> On veut réaliser un quiz qui pose une question et la répète tant que la réponse n'est pas trouvée.  
>La première question est : « En quelle année fut signé le décret d'abolition de l'esclavage en France ? »  
>La bonne réponse, « 1848 », est stockée dans une constante .  
>Écrire le programme qui pose la question une fois, récupère la réponse dans une variable et la compare à la bonne réponse, puis affiche « Bonne réponse »si le joueur trouve.  
> Tant que la réponse n'est pas la bonne, afficher « Réessayez ».  
<details>
  <summary><b>Solution</b></summary>

Chaque numéro de mois correspond à un nom, en faisant attention au fait que la numérotation commence à 0 en JavaScript.  

```js
const solution = '1848';
let input = prompt('En quelle  année fut signé le décret d\'abolition de l\'esclavage en France ?');
while (input !== solution) {
  input = prompt('Réessayez');
}
console.log('Bonne réponse');
```

On peut utiliser la comparaison stricte car `solution` est une chaîne de caractères.  
Si elle avait été un nombre, le test de l'égalité n'aurait pas pu être stricte, à moins de convertir la réponse en nombre.
</details>
<mark>Question</mark>
> Ajouter une limite de 4 tentatives pour trouver la réponse. « Bonne réponse »ne doit être affiché que si le joueur a trouvé la réponse. Sinon, afficher « Dommage ».  
<details>
  <summary><em>Indice</em></summary>

On utilise un compteur incrémenté de 1 à chaque boucle. La condition du compteur inférieur à 4 doit être prise en compte dans la condition du while.
</details>

<details>
  <summary><b>Solution</b></summary>
Une condition permet de vérifier que la boucle s'est bien interrompue parce que la réponse était juste et non pas à cause du nombre de tentatives maximum atteint.

```js
const solution = '1848';
const max = 4;
let attempts = 1;
let input = prompt('En quelle  année fut signé le décret d\'abolition de l\'esclavage en France ?');
while (input !== solution && attempts < max) {
  input = prompt('Réessayez');
  attempts += 1;
}
if (input === solution) {
  console.log('Bonne réponse');
} else {
  console.log('Dommage');
}
```

</details>

## **Les enregistrements**

Pour un développeur, il peut être pratique de stocker plusieurs valeurs ayant un lien au sein d'une même variable.  
Pour réussir cela, il est nécessaire d'utiliser des enregistrements.  

Un enregistrement est un type correspondant à un agrégat de variables (appelées champs) de types déjà définis.  
Ainsi, une seule variable aura plusieurs composantes ayant chacune son propre type. On peut donc voir un enregistrement comme une collection de variables.  

Dans un programme, on peut définir le type structuré voiture qui aura les composantes suivantes : « marque », « couleur »et « année de production ».  
Les deux premiers sont des chaînes de caractères et le dernier un entier.  
Toutes les variables de type voiture dans le programme posséderont ces composantes.  
Type voiture:

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
}
carAlain.year = 2020 // On met à jour une composante
console.log(carAlain.color) // On affiche une des composantes
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

<details>
  <summary><b>Solution</b></summary>

```js
const user = {
  firstName: 'Alain',
  lastName: 'ORLUK'
};
console.log('Bonjour', user.firstName, user.lastName);
```

</details>

### **Exercice Enregistrements-2**

<mark>Question</mark>
> Compléter le code suivant pour qu'il affiche les valeurs de toutes les composantes de cet enregistrement, sauf pseudo.
> Utiliser une boucle for.  
<details>
  <summary><em>Indice</em></summary>

La syntaxe `for…in` est à privilégier, car une condition est posée sur le nom d'une composante.
</details>

<details>
  <summary><b>Solution</b></summary>

```js
const user = {
  pseudo: 'ORLUK',
  birthYear: 1971,
  birthMonth: 7,
  birthDay: 19
};
for (const composante in user) {
  if (composante !== 'pseudo') {
    console.log(user[composante]);
  }
}
```

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

<details>
  <summary><b>Solution</b></summary>
Une condition permet de vérifier que la boucle s'est bien interrompue parce que la réponse était juste et non pas à cause du nombre de tentatives maximum atteint.

```js
let counter = 0;
let sum = 0;
for (const employee of employees) {
  if (employee.job === 'formateur') {
    sum = sum + employee.age;
    counter = counter + 1;
  }
}
const average = sum / counter;
```

</details>
<mark>Question</mark>
> Quel est le résultat pour l'enregistrement donné comme exemple ?  
<details>
  <summary><b>Solution</b></summary>

54.5
</details>

### **Exercice Enregistrements-3**

<mark>Question</mark>  
> Écrire la définition de la classe `Utilisateur` afin que le code suivant soit fonctionnel :  
<details>
  <summary><em>Indice</em></summary>

L'objet jean fait référence à deux attributs : `lastName` et `firstName`.  
Ces attributs doivent être déclarés dans la classe, c'est-à-dire dans le squelette que respectent les objets `User`.
</details>

<details>
  <summary><b>Solution</b></summary>
Une condition permet de vérifier que la boucle s'est bien interrompue parce que la réponse était juste et non pas à cause du nombre de tentatives maximum atteint.

```js
class User {
  constructor () {
    this.lastName = '';
    this.fistName = '';
    this.age = 0;
  }
}
const jean = new User()
jean.lastName = 'ORLUK';
jean.firstName = 'Alain';
jean.age = 50;
console.log('Bonjour', jean.firstName, jean.lastName);
```

</details>

## **Les tests**

### **Exercice Tests-1**

```js
console.log(1 == 1.0);
```

<mark>Question</mark>
> Quel résultat produit le programme suivant ?  
<details>
  <summary><b>Solution</b></summary>

Le programme affiche `true`. Même si la représentation initiale est différente, l'entier 1 représente la même valeur que le flottant 1.0.
</details>

### **Exercice Tests-2**

<mark>Question</mark>
> On dispose d'un programme incomplet et on veut qu'il affiche le résultat de la comparaison « **âge supérieur ou égal à 18** ».  
> Compléter l'instruction `console.log` pour cela.  

```js
let age = 50;
console.log();
```

<details>
  <summary><b>Solution</b></summary>

```js
let age = 50;
console.log(age >= 18);
```

</details>

### **Exercice Tests-3**

<mark>Question</mark>
> Quel résultat produit le programme ?  

```js
console.log(50 !== '50');
```

<details>
  <summary><b>Solution</b></summary>

Le programme affiche `true` : en effet, les deux valeurs sont équivalentes, mais ne sont pas du même type.  
L'opérateur de comparaison stricte détermine donc que ces deux valeurs sont différentes.
</details>

<mark>Question</mark>
> Quelle propriété des opérandes est regardée par les opérateurs strictes au contraire des opérateurs classiques ?  
<details>
  <summary><b>Solution</b></summary>
Le type des opérandes est également comparé par les opérateurs strictes.
</details>

### **Exercice Tests-4**

<mark>Question</mark>
> Quel résultat renvoie la condition de l'instruction `if` ? Le bloc d'instruction est-il exécuté ?  

```js
if (5 + 0 === 50) {
  console.log('Je va Script');
}
```

<details>
  <summary><b>Solution</b></summary>

La condition vaut `false` et le bloc est ignoré. Une addition de deux chiffres ne permet pas de les concaténer.
</details>

<mark>Question</mark>
> Par quel(s) opérateur(s) pourrait-on remplacer « `===` » pour avoir le résultat inverse dans l'exemple Précédent, c'est à dire une comparaison vraie ?  
<details>
  <summary><b>Solution</b></summary>

`<`, `<=` ou `!=`.
</details>

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

<details>
  <summary><b>Solution</b></summary>

```js
let number = 99;
if (number < 10) {
  console.log(number, 'strictement inférieur à 10');
} else if (number < 100) {
  console.log(number, 'strictement inférieur à 100');
}
```

On utilise la structure `else if`, qui permet d'effectuer le second affichage **seulement si** la première condition est fausse **et** la deuxième condition est vraie.
</details>

<mark>Question</mark>
> Ajouter une alternative par défaut affichant simplement le numéro.  
<details>
  <summary><em>Indice</em></summary>
Cette alternative doit s'exécuter uniquement si les deux conditions Précédentes sont fausses.
</details>  

<details>
  <summary><b>Solution</b></summary>

```js
let number = 99;
if (number < 10) {
  console.log(number, 'strictement inférieur à 10');
} else if (number < 100) {
  console.log(number, 'strictement inférieur à 100');
} else {
  console.log(number);
}
```

On utilise la structure `else if`, qui permet d'effectuer le second affichage seulement si la première condition est fausse et la deuxième condition est vraie.
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

<details>
  <summary><b>Solution</b></summary>

```js
const res = (age > 18) && (age < 70);
console.log(res);
```

On utilise le « **ET** » logique pour exprimer la combinaison des deux conditions.  

Les parenthèses ne sont pas nécessaires, car les opérateurs booléens sont moins prioritaires que les opérateurs de comparaison, mais permettent d'améliorer la lisibilité.
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

<details>
  <summary><b>Solution</b></summary>

```js
const temperature = 35;
if (temperature < 0) {
  console.log(temperature, 'Gelées');
} else if (temperature >= 10 && temperature < 30) {
  console.log(temperature, 'Journée tempérée');
}
```

</details>

<mark>Question</mark>
> Ajouter l'état "Fortes chaleurs" quand la température est comprise entre 40° et 50° exclus et l'état "Inconnu" dans tous les autres cas.  
<details>
  <summary><b>Solution</b></summary>

```js
const temperature = 35;
if (temperature < 0) {
  console.log(temperature, 'Gelées');
} else if (temperature >= 10 && temperature < 30) {
  console.log(temperature, 'Journée tempérée');
} else if (temperature > 40 && temperature < 50) {
  console.log(temperature, 'Fortes chaleurs');
} else  {
  console.log(temperature, 'Inconnu');
}
```

</details>

<mark>Question</mark>
> Ajouter l'état "Température recherchée" quand la température est entre 5° et 9° inclus ou quand elle est de 21°.  
<details>
  <summary><b>Solution</b></summary>

```js
const temperature = 35;
if (temperature < 0) {
  console.log(temperature, 'Gelées');
} else if ((temperature >= 5 && temperature <= 9) || temperature === 21) {
  console.log(temperature, 'Température recherchée');
} else if (temperature >= 10 && temperature < 30) {
  console.log(temperature, 'Journée tempérée');
} else if (temperature > 40 && temperature < 50) {
  console.log(temperature, 'Fortes chaleurs');
} else  {
  console.log(temperature, 'Inconnu');
}
```

</details>

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

<details>
  <summary><b>Solution</b></summary>
Pause<br />
<br />
Pause<br />
<br />
Pause<br />
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

<details>
  <summary><b>Solution</b></summary>
Temps restant 3 secondes<br />
<br />
Temps restant 2 secondes<br />
<br />
Temps restant 1 secondes<br />
<br />
Temps restant 0 secondes  
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
<details>
  <summary><b>Solution</b></summary>
Toc Toc Toc Toc
</details>

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

<details>
  <summary><b>Solution</b></summary>

C'est une décrémentation : le compteur part de 4 et est diminué (**décrémentation**) jusqu'à atteindre 0, ce qui est ici équivalent à partir de 0 et l'augmenter (**incrémentation**) jusqu'à atteindre 4.
</details>

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
  <summary><em><em>Indice</em></em></summary>

Utiliser un compteur incrémenté à chaque tentative et ajouter une condition au `while`.  
</details>  
<details>
  <summary><em>Indice</em></summary>
L'affichage des messages se fera une fois que l'on est sorti de la boucle : soit parce que le mot de passe est bon, soit parce que le nombre d'essai maximum est dépassé.
</details>  

<details>
  <summary><b>Solution</b></summary>

```js
const secretPassword = '4842';
let answer = '';
let attempts = 0;
console.log('Mot de passe requis');
while (answer !== secretPassword && attempts < 4) {
  // Attend une réponse
  answer = prompt('**** ');
  attempts = attempts + 1;
}
if (answer === secretPassword) {
  console.log('Ouverture du coffre');
} else {
  console.log('Tentatives dépassées. Blocage de toutes les issues');
}
```

</details>

## **Les boucles imbriquées**

Un étudiant s'amuse à réaliser des programmes permettant de dessiner des formes à partir de caractères « * ». Il a mis au point un programme qui affiche un triangle.  

```js
const heigth = 15;
const width = 15;
for (let h = 0; h < heigth; h++) {
  let line = '';
  for (let w = 0; w < width - h; w++) {
    line = line + '*'; // ajoute une étoile à la ligne à afficher
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

<details>
  <summary><b>Solution</b></summary>

```js
const heigth = 15;
const width = 15;
for (let h = 0; h < heigth; h++) {
  let line = '';
  for (let w = 0; w < width; w++) {
    line = line + '*';
  }
  console.log(line);
}
```

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
<details>
  <summary><b>Solution</b></summary>

```js
const ingredients = ['1L de lait', '100g de riz blanc rond', '5 cuillères à soupe de sucre', '1 sachet de sucre vanillé', '1 zeste de citron'];
```

</details>

Pour alléger la recette, on souhaite réduire la quantité de sucre.  
<mark>Question</mark>
> Reprendre le programme Précédent et ajouter une instruction permettant de remplacer la case « 5 cuillères à soupe de sucre »par « 2,5 cuillères à soupe de sucre ».  
<details>
  <summary><b>Solution</b></summary>

```js
const ingredients = ['1L de lait', '100g de riz blanc rond', '5 cuillères à soupe de sucre', '1 sachet de sucre vanillé', '1 zeste de citron'];
ingredients[2] = '2,5 cuillères à soupe de sucre';
```

</details>

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
<details>
  <summary><b>Solution</b></summary>

```js
const subjects = ['Maths', 'Anglais', 'Sport', 'Sciences économiques'];
const schedule = ['8h30', '10h30', '14h00', '17h00'];
for (let i = 0; i < subjects.length; i++) {
  console.log(subjects[i], schedule[i]);
}
```

</details>

Une erreur s'est glissée dans l'emploi du temps et les matières sont en fait dans l'ordre inverse.  
<mark>Question</mark>
> Modifier la boucle pour afficher les matières dans l'ordre inverse.  
<details>
  <summary><em>Indice</em></summary>

On peut accéder à l'élément d'index opposé en soustrayant la valeur du compteur au dernier index du tableau, soit `tableau.length - 1 - compteur`.
</details>  
<details>
  <summary><b>Solution</b></summary>

```js
const subjects = ['Maths', 'Anglais', 'Sport', 'Sciences économiques'];
const schedule = ['8h30', '10h30', '14h00', '17h00'];
for (let i = 0; i < subjects.length; i++) {
  console.log(subjects[subjects.length - 1 - i], schedule[i]);
}
```

On aurait pu aussi partir de `i = subjects.length - 1` et décrémenter le compteur jusqu'à 0.
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

Le nombre de notes correspond au nombre d'éléments de chaque sous-tableau, accessible avec .length.
</details>  
<details>
  <summary><b>Solution</b></summary>

```js
const notes = [
  [15, 8, 11, 16], // classe 1
  [11, 10, 9, 13], // classe 2
  [12, 15, 15, 9], // classe 3
  [17, 8, 13, 16], // classe 4
  [13, 7, 15, 11]  // classe 5
];
for (let i = 0; i < notes.length; i++) {
  let sum = 0; // initialement nul
  for (let j = 0; j < notes[i].length; j++) {
    sum = sum + notes[i][j]; // ajoute chaque note de la classe n°i
  }
  console.log('Classe', i+1, ':',  sum/notes[i].length); // moyenne = somme/nombre de notes
}
```

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
<details>
  <summary><b>Solution</b></summary>

```js
const students = [];
const nbStudents = 3;
for (let i = 0; i < nbStudents; i++) {
  console.log('Élève n°' + (i + 1) + ':');
}
```

</details>

Il faut maintenant demander le nom de l'élève à chaque itération pour l'ajouter au tableau (si le nom donné n'est pas vide).  
<mark>Question</mark>
> Modifier la boucle pour cela.  
> Le programme finira par afficher le nombre total d'élèves réellement présents et le contenu du tableau d'appel par ordre alphabétique.  
<details>
  <summary><b>Solution</b></summary>

```js
let students = [];
const nbStudents = 28;
for (let i = 0; i < nbStudents; i++) {
  let name = prompt('Élève n°' + (i+1) + ':');
  if(name !== '')
    students.push(name);
}
console.log(students.length, 'élèves présents');
console.log(students.sort());
```

</details>

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
<details>
  <summary><b>Solution</b></summary>

```js
function play () {
  const choice = ['Pierre', 'Feuille', 'Ciseaux'];
  const index = Math.floor(Math.random() * choice.length);
  console.log(choice[index]);
}
console.log('Une petite partie?');
play();
console.log('Une autre?');
play();
console.log('Une dernière!');
play();
```

</details>

### **Exercice fonctions-2**

<mark>Question</mark>
> Écrire une fonction `htToTtc` qui prend en paramètre une liste de prix hors taxes et qui retourne la liste des prix TTC.  
> Il faut ajouter 20 % à un prix hors taxes pour avoir le prix TTC.  
<details>
  <summary><em>Indice</em></summary>
La syntaxe pour créer une fonction en JavaScript est la suivante :  

```js
function nomFonction(param1, param2, …) {
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
<details>
  <summary><b>Solution</b></summary>

```js
function htToTtc (htPriceList) {
  const ttcPriceList = [];
  for (let i = 0; i < htPriceList.length; i++) {
    const ttcPrice = htPriceList[i] * 1.2;
    ttcPriceList.push(ttcPrice);
  }
  return ttcPriceList;
}
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
<details>
  <summary><b>Solution</b></summary>

```js
function htToTtc (htPriceList) {
  const ttcPriceList = [];
  for (let i = 0; i < htPriceList.length; i++) {
    const ttcPrice = htPriceList[i] * 1.2;
    ttcPriceList.push(ttcPrice);
  }
  return ttcPriceList;
}
console.log(htToTtc([2, 5, 10]));
```

`[ 2.4, 6, 12 ]`
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
<details>
  <summary><b>Solution</b></summary>

`12`
</details>

<mark>Question</mark>
> Quel résultat devrait être retourné ?  
<details>
  <summary><em>Indice</em></summary>
Pour passer du prix TTC au prix HT, il faut ajouter 20 % au prix hors taxes.
</details>
<details>
  <summary><b>Solution</b></summary>

`42`
</details>  

<mark>Question</mark>
> Corriger le bug et proposer le code corrigé.  
<details>
  <summary><em>Indice</em></summary>
Il y a un problème lié à la portée d'une des variables.
</details>
<details>
  <summary><b>Solution</b></summary>

```js
function htToTtc (htPrice) {
  const priceToPay = 1.2 * htPrice;
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
> Écrire un programme qui utilise la fonction prompt() pour demander la date de naissance de l'utilisateur et afficher ensuite : « Vous êtes né.e le JJ/MM/AAAA ».  
<details>
  <summary><b>Solution</b></summary>

```js
const day = prompt('Donner votre jour de naissance');
const month = prompt('Donner votre mois de naissance');
const year = prompt('Donne votre année de naissance');
console.log('Vous êtes né·e le', day, '/', month, '/', year);
```

</details>  
<mark>Question</mark>
> Combien de fonctions pré-définies différentes sont utilisées dans ce programme ?  
<details>
  <summary><b>Solution</b></summary>

Il y en a deux : `prompt` et `console.log`.
</details>
