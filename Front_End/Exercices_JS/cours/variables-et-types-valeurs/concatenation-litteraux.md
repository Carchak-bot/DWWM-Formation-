---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 22/04/2022  

---
# **La concatenation et les litteraux de gabarits en JavaScript**

>**Navigation**  
>
> - [Suivant](constantes.md#les-constantes-en-javascript)  
> - [Précédent](operateurs.md#presentation-des-operateurs-arithmetiques-et-daffectation-javascript)
> - [Menu principal](../menu.md#menu-general)

Dans cette nouvelle leçon, nous allons expliquer en détail ce qu’est la concaténation et comment fonctionne l’opérateur de concaténation qu’on a déjà pu voir dans les leçons Précédentes.  
Nous allons également voir une autre façon d’entourer nos données en JavaScript avec les littéraux de gabarits (appelés en anglais « template literals » ou « template strings »).  

## **La concaténation en JavaScript**

Concaténer signifie littéralement « mettre bout à bout ».  
La concaténation est un mot généralement utilisé pour désigner le fait de rassembler deux chaines de caractères pour en former une nouvelle.  

En JavaScript, l’opérateur de concaténation est le signe +.  
&#9888; Faites bien attention ici : lorsque le signe + est utilisé avec deux nombres, il sert à les additionner.  
Lorsqu’il est utilisé avec autre chose que deux nombres, il sert d’opérateur de concaténation.  

La concaténation va nous permettre de mettre bout-à-bout une chaine de caractères et la valeur d’une variable par exemple.  
Sans opérateur de concaténation, on ne peut pas en effet utiliser une chaine de caractères et une variable côté à côté car le JavaScript ne saurait pas reconnaitre les différents éléments.  

Notez une chose intéressante relative à la concaténation en JavaScript ici :  
si on utilise l’opérateur + pour concaténer une chaine de caractères puis un nombre, alors le JavaScript va considérer le nombre comme une chaine de caractères.  

Regardez les exemples suivants pour bien comprendre :  
`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>La concaténation en JavaScript</title>
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
let x = 49 + 1; // Le signe "+" est ici un opérateur arithmétique
let y = 'Bonjour';
let z = x + ' ans'; // Le signe "+" est ici un opérateur de concaténation


// Code commenté pour éviter l'apparition intempestive de la boite d'alerte
alert(y + ', je m\'appelle Alain, j\'ai ' + z);

```

Ici, le `+` utilisé dans la valeur de `let x` est un opérateur arithmétique qui sert à additionner car les deux opérandes (les deux éléments situés à gauche et à droite de l’opérateur) sont des nombres.

Dans `let z`, en revanche, le signe `+` est utilisé pour concaténer, c’est-à-dire pour mettre bout à bout la valeur de `let x`, c’est-à-dire 49 et le mot « ans ». La variable `let z` stocke ainsi « 49 ans ».  

Finalement, on utilise des signes + au sein de notre instruction `alert` pour pouvoir afficher côté à côte le contenu de nos variables et du texte.  

Pour être tout à fait précis, vous pouvez retenir que lorsqu’on utilise le signe `+`, le JavaScript va considérer tout ce qui se situe après une chaine de caractères comme des chaines de caractères.  
Ainsi, si on écrit `'un' + 2 + 4` , le JavaScript concaténera en `'un24'` tandis que si on écrit `2 + 4 + 'un'`, la valeur finale sera `'6un'`.  

## **Les littéraux de gabarits**

On a vu plus tôt dans ce cours qu’il fallait en JavaScript toujours entourer nos chaines de caractères (nos textes) avec des apostrophes ou des guillemets droits.  

Il existe en fait une troisième manière introduite récemment d’entourer des chaines de caractères en JavaScript qui va utiliser des accents graves `.  

La grande différence entre l’utilisation d’accents graves ou l’utilisation d’apostrophes ou de guillemets est que toute expression placée entre les accents graves va être interprétée en JavaScript.  
Pour le dire simplement : tout ce qui renvoie une valeur va être remplacé par sa valeur.  

Cela signifie notamment qu’on va pouvoir placer du texte et des variables ensemble sans avoir besoin d’utiliser d’opérateur de concaténation puisque les variables vont être interprétées, c’est-à-dire remplacées par leur valeur.  

Pour que cela fonctionne bien, il va cependant falloir respecter une certaine syntaxe : il va falloir placer les expressions entre `${` et `}`.  

Prenons immédiatement un exemple pour bien comprendre.  
Pour cela, je vais créer deux variables et ensuite utiliser une boite d’alerte pour afficher leur valeur et la somme des valeurs avec un texte.  
On va faire ça de deux façons différentes : en utilisant la concaténation d’abord puis en utilisant les littéraux de gabarits.  

`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Les littéraux de gabarits</title>
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
let x = 5;
let y = 50;

alert('x contient ' + x +
      '\ny contient ' + y +
      '\nLeur somme vaut ' + (x + y));

alert(`x contient ${x}
      y contient ${y}
      Leur somme vaut ${x + y}`);
```

Comme vous pouvez le remarquer, les deux instructions `alert()` renvoient un résultat équivalent.  
Notez également que l’utilisation des littéraux de gabarits conserve les retours à la ligne et les décalages dans le résultat final.  

En effet, dans le premier `alert()` utilisant la concaténation, vous pouvez voir qu’on a utilisé des `\n` qui servent à matérialiser un retour à la ligne en JavaScript.  

Cela n’est pas nécessaire lorsqu’on utilise les littéraux de gabarits : les retours à la ligne et décalages sont conservés. C’est la raison pour laquelle les deuxième et troisième ligne de l’instruction `alert()` sont décalées dans ce cas (l’indentation du code est conservée).  

Les littéraux de gabarits vont donc pouvoir s’avérer utiles lorsqu’on doit manipuler des chaines et des variables voire des fonctions.  

>**Navigation**  
>
> - [Suivant](constantes.md#les-constantes-en-javascript)  
> - [Précédent](operateurs.md#presentation-des-operateurs-arithmetiques-et-daffectation-javascript)
> - [Menu principal](../menu.md#menu-general)
