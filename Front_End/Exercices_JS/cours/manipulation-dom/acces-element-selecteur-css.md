---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 01/06/2022  

---
# **Acceder aux elements dans un document avec JavaScript et modifier leur contenu**

>**Navigation**  
>
> - [Suivant](./naviguer-se-deplacer-dans-dom.md#naviguer-ou-se-deplacer-dans-le-dom-en-javascript-grace-aux-noeuds)  
> - [Précédent](./presentation.md#presentation-du-dom-html-et-de-ses-apis-accessibles-en-javascript)  
> - [Menu principal](../menu.md#1-introduction-au-javascript)

L’interface DOM va nous permettre de manipuler le contenu HTML et les styles d’un document.  
Pour manipuler du contenu HTML déjà présent sur la page, nous allons cependant avant tout devoir accéder à ce contenu.  
Nous allons voir différentes propriétés et méthodes nous permettant de faire cela dans cette leçon.  

## **Accéder à un élément à partir de son sélecteur CSS associé**

La façon la plus simple d’accéder à un élément dans un document va être de la faire en le ciblant avec le sélecteur CSS qui lui est associé.  

Deux méthodes nous permettent de faire cela : les méthodes `querySelector()` et `querySelectorAll()` qui sont des méthodes du mixin `ParentNode` et qu’on va pouvoir implémenter à partir des interfaces `Document` et `Element`.  

La méthode `querySelector()` retourne un objet `Element` représentant le premier élément dans le document correspondant au sélecteur (ou au groupe de sélecteurs) CSS passé en argument ou la valeur `null` si aucun élément correspondant n’est trouvé.  

La méthode `querySelectorAll()` renvoie un objet appartenant à l’interface `NodeList`.  
Les objets `NodeList` sont des collections (des listes) de nœuds.  

L’objet `NodeList` renvoyé est une liste statique (c’est-à-dire une liste dont le contenu ne sera pas affecté par les changements dans le DOM) des éléments du document qui correspondent au sélecteur (ou au groupe de sélecteurs) CSS spécifiés.  

Pour itérer dans cette liste d’objets `NodeList` et accéder à un élément en particulier, on va pouvoir utiliser la méthode `forEach()`.  
Cette méthode prend une fonction de rappel en argument et cette fonction de rappel peut prendre jusqu’à trois arguments optionnels qui représentent :  

- L’élément en cours de traitement dans la `NodeList` ;
- L’index de l’élément en cours de traitement dans la `NodeList` ;
- L’objet `NodeList` auquel `forEach()` est appliqué.  

Par ailleurs, notez que les deux interfaces `Document` et `Element` implémentent leurs méthodes `querySelector()` ou `querySelectorAll()` qui vont donc produire des résultats différents selon qu’on les utilise avec des objets de `Document` ou de `Element`.  

Lorsqu’on utilise `querySelector()` ou `querySelectorAll()` avec un objet `Document`, la recherche se fait dans tout le document.  
Lorsqu’on utilise l’une de ces méthodes à partir d’un objet `Element`, la recherche se fait parmi les descendants de l’élément sur lequel on appelle la méthode en question.  
`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Accéder à un élément à partir de son sélecteur CSS associé</title>
        <meta charset="utf-8">
        <meta name="viewport"
        content="width=device-width, initial-scale=1, user-scalable=no">
        <script src='assets/js/main.js' async></script>
    </head>
    
    <body>
        <h1 class='bleu'>Titre principal</h1>
        <p id='p1'>Un paragraphe</p>
        <div>
            <p>Un paragraphe dans la div</p>
            <p class='bleu'>Un autre paragraphe dans la div</p>
        </div>
        <p>Un autre paragraphe</p>
    </body>
</html>
```

`main.js`

```js
/* Sélectionne le premier paragraphe du document et change son texte avec la
propriété textContent que nous étudierons plus tard dans cette partie */
document.querySelector('p').textContent = '1er paragraphe du document';

let documentDiv = document.querySelector('div'); // 1ère div du document
// Sélectionne le premier paragraphe de la première div du document et modifie son texte
documentDiv.querySelector('p').textContent = '1er paragraphe du premier div';

/* Sélectionne le premier paragraphe du document avec un attribut class='bleu'
et change sa couleur en bleu avec la propriété style que nous étudierons
plus tard dans cette partie */
document.querySelector('p.bleu').style.color = 'blue';

// Sélectionne tous les paragraphes du document
let documentParas = document.querySelectorAll('p');

// Sélectionne tous les paragraphes de la première div
let divParas = documentDiv.querySelectorAll('p');

/* On utilise forEach() sur notre objet NodeList documentParas pour rajouter du
texte dans chaque paragraphe de notre document */
documentParas.forEach(function(nom, index){
    nom.textContent += ' (paragraphe n°:' + index + ')';
});
```

## **Accéder à un élément en fonction de la valeur de son attribut id**

La méthode `getElementById()` est un méthode du mixin `NonElementParentNode` et qu’on va implémenter à partir d’un objet `Document`.  

Cette méthode renvoie un objet `Element` qui représente l’élément dont la valeur de l’attribut `id` correspond à la valeur spécifiée en argument.  

La méthode `getElementById()` est un moyen simple d’accéder à un élément en particulier (si celui-ci possède un `id`) puisque les `id` sont uniques dans un document.  
`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Accéder à un élément en fonction de la valeur de son attribut id</title>
        <meta charset="utf-8">
        <meta name="viewport"
        content="width=device-width, initial-scale=1, user-scalable=no">
        <script src='assets/js/main.js' async></script>
    </head>
    
    <body>
       <h1 class='bleu'>Titre principal</h1>
        <p id='p1'>Un paragraphe</p>
        <div>
            <p>Un paragraphe dans la div</p>
            <p class='bleu'>Un autre paragraphe dans la div</p>
        </div>
        <p>Un autre paragraphe</p>
    </body>
</html>
```

`main.js`

```js
// Sélectionne l'élément avec un id = 'p1' et modifie la couleur du texte
document.getElementById('p1').style.color = 'blue';
```

## **Accéder à un élément en fonction de la valeur de son attribut class**

Les interfaces `Element` et `Document` vont toutes deux définir une méthode `getElementsByClassName()` qui va renvoyer une liste des éléments possédant un attribut `class` avec la valeur spécifiée en argument.  
La liste renvoyée est un objet de l’interface `HTMLCollection` qu’on va pouvoir traiter quasiment comme un tableau.  

En utilisant la méthode `getElementsByClassName()` avec un objet `Document`, la recherche des éléments se fera dans tout le document.  
En l’utilisant avec un objet Element, la recherche se fera dans l’élément en question.  
`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Accéder à un élément en fonction de la valeur de son attribut class</title>
        <meta charset="utf-8">
        <meta name="viewport"
        content="width=device-width, initial-scale=1, user-scalable=no">
        <script src='assets/js/main.js' async></script>
    </head>
    
    <body>
       <h1 class='bleu'>Titre principal</h1>
        <p id='p1'>Un paragraphe</p>
        <div>
            <p>Un paragraphe dans la div</p>
            <p class='bleu'>Un autre paragraphe dans la div</p>
        </div>
        <p>Un autre paragraphe</p>
    </body>
</html>
```

`main.js`

```js
// Sélectionne les éléments avec une class = 'bleu'
let bleu = document.getElementsByClassName('bleu');

// "bleu" est un objet de HTMLCollection qu'on va manipuler comme un tableau
for(valeur of bleu){
    valeur.style.color = 'blue';
}
```

## **Accéder à un élément en fonction de sa balise**

La méthode `getElementsByTagName()` permet de sélectionner des éléments en fonction de leur nom et renvoie un objet `HTMLCollection` qui consiste en une liste d’éléments correspondant au nom de balise passé en argument.  
A noter que cette liste est mise à jour en direct (ce qui signifie qu’elle sera modifiée dès que l’arborescence DOM le sera).  

Cette méthode est définie différemment par les interfaces `Element` et `Document` (pour être tout à fait précis, ce sont en fait deux méthodes qui portent le même nom, l’une définie dans `Document`, l’autre dans `Element`).  

Lorsqu’on utilise `getElementsByTagName()` avec un objet `Document`, la recherche se fait dans tout le document tandis que lorsqu’on utilise `getElementsByTagName()` avec un objet `Element`, la recherche se fera dans l’élément en question seulement.  
`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Accéder à un élément en fonction de sa balise</title>
        <meta charset="utf-8">
        <meta name="viewport"
        content="width=device-width, initial-scale=1, user-scalable=no">
        <script src='assets/js/main.js' async></script>
    </head>
    
    <body>
       <h1 class='bleu'>Titre principal</h1>
        <p id='p1'>Un paragraphe</p>
        <div>
            <p>Un paragraphe dans la div</p>
            <p class='bleu'>Un autre paragraphe dans la div</p>
        </div>
        <p>Un autre paragraphe</p>
    </body>
</html>
```

`main.js`

```js
// Sélectionne tous les éléments p du document
let paras = document.getElementsByTagName('p');

// "paras" est un objet de HTMLCollection qu'on va manipuler comme un tableau
for(valeur of paras){
    valeur.style.color = 'blue';
}
```

## **Accéder à un élément en fonction de son attribut name**

Finalement, l’interface `Document` met également à notre disposition la méthode `getElementsByName()` qui renvoie un objet `NodeList` contenant la liste des éléments portant un attribut `name` avec la valeur spécifiée en argument sous forme d’objet.  

On va pouvoir utiliser cette méthode pour sélectionner des éléments de formulaire par exemple.  

## **Accéder directement à des éléments particuliers avec les propriétés de Document**

Finalement, l’interface `Document` fournit également des propriétés qui vont nous permettre d’accéder directement à certains éléments ou qui vont retourner des objets contenant des listes d’éléments.

Les propriétés qui vont le plus nous intéresser ici sont les suivantes :  

- La propriété `body` qui retourne le nœud représentant l’élément `body` ;
- La propriété `head` qui retourne le nœud représentant l’élément `head` ;
- La propriété `links` qui retourne une liste de tous les éléments `a` ou `area` possédant un `href` avec une valeur ;
- La propriété `title` qui retourne le titre (le contenu de l’élément `title`) du document ou permet de le redéfinir ;
- La propriété `url` qui renvoie l’URL du document sous forme de chaine de caractères ;
- La propriété `scripts` qui retourne une liste de tous les éléments `script` du document ;
- La propriété `cookie` qui retourne la liste de tous les cookies associés au document sous forme de chaine de caractères ou qui permet de définir un nouveau cookie.  

`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Accéder directement à des éléments particuliers avec les propriétés de Document</title>
        <meta charset="utf-8">
        <meta name="viewport"
        content="width=device-width, initial-scale=1, user-scalable=no">
        <script src='assets/js/main.js' async></script>
    </head>
    
    <body>
       <h1 class='bleu'>Titre principal</h1>
        <p id='p1'>Un paragraphe</p>
        <div>
            <p>Un paragraphe dans la div</p>
            <p class='bleu'>Un autre paragraphe dans la div</p>
        </div>
        <p>Un autre paragraphe</p>
    </body>
</html>
```

`main.js`

```js
// Sélectionne l'élément body et applique une couleur bleu
document.body.style.color = 'blue';

// Modifie le texte de l'élément title
document.title= 'Le Document Object Model';
```

## **Accéder au contenu des éléments et le modifier**

Jusqu’à présent, nous avons vu différents moyens d’accéder à un élément en particulier dans un document en utilisant le DOM.  

Accéder à un nœud en particulier va nous permettre d’effectuer différentes manipulations sur celui-ci, et notamment de récupérer le contenu de cet élément ou de le modifier.  

Pour récupérer le contenu d’un élément ou le modifier, nous allons pouvoir utiliser l’une des propriétés suivantes :  

- La propriété `innerHTML` de l’interface `Element` permet de récupérer ou de redéfinir la syntaxe HTML interne à un élément ;
- La propriété `outerHTML` de l’interface `Element` permet de récupérer ou de redéfinir l’ensemble de la syntaxe HTML interne d’un élément et de l’élément en soi ;
- La propriété `textContent` de l’interface `Node` représente le contenu textuel d’un nœud et de ses descendants. On utilisera cette propriété à partir d’un objet `Element` ;
- La propriété `innerText` de l’interface `Node` représente le contenu textuel visible sur le document final d’un nœud et de ses descendants. On utilisera cette propriété à partir d’un objet `Element`.  
`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Accéder au contenu des éléments et le modifier</title>
        <meta charset="utf-8">
        <meta name="viewport"
        content="width=device-width, initial-scale=1, user-scalable=no">
        <script src='assets/js/main.js' async></script>
    </head>
    
    <body>
       <h1>Titre principal</h1>
        <p id='p1'>Un paragraphe</p>
        <div>
            <p>Un paragraphe dans le div</p>
            <p id='texte'>Un autre paragraphe dans le div</p>
        </div>
        <p id='p2'>Un autre paragraphe
            <span style='visibility: hidden'>avec du contenu caché</span>
        </p>
        <p id='p3'></p>
    </body>
</html>
```

`main.js`

```js
/Accède au contenu HTML interne du div et le modifie
document.querySelector('div').innerHTML +=
    '<ul><li>Elément n°1</li><li>Elément n°2</li></ul>';

// Accède au HTML du 1er paragraphe du document et le modifie
document.querySelector('p').outerHTML = '<h2>Je suis un titre h2</h2>';

/* Accède au contenu textuel de l'élément avec un id='texte' et le modifie.
Les balises HTML vont ici être considérées comme du texte */
document.getElementById('texte').textContent = '<span>Texte modifié</span>';

// Accède au texte visible de l'élément avec l'id = 'p2'
let texteVisible = document.getElementById('p2').innerText;
// Accède au texte (visible ou non) de l'élément avec l'id = 'p2'
let texteEntier = document.getElementById('p2').textContent;

// Affiche les résultats du dessus dans l'élément avec l'id = 'p3'
document.getElementById('p3').innerHTML =
    'Texte visible : ' + texteVisible + '<br>Texte complet : ' + texteEntier;
```

>**Navigation**  
>
> - [Suivant](./naviguer-se-deplacer-dans-dom.md#naviguer-ou-se-deplacer-dans-le-dom-en-javascript-grace-aux-noeuds)  
> - [Précédent](./presentation.md#presentation-du-dom-html-et-de-ses-apis-accessibles-en-javascript)  
> - [Menu principal](../menu.md#1-introduction-au-javascript)
