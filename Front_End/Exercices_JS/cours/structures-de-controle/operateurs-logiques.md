---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 22/04/2022  

---
# **Operateurs logiques, precedence et regles d’associativite des operateurs en JavaScript**

>**Navigation**  
>
> - [Suivant](operateur-ternaire.md#utiliser-loperateur-ternaire-pour-ecrire-des-conditions-javascript-condensees)
> - [Précédent](conditions.md#les-conditions)
> - [Menu principal](../menu.md#1-introduction-au-javascript)

Dans cette leçon, nous allons découvrir et apprendre à utiliser un nouveau type d’opérateurs qui sont les opérateurs logiques.  
Ce type d’opérateurs va nous permettre d’effectuer plusieurs comparaisons dans nos conditions ou d’inverser la valeur logique du résultat d’un test.  
Nous parlerons également de précédence et d’associativité des opérateurs, c’est-à-dire de l’ordre et de la façon selon lesquels le JavaScript va traiter les opérateurs.  

## **Présentation et utilisation des opérateurs logiques**

Les opérateurs logiques sont des opérateurs qui vont principalement être utilisés avec des valeurs booléennes et au sein de conditions.  

Le JavaScript supporte trois opérateurs logiques : l’opérateur logique « ET », l’opérateur logique « OU » et l’opérateur logique « NON ».  

Les opérateurs logiques « ET » et « OU » vont nous permettre d’effectuer plusieurs comparaisons dans une condition. Si on utilise l’opérateur « ET », toutes les comparaisons devront être évaluées à `true` pour que le test global de la condition retourne `true`.  
Dans le cas où n utilise l’opérateur logique « OU », il suffira qu’une seule des comparaisons soit évaluée à `true` pour exécuter le code dans la condition.  

Finalement, l’opérateur logique « NON » va nous permettre d’inverser le résultat logique d’un test dans une condition, ce qui signifie que ce qui a été évalué à `true` renverra false avec l’opérateur logique « NON » et inversement pour ce qui a été évalué à `false`.  

Les opérateurs logiques vont être représentés par les symboles suivants en JavaScript qu’il faudra obligatoirement utiliser :  
|   **Opérateur**   |  **Opérateur**   |                                                                                               |
|       (nom)       |    (symbole)     |                                        **Description**                                        |
|:-----------------:|:----------------:|:----------------------------------------------------------------------------------------------|
|      AND (ET)     |        &&        |                Lorsqu’il est utilisé avec des valeurs booléennes, renvoie `true`              |
|                   |                  |                 si toutes les comparaisons sont évaluées à `true` ou `false` sinon            |
|      OR (OU)      |       \|\|       |                 Lorsqu’il est utilisé avec des valeurs booléennes, renvoie `true`             |
|                   |                  |              si au moins l’une des comparaisons est évaluée à `true` ou `false` sinon         |
|      NO (NON)     |         !        |Renvoie `false` si une comparaison est évaluée à `true` ou renvoie `true` dans le cas contraire|  

Voyons immédiatement comment utiliser les opérateurs logiques pour créer des conditions plus puissantes et plus performantes.  
`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Utilisation des opérateurs logiques</title>
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
let x = 5;
let y = -20;

if (x >= 0 && x <= 10) {
    document.getElementById('p1').innerHTML =
    'x contient une valeur comprise entre 0 et 10';
}

if (y < -10 || y > 10) {
    document.getElementById('p2').innerHTML =
    'y contient une valeur plus petite que -10 ou plus grande que 10';
}

if (!(x <= 2)) {
    document.getElementById('p3').innerHTML =
    'x contient une valeur strictement supérieure à 2';
}
```

Dans le script ci-dessus, on crée trois conditions `if` utilisant chacune un opérateur logique.  
Dans chaque condition, la ligne de code `document.getElementById('p{1-2-3}').innerHTML` nous sert à accéder aux paragraphes de notre page HTML et à insérer dedans le texte renseigné après l’opérateur d’affectation `=`.  

Ne cherchez pas à comprendre cette ligne pour le moment car ce code utilise des concepts que nous verrons plus tard dans ce cours et concentrons-nous plutôt sur nos opérateurs logiques.  

Dans notre première condition, on utilise l’opérateur logique `&&` (ET).  
Pour que le code dans notre condition soit exécuté, il va donc falloir que chaque comparaison renvoie `true`.  
Ici, on teste donc à la fois que la variable `let x` contient un nombre supérieur ou égal à 0 ET inférieur ou égal à 10.  

Notre deuxième condition utilise l’opérateur `||` (OU).  
Ici, il suffit qu’une comparaison soit évaluée à `true` pour valider le test et exécuter le code dans notre condition.  
Il faut donc que la variable `let y` stocke un nombre plus petit que -10 ou plus grand que 10.  

Enfin, notre troisième condition utilise l’opérateur logique `!` appelé « opérateur inverse ».  
Cet opérateur va inverser la valeur logique (une valeur logique est `true` ou `false`) d’un test.  
Ainsi, si notre test renvoie « normalement » `false` et qu’on utilise l’opérateur `!`, la valeur du test sera inversée ce qui signifie qu’on aura `true` au final et que le code dans la condition sera bien exécuté.  

## **Précédence et règles d’associativité des opérateurs**

Vous pouvez noter que j’ai dans ma troisième condition utilisé un deuxième couple de parenthèses pour être sûr que l’opérateur `!` porte bien sur le résultat de la comparaison `x <= 2` et non pas seulement sur `x`, ce qui produirait un résultat différent.  

Pour comprendre cela, il faut savoir que les différents opérateurs de chaque type ont une priorité de traitement différente.  
Cela signifie que le JavaScript va d’abord traiter tel opérateur, puis tel autre et etc.  

Comme vous pouvez vous en douter, cela rend les choses très vite complexes puisqu’il existe de nombreux opérateurs et qu’il va falloir connaitre leur ordre relatif de traitement pour être certain d’obtenir un résultat conforme à nos attentes au final.  

Cet ordre de priorité est appelé « précédence ». En plus de cela, vous devez également savoir que les opérateurs vont avoir différents sens d’associativité.  

L’associativité détermine l’ordre dans lequel des opérateurs de même précédence sont évalués et va pouvoir se faire par la droite ou par la gauche. Une associativité par la gauche signifie qu’on va commencer réaliser les opérations en partant de la gauche et vers la droite tandis qu’une associativité par la droite signifie qu’on va commencer par la droite.  

Dit comme cela, ces concepts doivent vous sembler assez abstrait.  
Pas d’inquiétude, nous allons les illustrer avec des exemples par la suite.  
Avant cela, voici un tableau classant les différents opérateurs vus jusqu’à présent (et quelques autres que nous allons voir très vite) de la plus haute (0) à la plus basse précédence (10), c’est-à-dire selon leur ordre de traitement par le JavaScript.  

Les opérateurs ayant le même chiffre de précédence vont être traités selon la même priorité par le JavaScript et il faudra alors regarder leur associativité qui est également précisée. Lorsque l’associativité est « gauche » dans la tableau ci-dessous, cela signifie de gauche vers la droite et inversement pour « droite ».  

|   **Précédence**   |         **Opérateur (nom)**        | **Opérateur (symbole)**       | **Associativité**|
|:------------------:|:----------------------------------:|:-----------------------------:|:----------------:|
|          0         |            Groupement              |             ( … )             |  Non applicable  |
|          1         |        Post-incrémentation         |             … ++              |  Non applicable  |
|          1         |        Post-décrémentation         |              … —              |  Non applicable  |
|          2         |            NON (logique)           |              ! …              |       Droite     |
|          2         |         Pré-incrémentation         |             ++ …              |       Droite     |
|          2         |         Pré-décrémentation         |              — …              |       Droite     |
|          3         |           Exponentiel              |             … ** …            |       Droite     |
|          3         |          Multiplication            |             … * …             |       Gauche     |
|          3         |             Division               |             … / …             |       Gauche     |
|          3         |              Modulo                |             … % …             |       Gauche     |
|          4         |             Addition               |             … + …             |       Gauche     |
|          4         |           Soustraction             |             … – …             |       Gauche     |
|          5         |         Inférieur strict           |             … < …             |       Gauche     |
|          5         |         Inférieur ou égal          |             … <= …            |       Gauche     |
|          5         |         Supérieur strict           |             … > …             |       Gauche     |
|          5         |         Supérieur ou égal          |             … >= …            |       Gauche     |
|          6         |        Égalité (en valeur)         |             … == …            |       Gauche     |
|          6         |       Inégalité (en valeur)        |             … != …            |       Gauche     |
|          6         |      Egalité (valeur et type)      |             … === …           |       Gauche     |
|          6         |     Inégalité (valeur ou type)     |             … !== …           |       Gauche     |
|          7         |             ET (logique)           |                &&             |       Gauche     |
|          8         |             OU (logique)           |                \|\|           |       Gauche     |
|          9         |               Ternaire             |            … ? … : …          |       Droite     |
|         10         |   Affectation (simple ou combiné)  | … = … , … += … , … -= … , etc.|       Droite     |

Cela fait beaucoup d’informations d’un coup et personne ne vous demande d’apprendre toutes ces règles par cœur immédiatement.  
L’important ici est de de souvenir qu’il existe une Précédente et des règles d’associativité lorsqu’on utilise des opérateurs et d’aller vérifier l’ordre et le sens de traitement des opérateurs en cas de doute.  
Dans tous les cas, vous finirez par connaitre ce tableau à force de pratique.  

## **Créer des conditions puissantes avec plusieurs opérateurs**

Illustrons immédiatement l’importance de la connaissance de la précédence et des règles d’associativité lors de l’utilisation de plusieurs opérateurs en même temps.  
`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Créer des conditions puissantes avec plusieurs opérateurs</title>
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
let x = 15;
let y = -20;
let z = 0;

if (x <= 25 - 15 && x >= 0 || y < 0) {
    document.getElementById('p1').innerHTML =
    'Cette phrase s\'affiche si x contient une valeur comprise entre 0 et 10 OU si y contient une valeur strictement négative (ou si ces deux conditions sont réunies)';
}

if (x <= 25 - 15 && (x >= 0 || y < 0)) {
    document.getElementById('p2').innerHTML =
    'Cette phrase s\'affiche si x contient une valeur inférieure ou égale à 10 ET si soit x contient une valeur supérieure à 0, soit y contient une valeur strictement négative (soit les deux conditions sont réunies)';
}

if (!z == true) {
    document.getElementById('p3').innerHTML =
    'z contient une valeur évaluée à false';
}
```

Dans l’exemple ci-dessus, on crée à nouveau trois conditions `if` en JavaScript avec des tests plus complexes que précédemment.  
Commençons avec la première.  

Notre premier `if` utilise les opérateurs suivants :

- supérieur ou égal ;
- soustraction ;
- ET logique ;
- inférieur ou égal ;
- OU logique ;
- inférieur strict.

En utilisant la précédence, on sait que l’opérateur de soustraction va être traité en premier, puis ensuite ce sera le tour des opérateurs d’infériorité et de supériorité (strict ou égal), puis celui du ET logique et enfin du OU logique.  

Ici, le JavaScript va donc commencer par traiter le bloc `25 - 15` qui est égal à 10.  
Ensuite, le JavaScript traite les trois comparaisons `x <= 10`, `x >= 0` et `y < 0` et renvoie true ou false à chaque fois.

Dans le cas présent, le JavaScript va renvoyer `false` (la valeur de `let x` n’est pas inférieure ou égale à 10), `true` (`let x` contient bien une valeur supérieure ou égale à 0) et `true` (`let y` contient bien une valeur strictement négative).  

L’opérateur `&&` va être traité à son tour. Cet opérateur renvoie `true` si les deux opérandes renvoient `true` et `false` dans le cas contraire.  
Dans le cas présent, on a `false && true`. Le bloc `x <= 25 - 15 && x >= 0` va donc être évalué à `false`.  

Finalement, l’opérateur `||` va être analysé. Pour que cet opérateur renvoie `true`, il suffit que l’un des deux opérandes renvoie `true`.  
Ici, on a `false || true` en se basant sur les résultats trouvés précédemment et c’est donc la valeur `true` qui est finalement renvoyée pour l’entièreté du test et le code dans notre condition est bien exécuté.  

Notre deuxième condition utilise le même test que la première à la différence qu’on utilise cette fois-ci en plus des opérateurs de groupement (les parenthèses). On va ainsi pouvoir forcer le traitement de l’opérateur `||` avant le `&&` et avoir un test totalement différent au final.  

Notre troisième condition utilise l’opérateur logique `NON` et un opérateur d’égalité faible.  
Ici, il faut savoir et bien comprendre que l’opérateur `NON` va être traité avant l’opérateur d’égalité.  
La variable `let z` va donc être évaluée dans un contexte booléen puisqu’on utilise un opérateur logique.  

Ce qu’il se passe ici est que la valeur dans `let x` va être convertie en valeur booléenne.  
Ici, il faut vous rappeler qu’il n’y a que 6 valeurs qui sont égales à false dans un contexte booléen : la valeur `false`, la valeur 0, la valeur `null`, `undefined`, la chaine de caractères vide et `NaN`.  

Dans notre cas, `let z` contient 0 et cette valeur va donc être convertie en `false` dans un contexte booléen.  

L’opérateur logique `NON` va ensuite inverser cette valeur logique et donc `!z` va finalement être égal à `true`.  

Ensuite, on compare la valeur obtenue à 1 avec l’opérateur d’égalité faible.  
On utilise ici un opérateur de comparaison et on compare notre valeur à une valeur arithmétique.  
Le JavaScript va cette fois-ci convertir la valeur logique obtenue (`true`) en valeur arithmétique pour pouvoir la comparer à 1.  
Ici, vous devez savoir que `false` en termes arithmétiques est égal à 0 tandis que `true` vaut 1.  

Au final, on a donc 1 == 1 ce qui renvoie `true` et le code de notre condition est bien exécuté.  

Ce dernier exemple est relativement complexe à comprendre et particulièrement pour les débutants car il faut déjà bien connaitre la précédence des opérateurs et surtout il faut savoir que le JavaScript va convertir des valeurs d’un certain type en un autre type pour effectuer les opérations demandées en fonction des opérateurs (conversion en valeur logique (`true` ou `false`) lorsqu’on utilise des opérateurs logiques ou en valeur arithmétiques lorsqu’on utilise des opérateurs arithmétiques ou lorsqu’on compare une valeur à un nombre).  

>**Navigation**  
>
> - [Suivant](operateur-ternaire.md#utiliser-loperateur-ternaire-pour-ecrire-des-conditions-javascript-condensees)
> - [Précédent](conditions.md#les-conditions)
> - [Menu principal](../menu.md#1-introduction-au-javascript)
