---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 22/04/2022  

---
# **Portee des variables et valeurs de retour des fonctions en JavaScript**

>**Navigation**  
>
> - [Suivant](fonctions-anonymes.md#fonctions-anonymes-auto-invoquees-et-recursives-en-javascript)
> - [Précédent](../fonctions/presentation.md#presentation-des-fonctions-javascript)
> - [Menu principal](../menu.md#1-introduction-au-javascript)

Dans cette nouvelle leçon sur les fonctions JavaScript, nous allons étudier en détail la notion de valeur de retour d’une fonction et allons également discuter d’un concept essentiel à la bonne compréhension du JavaScript et des fonctions : la portée des variables.  

## **La notion de portée des variables : définition**

Il est indispensable de bien comprendre la notion de « portée » des variables lorsqu’on travaille avec les fonctions en JavaScript.  

La « portée » d’une variable désigne l’espace du script dans laquelle elle va être accessible.  
En effet, toutes nos variables ne sont pas automatiquement disponibles à n’importe quel endroit dans un script et on ne va donc pas toujours pouvoir les utiliser.  

En JavaScript, il n’existe que deux espaces de portée différents : l’espace global et l’espace local.  
Pour rester très simple, l’espace global désigne l’entièreté d’un script à l’exception de l’intérieur de nos fonctions. L’espace local désigne, à l’inverse, l’espace dans une fonction.  

Ici, vous devez bien retenir la chose suivante : une variable définie dans l’espace global d’un script va être accessible à travers tout le script, même depuis une fonction.  
En revanche, une variable définie dans une fonction n’est accessible que dans cette même fonction et ne peut pas être manipulée depuis l’espace global du script.  

Cette notion de portée est une notion qu’on retrouve dans de nombreux langages informatiques.  
La portée permet de « protéger » certains codes et certaines variables en les rendant inaccessibles depuis l’extérieur.  
Cela permet de renforcer la sécurité d’un script et sa stabilité dans le cas où on ne voudrait pas qu’un utilisateur puisse modifier la valeur d’une variable depuis l’extérieur pour des raisons de cohérence et de logique du script.  

## **Illustration de la notion de portée des variables en JavaScript : exemple pratique**

Regardez plutôt l’exemple suivant pour bien comprendre la notion de portée des variables et les subtilités liées à la déclaration des variables dans différents espaces de portée.  
`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Les fonctions personnalisées</title>
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
        <p id='p4'></p>
        <p id='p5'></p>
    </body>
</html>
```

`main.js`

```js
// On déclare deux variables globales
let x = 5;
var y = 10;

// On définit une première fonction qui utilise les variables globales
function portee1() {
    document.getElementById('p1').innerHTML =
    'Depuis portee1() : <br>x = ' + x + '<br>y = ' + y;
}
// On définit une deuxième fonction qui définit des variables locales
function portee2() {
    let a = 1;
    var b = 2;
    document.getElementById('p2').innerHTML =
    'Depuis portee2() : <br> a = ' + a + '<br>b = ' + b;
}
// On définit une troisième fonction qui défnit également des variables locales
function portee3() {
    let x = 20;
    var y = 40;
    document.getElementById('p3').innerHTML =
    'Depuis portee3() : <br>x = ' + x + '<br>y = ' + y;
}

// On pense bien à exécuter nos fonctions !
portee1();
portee2();
portee3();

// On tente d'afficher des variables globales puis locales depuis l'espace global
document.getElementById('p4').innerHTML =
'Depuis l\'espace global : <br>x = ' + x + '<br>y = ' + y;

document.getElementById('p5').innerHTML =
'Depuis l\'espace global : <br>a = ' + a + '<br>b = ' + b;
```

Ce code contient de nombreuses choses intéressantes.  
Commencez déjà par noter que les lignes `document.getElementById('{p1,p2,p3,p4,p5}').innerHTML =` servent simplement à placer les résultats dans les paragraphes à l’`id` spécifié.  
Nous reviendrons sur ce code dans une prochaine partie.  

Dans ce script, on commence par déclarer et par initialiser deux variables `let x` et `var y` dans l’espace global de notre script et en utilisant la nouvelle notation avec `let` et l’ancienne avec `var`.  
Pour cette leçon, je vais utiliser à chaque fois les deux notations afin d’illustrer les différences subtiles liées à la portée entre ces deux façons de déclarer des variables.  

Ensuite, nous allons créer trois fonctions qui vont utiliser des variables globales ou définir leurs propres variables.  
Notre fonction `portee1()` utilise par exemple nos variables `let x` et `var y`.  
Comme ces variables ont été déclarées dans l’espace global, elles sont donc accessibles et utilisables dans la totalité du script et notamment dans des fonctions.  

Notre deuxième fonction `portee2()` déclare ses propres variables `let a` et `var b`.  
Ces variables sont donc des variables locales à cette fonction et ne vont pouvoir être utilisées que depuis cette fonction.  

Finalement, notre troisième fonction `portee3()` va également définir deux variables locales `let x` et `var y`.   Ici, la situation est plus complexe que précédemment à comprendre puisqu’on a deux variables let x et deux variables ``var y`` : une définie dans l’espace global et l’autre définie dans la fonction à chaque fois.  

Ici, vous devez bien comprendre que les variables `let x` globale et `let x` locale, bien qu’elles possèdent le même nom, sont deux entités totalement différentes (et de même pour `var y` globale et locale).  

Dans ce cas-là, notre fonction va utiliser les variables définies localement plutôt que celles définies dans l’espace global.  

De plus, comme les variables locales et globales ne sont pas les mêmes entités, elles vont agir indépendamment et ainsi modifier la valeur de `let x` locale ne modifiera pas la valeur de la variable globale et inversement.  

On voit bien cela lorsqu’on tente d’afficher les valeurs de `let x` et de `var y` depuis l’espace global : ici, ce sont les variables globales qui sont utilisées prioritairement et on voit que les valeurs qu’elles contiennent n’ont pas été modifiées par la fonction `portee3()`.  

Finalement, on essaie d’afficher les valeurs de nos variables `let a` et `var b` définies localement depuis l’espace global.  
Comme ces variables sont locales, elles ne sont pas accessibles depuis l’espace global et une erreur va être émise par le JavaScript dans ce cas.  

## **Les différences de portée entre les variables var et let en JavaScript**

Dans l’exemple Précédent, on n’a pu observer aucune différence de comportement entre une variable déclarée avec la syntaxe `let` et une variable déclarée avec `var` en JavaScript.  

Il existe pourtant une différence de portée qu’on va pouvoir observer lors de la définition de variables locales.  
En effet, lorsqu’on utilise la syntaxe `let` pour définir une variable à l’intérieur d’une fonction en JavaScript, la variable va avoir une portée dite « de bloc » : la variable sera accessible dans le bloc dans lequel elle a été définie et dans les blocs que le bloc contient.  

En revanche, en définissant une variable avec le mot-clé `var` dans une fonction, la variable aura une portée élargie puisque cette variable sera alors accessible dans tous les blocs de la fonction.  
Prenons immédiatement un exemple pour bien comprendre cela :  
`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Les différences de portée let & var</title>
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
        <p id='p4'></p>
    </body>
</html>
```

`main.js`

```js
function portee1() {
    let x = 1;
    var y = 2;
    if (true) {
        let x = 5; // Variable différente
        var y = 10; // Même variable qu'au dessus 
        document.getElementById('p1').innerHTML = 'x (dans if) = ' + x;
        document.getElementById('p2').innerHTML = 'y (dans if) = ' + y;
    }
    document.getElementById('p3').innerHTML = 'x (hors if) = ' + x;
    document.getElementById('p4').innerHTML = 'y (hors if) = ' + y;
}

portee1();
```

Ici, on crée une fonction `portee1()` qui contient deux variables `let x` et `var y` ainsi qu’une condition if dont le code va toujours être exécuté car son test est toujours validé (true est toujours évalué… à true).  

Dans la condition, on définit à nouveau deux variables `let x` et `var y` avec des valeurs différentes.  
Ici, la variable `let x` définie va bien représenter une entité différente de celle définie en dehors de la condition.  
En revanche, ça ne va pas être le cas pour `var y` : dans ce cas-là, on redéfinit la même variable !  

Lorsqu’on affiche les valeurs des variables à l’intérieur et en dehors de la boucle, on se rend bien compte que nos deux variables `let x` sont bien différentes et stockent bien des valeurs différentes tandis que notre variable `var y` a juste été redéfinie.  

Je le répète encore une fois ici : aujourd’hui, vous devriez toujours utiliser la nouvelle syntaxe de déclaration des variables en JavaScript utilisant le mot-clé `let`.  
Cependant, je dois vous présenter les variables `var` car de nombreux sites et développeurs continuent de les utiliser.  

Par ailleurs, notez qu’il est considéré comme une mauvaise pratique de déclarer plusieurs variables dans différents espaces en utilisant un même nom car cela peut poser des problèmes évidents de clarté et de lisibilité du code.  
On essaiera donc tant que possible d’éviter de faire cela.  

## **Les valeurs de retour des fonctions**

Un autre concept essentiel à bien comprendre pour maitriser les fonctions en JavaScript est celui de « valeur de retour ».  

Une valeur de retour est une valeur renvoyée par une fonction une fois que celle-ci a terminé son exécution. Une valeur de retour ne doit pas être confondu avec une instruction d’affichage durant l’exécution d’une fonction, comme dans le cas d’une fonction qui possède à un moment donné dans son code un `alert()` par exemple.  

Une valeur de retour est une valeur unique qui va être renvoyée par la fonction après son exécution et qu’on va pouvoir récupérer pour la manipuler dans notre script.  

Certaines fonctions prédéfinies vont renvoyer une valeur de retour tandis que d’autres ne vont pas en renvoyer.  

Il est toujours très utile de savoir si une fonction prédéfinie en JavaScript va renvoyer une valeur ou pas et quel type de valeur la fonction va renvoyer puisque cela va nous permettre de savoir quoi faire après l’exécution de la fonction et d’éventuellement recueillir la valeur de retour pour effectuer différentes opérations.  

Par exemple, certaines fonctions JavaScript renvoient le booléen `true` si elles ont réussi à effectuer leur tâche ou `false` en cas d’échec.  
Dans ce cas, on va pouvoir utiliser une condition autour de ces fonctions pour prendre en charge et donner des instructions en cas d’échec de notre fonction.  

D’autres fonctions vont renvoyer directement le résultat de leur action, comme la fonction `replace()` par exemple qui va renvoyer une nouvelle chaine de caractères avec les remplacements effectués.  

Dans le cas de fonctions personnalisées, nous allons devoir décider si notre fonction va renvoyer une valeur ou pas.  

Pour que nos fonctions renvoient une valeur, il va falloir utiliser une instruction `return`.  
Cette instruction va nous permettre de retourner le résultat de la fonction ou une valeur de notre choix qu’on va ensuite pouvoir soit manipuler immédiatement soit stocker dans une variable pour effectuer différentes opérations avec cette valeur.  

&#9888; Attention cependant : l’instruction `return` met fin à l’exécution d’une fonction, ce qui signifie que toutes les autres opérations qui suivent une instruction `return` dans une fonction seront ignorées.  

Pour cette raison, on fera toujours bien attention à placer l’instruction `return` en fin de fonction, après que toutes les opérations aient été réalisées.  

Regardez le code ci-dessous :  
`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Les différences de portée let & var</title>
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
let prez = 'Bonjour, je suis Alain';

/* On récupère la valeur renvoyée par replace() qu'on place dans une
variable nommée let resultatReplace */
let resultatReplace = prez.replace('jour', 'soir');

// On peut ensuite utiliser ontre vairable pour différentes opérations
document.getElementById('p1').innerHTML = resultatReplace + ' ORLUK';

/* La fonction div() accepte deux nombres en arguments et retourne le résultat
de la division de l'un par l'autre ou le message "Divison par 0 impossible"
si le deuxième nombre est égal à 0 */
function div(a, b) {
    if (b == 0) {
        return 'Divison par 0 impossible';
    } else {
        return a / b;
        alert('Ce message ne s\affiche jamais !');
    }
}

/* La fonction prompt() ouvre une boite de dialogue qui permet à l'utilisateur
d'envoyer des données. Ici, on demande deux nombres à l'utilisateur et on
les place dans les variables nombre1 et nombre2. On les utilise ensuite
comme arguments de notre fonction div() */
let nombre1 = prompt('Entrez un premier nombre');
let nombre2 = prompt('Entrez un deuxième nombre');

/* On exécute notre fonction en lui passant les nombres envoyés en argument et
on affiche le résultat dans le paragraphe p id='p2' */
let resultatDiv = div(nombre1, nombre2);
document.getElementById('p2').innerHTML = resultatDiv;
```

Dans cet exemple, on commence par utiliser la fonction JavaScript prédéfinie `replace()` en utilisant la syntaxe `prez.replace()`.  
Vous n’avez pas besoin de comprendre cette syntaxe pour le moment mais pour faire simple vous pouvez retenir qu’on a besoin d’une chaine de caractères pour exécuter `replace()` et cette chaine de caractères est ici contenue dans notre variable `prez`.  

On sait que `replace()` renvoie une nouvelle chaine de caractères avec les remplacements demandés en valeur de retour.  
Ici, on récupère cette valeur de retour dans une variable `let resultatReplace` qu’on utilise ensuite.  

En dessous, on crée une fonction `div()` dont le rôle est de diviser un nombre par un autre.  
Dans le code de notre fonction, on isole le cas où le dénominateur est égal à 0.  
Dans ce cas-là, notre fonction renvoie la chaine « division par 0 impossible ».  
Dans tous les autres cas, notre fonction renvoie le résultat de la division.  

Notez que j’ai également placé une instruction `alert()` après `return` dans le `else` de ma fonction pour vous montrer qu’elle ne sera jamais exécutée (car elle se situe après l’instruction `return` qui met fin à la fonction.  

Finalement, on demande aux utilisateurs de nous envoyer deux nombres qu’on passera en arguments de notre fonction `div()`. Pour cela, on utilise une fonction `prompt()`.  
Cette fonction ouvre une boite de dialogue et permet aux utilisateurs de nous envoyer des données.  

>**Navigation**  
>
> - [Suivant](fonctions-anonymes.md#fonctions-anonymes-auto-invoquees-et-recursives-en-javascript)
> - [Précédent](../fonctions/presentation.md#presentation-des-fonctions-javascript)
> - [Menu principal](../menu.md#1-introduction-au-javascript)
