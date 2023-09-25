---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 22/04/2022  

---
# **Creation d’un objet JavaScript litteral et manipulation de ses membres**

>**Navigation**  
>
> - [Suivant](./definition-creation-constructeur.md#definition-et-creation-dun-constructeur-dobjets-en-javascript)
> - [Précédent](../programmation-orientee-objet/presentation.md#introduction-a-loriente-objet-en-javascript)
> - [Menu principal](../menu.md#1-introduction-au-javascript)

Un objet est un ensemble cohérent de propriétés et de méthodes.  
Le JavaScript dispose d’objets natifs (objets prédéfinis) qui possèdent des propriétés et des méthodes qu’on va pouvoir directement utiliser et nous permet également de définir nos propres objets.  
Nous allons passer en revue certains objets natifs qu’il convient de connaitre dans les prochaines leçons.  
Avant tout, il est important de bien comprendre comment fonctionnent les objets et de savoir comment créer et manipuler un objet.  

Nous pouvons créer des objets de 4 manières différentes en JavaScript. On va pouvoir :  

- Créer un objet littéral ;
- Utiliser le constructeur `Object()` ;
- Utiliser une fonction constructeur personnalisée ;
- Utiliser la méthode `create()`.  

Ces différents moyens de procéder vont être utilisés dans des contextes différents, selon ce que l’on souhaite réaliser.  

Dans cette leçon, nous allons commencer par créer un objet littéral et nous en servir pour expliquer en détail de quoi est composé un objet et comment manipuler ses membres.  
Nous verrons les autres techniques de création d’objet dans la leçon suivante.  

## **Création d’un objet littéral**

Dans la leçon Précédente, nous avons créé un premier objet nommé utilisateur.  
Pour être tout à fait précis, nous avons créé un objet littéral :  
`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Création d’un objet littéral</title>
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
/* "alain" est une variable qui contient un objet. Par abus de langage,
on dira que notre variable EST un objet */
let alain = {
    // nom, age et mail sont des propriétés de l'objet "alain"
    nom : ['Alain', 'ORLUK'],
    age : 50,
    mail : 'alain.orluk@id-formation.fr',
    
    // Bonjour est une méthode de l'objet alain
    bonjour: function(){
        alert('Bonjour, je suis ' + this.nom[0] + ', j\'ai ' + this.age + ' ans');
    }
};
```

On parle ici d’objet « littéral » car nous avons défini chacune de ses propriétés et de ses méthodes lors de la création, c’est-à-dire littéralement.  

Pour créer un objet littéral, on utilise une syntaxe utilisant une paire d’accolades `{ … }` qui indique au JavaScript que nous créons un objet.  

Nos objets vont généralement être stockés dans des variables.  
Par abus de langage, on confondra alors souvent la variable et l’objet et on parlera donc « d’objet » pour faire référence à notre variable stockant une valeur de type objet.  
Dans l’exemple ci-dessus, on dira donc qu’on a créé un objet nommé « utilisateur ».  

Un objet est composé de différents couples de « nom : valeur » qu’on appelle membres.  
Chaque nom d’un membre doit être séparé de sa valeur par un caractère deux-points : et les différents membres d’un objet doivent être séparés les uns des autres par une virgule.  

La partie « nom » de chaque membre suit les mêmes règles que le nommage d’une variable.  
La partie valeur d’un membre peut être n’importe quel type de valeur : une chaine de caractère, un nombre, une fonction, un tableau ou même un autre objet littéral.  

Les membres d’un objet qui ne servent qu’à stocker des données sont appelés des propriétés tandis que ceux qui manipulent des données (c’est-à-dire ceux qui contiennent des fonctions en valeur) sont appelés des méthodes.  

## **Utiliser le point pour accéder aux membres d’un objet, les modifier ou en définir de nouveaux**

Pour accéder aux propriétés et aux méthodes d’un objet, on utilise le caractère point `.` qu’on appelle également un accesseur. On va ici commencer par préciser le nom de l’objet puis l’accesseur puis enfin le membre auquel on souhaite accéder.

Cet accesseur va nous permettre non seulement d’accéder aux valeurs de nos différents membres mais également de modifier ces valeurs. Regardez plutôt le code ci-dessous :  
`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Utiliser le point pour accéder aux membres d’un objet, les modifier ou en définir de nouveaux</title>
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
/* "alain" est une variable qui contient un objet. Par abus de langage,
on dira que notre variable EST un objet */
let alain = {
    // nom, age et mail sont des propriétés de l'objet "alain"
    nom : ['Alain', 'ORLUK'],
    age : 50,
    mail : 'alain.orluk@id-formation.fr',
    
    // Bonjour est une méthode de l'objet alain
    bonjour: function(){
        alert('Bonjour, je suis ' + this.nom[0] + ', j\'ai ' + this.age + ' ans');
    }
};

/* On accède aux propriétés "nom" et "age" de "alain" et on affiche leur valeur
dans nos deux paragraphes p id='p1' et p id='p2'.
A noter : "document" est en fait aussi un objet, getElementById() une méthode
et innerHTML une propriété de l'API "DOM"! */
document.getElementById('p1').innerHTML = 'Nom : ' + alain.nom;
document.getElementById('p2').innerHTML = 'Age : ' + alain.age;

// On modifie la valeur de la propriété "age" de "alain"
alain.age = 51;

document.getElementById('p3').innerHTML = 'Nouvel âge : ' + alain.age;

/* On accède à la méthode "bonjour" de l'objet "alain" qu'on exécute de la même
même façon qu'une fonction anonyme stockée dans une variable */

alain.bonjour();
```

Ici, on commence par accéder aux propriétés nom et age de notre objet `alain` en utilisant les notations `alain.nom` et `alain.age`. Cela nous permet de récupérer les valeurs des propriétés.  

Dans le cas présent, on se contente d’afficher ces valeurs au sein de deux paragraphes de notre page HTML.  
Pour cela, on utilise la notation `document.getElementById('{p1,p2}').innerHTML` qu’on a déjà vu précédemment dans ce cours.  

A ce niveau, vous devriez avoir remarqué qu’on utilise également des points pour accéder au contenu HTML de nos paragraphes et y placer les données souhaitées.   En fait, c’est tout simplement parce que `document` est également un objet prédéfini d’une API (interface de programmation) appelée « DOM » (Document Object Model) que nous allons étudier dans la partie suivante.  

Cet objet possède notamment une méthode `getElementById()` qui nous permet d’accéder à un élément HTML en fonction de son attribut `id` et une propriété `innerHTML` qui nous permet d’insérer du contenu entre les balises d’un élément HTML.  
Ici, on accède donc à nos paragraphes possédant les `id='p1'` et `id='p2'` et on place la valeur des propriétés `nom` et `age` de l’objet `alain` entre les balises de ceux-ci.  

En dessous, on utilise notre accesseur avec l’opérateur d’affectation = pour cette fois-ci modifier la valeur de la propriété `age` de notre objet `alain`, et on affiche ensuite la nouvelle valeur pour bien montrer que la propriété a été modifiée.  

Finalement, on utilise notre accesseur pour exécuter la méthode `bonjour()` de l’objet `alain`.  
Pour faire cela, on procède de la même façon que pour exécuter une fonction anonyme placée dans une variable.  

Enfin, on va encore pouvoir utiliser notre accesseur pour créer de nouveaux membres pour notre objet. Pour cela, il suffit de définir un nouveau nom de membre et de lui passer une valeur comme cela :  
`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Utiliser le point pour accéder aux membres d’un objet, les modifier ou en définir de nouveaux</title>
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
/* "alain" est une variable qui contient un objet. Par abus de langage,
on dira que notre variable EST un objet */
let alain = {
    //nom, age et mail sont des propriétés de l'objet "alain"
    nom : ['Alain', 'ORLUK'],
    age : 50,
    mail : 'alain.orluk@id-formation.fr',
    
    // Bonjour est une méthode de l'objet alain
    bonjour: function(){
        alert('Bonjour, je suis ' + this.nom[0] + ', j\'ai ' + this.age + ' ans');
    }
};

alain.taille = 180;
alain.prez = function(){
    alert('Bonjour, je suis ' + this.nom[0] +
          ', j\'ai ' + this.age + ' ans et je mesure ' + this.taille + 'cm');}

alain.prez();
```

Ici, on ajoute une propriété `taille` et une méthode `prez()` à notre objet `alain`.  
On invoque ensuite notre nouvelle méthode pour s’assurer qu’elle fonctionne bien.  

## **Utiliser les crochets pour accéder aux propriétés d’un objet, les modifier ou en définir de nouvelles**

On va également pouvoir utiliser des crochets plutôt que le point pour accéder aux propriétés de nos objets, mettre à jour leur valeur ou en définir de nouvelles. Cela ne va en revanche pas fonctionner pour les méthodes.  

Les crochets vont être particulièrement utiles avec les valeurs de type tableau (qui sont des objets particuliers qu’on étudiera plus tard dans ce cours) puisqu’ils vont nous permettre d’accéder à une valeur en particulier dans notre tableau.  

Dans le code Précédent, la valeur de la propriété `nom` par exemple est un tableau. Notez qu’on utilise également ces mêmes crochets pour définir un tableau (encore une fois, nous reviendrons plus tard là-dessus).  

En programmation, un tableau correspond à un ensemble de valeurs auxquelles vont être associées des index ou des clés. On appelle l’ensemble clé + valeur un élément du tableau.  

La plupart des langages de programmation gèrent deux types de tableaux : les tableaux numérotés et les tableaux associatifs.  
Le principe des tableaux numérotés est que les clés associées aux valeurs vont être des chiffres.  
Par défaut, la première valeur va recevoir la clé 0, la deuxième valeur sera associée à la clé 1 et etc.  
Les tableaux associatifs vont eux avoir des clés textuelles qui vont être définies manuellement.  

Pour accéder à une valeur en particulier dans un tableau, on utilise la syntaxe « nom_du_tableau[clé] ».  

Le JavaScript est un langage qui ne supporte que l’utilisation de tableaux numérotés.  
Dans le cas présent, notre propriété `nom` contient un tableau qui possède deux éléments : la valeur du premier élément est « Pierre » et la clé associée par défaut est 0.  
La valeur du deuxième élément est « ORLUK » est la clé associée par défaut est 1.  

Ainsi, pour accéder à la valeur « Alain » de notre propriété `nom` de l’objet `alain`, on écrira `alain.nom[0]`.  
Pour accéder à la valeur « ORLUK », on écrira `alain.nom[1]`.  

Comme je l’ai dit plus haut, on va pouvoir en JavaScript utiliser cette même syntaxe pour accéder à n’importe quelle propriété d’un objet, pour modifier la valeur d’une propriété ou encore pour définir de nouvelles propriétés.  

Pour faire cela, on va faire « comme si » notre objet était un tableau associatif composés d’éléments dont les clés sont les noms des propriétés et les valeurs sont les valeurs associées.  

Pour accéder à la valeur complète de la propriété `nom` de l’objet `alain`, on pourra ainsi écrire `alain['nom']`.  
Pour accéder à la valeur de `mail`, on écrira `alain['mail']`. Si on souhaite accéder à la valeur du premier élément de notre tableau `nom`, on pourra encore écrire `alain['nom'][0]`.  
`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Utiliser le point pour accéder aux membres d’un objet, les modifier ou en définir de nouveaux</title>
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
/* "alain" est une variable qui contient un objet. Par abus de langage,
on dira que notre variable EST un objet */
let alain = {
    // nom, age et mail sont des propriétés de l'objet "alain"
    nom : ['Alain', 'ORLUK'],
    age : 50,
    mail : 'alain.orluk@id-formation.fr',
    
    // Bonjour est une méthode de l'objet alain
    bonjour: function(){
        alert('Bonjour, je suis ' + this.nom[0] + ', j\'ai ' + this.age + ' ans');
    }
};

document.getElementById('p1').innerHTML = 'Nom complet : ' + alain['nom'];
document.getElementById('p2').innerHTML = 'Prénom : ' + alain['nom'][0];
alain['age'] = 51;
document.getElementById('p3').innerHTML = 'Age : ' + alain['age'];
```

Notez que le fait qu’on puisse utiliser ce genre d’écriture fait qu’on a souvent tendance à comparer les objets en JavaScript à des tableaux associatifs justement.  

Une nouvelle fois, nous étudierons les tableaux plus en détail dans une prochaine leçon. Pour le moment, concentrez-vous sur les façons d’accéder aux membres d’un objet et de les modifier.  

## **L’utilisation du mot-clé this**

Il nous reste une dernière partie de notre objet à définir : le mot-clé `this` qu’on utilise au sein de notre méthode `bonjour()`.  

Le mot-clé `this` est un mot-clé qui apparait fréquemment dans les langages orientés objets. Dans le cas présent, il sert à faire référence à l’objet qui est couramment manipulé.  

Pour le dire très simplement, c’est un prête nom qui va être remplacé par le nom de l’objet actuellement utilisé lorsqu’on souhaite accéder à des membres de cet objet.  

En l’occurrence, lorsqu’on écrit `alain.bonjour()`, le mot-clé `this` va être remplacé par `alain`.  

Quel intérêt d’utiliser `this` plutôt que directement `alain` ? Dans le cas de la création d’un objet littéral, il n’y en a strictement aucun.  

Cependant, vous allez voir qu’il va vite devenir indispensable d’utiliser `this` dès qu’on va commencer à créer des objets à la chaine de façon dynamique en utilisant par exemple un constructeur.  
Nous allons illustrer tout cela dès la prochaine leçon !  

>**Navigation**  
>
> - [Suivant](./definition-creation-constructeur.md#definition-et-creation-dun-constructeur-dobjets-en-javascript)
> - [Précédent](../programmation-orientee-objet/presentation.md#introduction-a-loriente-objet-en-javascript)
> - [Menu principal](../menu.md#1-introduction-au-javascript)
