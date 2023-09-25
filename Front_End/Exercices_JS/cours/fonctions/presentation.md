---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 22/04/2022  

---
# **Presentation des fonctions JavaScript**

>**Navigation**  
>
> - [Suivant](portee-variables.md#portee-des-variables-et-valeurs-de-retour-des-fonctions-en-javascript)
> - [Précédent](../structures-de-controle/boucles.md#presentation-des-boucles-et-des-operateurs-dincrementation-et-de-decrementation-en-javascript)  
> - [Menu principal](../menu.md#1-introduction-au-javascript)

Dans cette nouvelle section, nous allons étudier une autre structure de base incontournable du JavaScript : les fonctions.  
Pour le moment, nous allons nous contenter de définir ce qu’est une fonction et apprendre à créer et à utiliser des fonctions simples.  

## **Présentation des fonctions JavaScript prédéfinies**

Une fonction correspond à un bloc de code nommé et réutilisable et dont le but est d’effectuer une tâche précise. En JavaScript, comme dans la plupart des langages les supportant, nous allons très souvent utiliser des fonctions car celles-ci possèdent de nombreux atouts que l’on va énumérer par la suite.

Le langage JavaScript dispose de nombreuses fonctions que nous pouvons utiliser pour effectuer différentes tâches. Les fonctions définies dans le langage sont appelées fonctions prédéfinies ou fonctions prêtes à l’emploi car il nous suffit de les appeler pour nous en servir.

Pour être tout à fait précis, les fonctions prédéfinies en JavaScript sont des méthodes. Une méthode est tout simplement le nom donné à une fonction définie au sein d’un objet. Pour le moment, nous allons considérer que ce sont simplement des fonctions.

Par exemple, le JavaScript dispose d’une fonction nommée `random()` (qui appartient à l’objet `Math` que nous étudierons plus tard) et qui va générer un nombre décimal aléatoire entre 0 et 1 ou encore d’une fonction `replace()` (qui appartient cette fois-ci à l’objet `String`) qui va nous permettre de chercher et de remplacer une expression par une autres dans une chaine de caractères.  
`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Les fonctions JavaScript prédéfinies</title>
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

/* Math.random() génère un nombre décimal aléatoire entre 0 et 1 qu'on
place ici au sein de notre paragraphe  p id='p1' */
document.getElementById('p1').innerHTML = Math.random();

/* String.replace() chercher une expression dans une chaine de caractères
et la remplace par une autre. Ici, on cherche "Alain" dans let prez et
on remplace par "Jennifer" avant d'afficher le résultat dans p id='p2' */
let prez2 = prez.replace('Alain', 'Jennifer');
document.getElementById('p2').innerHTML = prez2;
```

L’intérêt principal des fonction prédéfinies est de nous permettre de réaliser des opérations complexes de manière très simple : en les appelant, tout simplement.  
En effet, vous devez bien comprendre que derrière ces noms de fonctions se cachent des codes parfois longs et complexes qui vont être exécutés lorsqu’on appelle la fonction et qui vont permettre de réaliser une opération précise (générer un nombre aléatoire, etc.).  

En plus de cela, le code d’une fonction est réutilisable : cela veut dire qu’on va pouvoir appeler une même fonction autant de fois qu’on le souhaite afin qu’elle accomplisse plusieurs fois la même opération.  

Pour exécuter le code caché derrière la fonction, il suffit de l’appeler ou de « l’invoquer ».  
Pour faire cela, on n’a qu’à écrire le nom de la fonction suivi d’un couple de parenthèses et éventuellement préciser des arguments entre les parenthèses.  

Les arguments d’une fonction sont des valeurs qu’on va passer à notre fonction afin qu’elle fonctionne normalement ou pour préciser le comportement qu’elle doit adopter.  
Certaines fonctions ne vont pas nécessiter d’arguments, d’autres vont avoir besoin d’un argument, d’autres de deux, etc.  
De plus, certains arguments vont être obligatoires tandis que d’autres vont être facultatifs.  

Par exemple, dans le cas de notre fonction `replace()`, il va falloir fournir en premier argument l’expression à rechercher et à remplacer et en second argument l’expression de remplacement pour que la fonction marche correctement.  

Au cours des prochaines parties, nous allons étudier de nombreuses fonctions JavaScript prédéfinies et notamment celles qui vous seront le plus utiles lorsque vous créerez vos propres scripts en JavaScript.  

## **Les fonctions personnalisées**

En plus des nombreuses fonctions JavaScript prédéfinies et immédiatement utilisables, nous allons pouvoir créer nos propres fonctions en JavaScript lorsque nous voudrons effectuer une tâche très précise.  

Lorsqu’on crée une fonction en JavaScript, celle-ci n’est utilisable que par les scripts qui ont accès à sa définition.  
Une fonction n’est pas « magiquement incluse » dans le langage.  

Créer nos propres fonctions va nous permettre de gagner du temps de développement et de créer des scripts plus facilement maintenables et plus sécurisés.  

En effet, imaginions que l’on crée un script complexe ou qu’on utilise du JavaScript pour créer un site qui contient de nombreuses pages.  
Il y a de grandes chances qu’on ait à effectuer plusieurs fois les mêmes opérations à différents endroits de notre ou de nos script(s).  

Plutôt que de réécrire les mêmes blocs de codes encore et encore, on va plutôt créer des fonctions qui vont contenir nos séries d’instruction.  
Une fois nos fonctions définies, nous n’aurons plus qu’à les appeler là où on en a besoin.  

Procéder comme cela possède de multiples avantages : gain de temps de développement mais également des scripts plus clairs et bien plus facilement maintenable puisque si on doit un jour modifier une opération, il nous suffira de modifier le code une fois dans la définition de notre fonction plutôt que de modifier tous les blocs de code dans le cas où on aurait copié-collé les mêmes blocs de codes encore et encore dans nos scripts.  

Pour pouvoir utiliser une fonction personnalisée, en pratique, il faut déjà la définir.  
Pour définir une fonction, on va utiliser le mot-clé `function` suivi du nom que l’on souhaite donner à notre fonction puis d’un couple de parenthèses dans lesquelles on peut éventuellement définir des paramètres (je reviendrai là-dessus plus tard) et finalement d’un couple d’accolades dans lesquelles on va placer le code de notre fonction.  

Une fois notre fonction définie, on n’aura plus qu’à l’appeler pour l’utiliser.  
Voyons immédiatement comment faire en pratique.  

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
    </body>
</html>
```

`main.js`

```js
/* On définit deux fonctions personnalisées.
La fonction aleatoire() se sert de la fonction (méthode) random().
La fonction multiplication() multiplie deux nombres entre eux.
On utilise une instruction return pour que nos fonctions, une fois appelées,
retournent le résultat de leur calcul afin qu'on puisse utiliser ce résultat */
function aleatoire() {
    return Math.random() * 100;
}

function multiplication(nombre1, nombre2) {
    // Attention : les "+" sont utilisés pour la concaténation ! 
    return nombre1 + ' * ' + nombre2 + ' = ' + (nombre1 * nombre2);
}

/* On appelle ou "invoque" ou encore "exécute" nos fonctions et on place les
résultats retournés dans les paragraphes p id='p1' et p id='p2' de notre
fichier HTML.
On fournit ici deux arguments à multiplication() pour que la fonction
s'exécute normalement. Ces arguments vont prendre la place des paramètres */
document.getElementById('p1').innerHTML = aleatoire();
document.getElementById('p2').innerHTML = multiplication(5, 10);
```

Les noms des fonctions suivent les mêmes règles que ceux des variables.  
Vous pouvez donc donner le nom que vous voulez à votre fonction du moment que celui-ci commence par une lettre, ne contient pas d’espace ni de caractères spéciaux et n’est pas déjà pris nativement par le JavaScript.  

Ici, nous créons deux fonctions qu’on appelle `aleatoire()` et `multiplication()`.  
Entre les accolades, on définit le code qui devra être exécuté lorsqu’on appelle nos fonctions.  

Le but de notre fonction `aleatoire()` va être de renvoyer un nombre aléatoire entre 0 et 100.  
Pour cela, on commence par utiliser random() qui retourne un nombre aléatoire compris entre 0 et 1 et on multiplie la valeur retournée par 100 pour avoir un nombre entre 0 et 100 tout simplement.  

Ensuite, on place le résultat dans le paragraphe portant l’`id='p1'` du fichier HTML faisant appel au script JavaScript.  

Ce premier exemple de création de fonction a pour but de vous montrer qu’on va pouvoir exécuter une fonction à l’intérieur d’une autre fonction sans problème.  

Notez qu’on utilise également ici pour nos deux fonctions une instruction `return`.  
Cette instruction va permettre à nos fonctions de retourner une valeur qu’on va ensuite pouvoir manipuler. Nous allons l’étudier en détail par la suite.  

Le but de notre deuxième fonction `multiplication()` est de renvoyer le résultat de la multiplication de deux nombres non connus lors de la définition de la fonction.  

Ici, il va donc falloir passer ces deux nombres à notre fonction lorsqu’on l’appelle afin qu’elle puisse les multiplier et renvoyer le résultat.  
Lors de l’appel, nous allons donc passer ces nombres en arguments de notre fonction, entre les parenthèses.  

Cependant, on est ici face à un problème : comment expliciter le fait que notre fonction doit multiplier deux nombres entre eux lorsqu’on ne les connait pas à l’avance ?  

Nous allons pour cela utiliser ce qu’on appelle des paramètres.  
Les paramètres des fonctions sont des « prête-noms » qui seront remplacés par les valeurs effectives passées en argument lorsqu’on appelle notre fonction.  

L’idée ici est qu’on va pouvoir donner n’importe quel nom à nos paramètres : je les appelle ici « nombre1 » et « nombre2 » mais je pourrais aussi bien les appeler « Alain » et « Alex » ou « x » et « y ».  
L’important va être de conserver les mêmes noms entre les parenthèses et dans le code de la fonction.  

Une nouvelle fois, lorsqu’on appelle ensuite notre fonction, les arguments passés (c’est-à-dire les valeurs effectives) vont venir se substituer aux paramètres.  

Bien évidemment, les fonctions qu’on vient de créer ne sont pas très utiles ici.  
Cependant, il faut bien commencer avec quelque chose et par maitriser la base pour créer des choses de plus en plus complexes ! Un peu de patience : on y arrive.  

## **Récapitulatif sur les fonctions**

Voici un petit résumé des choses importantes à retenir à votre niveau sur les fonctions :

- Les fonctions sont des blocs de code nommés et réutilisables et dont le but est d’effectuer une tâche précise ;
- Il existe deux grands types de fonctions en JavaScript : les fonction natives ou prédéfinies (qui sont en fait des méthodes) qu’on n’aura qu’à appeler et les fonctions personnalisées qu’on va pouvoir créer ;
- Pour exécuter le code d’une fonction, il faut l’appeler. Pour cela, il suffit d’écrire son nom suivi d’un couple de parenthèses en passant éventuellement des arguments dans les parenthèses ;
- On crée une fonction personnalisée grâce au mot-clé `function` ;
- Si une fonction a besoin qu’on lui passe des valeurs pour fonctionner, alors on définira des paramètres lors de sa définition. Lors de son appel, on lui passera des arguments qui prendront la place des arguments.  

>**Navigation**  
>
> - [Suivant](portee-variables.md#portee-des-variables-et-valeurs-de-retour-des-fonctions-en-javascript)
> - [Précédent](../structures-de-controle/boucles.md#presentation-des-boucles-et-des-operateurs-dincrementation-et-de-decrementation-en-javascript)  
> - [Menu principal](../menu.md#1-introduction-au-javascript)
