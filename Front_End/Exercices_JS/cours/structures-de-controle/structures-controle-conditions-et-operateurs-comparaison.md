---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 22/04/2022  

---
# **Structures de controle, conditions et operateurs de comparaison JavaScript**

>**Navigation**  
>
> - [Suivant](conditions.md#les-conditions)
> - [Précédent](../variables-et-types-valeurs/constantes.md#les-constantes-en-javascript)  
> - [Menu principal](../menu.md#1-introduction-au-javascript)

Dans cette nouvelle partie, nous allons étudier et comprendre l’intérêt des structures de contrôle en JavaScript.  
On appelle « structure de contrôle » un ensemble d’instructions qui permet de contrôler l’exécution du code.  

Il existe deux grands types de structure de contrôle de base qu’on retrouve dans la plupart des langages informatiques et notamment en JavaScript :  
les structures de contrôle ***conditionnelles*** (ou plus simplement les « conditions ») et les structures de contrôle ***de boucles*** (ou plus simplement les « boucles »).  

Les conditions vont nous permettre d’exécuter un certain nombre d’instructions si et seulement si une certaine condition est vérifiée.  

Les boucles vont nous permettre d’exécuter un bloc de code en boucle tant qu’une condition donnée est vérifiée.  

## **Présentation des conditions en JavaScript**

Les structures de contrôle conditionnelles (ou plus simplement conditions) vont nous permettre d’exécuter une série d’instructions si une condition donnée est vérifiée ou (éventuellement) une autre série d’instructions si elle ne l’est pas.  

On va donc pouvoir utiliser les conditions pour exécuter différentes actions en fonction de certains paramètres externes.  
Par exemple, on va pouvoir utiliser les conditions pour cacher un élément sur notre site si celui-ci est affiché ou pour l’afficher si celui-ci est caché.  

Les conditions vont ainsi être un passage incontournable pour rendre un site dynamique puisqu’elles vont nous permettre d’exécuter différents codes et ainsi afficher différents résultats selon le contexte.  

Notez que nous allons souvent créer nos conditions en nous appuyant sur le contenu de variables.  
On va ainsi pouvoir exécuter un code si une variable contient telle valeur ou tel autre code si notre variable contient une autre valeur.  

Nous avons accès aux structures conditionnelles suivantes en JavaScript :

- La condition `if` (si) ;
- La condition `if… else` (si… sinon) ;
- La condition `if… elseif… else` (si… sinon si… sinon).  
Nous allons étudier chacune de ces conditions dans la suite de cette partie.  

## **Présentation des opérateurs de comparaison**

Comme je l’ai précisé plus haut, nous allons souvent construire nos conditions autour de variables : selon la valeur d’une variable, nous allons exécuter tel bloc de code ou pas.  

En pratique, nous allons donc comparer la valeur d’une variable à une certaine autre valeur donnée et selon le résultat de la comparaison exécuter un bloc de code ou pas. Pour comparer des valeurs, nous allons devoir utiliser des opérateurs de comparaison.  

On va pouvoir utiliser les opérateurs de comparaison suivants en JavaScript :  
|   **Opérateur**   |                                **Définition**                                 |
|-------------------|:-----------------------------------------------------------------------------:|
|         ==        |                   Permet de tester l’égalité sur les valeurs                  |
|         ===       |           Permet de tester l’égalité en termes de valeurs et de types         |
|         !=        |                   Permet de tester la différence en valeurs                   |
|         <>        |              Permet également de tester la différence en valeurs              |
|         <         |     Permet de tester si une valeur est strictement inférieure à une autre     |
|         >         |     Permet de tester si une valeur est strictement supérieure à une autre     |
|         <=        |       Permet de tester si une valeur est inférieure ou égale à une autre      |
|         >=        |       Permet de tester si une valeur est supérieure ou égale à une autre      |

Certain de ces opérateurs nécessitent certainement une précision de ma part.  
La première chose à bien comprendre ici est que les opérateurs de comparaison ne nous servent pas à indiquer au JavaScript que tel opérande est supérieur, égal, ou inférieure à tel autre opérande.  

Note : les opérandes sont les valeurs de chaque côté d’un opérateur.  

Au contraire, lorsqu’on utilise un opérateur de comparaison on demande au JavaScript de comparer les deux opérandes selon l’opérateur choisi (on parle également « d’évaluer » la comparaison) et de nous dire si cette comparaison est vérifiée (c’est-à-dire si elle est vraie d’un point de vue mathématique) ou pas.  

Dans le cas où la comparaison est vérifiée, le JavaScript renvoie le booléen `true`.  
Dans le cas contraire, le booléen `false` est renvoyé.  

Revenons à nos opérateurs. Tout d’abord, notez que notre « égal » mathématique (l’égalité en termes de valeurs) se traduit en JavaScript par le double signe égal `==`.  

Ensuite, certains d’entre vous doivent certainement se demander ce que signifie le triple égal.  
Lorsqu’on utilise un triple égal `===`, on cherche à effectuer une comparaison non seulement sur la valeur mais également sur le type des deux opérandes.  

Prenons un exemple simple pour illustrer cela.  
Imaginons que l’on possède une variable `let x` dans laquelle on stocke le chiffre 4.  
On veut ensuite comparer la valeur stockée dans notre variable à la chaîne de caractères « 4 ».  

Si on utilise le double signe égal pour effectuer la comparaison, l’égalité va être validée par le JavaScript car celui-ci ne va tester que les valeurs, et 4 est bien égal à « 4 » en termes de valeur.  

En revanche, si on utilise le triple signe égal, alors l’égalité ne va pas être validée car nous comparons un nombre à une chaine de caractères (donc des types différents de valeurs).  

On va suivre exactement le même raisonnement pour les deux opérateurs `!=` et `!==` qui vont nous permettre de tester respectivement la différence en termes de valeurs simplement et la différence en termes de valeurs ou de type.  

## **Utiliser les opérateurs de comparaison**

Pour bien utiliser les opérateurs de comparaison et comprendre tout leur intérêt, vous devez bien vous rappeler que lorsqu’on utilise un opérateur de comparaison, le JavaScript va automatiquement comparer la valeur à gauche de l’opérateur à celle à droite selon l’opérateur de comparaison fourni et renvoyer le booléen `true` si la comparaison est validée ou `false` si elle ne l’est pas.  

Il est essentiel de bien comprendre cela car nos conditions vont s’appuyer sur cette valeur booléenne pour décider si un code doit être exécuté ou pas.  

Prenons immédiatement quelques exemples pour nous familiariser avec ces opérateurs de comparaison et leur traitement en JavaScript :  
`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Utiliser les opérateurs de comparaison</title>
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
let x = 4; // On stocke le chiffre 4 dans x

/* Les comparaisons sont effectuées avant l'affectation.
Le JavaScript va donc commencer par comparer et renvoyer true ou false
et nous allons stocker ce résultat dans nos variables test */
let test1 = x == 4;
let test2 = x === 4;
let test3 = x == '4';
let test4 = x === '4';
let test5 = x != '4';
let test6 = x !== '4';
let test7 = x > 4;
let test8 = x >= 4;
let test9 = x < 4;

alert('Valeur dans x égale à 4 (en valeur) ? : ' + test1 +
      '\nValeur dans x égale à 4 (valeur & type) ? : ' + test2 +
      '\nValeur dans x égale à "4" (en valeur) ? : ' + test3 +
      '\nValeur dans x égale à "4" (valeur & type) ? : ' + test4 +
      '\nValeur dans x différente de "4" (en valeur) ? : ' + test5 +
      '\nValeur dans x différente de "4" (valeur & type) ? : ' + test6 +
      '\nValeur dans x strictement supérieure à 4 ? : ' + test7 +
      '\nValeur dans x supérieure ou égale à 4 ? : ' + test8 +
      '\nValeur dans x strictement inférieure à 4 ? : ' + test9);
```

Ici, on demande au JavaScript d’évaluer plusieurs comparaisons.  
On stocke le résultat renvoyé par JavaScript dans nos différentes variables `let test1`, `let test2`, etc.  

Pour bien comprendre ce code, vous devez avant tout savoir que les opérations vont ici se faire de la droite vers la gauche :  
en effet, l’opération de comparaison est prioritaire sur l’affectation en JavaScript.  
Nos variables « test » vont donc à chaque fois stocker soit le booléen `true` si la comparaison est validée, soit `false` dans le cas contraire.  

On commence donc par comparer la valeur contenue dans `let x` au chiffre 4.  
Dans ce premier test, on compare seulement les valeurs. Comme 4 est bien égal en valeur à 4, le JavaScript valide la comparaison et renvoie `true`.  

On compare ensuite la valeur dans `let x` au chiffre 4 en testant cette fois-ci l’égalité en termes de valeur et de type.  
Comme `let x` contient le chiffre 4, cette comparaison est à nouveau validée.  

Ensuite, on compare la valeur dans `let x` à la chaine de caractères « 4 », d’abord en testant l’égalité en valeur simple puis en testant l’égalité en valeur et en type.  
L’égalité en valeur simple est validée puisque 4 est bien égal à « 4 ».  
En revanche, l’égalité en valeur et en type n’est pas validée puisqu’un nombre n’est pas de même type qu’une chaine de caractères.  

On teste ensuite la différence entre le contenu de `let x` et la chaine de caractères « 4 », d’abord en valeur simple puis en valeur et en type.  Comme on l’a vu plus haut, le chiffre 4 est égal en valeur à la chaine de caractères « 4 » et n’est donc pas différent.  
Pour la première comparaison, le JavaScript renvoie `false` (différence non validée).  
En revanche, le chiffre 4 est bien différent de la chaine de caractères « 4 » en type et donc la comparaison `x !== '4'` est évaluée à `true` par le JavaScript (différence validée dans ce cas).  

Finalement, on compare la valeur de `let x` à 4 en termes de supériorité stricte. Ici, `let x` contient 4 donc la comparaison n’est pas validée puisque 4 n’est pas strictement supérieur à 4.  
De même, 4 n’est pas strictement inférieur à 4. En revanche, 4 est bien supérieur ou égal à 4.  

>**Navigation**  
>
> - [Suivant](conditions.md#les-conditions)
> - [Précédent](constantes.md#les-constantes-en-javascript)  
> - [Menu principal](../menu.md#1-introduction-au-javascript)
