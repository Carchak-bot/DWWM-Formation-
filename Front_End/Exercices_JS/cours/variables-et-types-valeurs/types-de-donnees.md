---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 22/04/2022  

---
# **Les types de donnees en JavaScript**

>**Navigation**  
>
>- [Suivant](operateurs.md#presentation-des-operateurs-arithmetiques-et-daffectation-javascript)  
>- [Précédent](../variables-et-types-valeurs/variables.md#presentation-des-variables-javascript)
>- [Menu principal](../menu.md#1-introduction-au-javascript)

Les variables JavaScript vont pouvoir stocker différents types de valeurs, comme du texte ou un nombre par exemple.  
Par abus de langage, nous parlerons souvent de « types de variables » JavaScript.  
En JavaScript, contrairement à d’autres langages de programmation, nous n’avons pas besoin de préciser à priori le type de valeur qu’une variable va pouvoir stocker.  
Le JavaScript va en effet automatiquement détecter quel est le type de la valeur stockée dans telle ou telle variable, et nous allons ensuite pouvoir effectuer différentes opérations selon le type de la variable, ce qui va s’avérer très pratique pour nous !  

Une conséquence directe de cela est qu’on va pouvoir stocker différents types de valeurs dans une variable au fil du temps sans se préoccuper d’une quelconque compatibilité.  
Par exemple, une variable va pouvoir stocker une valeur textuelle à un moment dans un script puis un nombre à un autre moment.  

En JavaScript, il existe 7 types de valeurs différents.  
Chaque valeur qu’on va pouvoir créer et manipuler en JavaScript va obligatoirement appartenir à l’un de ces types.  
Ces types sont les suivants :  

- String ou « chaine de caractères » en français ;
- Number ou « nombre » en français ;
- Boolean ou « booléen » en français ;
- Null ou « nul / vide » en français;
- Undefined ou « indéfini » en français ;
- Symbol ou « symbole » en français ;
- Object ou « objet » en français ;

Ce que vous devez bien comprendre ici est que les données vont pouvoir être manipulées différemment en fonction de leur type et qu’il est donc essentiel de les connaitre pour créer des scripts fonctionnels.  

## **Le type chaîne de caractères ou String**

Le premier type de données qu’une variable va pouvoir stocker est le type `String` ou chaîne de caractères.  
Une chaine de caractères est une séquence de caractères, ou ce qu’on appelle communément un texte.  

Notez que toute valeur stockée dans une variable en utilisant des guillemets ou des apostrophes sera considérée comme une chaine de caractères, et ceci même dans le cas où nos caractères sont à priori des chiffres comme "50" par exemple.  

```js
let prenom = "Je m'appelle Alain";
let age = 50;
let age2 = "50";
```

Ici, notre première variable `let prenom` stocke la chaine de caractère «***Je m’appelle Alain***».  
Notre deuxième variable `let age`, quant à elle, stocke le nombre 50. En revanche, notre troisième variable `let age2` stocke la chaine de caractères «***50***» et non pas un nombre.  

En effet, l’utilisation de guillemets ou d’apostrophe fait qu’une valeur est immédiatement considérée comme une chaine de caractères, quelle que soit cette valeur.  

Pour s’en convaincre, on peut utiliser la fonction `typeof` qui nous permet de vérifier le type d’une valeur (éventuellement contenue dans une variable).  On va écrire la valeur à tester juste après cet opérateur et celui-ci va renvoyer le type de la valeur.  

`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Les types de donnéest</title>
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
let prenom = "Je m'appelle Alain";
let age = 50;
let age2 = '50';

document.getElementById('p1').innerHTML = 'Type de prenom : ' + typeof prenom;
document.getElementById('p2').innerHTML = 'Type de age : ' + typeof age;
document.getElementById('p3').innerHTML = 'Type de age2 : ' + typeof age2;
```

Encore une fois, n’essayez pas ici de comprendre tout le script car ça n’a pas d’intérêt pour le moment.  
Ce qui nous intéresse ici sont les résultats renvoyés et comme vous pouvez le constater la variable `let age2` contient bien une valeur considérée comme une chaine.  

Une note pour les plus curieux d’entre vous : vous pouvez retenir que `document.getElementById(id)` nous permet d’accéder à l’élément HTML qui possède l’id précisé.  
Ensuite, `innerHTML` nous permet d’injecter du texte dans l’élément.  
Dans le cas présent, on injecte «Type de … » suivi du type de la variable qui est renvoyé par `typeof`.  

### **Un point sur l’utilisation des guillemets et apostrophes droits et sur l’échappement**

Dans le code au-dessus, vous pouvez également voir que j’ai utilisé des guillemets droits doubles pour entourer la valeur de la variable `let prenom` et des guillemets droits simples ou apostrophes pour entourer la valeur de `let age2`.  

En JavaScript, on va pouvoir utiliser indifféremment des guillemets droits ou des apostrophes pour entourer une chaine de caractères et ces deux méthodes vont être strictement équivalentes à la différence d’autres langages comme le PHP par exemple.  

&#9888; Faites attention cependant à un point : si votre chaine contient un caractère qui est le même que le délimiteur de chaine choisi, il faudra neutraliser ce caractère en l’échappant au moyen d’un antislash ou changer de délimiteur.  

Imaginons par exemple que j’utilise des apostrophes pour délimiter la valeur « je m’appelle Alain » stockée dans `let prenom`.  
Dans ce cas, le JavaScript va par défaut penser que l’apostrophe dans « m’appelle » correspond à la fin de la chaine.  

Pour lui indiquer que cette apostrophe fait partie de la chaine et qu’il ne doit pas être considéré comme le délimiteur de fin, on va « l’échapper », c’est-à-dire neutraliser sa signification spéciale qui est ici « délimiteur de chaine ». Pour cela, il va suffire de faire précéder l’apostrophe en question par un caractère antislash.

Notez que l’antislash est considéré comme le caractère d’échappement dans de nombreux langages informatique. Notez également que si votre chaine contient des apostrophes incurvées ou des guillemets non droits, il ne sera pas nécessaire de les échapper puisque seuls les apostrophes et guillemets droits sont reconnus comme des délimiteurs de chaine par le JavaScript.

Regardez plutôt les exemples suivants pour bien comprendre les différents cas possibles :  

```js
// Délimiteurs non trouvés dans la chaîne = rien à échapper
let a = "Je m'appelle Alain";

// Délimiteurs non trouvés dans la chaîne (apostrophe droit) = rien à échapper
let b = 'Je m’appelle Alain';

// Délimiteurs trouvés dans la chaîne = on échappe le caractère en question
let c = 'Je m\'appelle Alain';

// Délimiteurs non trouvés dans la chaîne = rien à échapper
let d = "Je m'appelle « Alain »";

// Délimiteurs trouvés dans la chaîne = on échappe les caractères en question
let e = "Je m'appelle \"Alain\"";

```

## **Le type nombre ou Number**

Les variables en JavaScript vont également pouvoir stocker des nombres.  
En JavaScript, et contrairement à la majorité des langages, il n’existe qu’un type prédéfini qui va regrouper tous les nombres qu’ils soient positifs, négatifs, entiers ou décimaux (à virgule) et qui est le type `Number`.  

Pour affecter une valeur de type `Number` à une variable, on n’utilise ni guillemet ni apostrophe.  

```js
let x = 10; // x stocke un entier positif
let y = -2; // y stocke un entier négatif
let z = 3.14; // z stocke un nombre décimal positif
```

&#9888; Attention ici : lorsque nous codons nous utilisons toujours des notations anglo-saxonnes, ce qui signifie qu’il faut remplacer nos virgules par des points pour les nombres décimaux.  

## **Le type de données booléen (Boolean)**

Une variable en JavaScript peut encore stocker une valeur de type `Boolean`, c’est-à-dire un booléen.  

Un booléen, en algèbre, est une valeur binaire (soit 0, soit 1).  
En informatique, le type booléen est un type qui ne contient que deux valeurs : les valeurs `true` (vrai) et `false` (faux).  

Ce type de valeur peut sembler plus compliqué à appréhender à première vue.  
Pas d’inquiétude, nous allons souvent l’utiliser par la suite car il va nous être particulièrement utile en valeur de test pour vérifier si le test est validé ou non.  

&#9888;Une nouvelle fois, faites bien attention : pour qu’une variable stocke bien un booléen, il faut lui faire stocker la valeur `true` ou `false`, sans guillemets ou apostrophes car dans le cas contraire le JavaScript considèrera que c’est la chaine de caractères « true » ou « false » qui est stockée et on ne pourra plus effectuer les mêmes opérations avec ces valeurs.  

```js
let vrai = true; // Stocke le booléen true
let faux = false; // Stocke le booléen false

/*  On demande à JavaScript d'évaluer la comparaison "8 > 4".
Comme 8 est bien strictement supérieur à 4, JavaScript renvoie true en résultat.
On stocke ensuite ce résultat (le booléen true) dans la variable avec let resultat*/
let resultat = 8 > 4;
```

Le troisième exemple est un peu plus complexe à comprendre.  
Ici, vous devez comprendre que l’affectation se fait en dernier et que la comparaison est faite avant.  
Lorsqu’on écrit « 8 > 4 », (qui signifie 8 strictement supérieur à 4) on demande au JavaScript d’évaluer cette comparaison.  

Si la comparaison est vérifiée (si elle est vraie), alors JavaScript renvoie le booléen `true`. Dans le cas contraire, il renvoie le booléen `false`. On stocke ensuite le booléen renvoyé dans la variable avec `let resultat`.  

## **Les types de valeurs Null et Undefined**

Les types de valeurs `Null` et `Undefined` sont des types un peu particuliers car ils ne contiennent qu’une valeur chacun : les valeurs `null` et `undefined`.  

La valeur `null` correspond à l’absence de valeur ou du moins à l’absence de valeur connue.  
Pour qu’une variable contienne `null`, il va falloir stocker cette valeur qui représente donc l’absence de valeur de manière explicite.  

La valeur `null` va être utile dans certains cas où on souhaite explicitement indiquer une absence de valeur connue.  
Il va cependant falloir qu’on ait un peu plus d’expérience avec le JavaScript pour montrer de manière pratique l’intérêt de cette valeur.  

La valeur `undefined` correspond à une variable « non définie », c’est-à-dire une variable à laquelle on n’a pas affecté de valeur.  

Cette définition peut vous paraitre similaire à celle de `null` et pourtant ces deux valeurs ont une signification différente.  

Si on déclare une variable sans lui attribuer de valeur, alors son type sera `Undefined`.  
Si on déclare une variable et qu’on lui passe `null`, alors son type sera `Object`.  

`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Les types de valeurs Null et Undefined</title>
        <meta charset="utf-8">
        <meta name="viewport"
          content="width=device-width, initial-scale=1, user-scalable=no">
        <link rel="stylesheet" href="cours.css">
        <script src='cours.js' async></script>
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
let nul = null;
let ind;

document.getElementById('p1').innerHTML = 'Type de nul : ' + typeof nul;
document.getElementById('p2').innerHTML = 'Type de ind : ' + typeof ind;
```

Le type renvoyé par `typeof` pour `null` est ici `Object` (objet en français).  
Les objets sont des types complexes de valeurs que nous étudierons plus tard dans ce cours.

Pour le moment, vous pouvez simplement retenir que `null` ne devrait pas être de type `Object` mais bien de type `Null` et que cela est considéré comme une erreur du langage JavaScript par la majorité des développeurs.  
Cependant, historiquement, ça a toujours été le cas.  

## **Les types de valeurs Object (objet) et Symbol (symbole)**

Les objets sont des structures complexes qui vont pouvoir stocker plusieurs valeurs en même temps et que nous étudierons plus tard dans ce cours car il s’agit là d’un sujet relativement complexe à appréhender pour un débutant.  

Notez qu’en JavaScript, contrairement à d’autres langages, les tableaux sont avant tout des objets et sont des valeurs de type `Object`.

Finalement, nous parlerons du type de données `Symbol` après avoir vu les objets car ces deux types sont liés.  

>**Navigation**  
>
>- [Suivant](operateurs.md#presentation-des-operateurs-arithmetiques-et-daffectation-javascript)  
>- [Précédent](../variables-et-types-valeurs/variables.md#presentation-des-variables-javascript)
>- [Menu principal](../menu.md#1-introduction-au-javascript)
