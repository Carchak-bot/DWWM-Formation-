---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 22/04/2022  

---
# **Introduction a l’oriente objet en JavaScript**

>**Navigation**  
>
> - [Suivant](./creation-objet-litteral-et-manipulation-membres.md#creation-dun-objet-javascript-litteral-et-manipulation-de-ses-membres)
> - [Précédent](../fonctions/fonctions-anonymes.md#fonctions-anonymes-auto-invoquees-et-recursives-en-javascript)
> - [Menu principal](../menu.md#1-introduction-au-javascript)

Dans cette nouvelle partie, nous allons nous plonger dans ce qui fait toute la puissance du JavaScript : les objets et la programmation orientée objet.  
Cette première leçon n’est pas la plus simple à digérer car elle introduit de nombreux nouveaux concepts et pose des bases très théoriques.  
Pas d’inquiétude donc si certaines notions restent floues et abstraites : nous allons redéfinir et illustrer les concepts de cette leçon dans tout le reste de cette partie.  
Il me semblait toutefois intéressant de commencer par poser certaines bases pour que vous les ayez en tête et que vous compreniez mieux ce qu’on va faire par la suite.  

## **Les paradigmes de programmation**

Avant de parler de ce qu’est la programmation orientée objet en JavaScript en soi ou de définir ce qu’est un objet, il me semble essentiel de vous parler des paradigmes de programmation car cela devrait rendre la suite beaucoup plus claire.  

Un « paradigme » de programmation est une façon d’approcher la programmation informatique, c’est-à-dire une façon de voir (ou de construire) son code et ses différents éléments.  

Il existe trois paradigmes de programmation particulièrement populaires, c’est-à-dire trois grandes façons de penser son code :  

- La programmation procédurale ;
- La programmation fonctionnelle ;
- La programmation orientée objet.  

Une nouvelle fois, retenez bien que chacun de ces paradigmes ne correspond qu’à une façon différente de penser, d’envisager et d’organiser son code et qui va donc obéir à des règles et posséder des structures différentes.  

La programmation procédurale est le type de programmation le plus commun et le plus populaire.  
C’est une façon d’envisager son code sous la forme d’un enchainement de procédures ou d’étapes qui vont résoudre les problèmes un par un.  
Cela correspond à une approche verticale du code où celui-ci va s’exécuter de haut en bas, ligne par ligne. Jusqu’à présent, nous avons utilisé cette approche dans nos codes JavaScript.  

La programmation fonctionnelle est une façon de programmer qui considère le calcul en tant qu’évaluation de fonctions mathématiques et interdit le changement d’état et la mutation des données.  
La programmation fonctionnelle est une façon de concevoir un code en utilisant un enchainement de fonctions « pures », c’est-à-dire des fonctions qui vont toujours retourner le même résultat si on leur passe les mêmes arguments et qui ne vont retourner qu’une valeur sans modification au-delà de leur contexte.

La programmation orientée objet est une façon de concevoir un code autour du concept d’objets. Un objet est une entité qui peut être vue comme indépendante et qui va contenir un ensemble de variables (qu’on va appeler propriétés) et de fonctions (qu’on appellera méthodes).  
Ces objets vont pouvoir interagir entre eux.  

Ces premières définitions doivent vous paraitre très abstraites et très floues.  
C’est tout à fait normal : on essaie ici de résumer des façons entières de penser la programmation en quelques lignes !  

Les choses importantes à retenir pour le moment sont les suivantes :  

1. Il existe différentes façons de penser / voir / concevoir son code qu’on appelle « paradigmes » ;
2. La plupart des langages supportent aujourd’hui plusieurs paradigmes et le JavaScript, en particulier, supporte chacun des trois paradigmes principaux cités ci-dessus ce qui signifie qu’on va pouvoir coder en procédural, en fonctionnel et en orienté objet en JavaScript ;
3. Un paradigme n’est qu’une façon de coder il est important de comprendre qu’un paradigme n’exclut pas les autres. Au contraire, on va souvent utiliser plusieurs paradigmes dans un même script en fonction de ce qu’on souhaite réaliser.  

## **Première définition de l’orienté objet et des objets en JavaScript**

Le JavaScript est un langage qui possède un fort potentiel pour la programmation orientée objet (abrégée en POO).  

En effet, vous devez savoir que le JavaScript est un langage qui intègre l’orienté objet dans sa définition même ce qui fait que tous les éléments du JavaScript vont soit être des objets, soit pouvoir être convertis et traités comme des objets. Il est donc essentiel de bien comprendre cette partie sur les objets pour véritablement maitriser le JavaScript et utiliser tout ce qui fait sa puissance.

Un objet, en informatique, est un ensemble cohérent de données et de fonctionnalités qui vont fonctionner ensemble. Pour le dire très simplement, un objet en JavaScript est un conteneur qui va pouvoir stocker plusieurs variables qu’on va appeler ici des propriétés. Lorsqu’une propriété contient une fonction en valeur, on appelle alors la propriété une méthode. Un objet est donc un conteneur qui va posséder un ensemble de propriétés et de méthodes qu’il est cohérent de regrouper.

Regardez plutôt le code suivant :  
`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Première définition de l’orienté objet et des objets</title>
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
/* Notre variable "utilisateur" est ici une variable-objet ou
plus simplement un objet */
let utilisateur = {
    /* nom, age et mail sont des propriétés de l'objet utilisateur
    La valeur de la propriété "nom" est un tableau */
    nom : ['Alain', 'ORLUK'],
    age : 50,
    mail : 'alain.orluk@id-formation.fr',
    
    // Bonjour est une méthode de l'objet utilisateur
    bonjour: function() {
        alert('Bonjour, je suis ' + this.nom[0] + ', j\'ai ' + this.age + ' ans');
    }
};

alert(typeof utilisateur);
```

On a ici créé notre premier objet (qui est en l’occurrence un objet littéral – nous reparlerons de ce concept plus tard). Comme vous pouvez le voir, pour créer un objet, on commence par définir et initialiser une variable.  

Dans le cas présent, notre variable `let utilisateur` stocke notre objet.  
Par simplification, on dira que cette variable « est » un objet mais pour être tout à fait exact il faudrait plutôt dire qu’elle stocke une valeur de type objet.  

Pour nous assurer qu’on a bien créé un objet, on peut utiliser l’opérateur `typeof` qui renvoie le type de valeur d’une variable.  
Sans surprise, c’est bien la valeur « object » (objet en anglais) qui est renvoyée.  

Comme vous pouvez le voir, on utilise ici une syntaxe différente de celle dont on a l’habitude pour déclarer notre objet.  
Tout d’abord, vous pouvez remarquer qu’on utilise dans le cas de la création d’un objet littéral une paire d’accolades qui indiquent au JavaScript qu’on souhaite créer un objet.  

Ce qui nous intéresse particulièrement ici sont les membres de notre objet.  
Un « membre » est un couple « nom : valeur », et peut être une propriété ou une méthode.  
Comme vous pouvez le voir, notre objet est ici composé de différents membres : 3 propriétés et 1 méthode.  

La première propriété `nom` de notre objet est particulière puisque sa valeur associée est un tableau.  
Nous allons étudier les tableaux par la suite, contentez-vous pour le moment de retenir le fait que les tableaux sont eux-mêmes avant tout des objets en JavaScript.  

Le membre nommé `bonjour` de notre objet est une méthode puisqu’une fonction anonyme lui est associée en valeur.  
Vous pouvez également remarquer l’usage du mot-clé `this` et de l’opérateur `.` dans notre méthode.  
Nous reviendrons sur ces éléments dans la leçon suivante.  

Chaque membre d’un objet est toujours composé d’un nom et d’une valeur qui sont séparées par `:`.  
Les différents membres d’un objet sont quant-à-eux séparés les uns des autres par des virgules (et non pas des points-virgules, attention !).  

## **Quels avantages et intérêts de coder en orienté objet en JavaScript ?**

Le développement orienté objet correspond à une autre façon d’envisager et d’organiser son code en groupant des éléments cohérents au sein d’objets.  

Les intérêts supposés principaux de développer en orienté objet plutôt qu’en procédural par exemple sont de permettre une plus grande modularité ou flexibilité du code ainsi qu’une meilleure lisibilité et une meilleure maintenabilité de celui-ci.  

Dans tous les cas, les objets font partie du langage JavaScript natif et il est donc obligatoire de savoir les utiliser pour déverrouiller tout le potentiel du JavaScript.  

En effet, vous devez bien comprendre ici que certains langages ne proposent pas de composants objets c’est-à-dire ne nous permettent pas de créer des objets et donc de créer du code orienté objet.  
Certains autres langages supportent l’utilisation d’objets et possèdent quelques objets natifs (objets prédéfinis et immédiatement utilisables).  

Le langage JavaScript, pour sa part, possède une très grande composante objet et la plupart des éléments qu’on va manipuler en JavaScript proviennent d’objets natifs du langage.  
Il est donc indispensable de comprendre comment la programmation orientée objet fonctionne et de connaitre ces objets natifs pour utiliser pleinement le JavaScript.  

>**Navigation**  
>
> - [Suivant](./creation-objet-litteral-et-manipulation-membres.md#creation-dun-objet-javascript-litteral-et-manipulation-de-ses-membres)
> - [Précédent](../fonctions/fonctions-anonymes.md#fonctions-anonymes-auto-invoquees-et-recursives-en-javascript)
> - [Menu principal](../menu.md#1-introduction-au-javascript)
