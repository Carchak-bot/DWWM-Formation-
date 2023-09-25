---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 22/04/2022  

---
# **Fonctions anonymes, auto-invoquees et recursives en JavaScript**

>**Navigation**  
>
> - [Suivant](../programmation-orientee-objet/presentation.md#introduction-a-loriente-objet-en-javascript)  
> - [Précédent](portee-variables.md#portee-des-variables-et-valeurs-de-retour-des-fonctions-en-javascript)
> - [Menu principal](../menu.md#1-introduction-au-javascript)

Dans cette nouvelle leçon, nous allons aller un peu plus loin dans notre étude des fonctions JavaScript en nous penchant sur le cas des fonctions anonymes et comment les appeler ainsi que sur les fonctions récursives.  

## **Qu’est-ce qu’une fonction anonyme et quels sont les cas d’usage ?**

Les fonctions anonymes sont, comme leur nom l’indique, des fonctions qui ne vont pas posséder de nom.  
En effet, lorsqu’on crée une fonction, nous ne sommes pas obligés de lui donner un nom à proprement parler.  

Généralement, on utilisera les fonctions anonymes lorsqu’on n’a pas besoin d’appeler notre fonction par son nom c’est-à-dire lorsque le code de notre fonction n’est appelé qu’à un endroit dans notre script et n’est pas réutilisé.  

En d’autres termes, les fonctions anonymes vont très souvent simplement nous permettre de gagner un peu de temps dans l’écriture de notre code et (bien que cela porte à débat) à le rendre plus clair en ne le polluant pas avec des noms inutiles.  

## **Création et exécution ou appel d’une fonction anonyme**

On va pouvoir créer une fonction anonyme de la même façon qu’une fonction classique, en utilisant le mot-clé `function` mais en omettant le nom de la fonction après.

Regardez plutôt le code ci-dessous :  

```js
function() {
    alert("Alerte exécutée par une fonction anonyme");
}
```

Nous avons ici déclaré une fonction anonyme donc le rôle est d’exécuter une fonction `alert()` qui va elle-même renvoyer le message « Alerte exécutée par une fonction anonyme » dans une boite d’alerte.  

A ce niveau, pourtant, nous faisons face à un problème : comment appeler une fonction qui n’a pas de nom ?  

On va avoir plusieurs façons de faire en JavaScript.  
Pour exécuter une fonction anonyme, on va notamment pouvoir :

- Enfermer le code de notre fonction dans une variable et utiliser la variable comme une fonction ;
- Auto-invoquer notre fonction anonyme ;
- Utiliser un évènement pour déclencher l’exécution de notre fonction.  

## **Exécuter une fonction anonyme en utilisant une variable**

Voyons ces différentes façons de faire en détail, en commençant par la plus simple : enfermer la fonction dans une variable et utiliser la variable comme une fonction.  
`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Exécuter une fonction anonyme en utilisant une variable</title>
        <meta charset="utf-8">
        <meta name="viewport"
        content="width=device-width, initial-scale=1, user-scalable=no">
        <script src='assets/js/main.js' async></script>
    </head>
    
    <body>
        <h1>Titre principal</h1>
        <p>Un paragraphe</p>
    </body>
</html>
```

`main.js`

```js
let alerte = function() {
    alert('Alerte exécutée par une fonction anonyme');
};
alerte();
```

Ici, on affecte notre fonction anonyme à une variable nommée `let alerte`.  
Notre variable contient donc ici une valeur complexe qui est une fonction et on va désormais pouvoir l’utiliser comme si c’était une fonction elle-même.  

Pour « appeler notre variable » et pour exécuter le code de la fonction anonyme qu’elle contient, il va falloir écrire le nom de la variable suivi d’un couple de parenthèses.  
Ces parenthèses sont des parenthèses dites « appelantes » car elles servent à exécuter la fonction qui les précède.  

## **Auto-invoquer une fonction anonyme**

La deuxième façon d’exécuter une fonction anonyme va être de créer une fonction anonyme qui va s’auto-invoquer c’est-à-dire qui va s’invoquer (ou s’appeler ou encore s’exécuter) elle-même dès sa création.  

Pour créer une fonction auto-invoquée à partir d’une fonction, il va tout simplement falloir rajouter un couple de parenthèses autour de la fonction et un second après le code de la fonction.  

Nous avons vu précédemment que le couple de parenthèses suivant le nom de notre variable stockant notre fonction anonyme servait à lancer l’exécution de la fonction.  

De la même manière, le couple de parenthèses après la fonction va faire en sorte que la fonction s’appelle elle-même.  
`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Auto-invoquer une fonction anonyme</title>
        <meta charset="utf-8">
        <meta name="viewport"
        content="width=device-width, initial-scale=1, user-scalable=no">
        <script src='assets/js/main.js' async></script>
    </head>
    
    <body>
        <h1>Titre principal</h1>
        <p>Un paragraphe</p>
    </body>
</html>
```

`main.js`

```js
// Fonction anonyme auto-invoquée
(function() {alert('Alerte exécutée par une fonction anonyme')})();

// Fonction nommée auto-invoquée
(function bonjour() {alert('Bonjour !')})();
```

Vous pouvez noter deux choses à propos des fonction auto-invoquées.  
Tout d’abord, vous devez savoir que la notion d’auto-invocation n’est pas réservée qu’aux fonctions anonymes : on va tout à fait pouvoir auto-invoquer une fonction qui possède un nom.  
Cependant, en pratique, cela n’aura souvent pas beaucoup d’intérêt (puisque si une fonction possède un nom, on peut tout simplement l’appeler en utilisant ce nom).  

Ensuite, vous devez bien comprendre que lorsqu’on auto-invoque une fonction, la fonction s’exécute immédiatement et on n’a donc pas de flexibilité par rapport à cela : une fonction auto-invoquée s’exécutera toujours juste après sa déclaration.  

## **Exécuter une fonction anonyme lors du déclenchement d’un évènement**

On va enfin également pouvoir rattacher nos fonctions anonymes à ce qu’on appelle des « gestionnaires d’évènements » en JavaScript.  

Le langage JavaScript va en effet nous permettre de répondre à des évènements, c’est-à-dire d’exécuter certains codes lorsqu’un évènement survient.  

Le JavaScript permet de répondre à de nombreux types d’évènements : clic sur un élément, pressage d’une touche sur un clavier, ouverture d’une fenêtre, etc.  

Pour indiquer comment on veut répondre à tel évènement, on utilise des gestionnaires d’évènements qui sont des fonctions qui vont exécuter tel code lorsque tel évènement survient.  

Les évènements vont faire l’objet d’une prochaine partie et je ne veux pas trop en parler pour le moment. Notez simplement qu’on va pouvoir passer une fonction anonyme à un gestionnaire d‘évènement qui va l’exécuter dès le déclenchement de l’évènement que le gestionnaire prend en charge.  

Pour un exemple concret du fonctionnement général de la prise en charge d’évènements et de l’utilisation des fonctions anonymes, vous pouvez regarder l’exemple ci-dessous :  
`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Exécuter une fonction anonyme lors du déclenchement d’un évènement</title>
        <meta charset="utf-8">
        <meta name="viewport"
        content="width=device-width, initial-scale=1, user-scalable=no">
        <script src='assets/js/main.js' async></script>
    </head>
    
    <body>
        <h1>Titre principal</h1>
        <p>Un paragraphe</p>
        <p id='p1'>Paragraphe 1</p>
        <p id='p2'>Paragraphe 2</p>
    </body>
</html>
```

`main.js`

```js
// Représentent nos paragraphes p id='p1' et p id='p2'
let para1 = document.getElementById('p1');
let para2 = document.getElementById('p2');

/*On utilise la fonction addEventListener() qui sert de gestionnaire
d'évènement. Ici, on demande à exécuter la fonction anonyme passé en
deuxième argument lors de l'évènement "click" (clic) que l'élément
p id='p1' ou p id='p2' */
para1.addEventListener('click', function(){alert('Clic sur p id=p1');});
para2.addEventListener('click', function(){alert('Clic sur p id=p2');});
```

Ce code contient beaucoup de notions que nous n’avons pas étudiées et que je ne vais pas expliquer en détail pour le moment.  
Tout ce que vous devez savoir ici est que la fonction (ou plus exactement la méthode) `addEventListener()` permet d’exécuter un code lors de la capture (lors du déclenchement) d’un évènement particulier qu’on va lui préciser en premier argument.  

## **Les fonctions récursives**

Pour clore cette partie, j’aimerais également vous présenter des fonctions qui possèdent une structure particulière et qu’on appelle fonctions récursives.  

Une fonction récursive est une fonction qui va s’appeler elle-même au sein de son code.  

Tout comme pour les boucles, les fonctions récursives vont nous permettre d’exécuter une action en boucle et jusqu’à ce qu’une certaine condition de sortie soit vérifiée.  
`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Les fonctions récursives</title>
        <meta charset="utf-8">
        <meta name="viewport"
        content="width=device-width, initial-scale=1, user-scalable=no">
        <script src='assets/js/main.js' async></script>
    </head>
    
    <body>
        <h1>Titre principal</h1>
        <p>Un paragraphe</p>
        <p id='p1'></p>
    </body>
</html>
```

`main.js`

```js
function decompte(t) {
    if (t > 0) {
        document.getElementById('p1').innerHTML += t + '<br>';
        return decompte(t - 1);
    }else{
        return t;
    }
};

decompte(7);
```

Ici, notre fonction `decompte()` est une fonction récursive : elle va s’appeler elle-même dans son code. La fonction prend ici un nombre en argument.  
Si ce nombre est strictement positif, il est affiché dans le paragraphe `p id='p1'` et la fonction est de nouveau exécutée en enlevant 1 à la valeur passée précédemment et cela jusqu’à arriver à 0.  

>**Navigation**  
>
> - [Suivant](../programmation-orientee-objet/presentation.md#introduction-a-loriente-objet-en-javascript)  
> - [Précédent](portee-variables.md#portee-des-variables-et-valeurs-de-retour-des-fonctions-en-javascript)
> - [Menu principal](../menu.md#1-introduction-au-javascript)
