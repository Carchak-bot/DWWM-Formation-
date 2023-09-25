---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 22/04/2022  

---
# **Definition et creation d’un constructeur d’objets en JavaScript**

>**Navigation**  
>
> - [Suivant](./constructeur-prototype-heritage.md#constructeur-object-prototype-et-heritage-en-javascript)
> - [Précédent](./creation-objet-litteral-et-manipulation-membres.md#creation-dun-objet-javascript-litteral-et-manipulation-de-ses-membres)  
> - [Menu principal](../menu.md#1-introduction-au-javascript)

Dans la leçon Précédente, nous avons appris à créer un objet littéral, précisé la structure d’un objet et vu comment manipuler les différents membres de nos objets.  
Notez que ce que nous avons dit dans le cas d’un objet littéral va être vrai pour n’importe quel objet en JavaScript.  

Dans cette leçon, nous allons voir d’autres méthodes de création d’objets et allons notamment apprendre à créer des objets à la chaine et de manière dynamique en utilisant une fonction constructeur personnalisée.  

## **Les usages de l’orienté objet et l’utilité d’un constructeur d’objets**

La programmation orientée objet est une façon de coder basée autour du concept d’objets.  
Un objet est un ensemble cohérent de propriétés et de méthodes.  

Les grands enjeux et avantages de la programmation orientée objet sont de nous permettre d’obtenir des scripts mieux organisés, plus clairs, plus facilement maintenables et plus performants en groupant des ensembles de données et d’opérations qui ont un rapport entre elles au sein d’objets qu’on va pouvoir manipuler plutôt que de réécrire sans cesse les mêmes opérations.  

On va généralement utiliser la programmation orientée objet dans le cadre de gros projets où on doit répéter de nombreuses fois des opérations similaires.  
Dans la majorité des cas, lorsqu’on utilise l’orienté objet, on voudra pouvoir créer de multiples objets semblables, à la chaine et de manière dynamique.  

Imaginons par exemple que l’on souhaite créer un objet à chaque fois qu’un utilisateur enregistré se connecte sur notre site.  
Chaque objet « utilisateur » va posséder des propriétés (un pseudonyme, une date d’inscription, etc.) et des méthodes similaires (possibilité de mettre à jour ses informations, etc.).  

Dans ces cas-là, plutôt que de créer les objets un à un de manière littérale, il serait pratique de créer une sorte de plan ou de schéma à partir duquel on pourrait créer des objets similaires à la chaine.  

Nous allons pouvoir faire cela en JavaScript en utilisant ce qu’on appelle un constructeur d’objets qui n’est autre qu’une fonction constructeur.  

## **La fonction construction d’objets : définition et création d’un constructeur**

Une fonction constructeur d’objets est une fonction qui va nous permettre de créer des objets semblables.  
En JavaScript, n’importe quelle fonction va pouvoir faire office de constructeur d’objets.  

Pour construire des objets à partir d’une fonction constructeur, nous allons devoir suivre deux étapes : il va déjà falloir définir notre fonction constructeur et ensuite nous allons appeler ce constructeur avec une syntaxe un peu spéciale utilisant le mot-clé `new`.  

Dans une fonction constructeur, on va pouvoir définir un ensemble de propriétés et de méthodes. Les objets créés à partir de ce constructeur vont automatiquement posséder les (« hériter des ») propriétés et des méthodes définies dans le constructeur.  

Comment une fonction peut-elle contenir des propriétés et des méthodes ? C’est très simple : les fonctions sont en fait un type particulier d’objets en JavaScript !  
Comme tout autre objet, une fonction peut donc contenir des propriétés et des méthodes.  

Pour rendre les choses immédiatement concrètes, essayons de créer un constructeur ensemble dont on expliquera ensuite le fonctionnement.  

Pour cela, on va se baser sur l’objet littéral créé dans la leçon Précédente.  
L’objectif ici va être de créer une fonction qui va nous permettre de créer des objets possédant les mêmes propriétés `nom`, `age`, `mail` et méthode `bonjour()` que notre objet littéral.  

On va donc modifier notre script comme cela :  
`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>La fonction construction d’objets : définition et création d’un constructeur</title>
        <meta charset="utf-8">
        <meta name="viewport"
        content="width=device-width, initial-scale=1, user-scalable=no">
        <script src='assets/js/main.js' async></script>
    </head>
    
    <body>
        <h1>Titre principal</h1>
        <p>Un paragraphe</p>
        <p id='p1'></p>
        <p id='p2'></p>
        <p id='p3'></p>
    </body>
</html>
```

`main.js`

```js
// Utilisateur() est une fonction constructeur
function Utilisateur(n, a, m){
    this.nom = n;
    this.age = a;
    this.mail = m;
    
    this.bonjour = function(){
        alert('Bonjour, je suis ' + this.nom[0] + ', j\'ai ' + this.age + ' ans');
    }
}
```

On définit ici une fonction `Utilisateur()` qu’on va utiliser comme constructeur d’objets. Notez que lorsqu’on définit un constructeur, on utilise par convention une majuscule au début du nom de la fonction afin de bien discerner nos constructeurs des fonctions classiques dans un script.  

Comme vous pouvez le voir, le code de notre fonction est relativement différent des autres fonctions qu’on a pu créer jusqu’ici, avec notamment l’utilisation du mot-clé `this` qui va permettre de définir et d’initialiser les propriétés ainsi que les méthodes de chaque objet créé.  

Notre constructeur possède trois paramètres qu’on a ici nommé `n`, `a` et `m` qui vont nous permettre de transmettre les valeurs liées aux différentes propriétés pour chaque objet.  

En effet, l’idée d’un constructeur en JavaScript est de définir un plan de création d’objets.  
Comme ce plan va potentiellement nous servir à créer de nombreux objets par la suite, on ne peut pas initialiser les différentes propriétés en leur donnant des valeurs effectives, puisque les valeurs de ces propriétés vont dépendre des différents objets créés.  

A chaque création d’objet, c’est-à-dire à chaque appel de notre constructeur en utilisant le mot-clé `this`, on va passer en argument les valeurs de l’objet relatives à ses propriétés `nom`, `age` et `mail`.  

Dans notre fonction, la ligne `this.nom` suffit à créer une propriété `nom` pour chaque objet créé via le constructeur. Écrire `this.nom = n` permet également d’initialiser cette propriété.  

## **Créer des objets à partir d’une fonction constructeur**

Pour créer ensuite de manière effective des objets à partir de notre constructeur, nous allons simplement appeler le constructeur en utilisant le mot-clé new. On dit également qu’on crée une nouvelle instance.  
`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Créer des objets à partir d’une fonction constructeur</title>
        <meta charset="utf-8">
        <meta name="viewport"
        content="width=device-width, initial-scale=1, user-scalable=no">
        <script src='assets/js/main.js' async></script>
    </head>
    
    <body>
        <h1>Titre principal</h1>
        <p>Un paragraphe</p>
        <p id='p1'></p>
        <p id='p2'></p>
        <p id='p3'></p>
    </body>
</html>
```

`main.js`

```js
// Utilisateur() est une fonction constructeur
function Utilisateur(n, a, m){
    this.nom = n;
    this.age = a;
    this.mail = m;
    
    this.bonjour = function(){
        alert('Bonjour, je suis ' + this.nom[0] + ', j\'ai ' + this.age + ' ans');
    }
}

let alain = new Utilisateur(['Alain', 'ORLUK'], 50, 'alain.orluk@id-formation.fr');

alain.bonjour();

/* On accède aux valeurs des propriétés de l'objet crée qu'on affiche dans
*les paragraphes de notre fichier HTML */
document.getElementById('p1').innerHTML = 'Nom complet : ' + alain['nom'];
document.getElementById('p2').innerHTML = 'Prénom : ' + alain['nom'][0];
document.getElementById('p3').innerHTML = 'Age : ' + alain['age'];
```

Lorsqu’on écrit `let alain = new Utilisateur(['Alain', 'ORLUK'], 50, 'alain.orluk@id-formation.fr')`, on crée un nouvel objet `alain` en appelant la fonction constructeur `Utilisateur()`.  

Ici, on passe le tableau `['Alain', 'ORLUK'`] en premier argument, le nombre 50 en deuxième argument et la chaine de caractères « alain.orluk@id-formation.fr » en troisième argument.  

Lors de l’exécution du constructeur, la ligne `this.nom = n` va donc être remplacée par `alain.nom = ['Alain', 'ORLUK']` ce qui crée une propriété `nom` pour notre objet `alain` avec la valeur `['Alain', 'ORLUK']` et etc.  

Une fois l’objet créé, on peut accéder à ses propriétés et à ses méthodes comme pour tout autre objet.  
Dans le code ci-dessus, on affiche les valeurs de certaines propriétés de `alain` et on exécute sa méthode `bonjour()` par exemple.  

Comme notre constructeur est une fonction, on va pouvoir l’appeler autant de fois qu’on le veut et donc créer autant d’objets que souhaité à partir de celui-ci et c’est d’ailleurs tout l’intérêt d’utiliser un constructeur.  
Chaque objet créé à partir de ce constructeur partagera les propriétés et méthodes de celui-ci.  
`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Créer des objets à partir d’une fonction constructeur</title>
        <meta charset="utf-8">
        <meta name="viewport"
        content="width=device-width, initial-scale=1, user-scalable=no">
        <script src='assets/js/main.js' async></script>
    </head>
    
    <body>
        <h1>Titre principal</h1>
        <p>Un paragraphe</p>
        <p id='p1'></p>
        <p id='p2'></p>
        <p id='p3'></p>
    </body>
</html>
```

`main.js`

```js
// Utilisateur() est une fonction constructeur
function Utilisateur(n, a, m){
    this.nom = n;
    this.age = a;
    this.mail = m;
    
    this.bonjour = function(){
        alert('Bonjour, je suis ' + this.nom[0] + ', j\'ai ' + this.age + ' ans');
    }
}

let alain = new Utilisateur(['Alain', 'ORLUK'], 50, 'alain.gorluk@id-formation.fr');
let alex = new Utilisateur(['Alex', 'TERIEUR'], 28, 'alex.terieur@gmail.com');
let jean = new Utilisateur(['Jean', 'NEYMAR'], 74, 'jean.neymar@gmail.com');

document.getElementById('p1').innerHTML = 'Prénom de Alain : ' + alain['nom'][0];
document.getElementById('p2').innerHTML = 'Age de Alex : ' + alex['age'];
document.getElementById('p3').innerHTML = 'Mail de Jean : ' + jean['mail'];
```

Ici, on crée trois objets `alain`, `alex` et `jean` en appelant trois fois notre constructeur `Utilisateur()`.  
Chacun de ces trois objets va posséder une propriété `age`, une propriété `mail`, une propriété `nom` et une méthode `bonjour()` qui vont posséder des valeurs propres à l’objet.  

Cet exemple devrait normalement également vous permettre de comprendre toute l’utilité du mot-clé `this`.  
Ce mot-clé sert à représenter l’objet couramment utilisé.  
A chaque nouvel objet crée, il va être remplacé par l’objet en question et cela va nous permettre d’initialiser différemment chaque propriété pour chaque objet.  

## **Constructeur et différenciation des objets**

On pourrait à première vue penser qu’il est contraignant d’utiliser un constructeur puisque cela nous « force » à créer des objets avec une structure identique et donc n’offre pas une grande flexibilité.  

En réalité, ce n’est pas du tout le cas en JavaScript puisqu’on va pouvoir, une fois un objet créé et à n’importe quel moment de sa vie, modifier les valeurs de ses propriétés et ses méthodes ou lui en attribuer de nouvelles.  

La fonction constructeur doit vraiment être vue en JavaScript comme un plan de base pour la création d’objets similaires et comme un moyen de gagner du temps et de la clarté dans son code.  
On ne va définir dans cette fonction que les caractéristiques communes de nos objets et on pourra ensuite rajouter à la main les propriétés particulières à un objet.  

On va ainsi par exemple tout à fait pouvoir rajouter une propriété `taille` à notre objet `alain` après sa création.  
`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Constructeur et différenciation des objets</title>
        <meta charset="utf-8">
        <meta name="viewport"
        content="width=device-width, initial-scale=1, user-scalable=no">
        <script src='assets/js/main.js' async></script>
    </head>
    
    <body>
        <h1>Titre principal</h1>
        <p>Un paragraphe</p>
        <p id='p1'></p>
        <p id='p2'></p>
        <p id='p3'></p>
    </body>
</html>
```

`main.js`

```js
// Utilisateur() est une fonction constructeur
function Utilisateur(n, a, m){
    this.nom = n;
    this.age = a;
    this.mail = m;
    
    this.bonjour = function(){
        alert('Bonjour, je suis ' + this.nom[0] + ', j\'ai ' + this.age + ' ans');
    }
}

let alain = new Utilisateur(['Alain', 'ORLUK'], 50, 'alain.gorluk@id-formation.fr');
let alex = new Utilisateur(['Alex', 'TERIEUR'], 28, 'alex.terieur@gmail.com');
let jean = new Utilisateur(['Jean', 'NEYMAR'], 74, 'jean.neymar@gmail.com');

alain.taille = 180;

document.getElementById('p1').innerHTML = 'Taille de Alain : ' + alain['taille'];
document.getElementById('p2').innerHTML = 'Taille de Alex : ' + alex['taille'];
document.getElementById('p3').innerHTML = 'Mail de Jean : ' + jean['mail'];
```

Notre objet `alain` dispose désormais d’une propriété `taille` qui lui est exclusive (les autres objets créés ne possèdent pas cette propriété).  

>**Navigation**  
>
> - [Suivant](./constructeur-prototype-heritage.md#constructeur-object-prototype-et-heritage-en-javascript)
> - [Précédent](./creation-objet-litteral-et-manipulation-membres.md#creation-dun-objet-javascript-litteral-et-manipulation-de-ses-membres)  
> - [Menu principal](../menu.md#1-introduction-au-javascript)
