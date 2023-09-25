---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 22/04/2022  

---
# **Les classes en JavaScript**

>**Navigation**  
>
> - [Suivant](../valeurs-primitives-et-objets-globaux/presentation.md#valeurs-primitives-et-objets-predefinis-en-javascript)
> - [Précédent](./constructeur-prototype-heritage.md#constructeur-object-prototype-et-heritage-en-javascript)
> - [Menu principal](../menu.md#1-introduction-au-javascript)

Dans cette nouvelle leçon, nous allons étudier une syntaxe introduite récemment en JavaScript orienté objet utilisant des classes à la manière des langages orientés objet basés sur les classes.  
Pour bien comprendre cette leçon, nous allons déjà étudier les spécificités des langages orientés objet basés sur les classes et découvrir rapidement la syntaxe d’une classe puis discuterons de l’implémentation des classes en JavaScript et de l’impact de celles-ci sur le fond de son modèle objet.  

Courage : c’est la dernière leçon relativement théorique et abstraite. La suite sera beaucoup plus orientée sur la pratique !😉😉  

## **Introduction aux langages orientés objet basés sur les classes**

Il existe deux grands types de langages orientés objet : ceux basés sur les classes, et ceux basés sur les prototypes.  

Le JavaScript est un langage orienté objet basé sur la notion de prototypes, mais la plupart des langages supportant l’orienté objet sont basés sur les classes.  

Le modèle objet des langages orientés objet basés sur les classes est conçu autour de deux entités différentes : les classes et les objets.  

Une classe est un plan général qui va servir à créer des objets similaires. Le code d’une classe va généralement être composé de propriétés et de méthodes dont vont hériter les objets qui vont être créés à partir de la classe.  

Une classe va également contenir une méthode constructeur qui va être appelée automatiquement dès qu’on va créer un objet à partir de notre classe et va nous permettre d’initialiser les propriétés d’un objet.  

Une classe pour les langages basés sur les classes va être plus ou moins l’équivalent d’un constructeur pour les langages prototypés comme le JavaScript.  

Il existe de grandes différences conceptuelles entre les langages orientés objet basés sur les classes et ceux bases sur les prototypes. On peut notamment noter les suivantes :  

- Dans les langages basés sur les classes, tous les objets sont créés en instanciant des classes ;
- Une classe contient toutes les définitions des propriétés et méthodes dont dispose un objet. On ne peut pas ensuite rajouter ou supprimer des membres à un objet dans les langages basés sur les classes ;
- Dans les langages basés sur les classes, l’héritage se fait en définissant des classes mères et des classes étendues ou classes enfants.  

Regardez l’exemple ci-dessous. Ce code est un code PHP, un autre langage informatique très connu.  

```php
<?php
    class Utilisateur {
        //$user_name et $user_age sont des propriétés
        protected $user_name;
        protected $user_age;
        /* $__construct() est une méthode constructeur. Elle va être appelée
        dès qu'on va instancier la classe, c'est-à-dire créer un nouvel
        objet à partir de la classe. Ici, notre constructeur se charge
        d'initialiser les propriétés $user_name et $user_age de l'objet crée
        */
        public function __construct ($nom, $age) {
            $this->user_name = $nom;
            $this->user_age = $age;
        }

        /* Ceci est une autre méthode de la classe qui retourne la valeur de
        la propriété $user_name de l'objet qui l'appelle
        */
        public function getNom () {
            return $this->user_name;
        }
    }

    /* On instancie notre classe avec le mot-clé "new", ce qui crée
    automatiquement un objet qu'on stocke dans la variable $alain.
    Lorsqu'on instancie notre classe, le constructeur est appelé avec les
    valeurs passées ci-dessous en arguments
    */
    $alain = new Utilisateur('Alain', 50);

    // On crée de nouveaux objets à partir de notre classe
    $alex = new Utilisateur('Alex', 28);
    $jean = new Utilsiateur('Jean', 74);
?>
```

Dans ce script, on définit une classe `Utilisateur` avec le mot-clé `class` puis on crée trois objets à partir de cette classe : $alain, $alex et $jean.  

L’idée n’est bien évidemment pas ici de vous apprendre à coder en PHP mais que vous compreniez les différentes approches de l’orienté objet des différents langages.  

Comme vous pouvez le constater, la plupart des éléments se ressemblent. Les éléments commençant par le signe `$` sont des variables (ou des propriétés ici) PHP qui sont l’équivalent des variables JavaScript, `$this` sert à faire référence à l’objet courant comme en JavaScript et les éléments déclarés avec `function` sont des fonctions (ou des méthodes dans le cas présent).  

Ce qui nous intéresse particulièrement ici sont les dernières lignes du script.  
On utilise le mot-clé `new` pour instancier notre classe.  
Lorsqu’on crée une instance d’une classe, un objet est automatiquement créé et cet objet hérite des propriétés et des méthodes de la classe.  

Une fois l’objet créé, la méthode constructeur `__construct()` est appelée et va, dans le cas présent, initialiser les propriétés `$user_name` et `$user_age` de l’objet créé, c’est-à-dire leur affecter des valeurs.  

Ainsi, la propriété `$user_name` de l’objet `$alain` va stocker la valeur « Alain » tandis que la propriété `$user_age` de ce même objet va stocker la valeur « 50 ».  
La propriété `$user_name` de l’objet `$alex` va elle stocker la valeur « Alex » et etc.  

Cela doit vous sembler relativement flou si vous n’avez jamais vu de PHP dans votre vie et c’est tout à fait normal.  
Retenez simplement qu’ici notre classe nous sert de plan pour créer des objets.  
On crée des objets en instanciant la classe et les objets créés à partir de la classe héritent tous des mêmes propriétés (avec des valeurs d’initialisation différentes) et des mêmes méthodes définies dans la classe.  

Dans les langages orientés objet basés sur les classes, on va également pouvoir créer des hiérarchies de classes. En effet, on va pouvoir créer des sous-classes à partir d’une classe principale (on dit qu’on « étend » la classe).  
Les sous-classes vont hériter de toutes les propriétés et méthodes définies dans la classe principale et vont également pouvoir définir de nouvelles méthodes et de nouvelles propriétés.  

## **Les classes en JS**

Si je vous parle de cet autre modèle objet, c’est parce que le JavaScript a également dans ses dernières versions introduit un mot-clé `class` qui va nous permettre de créer des architectures objets similaires à ce qu’on a vu au-dessus.  

Attention cependant : le JavaScript est toujours un langage orienté objet à prototypes et, en tâche de fond, il va convertir nos « classes » selon son modèle prototypes.  

Les classes JavaScript ne sont donc qu’une nouvelle syntaxe qui nous est proposée par le JavaScript notamment pour les gens plus habitués à travailler avec des langages orientés objet basés sur les classes.  

Retenez bien qu’on va pouvoir imiter la forme des langages basés sur les classes mais que dans le fond le JavaScript reste un langage prototypé.  

## **Création d’une classe et d’objets en JavaScript**

Voyons immédiatement comment créer une classe en JavaScript en pratique et les subtilités derrière l’utilisation de celles-ci.  
`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Création d’une classe et d’objets en JavaScript</title>
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
class Ligne{
    /*Nous n'avons pas besoin de préciser "function" devant notre constructeur
     *et nos autres méthodes classe*/
    constructor(nom, longueur){
        this.nom = nom;
        this.longueur = longueur;
    }
    
    taille(){document.getElementById('p1').innerHTML +=
        'Longueur de  ' + this.nom + ' : ' + this.longueur + '<br>'};
}

let geo1 = new Ligne('geo1', 10);
let geo2 = new Ligne('geo2', 5);
geo1.taille();
geo2.taille();
```

On crée une nouvelle classe grâce au mot-clé `class`. Dans notre classe, on définit une méthode `constructor()` qui va nous servir à initialiser les propriétés des objets créés par la suite à partir de la classe avec les valeurs courantes des objets.  

Sous la méthode constructeur, nous allons définir des méthodes de classe auxquelles les objets auront accès.  

Une fois notre définition de classe complète, on va pouvoir créer des objets à partir de celle-ci de la même manière que précédemment, c’est-à-dire en utilisant le mot-clé `new` suivi du nom de la classe.  
On dit qu’on instancie la classe. Dans le cas présent, on crée deux objets `geo1` et `geo2`.  

## **Classes étendues et héritage en JavaScript**

Pour étendre une classe, c’est-à-dire pour créer une classe enfant qui va hériter des propriétés et des méthodes d’une classe parent, nous allons utiliser le mot-clé `extends`.  
`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Classes étendues et héritage en JavaScript</title>
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
    </body>
</html>
```

`main.js`

```js
class Ligne{
    /* Nous n'avons pas besoin de préciser "function" devant notre constructeur
    et nos autres méthodes de classe */
    constructor(nom, longueur){
        this.nom = nom;
        this.longueur = longueur;
    }
    
    taille(){document.getElementById('p1').innerHTML +=
        'Longueur de  ' + this.nom + ' : ' + this.longueur + '<br>'};
}

let geo1 = new Ligne('geo1', 10);
let geo2 = new Ligne('geo2', 5);
geo1.taille();
geo2.taille();

class Rectangle extends Ligne{
    constructor(nom, longueur, largeur){
        super(nom, longueur); // Appelle le constructeur parent
        this.largeur = largeur;
    }
    
    aire(){document.getElementById('p2').innerHTML +=
    'Aire de ' + this.nom + ' : ' + this.longueur * this.largeur + '<br>'};
}

let geo3 = new Rectangle('geo3', 7, 5);
geo3.aire();
geo3.taille();
```

Ici, on crée une classe `Rectangle` qui vient étendre notre classe de base `Ligne` avec la syntaxe `class Rectangle extends Ligne`.  

La chose à savoir ici est que nous devons utiliser le mot-clé `super()` qui permet d’appeler le constructeur parent dans le `constructor()` de notre classe fille afin que les propriétés soient correctement initialisées.  

On peut ensuite créer des objets à partir de notre classe fille. Les objets vont également avoir accès aux propriétés et méthodes de la classe mère.  

Nous pourrions aller plus loin dans l’étude des classes en JavaScript mais, en tant que débutant, je ne pense pas que cela vous soit bénéfique et nous allons donc nous contenter de ce qu’on a vu jusqu’ici.  

## **Conclusion sur l’orienté objet et sur les classes en JavaScript**

Le JavaScript est un langage qui possède un fort potentiel objet.  
En effet, ce langage utilise les objets dans sa syntaxe même et la grande partie des éléments que nous manipulons en JavaScript sont en fait des objets ou vont pouvoir être convertis en objets et traités en tant que tel.  

Le JavaScript est un langage objet basé sur les prototypes. Cela signifie que le JavaScript ne possède qu’un type d’élément : les objets et que tout objet va pouvoir partager ses propriétés avec un autre, c’est-à-dire servir de prototype pour de nouveaux objets.  
L’héritage en JavaScript se fait en remontant la chaine de prototypage.  

Récemment, le JavaScript a introduit une syntaxe utilisant les classes pour son modèle objet.  
Cette syntaxe est copiée sur les langages orientés objets basés sur les classes et nous permet concrètement de mettre en place l’héritage en JavaScript plus simplement.  

Attention cependant : cette syntaxe n’introduit pas un nouveau modèle d’héritage dans JavaScript !  
En arrière-plan, le JavaScript va convertir les classes selon le modèle prototypé.  
Il reste donc essentiel de comprendre le prototypage en JavaScript.  

En plus de la possibilité d’utiliser l’orienté objet pour créer nos propres objets et nos propres chaines de prototypage, le JavaScript possède des objets (constructeurs) prédéfinis ou natifs comme `Object()`, `Array()`, `Function()`, `String()`, `Number()`, etc. dont nous allons pouvoir utiliser les méthodes et les propriétés.  
Nous allons voir comment les utiliser dans la partie suivante.  

>**Navigation**  
>
> - [Suivant](../valeurs-primitives-et-objets-globaux/presentation.md#valeurs-primitives-et-objets-predefinis-en-javascript)
> - [Précédent](./constructeur-prototype-heritage.md#constructeur-object-prototype-et-heritage-en-javascript)
> - [Menu principal](../menu.md#1-introduction-au-javascript)
