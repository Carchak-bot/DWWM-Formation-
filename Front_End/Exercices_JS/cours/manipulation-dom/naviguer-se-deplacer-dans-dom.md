---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 22/04/2022  

---
# **Naviguer ou se deplacer dans le DOM en JavaScript grace aux noeuds**

>**Navigation**  
>
> - [Suivant](./ajouter-modifier-supprimer-elements.md#ajouter-modifier-ou-supprimer-des-elements-du-dom-avec-javascript)  
> - [Précédent](./acces-element-selecteur-css.md#acceder-aux-elements-dans-un-document-avec-javascript-et-modifier-leur-contenu)  
> - [Menu principal](../menu.md#1-introduction-au-javascript)

Dans la leçon Précédente, nous avons vu comment accéder directement à des éléments et comment accéder à leur contenu ou le modifier.  
Dans ce nombreux cas, cependant, nous n’allons pas pouvoir accéder directement à un élément car nous ne disposerons pas de moyen de le cibler.  
Dans cette situation, il va être nécessaire de savoir comment naviguer dans le DOM, c’est-à-dire comment se déplacer de nœud en nœud pour atteindre celui qui nous intéresse.  
Cela va être l’objet de cette leçon.  

## **Accéder au parent ou à la liste des enfants d’un nœud**

La propriété `parentNode` de l’interface `Node` renvoie le parent du nœud spécifié dans l’arborescence du DOM ou `null` si le nœud ne possède pas de parent.  

La propriété `childNodes` de cette même interface renvoie une liste des nœuds enfants de l’élément donné.  

A noter que la propriété `childNodes` renvoie tous les nœuds enfants et cela quels que soient leurs types : nœuds élément, nœuds texte, nœuds commentaire, etc.  

Si on ne souhaite récupérer que les nœuds enfants éléments, alors on utilisera plutôt la propriété `children` du mixin `ParentNode` (qui est implémenté par `Document` et par `Element`).  

Notez également que le parent d’un élément n’est pas forcément un nœud `Element` mais peut également être un nœud `Document`. La propriété `parentNode` renverra le parent d’un nœud quel que soit son type.  

Pour n’accéder au parent que dans le cas où celui-ci est un nœud `Element`, on utilisera plutôt la propriété `parentElement` de `Node` qui ne renvoie le parent d’un nœud que s’il s’agit d’un nœud `Element` ou `null` sinon.  
`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Accéder au parent ou à la liste des enfants d’un nœud</title>
        <meta charset="utf-8">
        <meta name="viewport"
        content="width=device-width, initial-scale=1, user-scalable=no">
        <script src='assets/js/main.js' async></script>
    </head>
    
    <body>
        <h1>Titre principal</h1>
        <p id='p1'>Un paragraphe <span>avec un span</span></p>
        <div>
            <p id='p2'>Un paragraphe dans la div</p>
            <p>Un autre paragraphe dans la div</p>
        </div>
        <p>Un autre paragraphe</p>
    </body>
</html>
```

`main.js`

```js
let p1 = document.getElementById('p1');
let p2 = document.getElementById('p2');

p2.parentNode.style.backgroundColor = 'RGBa(240,160,000,0.5)'; // Orange

// On accède à tous les noeuds enfants de p1. childNodes renvoie une NodeList
let enfantsP1 = p1.childNodes;

/* On peut ensuite utiliser une boucle forEach() pour tous les manipuler ou
un indice comme pour les tableaux pour manipuler un noeud enfant en
particulier (le premier enfant a l'indice 0, le deuxième l'indice 1, etc.) */
enfantsP1[1].style.fontWeight = 'bold';

/* On accède aux noeuds enfants éléments seulement de p1.
children renvoie une HTMLCollection */
let enfantsEltP1 = p1.children;

// On peut ensuite accèder aux différents enfants comme on le ferait avec un tableau
enfantsEltP1[0].style.textDecoration = 'underline';
```

## **Accéder à un nœud enfant en particulier à partir d’un nœud parent**

La propriété `firstChild` de l’interface `Node` renvoie le premier nœud enfant direct d’un certain nœud ou `null` s’il n’en a pas.  

La propriété `lastChild`, au contraire, renvoie le dernier nœud enfant direct d’un certain nœud ou `null` s’il n’en a pas.  

Notez que ces deux propriétés vont renvoyer les premiers et derniers nœuds enfants quels que soient leurs types (nœuds élément, nœuds texte ou nœuds commentaire).  

Pour renvoyer le premier et le dernier nœud enfant de type élément seulement d’un certain nœud, on utilisera plutôt les propriétés `firstElementChild` et `lastElementChild` du mixin `ParentNode`.  
`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Accéder à un nœud enfant en particulier à partir d’un nœud parent</title>
        <meta charset="utf-8">
        <meta name="viewport"
        content="width=device-width, initial-scale=1, user-scalable=no">
        <script src='assets/js/main.js' async></script>
    </head>
    
    <body>
        <h1>Titre principal</h1>
        <p id='p1'>Un paragraphe <span>avec un span</span></p>
        <div>
            <p id='p2'>Un paragraphe dans la div</p>
            <p>Un autre paragraphe dans la div</p>
        </div>
        <p>Un autre paragraphe</p>
    </body>
</html>
```

`main.js`

```js
// On accède au premier noeud enfant de body
let bodyFirstChild = document.body.firstChild;

// On accède au dernier noeud enfant de body
let bodyLastChild = document.body.lastChild;

// On accède au premier noeud enfant élément de body
let bodyFirstElementChild = document.body.firstElementChild;

// On accède au dernier noeud enfant élémentde body
let bodyLastElementChild = document.body.lastElementChild;

alert(
    'Premier noeud enfant de body : ' + bodyFirstChild +
    '\nPremier noeud enfant élément de body : ' + bodyFirstElementChild +
    '\nDernier noeud enfant de body : ' + bodyLastChild +
    '\nDernier noeud enfant élément de body : ' + bodyLastElementChild
);
```

## **Accéder au nœud Précédent ou suivant un nœud dans l’architecture DOM**

La propriété `previousSibling` de l’interface `Node` renvoie le nœud Précédent un certain nœud dans l’arborescence du DOM (en ne tenant compte que des nœuds de même niveau) ou `null` si le nœud en question est le premier.  

La propriété `nextSibling`, au contraire, renvoie elle le nœud suivant un certain nœud dans l’arborescence du DOM (en ne tenant compte que des nœuds de même niveau) ou `null` si le nœud en question est le dernier.  

Ces deux propriétés vont renvoyer le nœud Précédent ou suivant un certain nœud, et cela quel que soit le type du nœud Précédent ou suivant.  

Si on souhaite accéder spécifiquement au nœud élément Précédent ou suivant un certain nœud, on utilisera plutôt les propriétés `previousElementSibling` et `nextElementSibling` du mixin `NonDocumentTypeChildNode` (mixin implémenté par `Element`).  
`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Accéder au nœud Précédent ou suivant un nœud dans l’architecture DOM</title>
        <meta charset="utf-8">
        <meta name="viewport"
        content="width=device-width, initial-scale=1, user-scalable=no">
        <script src='assets/js/main.js' async></script>
    </head>
    
    <body>
        <h1>Titre principal</h1>
        <p id='p1'>Un paragraphe <span>avec un span</span></p>
        <div>
            <p id='p2'>Un paragraphe dans la div</p>
            <p>Un autre paragraphe dans la div</p>
        </div>
        <p>Un autre paragraphe</p>
    </body>
</html>
```

`main.js`

```js
let p1 = document.getElementById('p1');

let p1PreviousSibling = p1.previousSibling;
let p1NextSibling = p1.nextSibling;
let p1PreviousElementSibling = p1.previousElementSibling;
let p1NextElementSibling = p1.nextElementSibling;

p1PreviousElementSibling.style.color = 'blue';
p1NextElementSibling.style.backgroundColor = 'RGBa(240,160,40,0.5)'; // Orange
```

## **Obtenir le nom d’un nœud, son type ou son contenu**

Les propriétés de `Node` renvoient toujours des objets, ce qui signifie qu’on va pouvoir directement utiliser d’autres propriétés sur ces objets.  

Lorsqu’on accède à un certain nœud, on voudra généralement obtenir le nom de de nœud, savoir ce qu’il contient et connaitre son type.  
Nous allons pour cela pouvoir utiliser les propriétés suivantes de l’interface `Node` :  

- La propriété `nodeName` qui retourne une chaine de caractères contenant le nom du nœud (nom de la balise dans le cas d’un nœud de type `Element` ou `#text` dans le cas d’un nœud de type `Text`) ;
- La propriété `nodeValue` qui renvoie ou permet de définir la valeur du nœud. On pourra notamment utiliser cette propriété sur des nœuds `#text` pour obtenir le texte qu’ils contiennent ;
- La propriété `nodeType` renvoie un entier qui représente le type du nœud (tel que vu dans la première leçon de cette partie).  

`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Obtenir le nom d’un nœud, son type ou son contenu</title>
        <meta charset="utf-8">
        <meta name="viewport"
        content="width=device-width, initial-scale=1, user-scalable=no">
        <script src='assets/js/main.js' async></script>
    </head>
    
    <body>
        <h1>Titre principal</h1>
        <p id='p1'>Un paragraphe <span>avec un span</span></p>
        <div>
            <p id='p2'>Un paragraphe dans la div</p>
            <p>Un autre paragraphe dans la div</p>
        </div>
        <p>Un autre paragraphe</p>
    </body>
</html>
```

`main.js`

```js
let p1 = document.getElementById('p1');

let p1PreviousSibling = p1.previousSibling;
let p1PreviousElementSibling = p1.previousElementSibling;

alert(
    'Nom noeud p1 : ' + p1.nodeName +
    '\nValeur noeud p1 : ' + p1.nodeValue +
    '\nType noeud p1 : ' + p1.nodeType +
    '\n\nNom p1PreviousSibling  : ' + p1PreviousSibling.nodeName +
    '\n\nNom p1PreviousElementSibling : ' + p1PreviousElementSibling.nodeName +
    '\nValeur du premier noeud enfant de p1 : ' + p1.firstChild.nodeValue
);
```

>**Navigation**  
>
> - [Suivant](./ajouter-modifier-supprimer-elements.md#ajouter-modifier-ou-supprimer-des-elements-du-dom-avec-javascript)  
> - [Précédent](./acces-element-selecteur-css.md#acceder-aux-elements-dans-un-document-avec-javascript-et-modifier-leur-contenu)  
> - [Menu principal](../menu.md#1-introduction-au-javascript)
