---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 22/04/2022  

---
# **La gestion d’evenements en JavaScript et la methode addEventListener**

>**Navigation**  
>
> - [Suivant](./propagation-evenements.md#la-propagation-des-evenements-en-javascript)  
> - [Précédent](./manipuler-attributs-et-styles.md#manipuler-les-attributs-et-les-styles-des-elements-via-le-dom-en-javascript)  
> - [Menu principal](../menu.md#1-introduction-au-javascript)

Les évènements sont des actions qui se produisent et auxquelles on va pouvoir répondre en exécutant un code.  
Par exemple, on va pouvoir afficher ou cacher du texte suite à un clic d’un utilisateur sur un élément, on change la taille d’un texte lors du passage de la souris d’un utilisateur sur un élément.  
Les évènements et leur prise en charge sont l’un des mécanismes principaux du JavaScript qui vont nous permettre d’ajouter un vrai dynamisme à nos pages Web.  

## **Présentation et première définition des évènements**

En JavaScript, un évènement est une action qui se produit et qui possède deux caractéristiques essentielles :  

- C’est une action qu’on peut « écouter », c’est-à-dire une action qu’on peut détecter car le système va nous informer qu’elle se produit ;
- C’est une action à laquelle on peut « répondre », c’est-à-dire qu’on va pouvoir attacher un code à cette action qui va s’exécuter dès qu’elle va se produire.  

Par exemple, on va pouvoir détecter le clic d’un utilisateur sur un bouton d’un document et afficher une boite de dialogue ou un texte suite à ce clic. On parlera donc « d’évènement clic ».  

Il existe de nombreux évènements répertoriés en JavaScript (plus d’une centaine).  
Les évènements qui vont nous intéresser particulièrement sont les évènements liés au Web et donc au navigateur. Ces évènements peuvent être très différents les uns des autres :  

- Le chargement du document est un évènement ;
- Un clic sur un bouton effectué par un utilisateur est un évènement ;
- Le survol d’un élément par la souris d’un utilisateur est un évènement ;
- Etc.  

Nous n’allons bien évidemment pas passer en revue chaque évènement mais allons tout de même nous arrêter sur les plus courants.  

## **Définir des gestionnaires d’évènements**

Pour écouter et répondre à un évènement, nous allons définir ce qu’on appelle des gestionnaires d’évènements.  

Un gestionnaire d’évènements est toujours divisé en deux parties : une partie qui va servir à écouter le déclenchement de l’évènement, et une partie gestionnaire en soi qui va être le code à exécuter dès que l’évènement se produit.  

Aujourd’hui, en JavaScript, il existe trois grandes façons d’implémenter un gestionnaire d’évènements :  

- On peut utiliser des attributs HTML de type évènement (non recommandé) ;
- On peut utiliser des propriétés JavaScript liées aux évènements ;
- On peut utiliser la méthode `addEventListener()` (recommandé).  

Nous préférerons largement cette dernière méthode pour des raisons de performance et de fonctionnalités.  
Dans ce cours, nous allons cependant étudier chacune d’entre elles pour que vous puissiez les identifier et les comprendre.  

## **Utiliser les attributs HTML pour gérer un évènement**

L’utilisation d’attributs HTML pour prendre en charge un évènement est la méthode la plus ancienne à notre disposition.  

Cette façon de faire ne devrait plus être utilisée aujourd’hui.  
Cependant, de nombreux sites utilisent encore ce type de syntaxe ce qui nous force à l’étudier ici.  

L’idée va être ici d’insérer un attribut HTML lié à l’évènement qu’on souhaite gérer directement dans la balise ouvrante d’un élément à partir duquel on va pouvoir détecter le déclenchement de cet évènement.  

Ces attributs HTML de « type évènement » possèdent souvent le nom de l’évènement qu’ils doivent écouter et gérer précédé par « on » comme par exemple :  

- L’attribut `onclick` pour l’évènement « clic sur un élément » ;
- L’attribut `onmouseover` pour l’évènement « passage de la souris sur un élément » ;
- L’attribut `onmouseout` pour l’évènement « sortie de la souris d’élément » ;
- Etc.  

Nous allons passer en valeur de ces attributs le code JavaScript qu’on souhaite exécuter (généralement une fonction) suite au déclenchement de l’évènement en question.  
Dès que l’évènement va être détecté, le code présent dans l’attribut va être exécuté.  
`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Utiliser les attributs HTML pour gérer un évènement</title>
        <meta charset="utf-8">
        <meta name="viewport"
        content="width=device-width, initial-scale=1, user-scalable=no">
        <script src='assets/js/main.js' async></script>
    </head>
    
    <body>
        <h1>Titre principal</h1>
        <p>Un premier paragraphe</p>
        <button onclick="alert('Bouton cliqué')">Cliquez moi !</button>
        <div onmouseover="this.style.backgroundColor='orange'"
             onmouseout="this.style.backgroundColor='white'">
            <p>Un paragraphe dans une div</p>
            <p>Un autre paragraphe dans la div</p>
        </div>
    </body>
</html>
```

## **Utiliser les propriétés JavaScript pour gérer un évènement**

Chaque évènement est représenté en JavaScript par un objet basé sur l’interface `Event`.  

L’interface `Event` est l’interface de base commune pour tout évènement qui se produit dans le DOM.  
Certains types d’évènements sont ensuite définis plus précisément dans des interfaces qui héritent de `Event`.  

Les gestionnaires d’évènements liés à ces évènements sont décrits dans le mixin `GlobalEventHandlers` qu’implémentent notamment les interfaces `HTMLElement` et `Document`.  

Ces gestionnaires d’évènements sont des propriétés qui sont de la forme « on » + nom de l’évènement géré, c’est-à-dire qui ont des noms similaires aux attributs HTML vus précédemment.  

On va à nouveau passer le code à exécuter (généralement sous forme de fonction anonyme) en cas de déclenchement de l’évènement en valeur de la propriété relative à l’évènement et allons généralement utiliser ces propriétés à partir d’objets `Element`.  
`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Utiliser les propriétés JavaScript pour gérer un évènement</title>
        <meta charset="utf-8">
        <meta name="viewport"
        content="width=device-width, initial-scale=1, user-scalable=no">
        <script src='assets/js/main.js' async></script>
    </head>
    
    <body><!--
        <h1>Titre principal</h1>
        <p>Un premier paragraphe</p>
        <button onclick="alert('Bouton cliqué')">Cliquez moi !</button>
        <div onmouseover="this.style.backgroundColor='orange'"
             onmouseout="this.style.backgroundColor='white'">
            <p>Un paragraphe dans une div</p>
            <p>Un autre paragraphe dans la div</p>
        </div>
        -->
        <h1>Titre principal</h1>
        <p>Un premier paragraphe</p>
        <button>Cliquez moi !</button>
        <div>
            <p>Un paragraphe dans une div</p>
            <p>Un autre paragraphe dans la div</p>
        </div>
    </body>
</html>
```

`main.js`

```js
// On sélectionne le premier button et la première div du document
let b1 = document.querySelector('button');
let d1 = document.querySelector('div');

// On utilise les propriétés gestionnaires d'évènement avec nos éléments
b1.onclick = function () {
    alert('Bouton cliqué')
};
d1.onmouseover = function () {
    this.style.backgroundColor ='orange'
};
d1.onmouseout = function () {
    this.style.backgroundColor='white'
};
```

Notez que cette façon de faire est moins efficace et performante que la suivante car chaque objet ne va pouvoir posséder qu’une propriété gestionnaire d’évènements pour un même type d’évènements ce qui signifie qu’on ne va pas pouvoir réagir plusieurs fois de façons différentes à un même évènement à partir d’un même élément.  

## **Utiliser la méthode addEventListener() pour gérer un évènement**

Cette dernière façon de gérer les évènements est la manière recommandée aujourd’hui car c’est la plus flexible et la plus performante.  

La méthode `addEventListener()` est une méthode de l’interface `EventTarget` qu’on va souvent utiliser avec des objets `Element` car je vous rappelle que l’interface `Element` hérite de l’interface `Node` qui hérite elle-même de `EventTarget`.  

On va passer deux arguments à cette méthode : le nom d’un évènement qu’on souhaite prendre en charge ainsi que le code à exécuter (qui prendra souvent la forme d’une fonction) en cas de déclenchement de cet évènement.  

Notez qu’on va par ailleurs pouvoir utiliser la méthode `addEventListener()` pour réagir plusieurs fois et de façon différente à un même évènement ou pour réagir à différents évènements à partir de différents ou d’un même objet `Element`.  
`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Utiliser la méthode addEventListener() pour gérer un évènement</title>
        <meta charset="utf-8">
        <meta name="viewport"
        content="width=device-width, initial-scale=1, user-scalable=no">
        <script src='assets/js/main.js' async></script>
    </head>
    
    <body>
        <h1>Titre principal</h1>
        <p>Un premier paragraphe</p>
        <button>Cliquez moi !</button>
        <div>
            <p>Un paragraphe dans une div</p>
            <p>Un autre paragraphe dans la div</p>
        </div>
    </body>
</html>
```

`main.js`

```js
// On sélectionne le premier button et la première div du document
let b1 = document.querySelector('button');
let d1 = document.querySelector('div');

// On utilise la méthode addEventListener pour gérer des évènements
b1.addEventListener('click', function () {
    alert('Bouton cliqué')
});
d1.addEventListener('mouseover', function () {
    this.style.backgroundColor ='orange'
});
d1.addEventListener('mouseover', function () {
    this.style.fontWeight ='bold'
});
d1.addEventListener('mouseout', function () {
    this.style.backgroundColor='white'
});
```

## **Supprimer un gestionnaire d’évènements avec removeEventListener()**

La méthode `removeEventListener()` de l’interface `EventTarget` va nous permettre de supprimer un gestionnaire d’évènement déclaré avec `addEventListener()`.  

Pour cela, il va suffire de passer en argument le type d’évènement ainsi que le nom de la fonction passée en argument de `addEventListener()`.  
`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Utiliser la méthode addEventListener() pour gérer un évènement</title>
        <meta charset="utf-8">
        <meta name="viewport"
        content="width=device-width, initial-scale=1, user-scalable=no">
        <script src='assets/js/main.js' async></script>
    </head>
    
    <body>
        <h1>Titre principal</h1>
        <p>Un premier paragraphe</p>
        <button>Cliquez moi !</button>
        <div>
            <p>Un paragraphe dans un div</p>
            <p>Un autre paragraphe dans le div</p>
        </div>
    </body>
</html>
```

`main.js`

```js
// On sélectionne le premier button et la première div du document
let b1 = document.querySelector('button');
let d1 = document.querySelector('div');

function changeCouleur () {
    this.style.backgroundColor ='orange';
}

// On utilise la méthode addEventListener pour gérer des évènements
b1.addEventListener('click', function () { 
    alert('Bouton cliqué')
});
d1.addEventListener('mouseover', changeCouleur);
d1.addEventListener('mouseover', function () {
    this.style.fontWeight ='bold'
});

// On supprime un écouteur d'évènement
d1.removeEventListener('mouseover', changeCouleur);
```

La méthode `removeEventListener()` va s’avérer utile lorsqu’on voudra retirer un gestionnaire d’évènement selon certains cas comme par exemple dans la situation où un autre évènement s’est déjà déclenché.  

>**Navigation**  
>
> - [Suivant](./propagation-evenements.md#la-propagation-des-evenements-en-javascript)  
> - [Précédent](./manipuler-attributs-et-styles.md#manipuler-les-attributs-et-les-styles-des-elements-via-le-dom-en-javascript)  
> - [Menu principal](../menu.md#1-introduction-au-javascript)
