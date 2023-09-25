---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 22/04/2022  

---
# **Les conditions**

>**Navigation**  
>
> - [Suivant](operateurs-logiques.md#operateurs-logiques-precedence-et-regles-dassociativite-des-operateurs-en-javascript)
> - [Précédent](../structures-de-controle/structures-controle-conditions-et-operateurs-comparaison.md#structures-de-controle-conditions-et-operateurs-de-comparaison-javascript)
> - [Menu principal](../menu.md#1-introduction-au-javascript)

Maintenant que nous savons utiliser les opérateurs de comparaison, nous allons pouvoir créer nos premières structures conditionnelles ou plus simplement « conditions ».  
Nous allons ici nous concentrer sur les structures de contrôle conditionnelles `if`, `if…else` et `if… else if… else`.  

## **La condition if en JavaScript**

La structure de contrôle conditionnelle `if` est présente dans l’ensemble des langages de programmation utilisant les structures de contrôle et notamment en JavaScript.  

La condition `if` est l’une des conditions les plus utilisées et est également la plus simple à appréhender puisqu’elle va juste nous permettre d’exécuter un bloc de code si et seulement si le résultat d’un test vaut true.  

Créons immédiatement nos premières conditions if :  
`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>La condition if en JavaScript</title>
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
let x = 4;
let y = 0;

if (x > 1) {
    alert('x contient une valeur strictement supérieure à 1');
}

if (x == y) {
    alert('x et y contiennent la même valeur');
}

if (y) {
    alert('La valeur de y est évaluée à true');
}
```

Ici, nous créons trois conditions `if`.  
La comparaison (ou le « test ») de la première condition `if` est évaluée à `true` tandis que celle de la deuxième et de la troisième condition sont évaluées à `false`.  
Expliquons en détail de code.  

Dans notre première condition, le résultat de la comparaison renvoyé par le JavaScript est `true` puisque notre variable `let x` stocke le chiffre 4 qui est bien supérieur à 1.  
Le code dans la condition est alors exécuté : une boite d’alerte s’ouvre indiquant « la valeur de x est supérieure à 1 ».  

Dans notre deuxième condition, la comparaison est cette fois-ci évaluée à `false` car la valeur contenue dans `let x` n’est pas égale en valeur à la valeur contenue dans `let y`.  
Le code contenu dans la condition ne sera donc pas lu ni exécuté.  

Le code de notre troisième condition est un peu plus complexe à comprendre.  
En effet, ici, on n’effectue pas de comparaison explicite.  
Simplement, vous devez savoir que tout test d’une condition va être évalué dans un contexte booléen.  

Cela signifie que quoi qu’on passe en test d’une condition, le JavaScript renverra `true` ou `false`.  
Dans le cas où on ne passe qu’une valeur (ou qu’une variable), le JavaScript va donc l’évaluer et renvoyer `true` ou `false`.  

Ici, vous devez savoir que toute valeur évaluée par le JavaScript dans un contexte booléen va être évaluée à `true` à l’exception des valeurs suivantes qui vont être évaluées à `false` :

- Le booléen `false` ;
- La valeur 0 ;
- Une chaine de caractères vide ;
- La valeur `null` ;
- La valeur `undefined` ;
- La valeur `NaN` (« Not a Number » = « n’est pas un nombre »).  

La variable `let y` stocke ici la valeur 0 qui est donc évaluée à `false` et le code dans la condition `if` n’est donc pas exécuté.  

## **Inverser la valeur logique d’un test**

Dans les exemples ci-dessus, le code placé dans notre condition n’est exécuté que si le résultat de la comparaison est `true`.  

Dans certaines situations, nous préférerons créer nos conditions de telle sorte à ce que le code dans la condition soit exécuté si le résultat de la comparaison est `false`.  

Nous allons pouvoir faire cela de deux manières : soit en utilisant l’opérateur logique inverse ! que nous étudierons dans la leçon suivante, soit en comparant explicitement le résultat de notre comparaison à `false`.  

Pour inverser la valeur logique d’un test, c’est-à-dire pour exécuter le code de la condition uniquement lorsque notre première comparaison est évaluée à `false`, il suffit donc de comparer le résultat de cette première comparaison à la valeur `false`.  

Si notre première comparaison n’est pas vérifiée et est évaluée à `false`, alors le test de notre condition va devenir `if(false == false)` ce qui va être finalement évalué à `true` et donc le code de notre condition va bien être exécuté !  

Ici, je vous conseille d’utiliser les parenthèses pour être certain de l’ordre dans lequel les différentes opérations vont se faire.  
Cela évite d’avoir à se soucier de l’ordre de traitement des différents opérateurs.  
En effet, en utilisant les parenthèses, on peut « forcer » l’ordre des opérations afin que la comparaison de base se fasse bien en premier pour ensuite pouvoir comparer son résultat à `false`.  
`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Inverser la valeur logique d’un test</title>
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
let x = 4;
let y = 0;

if ((x > 1) == false) {
    alert('x contient une valeur inférieure à 1');
}

if ((x == y) == false) {
    alert('x et y ne contiennent pas la même valeur');
}

if (y == false) {
    alert('La valeur de y est évaluée à false');
}
```

Dans ces exemples, le JavaScript commence par évaluer les comparaisons entre parenthèses et renvoie `true` ou `false`.  
Ensuite, on compare le résultat renvoyé par JavaScript à `false`.  
Dans le cas où JavaScript a évalué la comparaison de base à false, on a donc `false == false` ce qui est évalué à `true` puisque c’est bien le cas et on exécute le code de la condition.  

Utiliser ce genre de structure nous permet donc d’inverser la valeur logique de nos comparaisons de base et d’exécuter le code de nos conditions uniquement lorsque la comparaison de départ est évaluée à `false`, ce qui va pouvoir être intéressant dans de nombreux cas.  

## **La condition if…else en JavaScript**

La condition if est une structure conditionnelle limitée par définition puisqu’elle ne nous permet d’exécuter un bloc de code que dans le cas où le résultat d’un test est évalué à `true` mais elle ne nous offre aucun support dans le cas contraire.  

La structure conditionnelle `if…else` (« si… sinon » en français) va être plus complète que la condition `if` puisqu’elle va nous permettre d’exécuter un premier bloc de code si un test renvoie `true` ou un autre bloc de code dans le cas contraire.  
`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>La condition if…else</title>
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
let x = 0.5;

if (x > 1) {
    alert('x contient une valeur strictement supérieure à 1');
} else {
    alert('x contient une valeur inférieure ou égale à 1');
}
```

Notez la syntaxe de la condition `if…else` : on place notre comparaison et on effectue notre test dans le `if` mais dans aucun cas on ne mentionne de test dans le `else`.  

En effet, la structure `else` est une structure qui a été créée pour prendre en charge tous les cas non gérés précédemment.  
Ainsi, on ne précisera jamais de condition au sein d’un `else` puisque par défaut cette structure prend en charge tous les autres cas (tous les cas non gérés par le `if` ici).  

Si le test de notre condition est validé, le code dans le `if` va s’exécuter et le code dans le `else` va alors être ignoré.  

Si au contraire le test n’est pas validé alors le code dans le `if` va être ignoré et c’est le code dans le `else` qui va être exécuté.  

## **La condition if…else if…else en JavaScript**

La condition `if…else if…else` (« si…sinon si…sinon ») est une structure conditionnelle encore plus complète que la condition `if…else` puisqu’elle va nous permettre cette fois-ci de générer et de prendre en charge autant de cas que l’on souhaite.  

En effet, nous allons pouvoir écrire autant de `else if` que l’on veut dans notre condition `if…else if…else` et chaque `else if` va posséder son propre test.  

`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>La condition if…else if…else</title>
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
let x = 0.5;

if (x > 1) {
    alert('x contient une valeur strictement supérieure à 1');
} else if (x == 1) {
    alert('x contient la valeur 1');
} else {
    alert('x contient une valeur strictement inférieure à 1');
}
```

Comme vous pouvez le constater, les `else if` occupent un rôle similaire au `if` de départ puisque chacun d’entre eux va posséder son propre test (qui est obligatoire).  

Notez qu’on devra toujours obligatoirement terminer notre condition `if…else if…else` avec un `else` qui servira à gérer toutes les issues (ou les cas) non pris en charge par le `if` ou par les `else if`.  

Notez également que dans le cas où plusieurs `else if` possèdent un test qui va être évalué à `true`, seul le code du premier `else if` rencontré sera exécuté.  

En effet, dès qu’un test va être validé, le JavaScript va ignorer les tests suivants.  
Il va donc falloir faire bien attention à l’ordre des `else if` lors de l’écriture d’une condition pour obtenir le résultat souhaité.  
Regardez plutôt l’exemple suivant :
`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>La condition if…else if…else</title>
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
let x = -10;

if (x > 1) {
    alert('x contient une valeur strictement supérieure à 1');
} else if (x == 1) {
    alert('x contient la valeur 1');
} else if (x < 1) {
    alert('x contient une valeur strictement inférieure à 1');
} else if (x < 0) {
    alert('x contient une valeur strictement inférieure à 0');
} else if (x < -2) {
    alert('x contient une valeur strictement inférieure à -2');
} else {
    alert('La valeur de x n\'a pas pu être comparée à un nombre');
}
```

Ici, notre variable `let x` stocke la valeur -10.  
Ainsi, les tests `x < 1`, `x < 0` et `x < -2` sont validés.  
Cependant, dans une condition JavaScript, c’est la première comparaison rencontrée validée qui va être retenue et les autres tests en dessous vont être ignorés.  

>**Navigation**  
>
> - [Suivant](operateurs-logiques.md#operateurs-logiques-precedence-et-regles-dassociativite-des-operateurs-en-javascript)
> - [Précédent](../structures-de-controle/structures-controle-conditions-et-operateurs-comparaison.md#structures-de-controle-conditions-et-operateurs-de-comparaison-javascript)
> - [Menu principal](../menu.md#1-introduction-au-javascript)
