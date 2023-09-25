---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 22/04/2022  

---
# **L’instruction switch en JavaScript**

>**Navigation**  
>
> - [Suivant](boucles.md#presentation-des-boucles-et-des-operateurs-dincrementation-et-de-decrementation-en-javascript)
> - [Précédent](operateur-ternaire.md#utiliser-loperateur-ternaire-pour-ecrire-des-conditions-javascript-condensees)  
> - [Menu principal](../menu.md#1-introduction-au-javascript)

Dans cette nouvelle leçon, nous allons nous intéresser à une autre structure de contrôle de base du JavaScript : l’instruction `switch` qu’on va pouvoir utiliser dans certaines situations précises à la place d’une condition `if…else if…else`.  

## **Présentation du switch en JavaScript**

L’instruction `switch` va nous permettre d’exécuter un code en fonction de la valeur d’une variable.  
On va pouvoir gérer autant de situations ou de « cas » que l’on souhaite.  

En cela, l’instruction `switch` représente une alternative à l’utilisation d’un `if…else if…else`.  

Cependant, ces deux types d’instructions ne sont pas strictement équivalentes puisque dans un `switch` chaque cas va être lié à une valeur précise. En effet, l’instruction `switch` ne supporte pas l’utilisation des opérateurs de supériorité ou d’infériorité.  

Dans certaines (rares) situations, il va pouvoir être intéressant d’utiliser un `switch` plutôt qu’un `if…else if…else` car cette instruction peut rendre le code plus clair et légèrement plus rapide dans son exécution.  

Dans tous les cas, il est bon de savoir à quoi ressemble un `switch` puisque c’est une structure de base commune à de nombreux langages de programmation et cela vous permettra donc de pouvoir comprendre certains codes utilisant ce genre de structure.  

## **Syntaxe et exemple utilisation du switch en JavaScript**

La syntaxe d’une instruction `switch` va être différente de celle des conditions vues jusqu’ici.  
Regardez plutôt l’exemple ci-dessous :  
`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Utilisation des structures ternaires</title>
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

switch (x) {
    case 2:
        document.getElementById('p1').innerHTML = 'x stocke la valeur 2';
        break;
    case 5:
        document.getElementById('p1').innerHTML = 'x stocke la valeur 5';
        break;
    case 10:
        document.getElementById('p1').innerHTML = 'x stocke la valeur 10';
        break;
    case 15:
        document.getElementById('p1').innerHTML = 'x stocke la valeur 15';
        break;
    case 20:
        document.getElementById('p1').innerHTML = 'x stocke la valeur 20';
        break;
    default:
        document.getElementById('p1').innerHTML =
        'x ne stocke ni 2, ni 5, ni 10, ni 15 ni 20';
}
```

La première chose à noter ici est qu’on doit fournir une variable sur laquelle on va « switcher ».  

Ensuite, l’instruction `switch` va s’articuler autour de `case` qui sont des « cas » ou des « issues » possibles.  
Si la valeur de notre variable est égale à celle du `case`, alors on exécute le code qui est à l’intérieur.  

Par exemple, le code contenu dans `case 0:` va être exécuté si la valeur contenue dans notre variable est 0, le code contenu dans `case 1:` va être exécuté si la valeur contenue dans notre variable est 1, etc.  

Chaque `case` d’un `switch` doit se terminer par une instruction `break`. Cette instruction indique au JavaScript qu’il doit sortir du `switch`.  

Sans `break`, le JavaScript continuerait à tester les différents autres case du `switch` même si un `case` égal à la valeur de la variable a été trouvé, ce qui ralentirait inutilement le code et pourrait produire des comportements non voulus.  

Enfin, à la fin de chaque `switch`, il convient d’indiquer une instruction `default`.  
Le `default` est l’équivalent du `else` des conditions vues précédemment : il sert à gérer tous les autres cas et son code ne sera exécuté que si aucun case ne correspond à la valeur de la variable.  

Pas la peine d’utiliser une instruction `break` au sein de `default` puisque `default` sera toujours placée en fin de `switch`.  
Si le JavaScript arrive jusqu’au `default`, alors il sortira ensuite naturellement du `switch` puisque celui-ci ne contient plus aucun code après `default`.  

Encore une fois, le `switch` ne présente souvent pas de réel intérêt par rapport à l’utilisation d’une condition classique en dehors du fait qu’utiliser un `switch` peut dans certains cas réduire le temps d’exécution d’un script et que cette structure est parfois plus claire qu’un `if…else if…else` contenant des dizaines de `else if`.  

Pour le moment, je vous conseille tout de même de vous entrainer avec tous les outils que je vous présente.  
Vous pourrez par la suite décider de ne pas utiliser ceci ou cela, mais pour le moment il est essentiel que vous ayez une vue d’ensemble des fonctionnalités de base du JavaScript.  

>**Navigation**  
>
> - [Suivant](boucles.md#presentation-des-boucles-et-des-operateurs-dincrementation-et-de-decrementation-en-javascript)
> - [Précédent](operateur-ternaire.md#utiliser-loperateur-ternaire-pour-ecrire-des-conditions-javascript-condensees)  
> - [Menu principal](../menu.md#1-introduction-au-javascript)
