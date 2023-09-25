---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 22/04/2022  

---
# **Presentation des boucles et des operateurs d’incrementation et de decrementation en JavaScript**

>**Navigation**  
>
> - [Suivant](../fonctions/presentation.md#presentation-des-fonctions-javascript)
> - [Précédent](switch.md#linstruction-switch-en-javascript)  
> - [Menu principal](../menu.md#1-introduction-au-javascript)

Les boucles sont, avec les conditions, l’une des structures de contrôle de base du JavaScript.  
Nous allons beaucoup les utiliser et il convient donc de les connaitre et de comprendre comment elles fonctionnent.  

## **Présentation des boucles**

Les boucles vont nous permettre d’exécuter plusieurs fois un bloc de code, c’est-à-dire d’exécuter un code « en boucle » tant qu’une condition donnée est vérifiée et donc ainsi nous faire gagner beaucoup de temps dans l’écriture de nos scripts.  

Lorsqu’on code, on va en effet souvent devoir exécuter plusieurs fois un même code.  
Utiliser une boucle nous permet de n’écrire le code qu’on doit exécuter plusieurs fois qu’une seule fois.  

Nous disposons de six boucles différentes en JavaScript :  

- La boucle `while` (« tant que ») ;
- La boucle `do… while` (« faire… tant que ») ;
- La boucle `for` (« pour ») ;
- La boucle `for… in` (« pour… dans») ;
- La boucle `for… of` (« pour… parmi ») ;
- La boucle `for await… of` (« pour -en attente-… parmi »).  

Le fonctionnement général des boucles est toujours le même : on pose une condition qui sera généralement liée à la valeur d’une variable et on exécute le code de la boucle « en boucle » tant que la condition est vérifiée.  

Pour éviter de rester bloqué à l’infini dans une boucle, vous pouvez donc déjà noter qu’il faudra que la condition donnée soit fausse à un moment donné (pour pouvoir sortir de la boucle).  

Pour que notre condition devienne fausse à un moment, on pourra par exemple incrémenter ou décrémenter la valeur de notre variable à chaque nouveau passage dans la boucle (ou modifier la valeur de notre variable selon un certain schéma).  

Les boucles vont donc être essentiellement composées de trois choses :  

- Une valeur de départ qui va nous servir à initialiser notre boucle et nous servir de compteur ;
- Un test ou une condition de sortie qui précise le critère de sortie de la boucle ;
- Un itérateur qui va modifier la valeur de départ de la boucle à chaque nouveau passage jusqu’au moment où la condition de sortie est vérifiée.  

Bien souvent, on incrémentera la valeur de départ.  

## **Les opérateurs d’incrémentation et de décrémentation**

Incrémenter une valeur signifie ajouter 1 à cette valeur tandis que décrémenter signifie enlever 1.  

Les opérations d’incrémentation et de décrémentation vont principalement être utilisées avec les boucles en JavaScript.  
Elles vont pouvoir être réalisées grâce aux opérateurs d’incrémentation `++` et de décrémentation `--`.  

Retenez déjà qu’il y a deux façons d’incrémenter ou de décrémenter une variable :  

- soit incrémenter / décrémenter la valeur de la variable puis retourner la valeur de la variable incrémentée ou décrémentée (on parle alors de pré-incrémentation et de pré-décrémentation)
- soit retourner la valeur de la variable avant incrémentation ou décrémentation puis ensuite l’incrémenter ou la décrémenter (on parle alors de post-incrémentation et de post-décrémentation).  

Cette différence d’ordre de traitement des opérations va influer sur le résultat de nombreux codes et notamment lorsqu’on voudra en même temps incrémenter ou décrémenter la valeur d’une variable et l’afficher ou la manipuler d’une quelconque façon.  
Tenez-en donc bien compte à chaque fois que vous utilisez les opérateurs d’incrémentation ou de décrémentation.  
Le tableau ci-dessous présente les différentes façons d’utiliser les opérateurs d’incrémentation et de décrémentation avec une variable let x ainsi que le résultat associé :  

Les opérateurs logiques vont être représentés par les symboles suivants en JavaScript qu’il faudra obligatoirement utiliser :  
|      **Exemple**       |                                           **Résultat**                                         |
| (opérateur + variable) |                                                                                                |
|:----------------------:|:----------------------------------------------------------------------------------------------:|
|          `++x`         |            Pré-incrémentation : incrémente la valeur contenue dans la variable x,              |
|                        |                                   puis retourne la valeur incrémentée                          |
|          `x++`         |                      Post-incrémentation : retourne la valeur contenue dans x avant            |
|                        |                              incrémentation, puis incrémente la valeur de $x                   |
|          `--x`         |                  Pré-décrémentation : décrémente la valeur contenue dans la variable x,        |
|                        |                                   puis retourne la valeur décrémentée                          |
|          `x--`         |                    Post-décrémentation : retourne la valeur contenue dans x avant              |
|                        |                             décrémentation, puis décrémente la valeur de $x                    |  

Prenons immédiatement un exemple concret pour illustrer les différences entre pré et post incrémentation ou décrémentation.  

`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Les opérateurs d'incrémzntation/décrémentation</title>
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
// On déclare et initialise nos variables sur la même ligne
let a = 10, b = 10, c = 20, d = 20;

/*On incrémente / décrémente et affecte le résultat dans un paragraphe.
 Attention : le premier "+" est un opérateur de concaténation */
document.getElementById('p1').innerHTML = 'a stocke la valeur ' + a++;
document.getElementById('p2').innerHTML = 'b stocke la valeur ' + ++b;
document.getElementById('p3').innerHTML = 'c stocke la valeur ' + c--;
document.getElementById('p4').innerHTML = 'd stocke la valeur ' + --d;

// On affiche ensuite à nouveau le contenu de nos variables 
document.getElementById('p5').innerHTML =
'a = ' + a + ', b = ' + b + ', c = ' + c + ', d = ' + d;
```

Il y a plusieurs choses qu’on n’a jamais vues dans ce code.  
Tout d’abord, vous pouvez constater que j’ai déclaré 4 variables sur la même ligne en utilisant une seule fois le mot `let`.  
Cette écriture est tout à fait autorisée tant que les différentes variables sont séparées par une virgule et sont bien déclarées sur une seule et même ligne.

Notez que cette syntaxe a des avantages et des inconvénients : elle est un peu plus rapide à écrire, notamment lorsqu’on a beaucoup de variables à déclarer mais est un peu moins claire que la syntaxe de déclaration complète des variables.

Ensuite, on post-incrémente notre variable `let a`, pré-incrémente notre variable `let b`, post-décrémente v notre variable `let c` et pré-décrémente notre variable `let d` puis on affiche le résultat précédé du texte « a/b/c/d stocke la valeur » dans les paragraphes portant les `id` « p1 », « p2 », « p3 » et « p4 » dans notre fichier HTML appelant le fichier JavaScript.  

Notez bien ici que le premier signe `+` entre le texte et les opérations d’incrémentation ou de décrémentation est un opérateur de concaténation : il sert à juxtaposer le texte à gauche et la valeur de la variable à droite.  

Dans chaque ligne de ce code, on fait donc deux opérations en même temps : on incrémente ou décrémente et on place le résultat dans un paragraphe.  
Comme vous pouvez le voir, lorsqu’on pré-incrémente ou pré-décrémente, la valeur renvoyée est bien la valeur de base de la variable +/- 1.  

En revanche, lorsqu’on post-incrémente ou post-décrémente, la valeur renvoyée est la valeur de base de la variable.  
Cela est dû au fait que la valeur de base de la variable est ici renvoyée avant l’incrémentation ou la décrémentation.  
Si on affiche plus tard la valeur de nos variables, on peut voir qu’elles ont bien été incrémentées ou décrémentées comme les autres.

## **Les boucles while, do… while, for et for… in et les instructions break et continue en JavaScript**

Dans cette leçon, nous allons passer en revue les différentes boucles à notre disposition en JavaScript et comprendre comment elles fonctionnent et quand utiliser une boucle plutôt qu’une autre.  
Pour rappel, nous pouvons utiliser les boucles suivantes en JavaScript :  

- La boucle `while` ;
- La boucle `do… while` ;
- La boucle `for` ;
- La boucle `for… in` ;
- La boucle `for… of` ;
- La boucle `for await… of`.  

### **La boucle JavaScript while**

La boucle `while` (« tant que » en français) va nous permettre de répéter une série d’instructions tant qu’une condition donnée est vraie c’est-à-dire tant que la condition de sortie n’est pas vérifiée.  

L’une des boucles `while` les plus simples qu’on puisse créer pour illustrer le fonctionnement de cette première boucle va être une boucle `while` qui va itérer sur une valeur numérique d’une variable.  

Regardez l’exemple suivant :  
`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Les boucles While</title>
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
// On initialise une variable let x
let x = 0

// Tant que…
while (x < 10) {
    //…exécute ce code
    document.getElementById('p1').innerHTML +=
    'x stocke la valeur ' + x + ' lors du passage n°'
    + (x + 1) + ' dans la boucle<br>';
    
    x++;
}
```

Ici, on commence par initialiser une variable `let x` en lui passant la valeur 0.  
Ensuite, on crée notre boucle `while` en précisant la condition de sortie entre parenthèses et le code à exécuter tant que la condition donnée est vérifiée.  

Dans l’exemple ci-dessus, notre condition de sortie est vérifiée dès que la valeur affectée à `let x` atteint ou dépasse 10.  
Vous devez bien comprendre que ce que j’appelle ici « condition de sortie » est la condition selon laquelle on va pouvoir sortir de la boucle.  

Note : Selon moi, il ferait plus de sens d’appeler ce qui se situe entre parenthèses (ici, `x < 10`) une « condition de non-sortie » mais la plupart des développeurs ne sont pas d’accord avec moi apparemment donc je me plie à la majorité.  

Quoiqu’il en soit, vous pouvez retenir qu’ici notre boucle va pouvoir être traduite littéralement de la façon suivante :  
« tant que la variable `let x` stocke une valeur strictement inférieure à 10, ajoute le texte « x stocke la valeur {valeur de x} lors du passage n°{valeur de x + 1} dans la boucle » au paragraphe portant l’`id= 'p1'` et ajoute 1 à la dernière valeur connue de `let x`.  

Tant que `let x` stocke une valeur strictement inférieure à 10, on exécute le code de la boucle et on retourne au début de la boucle pour refaire un passage dedans.  

Ici, on utilise l’opérateur de concaténation combiné `+=` pour stocker une nouvelle ligne de texte dans notre paragraphe à chaque nouveau passage de boucle.  
On utilise également la notation `x + 1` pour compter les passages dans la boucle car on sait que `let x` stocke initialement la valeur 0 et qu’on ajoute 1 à la valeur stockée dans notre variable à la fin de chaque passage dans la boucle.  

Profitez-en également pour noter que dans le cas d’une boucle `while`, la condition de sortie est analysée avant d’entrer dans la boucle.  
Cela implique que si `let x` stocke une valeur égale ou supérieure à 10 au départ, on ne rentrera jamais dans notre boucle `while`.

### **La boucle JavaScript do… while**

La boucle `do… while` (« faire… tant que ») est relativement semblable à la boucle `while` dans sa syntaxe.  

La grande différence entre les boucles `while` et `do… while` va résider dans l’ordre dans lequel vont se faire les opérations.  

En effet, lorsqu’on utilise une boucle `do… while`, le code de la boucle va être exécuté avant l’évaluation de la condition de sortie.  

Cela signifie qu’à la différence de la boucle `while`, on effectuera toujours un passage dans une boucle `do… while` même si la condition de sortie n’est jamais vérifiée et donc le code de la boucle sera toujours exécuté au moins une fois.  

Prenons un exemple pour illustrer la différence de structure et de fonctionnement entre les boucles `while` et `do… while`.  
`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Les boucles Do… While</title>
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
let x = 0, a = 0;
let y = 10, b = 10;

// Tant que…
while (x < 10) {
    // …exécute ce code
    document.getElementById('p1').innerHTML +=
    'x stocke la valeur ' + x + ' lors du passage n°'
    + (x + 1) + ' dans la boucle<br>';
    x++;
}

// Faire… tant que
do {
    document.getElementById('p2').innerHTML +=
    'a stocke la valeur ' + a + ' lors du passage n°'
    + (a + 1) + ' dans la boucle<br>';
    a++;
}
while (a < 10);

while (y < 10) {
    document.getElementById('p3').innerHTML +=
    'y stocke la valeur ' + y + ' lors du passage n°'
    + (y + 1) + ' dans la boucle<br>';
    y++;
}

do {
    document.getElementById('p4').innerHTML +=
    'b stocke la valeur ' + b + ' lors du passage n°'
    + (b + 1) + ' dans la boucle<br>';
    b++;
}
while (b < 10);
```

Dans l’exemple ci-dessus, nous créons deux boucles `while` et deux boucles `do… while`.  

La première boucle `while` est la même que précédemment.  
La première boucle `do… while` est identique à la première boucle `while` : même valeur d’initialisation puis incrémentation dans la boucle et finalement même condition de sortie.  

Comme les variables `let x` et `let a` stockent bien des valeurs inférieures à 10, la condition de sortie est valide au départ et nos deux boucles vont s’exécuter exactement de la même façon.  
Dans cette situation, on préférera utiliser une boucle `while` qui est plus simple à écrire.  

Une nouvelle fois, la différence entre les boucles `while` et `do… while` ne va être visible que lorsque la condition de sortie n’est pas valide dès le début.  
On peut le voir avec notre deuxième couple de boucles `while` et `do… while`.  

En effet, les deux dernières boucles de notre script sont les mêmes que les deux premières mais elles utilisent cette fois-ci des variables initialisées à 10, ce qui rend la condition de sortie non valide dès le départ.  
Dans le cas d’une boucle `while`, la condition de sortie est évaluée en premier et, si elle est invalide, on ne rentre pas dans la boucle.  
Dans le cas d’une boucle `do… while`, en revanche, la condition de sortie n’est évaluée qu’en fin de boucle, après le passage dans la boucle.  
Le code de la boucle sera donc exécuté au moins une fois.  

Il va donc être intéressant d’utiliser une boucle `do… while` plutôt qu’on boucle while lorsque notre script a besoin que le code dans notre boucle s’exécute au moins une fois pour fonctionner.  

### **La boucle JavaScript for**

La boucle `for` (« pour » en français) est structurellement différente des boucles `while` et `do… while` puisqu’on va cette fois-ci initialiser notre variable à l’intérieur de la boucle.  

La boucle `for` utilise une syntaxe relativement condensée et est relativement puissante ce qui en fait la condition la plus utilisée en JavaScript.  

Prenons immédiatement un exemple :  
`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Les boucles For</title>
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
for (let i = 0; i < 10; i++) {
    document.getElementById('p1').innerHTML +=
    'i stocke la valeur ' + i + ' lors du passage n°'
    + (i + 1) + ' dans la boucle<br>';
}
```

Une boucle `for` contient trois « phases » à l’intérieur du couple de parenthèses : une phase d’initialisation, une phase de test (condition de sortie) et une phase d’itération (généralement une incrémentation).  
Chaque phase est séparée des autres par un point-virgule.

Ici, on commence par initialiser une variable `let i` en lui passant la valeur 0.  
Notre boucle va s’exécuter en boucle tant que la valeur de `let i` est strictement inférieure à 10 et à chaque nouveau passage dans la boucle on va ajouter 1 à la valeur Précédente de la variable `let i`.  

Comme vous pouvez le constater, l’incrémentation se fait à la fin de chaque passage dans la boucle (on le voit car lors du premier passage la valeur de `let i` est toujours 0).  

Notez qu’on utilise généralement la lettre « i » (pour « iterator ») dans les boucles en général et particulièrement au sein des boucles `for` pour les reconnaitre plus rapidement dans un script.  
Cependant, ce n’est pas obligatoire et vous pouvez utiliser n’importe quel autre nom de variable.  

### **Utiliser une instruction continue pour passer directement à l’itération suivante d’une boucle**

Pour sauter une itération de boucle et passer directement à la suivante, on peut utiliser une instruction `continue`.  
Cette instruction va nous permettre de sauter l’itération actuelle et de passer directement à l’itération suivante.  

Cette instruction peut s’avérer très utile pour optimiser les performances d’une boucle et économiser les ressources lorsqu’on utilise une boucle pour rechercher spécifiquement certaines valeurs qui répondent à des critères précis.  

Par exemple, on pourrait imaginer en reprenant la boucle Précédente qu’on ne souhaite afficher de message que pour les valeurs paires de `let i`.  
On va donc utiliser une instruction `continue` pour passer directement à l’itération suivante si `let i` contient une valeur impaire.
`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>L'instruction continue</title>
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
for (let i = 0; i < 10; i++) {
    // Si i / 2 possède un reste, alors i est impair
    if(i % 2 != 0){
        continue;
    }
    document.getElementById('p1').innerHTML +=
    'i stocke la valeur ' + i + ' lors du passage n°'
    + (i + 1) + ' dans la boucle<br>';
}
```

Ici, on utilise le modulo (c’est-à-dire le reste d’une division Euclidienne) pour déterminer si `let i` contient une valeur paire ou impaire.  
En effet, on sait que `let i` stocke toujours un entier (compris entre 0 et 10).  

Or, tout entier pair p est multiple de 2, ce qui signifie qu’il existe un nombre n entier tel que 2 \* n = p. Par exemple, 4 = 2 \* 2 ; 6 = 2 \* 3 ; 18 = 2 \* 9, etc.  

Ainsi, lorsqu’on divise un entier pair par deux, le reste sera toujours nul (le modulo sera égal à 0).  
Dans le cas d’un entier impair, en revanche, il y aura toujours un reste puisqu’un nombre impair n’est par définition pas un multiple de 2.  

Dans notre boucle, on utilise donc une condition if qui va exécuter une instruction `continue` dans le cas où le reste de la division `i / 2` n’est pas égal à 0 c’est-à-dire dans le cas où `let i` stocke un entier impair.  

Cette instruction `continue` va indiquer au JavaScript qu’il doit sauter l’itération de boucle actuelle et passer immédiatement à la suivante.  

### **Utiliser une instruction break pour sortir prématurément d’une boucle**

On va également pouvoir complètement stopper l’exécution d’une boucle et sortir à un moment donné en utilisant une instruction break au sein de la boucle.  

Utiliser cette instruction peut à nouveau s’avérer très intéressant pour optimiser les performances de notre script lorsqu’on utilise une boucle pour chercher une valeur en particulier en itérant parmi un grand nombre de valeurs.  

Comme pour l’instruction continue, il est difficile d’illustrer l’intérêt réel de l’utilisation de break avec les boucles à ce stade du cours car ces instructions prennent tout leur sens lorsqu’on recherche une valeur dans un tableau par exemple.  

Je préfère tout de même vous les montrer dès maintenant et pas d’inquiétude, nous pourrons montrer la force de ces instructions plus tard dans ce cours.  
`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>L'instruction break</title>
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
for (let i = 0; i < 1000; i++) {
    // On sort de la boucle dès que la valeur de i atteint 13
    if(i == 13){
        break;
    }
    document.getElementById('p1').innerHTML +=
    'i stocke la valeur ' + i + ' lors du passage n°'
    + (i + 1) + ' dans la boucle<br>';
}
```

Dans cet exemple, on modifie à nouveau notre boucle `for` de départ en modifiant notamment la condition de sortie.  
Par défaut, cette boucle `for` va boucler tant que la valeur de `let i` n’atteint pas 1000.  

Cependant, dans la boucle, on utilise cette fois une instruction `break` qui va s’exécuter si la valeur de `let i` atteint 13.  

L’instruction `break` met fin à la boucle. Ainsi, dès que `let i` atteint 13, on va sortir de la boucle.

### **Les boucles for… in, for… of et for await…of**

Les boucles `for… in`, `for… of` et `for await…of` vont être utilisées pour parcourir des objets.  
Nous les étudierons donc lorsque nous aborderons les objets.  

>**Navigation**  
>
> - [Suivant](../fonctions/presentation.md#presentation-des-fonctions-javascript)
> - [Précédent](switch.md#linstruction-switch-en-javascript)  
> - [Menu principal](../menu.md#1-introduction-au-javascript)
