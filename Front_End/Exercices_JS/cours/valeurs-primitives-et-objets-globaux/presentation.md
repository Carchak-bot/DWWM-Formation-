---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 22/04/2022  

---
# **Valeurs primitives et objets predefinis en JavaScript**

>**Navigation**  
>
> - [Suivant](./objet-string.md#lobjet-global-javascript-string-proprietes-et-methodes)
> - [Précédent](../programmation-orientee-objet/classes.md#les-classes-en-javascript)  
> - [Menu principal](../menu.md#1-introduction-au-javascript)

Vous devez savoir que le JavaScript dispose constructeurs d’objets prédéfinis dans son langage.  Ces constructeurs vont disposer de propriétés et de méthodes intéressantes qu’on va pouvoir immédiatement utiliser avec les objets qu’on va créer à partir de ces constructeurs.  

Dans cette nouvelle partie, nous allons voir certains de ces constructeurs (qu’on appellera désormais simplement des objets) et définirons ce que sont les valeurs primitives.  

## **Retour sur les types de valeurs**

En JavaScript, il existe 7 types de valeurs différents.  
Chaque valeur qu’on va pouvoir créer et manipuler en JavaScript va obligatoirement appartenir à l’un de ces types. Ces types sont les suivants :  

- `string` ou « chaine de caractères » en français ;
- `number` ou « nombre » en français ;
- `boolean` ou « booléen » en français ;
- `null` ou « nul / vide » en français;
- `undefined` ou « indéfini » en français ;
- `symbol` ou « symbole » en français ;
- `object` ou « objet » en français.  

Les valeurs appartenant aux 6 premiers types de valeurs sont appelées des valeurs primitives. Les valeurs appartenant au type `object` sont des objets.  

## **Définition des valeurs primitives et différence avec les objets**

Le JavaScript possède deux grandes catégories de types de données : les valeurs primitives et les objets.  

On appelle valeur primitive en JavaScript une valeur qui n’est pas un objet et qui ne peut pas être modifiée.  

En effet, une fois un nombre ou une chaine de caractères définis, on ne va plus pouvoir les modifier en JavaScript.  
Bien évidemment, si on stocke une chaine de caractères dans une variable, par exemple, on va tout à fait pouvoir écraser cette chaine pour stocker une autre valeur.  
Pour autant, la chaine de caractères stockée n’aura pas été modifiée : elle aura été écrasée et c’est bien une nouvelle valeur complètement différente qui va être stockée dans notre variable dans ce cas.  

Cela va être différent pour les objets : on va tout à fait pouvoir modifier les membres d’un objet.  

Autre différence notable entre valeurs primitives et objets : les valeurs primitives sont passées et comparées par valeur tandis que les objets sont passés et comparés par référence.  

Si deux valeurs primitives ont la même valeur, elles vont être considérées égales.  
Si deux objets définissent les mêmes propriétés et méthodes avec les mêmes valeurs, ils ne vont pas être égaux. Pour que deux objets soient égaux, il faut que les deux fassent référence aux mêmes membres.  

Regardez l’exemple suivant pour bien comprendre :  
`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Définition des valeurs primitives et différence avec les objets</title>
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
// Deux valeurs primitives
let ch1 = 'Une chaine de caractères';
let ch2 = 'Une chaine de caractères';

// true car les deux valeurs (et les types) sont égaux
document.getElementById('p1').innerHTML = 'ch1 == ch2 ? : ' + (ch1 === ch2); 

// Trois objets
let ob1 = {prenom : 'Alain'};
let obj2 = {prenom : 'Alain'};
let ob3 = objet1;

// false car les deux objets ne font pas référence aux mêmes membres
document.getElementById('p2').innerHTML = 'ob1 === ob2 ? : ' + (ob1 === ob2); 

// true car les deux objets font  référence aux mêmes membres
document.getElementById('p3').innerHTML = 'ob1 === ob3 ? : ' + (ob1 === ob3);
```

A partir d’ici, il y a une chose que vous devez bien comprendre : chaque type de valeur primitive, à l’exception de `null` et de `undefined`, possède un équivalent objet prédéfini en JavaScript.  

Ainsi, le JavaScript possède quatre objets natifs `String`, `Number`, `Boolean` et `Symbol` qui contiennent des propriétés et des méthodes.  

Regardez plutôt le code ci-dessous :  
`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Définition des valeurs primitives et différence avec les objets</title>
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
// On définit une valeur primitive
let ch1 = 'Une chaine de caractères';

// On appelle le constructeur String() pour créer un objet String
let ch2 = new String('Une chaine de caractères');

alert('Type de ch1 : ' + typeof(ch1) + '\nType de ch2 : ' + typeof(ch2));
```

Ici, notre variable `let ch1` contient une valeur primitive de type chaine de caractères (string) tandis que la variable `ch2` contient un objet `String`.  

## **Valeur primitive ou objet : que préférer ?**

Quel intérêt de pouvoir définir une chaine de caractères de deux façons et quelle syntaxe préférer ? Nous allons répondre à ces questions immédiatement.

Ici, vous devez bien comprendre que notre constructeur `String()` possède de nombreuses méthodes et propriétés dont va hériter notre objet `let ch2` et qu’on va donc pouvoir utiliser.  
`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Valeur primitive ou objet</title>
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
// On définit une valeur primitive
let ch1 = 'Une chaine de caractères';

// On appelle le constructeur String() pour créer un objet String
let ch2 = new String('Une chaine de caractères');

// La propriété length compte la longueur de la chaine
document.getElementById('p1').innerHTML = ch2.length;

// La métohde toUpperCase() renvoie la chaine en majuscules sans modifier l'objet
document.getElementById('p2').innerHTML = ch2.toUpperCase();

document.getElementById('p3').innerHTML = ch2;
```

Ici, on utilise la propriété `length` et la méthode `toUpperCase()` définies dans le constructeur `String()` sur notre objet de type string afin de connaitre la longueur de la chaine de caractères et de renvoyer cette chaine en majuscules.

A ce stade, vous devriez donc vous dire qu’il est beaucoup mieux de créer des objets que d’utiliser les valeurs primitives puisqu’on a accès de de nombreux nouveaux outils avec ceux-ci.

En fait, c’est le contraire : les valeurs primitives ont été mises en place par le JavaScript justement pour nous éviter d’avoir à créer des objets.

En effet, vous devez savoir que déclarer une valeur primitive offre de bien meilleurs résultats en termes de performances que de créer un nouvel objet et c’est la raison principale de l’existence de ces valeurs.

De plus, vous devez savoir qu’on va pouvoir utiliser les méthodes et propriétés définies dans les constructeurs relatifs avec nos valeurs primitives pour avoir en quelques sortes « le meilleur des deux mondes ».

Comment cela est-ce possible ? Pour comprendre cela, il faut savoir que lorsqu’on tente d’accéder à une propriété ou à une méthode depuis une valeur primitive, le JavaScript va convertir cette valeur en un objet relatif au type de la valeur primitive (un objet `String` pour une chaine de caractères, `Number` pour un nombre, etc.).

Ce processus est très complexe et n’a pas besoin d’être expliqué ici. Tout ce que vous devez retenir, c’est qu’on va tout à fait pouvoir utiliser les propriétés et méthodes du constructeur avec nos valeurs primitives :  

`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Valeur primitive ou objet</title>
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
// On définit une valeur primitive
let ch1 = 'Une chaine de caractères';

// On appelle le constructeur String() pour créer un objet String
let ch2 = new String('Une chaine de caractères');

// La propriété length compte la longueur de la chaine
document.getElementById('p1').innerHTML = ch1.length;

// La métohde toUpperCase() renvoie la chaine en majuscules sans modifier l'objet
document.getElementById('p2').innerHTML = ch1.toUpperCase();

document.getElementById('p3').innerHTML = ch1;
```

Dans la suite de cette partie, nous allons étudier en détail les constructeurs liés aux types de valeurs primitives et découvrir leurs propriétés et méthodes les plus utiles. Nous allons également étudier quelques objets spéciaux qui ne permettent malheureusement pas l’établissement de valeurs primitives mais qui sont incontournables comme l’objet `Math`, l’objet `Array` (tableau) ou encore l’objet `Date`.

Tous les objets que nous verrons dans cette partie sont des objets prédéfinis en JavaScript. On appelle également ces objets natifs des objets « globaux ».  

>**Navigation**  
>
> - [Suivant](./objet-string.md#lobjet-global-javascript-string-proprietes-et-methodes)
> - [Précédent](../programmation-orientee-objet/classes.md#les-classes-en-javascript)  
> - [Menu principal](../menu.md#1-introduction-au-javascript)
