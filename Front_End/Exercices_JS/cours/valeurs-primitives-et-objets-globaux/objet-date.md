---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 22/04/2022  

---
# **Les dates en JavaScript et l’objet global Date**

>**Navigation**  
>
> - [Précédent](../manipulation-dom/presentation.md#presentation-du-dom-html-et-de-ses-apis-accessibles-en-javascript)
> - [Précédent](./objet-array.md#les-tableaux-en-javascript-et-lobjet-global-array)
> - [Menu principal](../menu.md#1-introduction-au-javascript)

Dans cette nouvelle leçon, nous allons étudier un autre objet natif du JavaScript : l’objet Date qui permet de créer et de manipuler des dates grâce à ses méthodes.  

## **Introduction aux dates en JavaScript**

Pour travailler avec des dates et les manipuler en JavaScript, nous allons utiliser l’objet natif Date.  

Le constructeur `Date()` possède en effet de nombreuses méthodes qui vont nous permettre d’obtenir ou de définir une date.  

Le JavaScript stocke les dates en interne sous forme d’un Timestamp Unix exprimé en millisecondes (c’est-à-dire le Timestamp Unix multiplié par 1000).  

Le Timestamp Unix correspond au nombre de secondes écoulées depuis le premier janvier 1970 à minuit UTC ou GMT (c’est-à-dire minuit selon l’heure de Londres).  

De nombreux langages représentent les dates sous forme de Timestamp Unix car c’est un nombre et il est beaucoup plus facile de travailler et de manipuler des nombres que des dates littérales qui peuvent s’écrire sous de nombreux différents formats.  

Nous allons cependant également pouvoir exprimer des dates sous forme littérale (c’est-à-dire sous forme de chaînes de caractères), en anglais, et en respectant certaines conventions.  

## **Récupérer la date actuelle**

Pour récupérer la date actuelle sous forme littérale, on va tout simplement utiliser `Date()`.  

Pour afficher cette même date sous forme de nombre (le nombre de millisecondes écoulées depuis le 1er janvier 1970), on peut utiliser la méthode statique `now()` du constructeur `Date`.  
`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Récupérer la date actuelle</title>
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
let date1 = Date();
let date2 = Date.now();

document.getElementById('p1').innerHTML = date1;
document.getElementById('p2').innerHTML = date2;
```

Comme vous pouvez le remarquer, la forme littérale est difficilement exploitable telle quelle pour nous car celle-ci suit les normes anglo-saxonnes.  
Nous allons voir comment afficher nos dates avec un format local dans la suite de cette leçon.  

## **Créer un objet de type date**

Pour créer et manipuler une date particulière, nous allons devoir créer un objet de type date.  

Pour créer un objet de type date, nous allons cette fois-ci être obligé d’utiliser le constructeur `Date()` avec donc le mot-clé `new`.  

On va pouvoir instancier notre constructeur `Date()` de différentes manières pour créer une date.  

On peut déjà instancier `Date()` sans lui passer d’argument, auquel cas le constructeur va créer un objet date contenant la date actuelle complète en fonction de l’heure locale du système.  

On peut encore fournir une date littérale en argument de `Date()`. De cette manière, un objet sera créé avec la date indiquée.  
Bien évidemment, on va devoir passer la date en anglais et formatée de façon à ce que JavaScript puisse la comprendre.  
Concernant les formats de date, il est conseillé d’utiliser la norme ISO 8601.  

Cette façon de faire est généralement déconseillée car il subsiste des différences de comportement entre les différents navigateurs sur la date qui doit être effectivement créée.  

On peut également fournir une date sous forme de millisecondes écoulées depuis le 1er janvier 1970 à `Date()` pour qu’il crée un objet avec la date demandée.  

Par exemple, il y a 604800000 millisecondes dans une semaine. Si on passe cette valeur en argument pour notre constructeur `Date()`, l’objet créé stockera comme date le 8 janvier 1970 (1er janvier + une semaine).  

Enfin, on va pouvoir passer une suite de nombres à notre constructeur pour qu’il crée un objet date morceau par morceau.  
Ces nombres représentent, dans l’ordre :  

- L’année (argument obligatoire) de la date qu’on souhaite créer ;
- Le numéro du mois (argument obligatoire) de la date qu’on souhaite créer, entre 0 (pour janvier) et 11 (pour décembre) ;
- Le numéro du jour du mois (facultatif) de la date qu’on souhaite créer, entre 1 et 31 ;
- L’heure (facultatif) de la date qu’on souhaite créer, entre 0 et 23 ;
- Le nombre de minutes (facultatif) de la date qu’on souhaite créer, entre 0 et 59 ;
- Le nombre de secondes (facultatif) de la date qu’on souhaite créer, entre 0 et 59 ;
- Le nombre de millisecondes (facultatif) de la date qu’on souhaite créer, entre 0 et 999.  

`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Créer un objet de type date</title>
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
let date1 = new Date();
let date2 = new Date('March 23, 2019 20:00:00');
let date3 = new Date(1553466000000);
let date4 = new Date(2019, 0, 25, 12, 30);

document.getElementById('p1').innerHTML =
    'Date 1 : ' + date1 + '<br>Date 2 : ' + date2 +
    '<br>Date 3 : ' + date3 + '<br>Date4 : ' + date4;
```

## **Les méthodes getters et setters de l’objet Date**

L’objet `Date` possède de nombreuses méthodes qu’on peut classer en différents groupes : les méthodes qui vont nous permettre d’obtenir une date, celles qui vont permettre de définir une date, celles qui vont permettre de formater une date, etc.  

De manière générale en programmation vous pouvez noter qu’on appelle les méthodes qui permettent d’obtenir / de récupérer quelque chose des « getters » (get signifie avoir, posséder en anglais). Ces méthodes sont souvent reconnaissables par le fait qu’elles commencent par `get…()`.  

De même, on appelle les méthodes qui permettent de définir quelque chose des « setters » (set signifie définir en anglais). Ces méthodes vont être reconnaissables par le fait qu’elles commencent par `set…()`.  

Notez que ce système de « getters » et de « setters » n’est pas propre à l’objet `Date` en JavaScript mais est une convention partagée par de nombreux langages de programmation.  

### **Les getters de l’objet Date**

L’objet `Date` va posséder différentes méthodes getters qui vont chacune nous permettre de récupérer un composant d’une date (année, mois, jour, heure, etc.).  

Les getters suivants vont renvoyer un composant de date selon l’heure locale :  

- `getDay()` renvoie le jour de la semaine sous forme de chiffre (avec 0 pour dimanche, 1 pour lundi et 6 pour samedi) pour la date spécifiée selon l’heure locale ;
- `getDate()` renvoie le jour du mois en chiffres pour la date spécifiée selon l’heure locale ;
- `getMonth()` renvoie le numéro du mois de l’année (avec 0 pour janvier, 1 pour février, 11 pour décembre) pour la date spécifiée selon l’heure locale ;
- `getFullYear()` renvoie l’année en 4 chiffres pour la date spécifiée selon l’heure locale ;
- `getHours()` renvoie l’heure en chiffres pour la date spécifiée selon l’heure locale ;
- `getMinutes()` renvoie les minutes en chiffres pour la date spécifiée selon l’heure locale ;
- `getSeconds()` renvoie les secondes en chiffres pour la date spécifiée selon l’heure locale ;
- `getMilliseconds()` renvoie les millisecondes en chiffres pour la date spécifiée selon l’heure locale.  

L’objet `Date` nous fournit également des getters équivalents qui vont cette fois-ci renvoyer un composant de date selon l’heure UTC et qui sont les suivants :  

- `getUTCDay()` renvoie le jour de la semaine sous forme de chiffre (avec 0 pour dimanche, 1 pour lundi et 6 pour samedi) pour la date spécifiée selon l’heure UTC ;
- `getUTCDate()` renvoie le jour du mois en chiffres pour la date spécifiée selon l’heure UTC ;
- `getUTCMonth()` renvoie le numéro du mois de l’année (avec 0 pour janvier, 1 pour février, 11 pour décembre) pour la date spécifiée selon l’heure UTC ;
- `getUTCFullYear()` renvoie l’année en 4 chiffres pour la date spécifiée selon l’heure UTC ;
- `getUTCHours()` renvoie l’heure en chiffres pour la date spécifiée selon l’heure UTC ;
- `getUTCMinutes()` renvoie les minutes en chiffres pour la date spécifiée selon l’heure UTC ;
- `getUTCSeconds()` renvoie les secondes en chiffres pour la date spécifiée selon l’heure UTC ;
- `getUTCMilliseconds()` renvoie les millisecondes en chiffres pour la date spécifiée selon l’heure UTC.  

`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Les getters de l’objet Date</title>
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
let date1 = new Date(2019, 0, 25, 12, 30, 15);

let jourSemaine = date1.getDay();
let jourMois = date1.getDate();
let mois = date1.getMonth();
let annee = date1.getFullYear();
let heures = date1.getHours();
let heuresUTC = date1.getUTCHours();
let minutes = date1.getMinutes();
let secondes = date1.getSeconds();
let ms = date1.getMilliseconds();

document.getElementById('p1').innerHTML =
    'Date : ' + date1 +
    '<br>Jour de la semaine : ' + jourSemaine +
    '<br>Jour du mois : ' + jourMois +
    '<br>Numéro du mois : ' + mois +
    '<br>Année : ' + annee +
    '<br>Heures : ' + heures + ' (heure UTC : ' + heuresUTC + ')' +
    '<br>Minutes : ' + minutes +
    '<br>Secondes : ' + secondes +
    '<br>Millisecondes : ' + ms;
```

### **Les setters de l’objet Date**

Les setters de l’objet `Date` vont nous permettre de définir (ou de modifier) des composants de dates pour une date donnée.  
Ces setters vont correspondre exactement aux getters vus précédemment (de manière générale, en programmation, les getters et les setters marchent par paires).  

- `setDate()` et `setUTCDate()` définissent le jour du mois en chiffres pour la date spécifiée selon l’heure locale ou l’heure UTC ;
- `setMonth()` et `setUTCMonth()` définissent le numéro du mois de l’année (avec 0 pour janvier, 1 pour février, 11 pour décembre) pour la date spécifiée selon l’heure locale ou l’heure UTC ;
- `setFullYear()` et `setUTCFullYear()` définissent l’année en 4 chiffres pour la date spécifiée selon l’heure locale ou l’heure UTC ;
- `setHours()` et `setUTCHours()` définissent l’heure en chiffres pour la date spécifiée selon l’heure locale ou l’heure UTC ;
- `setMinutes()` et `setUTCMinutes()` définissent les minutes en chiffres pour la date spécifiée selon l’heure locale ou l’heure UTC ;
- `setSeconds()` et `setUTCSeconds()` définissent les secondes en chiffres pour la date spécifiée selon l’heure locale ou l’heure UTC ;
- `setMilliseconds()` et `setUTCMilliseconds()` définissent les millisecondes en chiffres pour la date spécifiée selon l’heure locale ou l’heure UTC.  

`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Les setters de l’objet Date</title>
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
// On crée une date
let date1 = new Date(2019, 0, 25, 12, 30, 15);

// On modifie la date
date1.setDate(31);
date1.setMonth(2);
date1.setFullYear(2018);
date1.setHours(10);
date1.getUTCHours();
date1.setMinutes(0);
date1.setSeconds(0);
date1.setMilliseconds(0);

document.getElementById('p1').innerHTML = 'Date : ' + date1;
```

## **Convertir une date au format local**

L’objet `Date` dispose également de méthodes nous permettant de convertir un format de date en un format local.  

Ces méthodes vont notamment nous permettre d’afficher les éléments de date dans un ordre local (jour puis mois puis année par exemple) ou de pouvoir afficher une heure selon un format 12 heures ou 24 heures.  
Elles vont également nous permettre de traduire des dates littérales anglaises dans la langue locale.  

Pour faire cela, on va pouvoir utiliser les méthodes `toLocaleDateString()`, `toLocaleTimeString()` et `toLocaleString()`.  

La méthode `toLocaleDateString()` renvoie la partie « jour-mois-année » d’une date, formatée en fonction d’une locale et d’options.  

La méthode `toLocaleTimeString()` renvoie la partie « heures-minutes-secondes » d’une date, formatée en fonction d’une locale et d’options.  

La méthode `toLocaleString()` renvoie la date complète, formatée en fonction d’une locale et d’options.  

Ces trois méthodes vont donc pouvoir prendre deux arguments : un premier argument qui est une locale et un second qui correspond à des options.  

La locale sert à définir la langue dans laquelle la date doit être formatée. Pour la France, on utilisera `fr-FR`.  

Les options vont permettre de modifier le comportement par défaut de nos méthodes et notamment d’expliciter si on souhaite que la date passée soit renvoyée sous forme de chiffres ou sous forme littérale.  

Les options qui vont particulièrement nous intéresser vont être les suivantes :  

- `weekday` qui représente le jour de la semaine. Les valeurs possibles sont « narrow », « short » et « long » ;
- `day` qui représente le jour du mois. Les valeurs possibles sont `numeric` et `2-digit` ;
- `month` qui représente le mois. Les valeurs possibles sont `numeric` et `2-digit` ;
- `year` qui représente l’année. Les valeurs possibles sont `numeric` et `2-digit` ;
- `hour` qui représente l’heure. Les valeurs possibles sont `numeric` et `2-digit` ;
- `minute` qui représente les minutes. Les valeurs possibles sont `numeric` et `2-digit` ;
- `second` qui représente les secondes. Les valeur possibles sont `numeric` et `2-digit`.  

A noter que les navigateurs sont obligés de supporter à minima les ensembles suivants. Si vous utilisez une autre combinaison, celle-ci pourra ne pas être supportée :  

- weekday, year, month, day, hour, minute, second ;
- weekday, year, month, day ;
- year, month, day ;
- year, month ;
- month, day ;
- hour, minute, second ;
- hour, minute.  

Une autre option intéressante est l’option `timeZone` qui permet de définir le fuseau horaire à utiliser.  
`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Convertir une date au format local</title>
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
// On crée une date
let date1 = new Date();

let dateLocale = date1.toLocaleString('fr-FR',{
    weekday: 'long',
    year: 'numeric',
    month: 'long',
    day: 'numeric',
    hour: 'numeric',
    minute: 'numeric',
    second: 'numeric'});

document.getElementById('p1').innerHTML = 'Date : ' + dateLocale;
```

>**Navigation**  
>
> - [Suivant](../manipulation-dom/presentation.md#presentation-du-dom-html-et-de-ses-apis-accessibles-en-javascript)
> - [Précédent](./objet-array.md#les-tableaux-en-javascript-et-lobjet-global-array)
> - [Menu principal](../menu.md#1-introduction-au-javascript)
