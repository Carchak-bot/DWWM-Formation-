---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 22/04/2022  

---

# **Presentation des variables JavaScript**

>**Navigation**  
>
> - [Suivant](types-de-donnees.md#les-types-de-donnees-en-javascript)
> - [Précédent](../introduction/presentation.md#cest-parti-pour-javascript)  
> - [Menu principal](../menu.md#menu-general)

Une variable est un conteneur servant à stocker des informations de manière temporaire, comme une chaine de caractères (un texte) ou un nombre par exemple.  

Le propre d’une variable est de pouvoir varier, c’est-à-dire de pouvoir stocker différentes valeurs au fil du temps et c’est cette particularité qui les rend si utiles.  

Notez bien déjà qu’une variable en soi et la valeur qu’elle va stocker sont deux éléments différents et qui ne sont pas égaux. Encore une fois, une variable n’est qu’un conteneur.  
Vous pouvez imaginer une variable comme une boite dans laquelle on va pouvoir placer différentes choses au cours du temps.  

Les variables sont l’une des constructions de base du JavaScript et vont être des éléments qu’on va énormément utiliser.  
Nous allons illustrer leur utilité par la suite.  

## **Les règles de déclaration des variables en JavaScript**

Une variable est donc un conteneur ou un espace de stockage temporaire qui va pouvoir stocker une valeur.  
Lorsqu’on stocke une valeur dans une variable, on dit également qu’on assigne une valeur à une variable.  

Pour pouvoir utiliser les variables et illustrer leur intérêt, il va déjà falloir les créer. Lorsqu’on crée une variable en JavaScript, on dit également qu’on « déclare » une variable.  

Pour déclarer une variable en JavaScript, nous allons devoir utiliser le mot-clé `var` ou le mot-clé `let` (nous allons expliquer la différence entre les deux dans la suite de cette leçon) suivi du nom qu’on souhaite donner à notre variable.  

Concernant le nom de nos variables, nous avons une grande liberté dans le nommage de celles-ci mais il y a quand même quelques règles à respecter :  

- Le nom d’une variable doit obligatoirement commencer par une lettre ou un underscore `_` et ne doit pas commencer par un chiffre ;
- Le nom d’une variable ne doit contenir que des lettres, des chiffres et des underscores mais pas de caractères spéciaux ;
- Le nom d’une variable ne doit pas contenir d’espace.  

De plus, notez que le nom des variables est sensible à la casse en JavaScript.  
Cela signifie que l’usage de majuscules ou de minuscules avec un même nom va permettre de définir des variables différentes.  
Par exemple, les noms `texte`, `TEXTE` et `tEXTe` vont pouvoir définir des variables différentes.  

Enfin, sachez qu’il existe des noms « réservés » en JavaScript.  
Vous ne pouvez pas utiliser ces noms comme noms pour vos variables, tout simplement car le langage JavaScript les utilise déjà pour désigner différents éléments intégrés au langage.  
Nous verrons ces différents noms au fil de ce cours.

Vous pouvez également noter qu’on utilise généralement la convention `camel case` pour définir les noms de variable en JavaScript.  
Cette convention stipule simplement que lorsqu’un nom de variable est composé de plusieurs mots, on colle les mots ensemble en utilisant une majuscule pour chaque mot sauf le premier.  
Par exemple, si je décide de nommer une variable "***monage***", j’écrirai en JavaScript `let monAge` ou `var monAge`.  

Ci-dessous, on crée nos deux premières variables en utilisant le mot-clé let dans notre fichier cours.js :  

```js
let prenom;
let monAge;
```

Nos deux premières variables sont désormais créées.  
Cependant, elles ne stockent aucune valeur pour le moment.  

## **Initialiser une variable**

Lorsqu’on assigne une valeur pour la première fois à une variable, c’est-à-dire lorsqu’on stocke une valeur dans une variable qui n’en stockait pas encore, on dit également qu’on initialise une variable.  

On va pouvoir initialiser une variable après l’avoir déclarée ou au moment de sa déclaration.  
Les deux façons de faire sont équivalentes en termes de résultat mais il est plus rapide (en termes d’écriture de code) d’initialiser une variable lors de sa déclaration puisque cela nous va nous éviter d’avoir à réécrire le nom de la variable.  

Pour initialiser une variable, on utilise l’opérateur `=` qui est dans ce cas non pas un opérateur d’égalité mais un opérateur d’assignation ou d’affectation comme ceci :  

```js
// On déclare et on intialise la variable en même temps
let prenom = "Alain";
// On déclare puis on l'initialise ensuite
let monAge;
monAge = 50;
```

Ce point est un point très important à retenir pour éviter les confusions futures et donc je le répète : le signe `=` ne possède pas du tout la même signification que le «***égal***» mathématique que vous utilisez dans la vie de tous les jours.  

Ici, c’est un opérateur d’affectation.  
Il sert à indiquer qu’on affecte (ou «***assigne***» ou encore «***stocke***») la valeur à droite du signe dans le conteneur à gauche de celui-ci.  
Encore une fois, la variable n’est pas «***égale***» à sa valeur.  

Vous pouvez également noter deux autres choses intéressantes dans le code ci-dessus : tout d’abord, vous pouvez voir que le mot-clé `let` (ou `var`) n’est utilisé et ne doit être utilisé que pour déclarer une variable.  
Lorsqu’on manipule une variable ensuite, on se contente d’utiliser son nom.  

Ensuite, vous remarquez qu’on utilise des apostrophes droits ou guillemets simples pour entourer la valeur «***Alain***» mais pas pour la valeur «***50***».  
Cela est dû au fait que «***Alain***» est une valeur textuelle tandis que «***50***» est un chiffre et ces valeurs ne vont pas pouvoir être manipulées de la même façon en JavaScript.  

## **Modifier la valeur stockée dans une variable**

Le propre d’une variable et l’intérêt principal de celles-ci est de pouvoir stocker différentes valeurs.  

Pour affecter une nouvelle valeur dans une variable déjà initialisée, on va se contenter d’utiliser à nouveau l’opérateur d’affectation `=`.  

En faisant cela, la nouvelle valeur va venir écraser l’ancienne valeur stockée qui sera alors supprimée.  

```js
// On déclare et on intialise la variable en même temps
let prenom = "Alain";
// On déclare puis on l'initialise ensuite
let monAge;
monAge = 50;
/* On modifie la valeur stockée dans la variable prenom
Notre variable prenom stocke la valeur "Alex" */
prenom = "Alex";
```

## **La différence entre les mots-cles `let` et `var`**

Pourquoi possède-t-on deux mots-clés différents pour déclarer des variables en JavaScript ?  
Cela provient du fait qu’aucun langage n’est parfait ainsi que du fait que les langages informatiques ne sont pas figés mais évoluent beaucoup et rapidement.  

En effet, en informatique, l’augmentation rapide des possibilités (grâce à des connexions plus rapides et à des matériaux de plus en plus performants) pousse les langages à évoluer et notamment à se complexifier et à développer de nouvelles fonctionnalités pour exploiter ces possibilités.  

Cette évolution fait que parfois certains langages changent de philosophie de design et modifient certains de leurs composants lorsque ceux-ci deviennent inadaptés.  

En effet, en informatique, vous devez absolument comprendre que tout est toujours en mouvement et que ce qui était vrai ou ce qui était considéré comme une bonne pratique il y a 10, 5, 2 ans en arrière ne l’est potentiellement plus aujourd’hui.  

Le problème ici est que les différents langages qui ont passé l’épreuve du temps ne peuvent pas du jour au lendemain abandonner complètement certains composants et en définir de nouveaux complètement différents car cela serait, dans le cas d’un langage populaire comme le JavaScript, dramatique pour le web en général.  

Effectivement, il faut ici bien comprendre que lorsqu’on crée un site web, on utilise les technologies du moment.  
Que se passerait il si certaines fonctionnalités d’un langage étaient brutalement abandonnées et du jour au lendemain plus supportées et donc plus comprises par les navigateurs (dans le cas du JavaScript) qui sont chargées de les exécuter ? La plupart des sites accessibles seraient complètement bugués voire inaccessibles.  

Pour cette raison, lorsqu’un langage souhaite faire évoluer ses composants, il doit tenir compte de son héritage et se débrouiller pour faire cohabiter les anciennes fonctionnalités avec les nouvelles au moins le temps que la majorité des propriétaires de sites aient le temps d’implémenter les nouvelles fonctionnalités à la place des anciennes.  

Comme vous vous en doutez, dans la plupart des cas, cela prend des années et ce sont généralement dans les faits les navigateurs principaux (Chrome, Firefox, Safari, Explorer) qui « décident » de quand une fonctionnalité est obsolète et qui décident qu’à partir de telle date elle ne sera plus supportée.  

Ainsi, la coexistence des mots-clés `var` et `let` en JavaScript est due avant tout à ce souci d’héritage du langage.  

Pour être tout à fait précis, lorsque le JavaScript a été créé et jusqu’à il y a quelques années, nous n’avions accès qu’au mot-clé `var` qu’on devait utiliser pour déclarer nos variables.  

Finalement, les créateurs du JavaScript ont fini par penser que le mot-clé `var` pouvait porter à confusion et ont créé un nouveau mot-clé pour déclarer les variables : le mot-clé `let`.  

En même temps qu’un nouveau mot-clé a été créé, les créateurs du JavaScript en ont profité pour résoudre quelques problèmes liés à la déclaration de variables en utilisant `var`, ce qui fait que `let` ne va pas nous permettre de créer des variables de la même façon que `var`.  

Il existe 3 grandes différences de comportement entre les variables déclarées avec `var` et avec `let` que nous allons illustrer immédiatement.  

### **La remontée ou « hoisting » des variables**

Lorsqu’on utilise la syntaxe avec var, on n’est pas obligé de déclarer la variable avant de la manipuler dans le code, on peut très bien effectuer des manipulations en haut du code et la déclarer en fin de code.  

Cela est possible car le JavaScript va traiter les déclarations de variables effectuées avec var avant le reste du code JavaScript.  
Ce comportement est appelé remontée ou hoisting.  

Ce comportement a été jugé comme inadapté dans les versions récentes de JavaScript et a donc été corrigé dans la déclaration de variables avec `let` :  les variables utilisant la syntaxe `let` doivent obligatoirement être déclarées avant de pouvoir être utilisées.

Le but de ce comportement est de pousser les développeurs à créer des scripts plus compréhensibles et plus clairs en apportant de la structure au code avec notamment la déclaration des différentes variables au début de chaque script.  

```js
// Ceci fonctionne
prenom = "Alain";
var prenom;

// Ceci ne fonctionne pas et renvoie une erreur
nom = "ORLUK";
let nom;
```

### **La redéclaration de variables**

Avec l’ancienne syntaxe `var`, on avait le droit de déclarer plusieurs fois une même variable en utilisant à chaque fois `var` (ce qui avait pour effet de modifier la valeur stockée).  

La nouvelle syntaxe avec `let` n’autorise pas cela.  
Pour modifier la valeur stockée dans une variable avec la nouvelle syntaxe, il suffit d’utiliser le nom de la variable et de lui affecter une autre valeur.

Cette décision a été prise une nouvelle fois pour des raisons de clarté et de pertinence du code.  
En effet, il n’y a aucun intérêt à redéfinir une même variable plusieurs fois.  

```js
// Ceci fonctionne
var prenom = "Alain";
var prenom = "Alex";

// Ceci ne fonctionne pas et renvoie une erreur
let nom = "ORLUK";
let nom = "DELOIN";
```

### **La portée des variables**

La «***portée***» d’une variable désigne l’endroit où cette variable va pouvoir être utilisée dans un script.  
Il est un peu tôt pour vous expliquer ce concept puisque pour bien le comprendre il faut déjà savoir ce qu’est une fonction.  

Nous reparlerons donc de cette portée des variables lorsque nous aborderons les fonctions en JavaScript.  

Vous pouvez pour le moment retenir si vous le souhaitez que les variables déclarées avec `var` et celles avec `let` au sein d’une fonction ne vont pas avoir la même portée, c’est-à-dire qu’on ne va pas pouvoir les utiliser aux mêmes endroits.  

### **Le choix de la déclaration des variables : plutôt avec `let` ou plutôt avec `var` ?**

La syntaxe de déclaration des variables avec `let` correspond à la nouvelle syntaxe.  
La syntaxe avec `var` est l’ancienne syntaxe qui est vouée à disparaitre.  

Vous devriez donc aujourd’hui toujours utiliser le mot-clé `let` pour déclarer vos variables.  

### **Quelle utilité pour les variables en pratique ?**

Les variables vont être à la base de la plupart de nos scripts JavaScript.  
En effet, il va être très pratique de stocker différents types d’informations dans les variables pour ensuite manipuler simplement ces informations notamment lorsqu’on n’a pas accès à ces informations lorsqu’on crée le script.  

Par exemple, on va pouvoir demander à des utilisateurs de nous envoyer des données grâce à la fonction (ou la méthode pour être tout à fait précis mais nous verrons cela plus tard) `prompt()`.  
Lorsqu’on écrit notre script avec notre fonction `prompt()`, on ne sait pas encore ce que les utilisateurs vont nous envoyer comme données.  
Dans ce cas, notre script va être créé de manière à ce que les données envoyées soient stockées lors de leur envoi dans des variables qu’on définit.  
Cela nous permet déjà de pouvoir manipuler les dites variables et par extension les données qu’elles vont stocker.  

De même, le fait qu’une même variable puisse stocker plusieurs valeurs dans le temps va être extrêmement utile dans de nombreuses situations.  
Vous vous souvenez de l’horloge créée au début de ce cours ? Pour créer cette horloge et pour afficher l’heure actuelle, il a fallu utiliser une variable.  

Le principe est ici le suivant : je vais chercher l’heure actuelle toutes les secondes et je stocke cette heure dans ma variable que j’affiche ensuite.  

A ce propos, il existe de nombreux moyens d’afficher le contenu d’une variable en JavaScript, que ce soit via la console JavaScript du navigateur, en utilisant une fonction `alert()` ou encore en insérant le contenu de notre variable au sein du contenu HTML de notre page.  
Nous verrons chacune de ces méthodes en détail en temps et en heure, au fil de ce cours.  

>**Navigation**  
>
> - [Suivant](types-de-donnees.md#les-types-de-donnees-en-javascript)
> - [Précédent](../introduction/presentation.md#cest-parti-pour-javascript)  
> - [Menu principal](../menu.md#menu-general)
