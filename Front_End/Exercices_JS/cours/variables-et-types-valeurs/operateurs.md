---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 22/04/2022  

---
# **Presentation des operateurs arithmetiques et d’affectation JavaScript**

>**Navigation**  
>
> - [Suivant](concatenation-litteraux.md#la-concatenation-et-les-litteraux-de-gabarits-en-javascript)  
> - [Précédent](types-de-donnees.md#les-types-de-donnees-en-javascript)
> - [Menu principal](../menu.md#1-introduction-au-javascript)

Dans cette nouvelle leçon, nous allons définir ce qu’est un opérateur, établir la liste des types d’opérateurs disponibles en JavaScript et apprendre à en manipuler certains.  

## **Qu’est-ce qu’un opérateur ?**

Un opérateur est un symbole qui va être utilisé pour effectuer certaines actions notamment sur les variables et leurs valeurs.  

Par exemple, l’opérateur `*` va nous permettre de multiplier les valeurs de deux variables, tandis que l’opérateur `=` va nous permettre d’affecter une valeur à une variable.  

Il existe différents types d’opérateurs qui vont nous servir à réaliser des opérations de types différents. Les plus fréquemment utilisés sont :

- Les opérateurs arithmétiques ;
- Les opérateurs d’affectation / d’assignation ;
- Les opérateurs de comparaison ;
- Les opérateurs d’incrémentation et décrémentation ;
- Les opérateurs logiques ;
- L’opérateur de concaténation ;
- L’opérateur ternaire ;
- L’opérateur virgule.  
Pour le moment, nous allons nous concentrer particulièrement sur les opérateurs arithmétiques et d’affectation ou d’assignation.  
Nous étudierons les autres par la suite lorsqu’on devra les utiliser dans certaines structures JavaScript.  

## **Les opérateurs arithmétiques**

Les opérateurs arithmétiques vont nous permettre d’effectuer toutes sortes d’opérations mathématiques entre les valeurs de type Number contenues dans différentes variables.  

Le fait de pouvoir réaliser des opérations entre variables va être très utile dans de nombreuses situations puisqu’en JavaScript nous allons souvent utiliser des nombres pour traiter des données ou calculer de nouvelles valeurs.  

Nous allons pouvoir utiliser les opérateurs arithmétiques suivants en JavaScript :

| **Opérateurs**   |                 **Nom de l'opération associée**                 |
|------------------|:---------------------------------------------------------------:|
|         +        |                           Addition                              |
|         -        |                         Soustraction                            |
|         *        |                        Multiplication                           |
|         +        |                           Addition                              |
|         /        |                           Division                              |
|         %        |           Modulo (reste d’une division euclidienne)             |
|         **       |Exponentielle (élévation à la puissance d’un nombre par un autre)|

Avant d’utiliser les opérateurs arithmétiques, clarifions ce que sont le modulo et l’exponentielle.  

Le modulo correspond au reste entier d’une division euclidienne.  
Par exemple, lorsqu’on divise 5 par 3, le résultat est 1 et il reste 2 dans le cas d’une division euclidienne. Le reste, 2, correspond justement au modulo.  

L’exponentielle correspond à l’élévation à la puissance d’un nombre par un autre nombre.  
La puissance d’un nombre est le résultat d’une multiplication répétée de ce nombre par lui-même.  
Par exemple, lorsqu’on souhaite calculer 2 à la puissance de 3 (qu’on appelle également « 2 exposant 3 »), on cherche en fait le résultat de 2 multiplié 3 fois par lui-même c’est-à-dire 2*2*2 = 8.  

`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Les opérateurs arithmétiques</title>
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
let x = 2;
let y = 3;
let z = 4;

let a = x + 1; // a stocke 2 + 1 = 3
let b = x + y; // b stocke 2 + 3 = 5
let c = x - y; // c stocke 2 - 3 = -1
let d = x * y; // d stocke 2 * 3 = 6
let e = x / y; // e stocke 2 / 3
let f = 5 % 3; // f stocke le reste de la division euclidienne de 5 par 3
let g = x ** 3; // g stocke 2^3 = 2 * 2 * 2 = 8

/* On affiche les résultats dans une boite d'alerte en utilisant l'opérateur
de concaténation "+". On retourne à la ligne dans l'affichage avec "\n" */
alert('a contient : ' + a +
      '\nb contient : ' + b +
      '\nc contient : ' + c +
      '\nd contient : ' + d +
      '\ne contient : ' + e +
      '\nf contient : ' + f +
      '\ng contient : ' + g);
```

Ici, on effectue quelques opérations mathématiques de base et on affiche les résultats dans une boite d’alerte. Vous pouvez déjà noter qu’on utilise à nouveau le signe `+` pour afficher les résultats mais cette fois ci cet opérateur est utilisé en tant qu’opérateur de concaténation. Nous reparlerons de cela dans la suite de cette leçon. Notez également l’utilisation du `\n` qui sert en JavaScript à retourner à la ligne à la manière d’un élément HTML `br`.  

## **Priorité des calculs et utilisation des parenthèses**

Concernant les règles de calcul, c’est-à-dire l’ordre de priorité des opérations, celui-ci va être le même qu’en mathématiques :  
l’élévation à la puissance va être prioritaire sur les autres opérations, tandis que la multiplication, la division et le modulo vont avoir le même ordre de priorité et être prioritaires sur l’addition et la soustraction qui ont également le même niveau de priorité.  

Si deux opérateurs ont le même ordre de priorité, alors c’est leur sens d’association qui va décider du résultat.  
Pour les opérateurs arithmétiques, le sens d’association correspond à l’ordre de leur écriture à l’exception de l’élévation à la puissance qui sera calculée en partant de la fin.  

Ainsi, si on écrit `let x = 1 – 2 – 3`, la variable `let x` va stocker la valeur -4 (les opérations se font de gauche à droite).  
En revanche, si on écrit `let z = 2 ** 3 ** 2`, la variable `let z` stockera 512 qui correspond à 2 puissance 9 puisqu’on va commencer par calculer 3 ** 2 = 9 dans ce cas.

Nous allons finalement, comme en mathématiques, pouvoir forcer l’ordre de priorité en utilisant des couples de parenthèses pour indiquer qu’une opération doit se faire avant toutes les autres :  
`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Priorité des calculs et utilisation des parenthèses</title>
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
let x = 1 - 2 - 3; // Calcule (1 - 2) - 3 = _& - 3 = - 4
let y = 1 - (2 - 3); // Calcule 1 - (2 - 3) = 1 - (- 1) = 1 + 1 = 2
let z = 2 ** 3 ** 2; // Calcule 3 ** 2 = 3 * 3 = 9 puis 2 ** 9 = 512

/* On affiche les résultats dans une boite d'alerte en utilisant l'opérateur de concaténation "+". On retourne à la ligne dans l'affichage avec "\n" (code à décommenter pour qu'il s'exécute)
alert('x contient : ' + x +
      '\ny contient : ' + y +
      '\nz contient : ' + z);
*/
```

## **Les opérateurs d’affectation**

Les opérateurs d’affectation vont nous permettre, comme leur nom l’indique, d’affecter une certaine valeur à une variable.  

Nous connaissons déjà bien l’opérateur d’affectation le plus utilisé qui est le signe `=`.  
Cependant, vous devez également savoir qu’il existe également des opérateurs « combinés » qui vont effectuer une opération d’un certain type (comme une opération arithmétique par exemple) et affecter en même temps.  

Vous pourrez trouver ci-dessous quelques-uns de ces opérateurs qui vont être le plus utiles pour nous pour le moment :

|   **Opérateur**   |                    **Définition**                 |
|-------------------|:-------------------------------------------------:|
|         +=        |        Additionne puis affecte le résultat        |
|         -=        |        Soustrait puis affecte le résultat         |
|         *=        |        Multiplie puis affecte le résultat         |
|         /=        |         Divise puis affecte le résultat           |
|         %=        |     Calcule le modulo puis affecte le résultat    |

Illustrons immédiatement cela et voyons comment se servir de ces opérateurs :  
`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Les opérateurs d’affectation</title>
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
let x = 2; // x stocke 2
let y = 10; // y stocke 10

/* On ajoute 3 à la valeur stockée précédemment par x (2) puis on
affecte le résultat à x. x stocke désormais 2 + 3 = 5 */
x += 3;

/* On mutiplie la valeur de y (10) par celle de z (5) puis on affecte
le résultat à y. y stocke désormais 10 * 5 = 50 */
y *= x; 

/* Code commenté pour éviter l'apparition intempestive des boites d'alerte. A décommenter
alert('x stocke : ' + x + 'y stocke : ' + y);
*/
```

Ici, vous devez bien comprendre que les opérateurs d’affectation combinés nous permettent d’effectuer deux types d’opérations à la suite.  
Dans l’exemple ci-dessus, on réalise des opérations arithmétiques puis d’affectation.  

Ainsi, l’opérateur `+=` par exemple va nous permettre d’ajouter une valeur à la valeur contenue dans une variable puis d’affecter le résultat dans cette même variable.  
La nouvelle valeur va ainsi écraser la valeur Précédente.  

>**Navigation**  
>
> - [Suivant](concatenation-litteraux.md#la-concatenation-et-les-litteraux-de-gabarits-en-javascript)  
> - [Précédent](types-de-donnees.md#les-types-de-donnees-en-javascript)
> - [Menu principal](../menu.md#1-introduction-au-javascript)
