---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 18/05/2022  

---
# **Les promesses en JavaScript**

>**Navigation**  
>
> - [Suivant](./async-et-await.md#utiliser-async-et-await-pour-creer-des-promesses-plus-lisibles-en-javascript)  
> - [Précédent](./introduction-asynchrone.md#introduction-a-lasynchrone-en-javascript)  
> - [Menu principal](../menu.md#1-introduction-au-javascript)

Les promesses sont aujourd’hui utilisées par la plupart des API modernes.  
Il est donc important de comprendre comment elles fonctionnent et de savoir les utiliser pour optimiser son code.  
Les avantages des promesses par rapport à l’utilisation de simples fonctions de rappel pour gérer des opérations asynchrones vont être notamment la possibilité de chainer les opérations asynchrones, la garantie que les opérations vont se dérouler dans l’ordre voulu et une gestion des erreurs simplifiées tout en évitant le « callback hell ».  

Dans cette leçon, nous allons définir en détail ce que sont les promesses et comment les utiliser dans le cadre d’opérations asynchrones.  

## **Pr&eacute;sentation et d&eacute;finition des promesses**

Une promesse en JavaScript est un objet qui représente l’état d’une opération asynchrone.  
Une opération asynchrone peut être dans l’un des états suivants :  

- Opération en cours (non terminée) ;
- Opération terminée avec succès (promesse résolue) ;
- Opération terminée ou plus exactement stoppée après un échec (promesse rejetée).  

En JavaScript, nous allons pouvoir créer nos propres promesses ou manipuler des promesses déjà consommées créées par des API.  

L’idée est la suivante : nous allons définir une fonction dont le rôle est d’effectuer une opération asynchrone et cette fonction va, lors de son exécution, créer et renvoyer un objet `Promesse`.  

```js
const promesse = new Promise((resolve, reject) => {
    // instruction asynchrone à effectuer
    // Appel de resolve() si la promesse est résolue (tenue)
    // ou
    // Appel de reject() si elle est rejetée (rompue)
    //
});
```

En pratique, la majorité des opérations asynchrones qu’on va vouloir réaliser en JavaScript vont déjà être pré-codées et fournies par des API.  Ainsi, nous allons rarement créer nos propres promesses mais plutôt utiliser les promesses renvoyées par les fonctions de ces API.  

Lorsque nos fonctions asynchrones s’exécutent, elles renvoient une promesse.  
Cette promesse va partager les informations liées à l’opération qui vient de s’exécuter et on va pouvoir l’utiliser pour définir quoi faire en fonction du résultat qu’elle contient (en cas de succès de l’opération ou en cas d’échec).  

Les promesses permettent ainsi de représenter et de manipuler un résultat un évènement futur et nous permettent donc de définir à l’avance quoi faire lorsqu’une opération asynchrone est terminée, que celle-ci ait été terminée avec succès ou qu’on ait rencontré un cas d’échec.  

Pour le dire autrement, vous pouvez considérer qu’une valeur classique est définie et disponible dans le présent tandis qu’une valeur « promise » est une valeur qui peut déjà exister ou qui existera dans le futur.  
Les calculs basés sur les promesses agissent sur ces valeurs encapsulées et sont exécutés de manière asynchrone à mesure que les valeurs deviennent disponibles.  

Au final, on fait une « promesse » au navigateur ou au programme exécutant notre code : on l’informe qu’on n’a pas encore le résultat de telle opération car celle-ci ne s’est pas déroulée mais que dès que l’opération sera terminée, son résultat sera disponible dans la promesse et qu’il devra alors exécuter tel ou tel code selon le résultat contenu dans cette promesse.  

Le code à exécuter après la consommation d’une promesse va être passé sous la forme de fonction de rappel qu’on va attacher à la promesse en question.  

## **Promesses et APIs**

Dans la plupart des cas, nous n’aurons pas à créer de nouvel objet en utilisant le constructeur `Promise` mais simplement à manipuler des objets déjà créés.  
En effet, les promesses vont être particulièrement utilisées par des API JavaScript réalisant des opérations asynchrones.  

Ainsi, dans quasiment toutes les API modernes, lorsqu’une fonction réalise une opération asynchrone elle renvoie un objet promesse en résultat qu’on va pouvoir utiliser.  

Imaginons par exemple une application de chat vidéo / audio Web.  
Pour pouvoir chatter, il faut avant tout que les utilisateurs donnent l’accès à leur micro et à leur Webcam à l’application et également qu’ils définissent quel micro et quelle caméra ils souhaitent utiliser dans le cas où ils en aient plusieurs.  

Ici, sans code asynchrone et sans promesses, toute la fenêtre du navigateur va être bloquée pour l’utilisateur tant que celui-ci n’a pas explicitement accordé l’accès à sa caméra et à son micro et tant qu’il n’a pas défini quelle caméra et micro utiliser.  

Une application comme celle-ci aurait donc tout intérêt à utiliser les promesses pour éviter de bloquer le navigateur.  
L’application renverrait donc plutôt une promesse qui serait résolue dès que l’utilisateur donne l’accès et choisit sa caméra et son micro.  

## **Cr&eacute;er une promesse avec le constructeur `Promise`**

Il reste important de savoir comment créer une promesse et de comprendre la logique interne de celles-ci, même si dans la plupart des cas nous ne créerons pas nos propres promesses mais utiliserons des promesses générées par des fonctions prédéfinies.  

Pour créer une promesse, on va utiliser la syntaxe `new Promise()` qui fait donc appel au constructeur `Promise`.  

Ce constructeur va prendre en argument une fonction qui va elle-même prendre deux autres fonctions en arguments.  
La première sera appelée si la tâche asynchrone est effectuée avec succès tandis que la seconde sera appelée si l’opération échoue.  

```js
const promesse = new Promise((resolve, reject) => {
    // instruction asynchrone à effectuer
    // Appel de resolve() si la promesse est résolue (tenue)
    // ou
    // Appel de reject() si elle est rejetée (rompue)
    //
});
```

Lorsque notre promesse est créée, celle-ci possède deux propriétés internes : une première propriété `state` (état) dont la valeur va initialement être « pending » (en attente) et qui va pouvoir évoluer « fulfilled » (promesse tenue ou résolue) ou « rejected » (promesse rompue ou rejetée) et une deuxième propriété `result` qui va contenir la valeur de notre choix.  

Si la promesse est tenue, la fonction `resolve()` sera appelée tandis que si la promesse est rompue la fonction `reject()` va être appelée.  
Ces deux fonctions sont des fonctions prédéfinies en JavaScript et nous n’avons donc pas besoin de les déclarer.  
Nous allons pouvoir passer un résultat en argument pour chacune d’entre elles.  
Cette valeur servira de valeur pour la propriété `result` de notre promesse.  

En pratique, on va créer des fonctions asynchrones qui vont renvoyer des promesses :  

```js
function chargerScript (src) {
    return new Promise((resolve, reject) => {
        let script = document.createElement('script');
        script.src = src;
        document.head.append(script);
        script.onload = () => resolve('Fichier ' + src + ' bien chargé');
        script.onerror = () => reject(new Error('Echec de chargement de ' + src));
    });
}

const promesse1 = chargerScript('./assets/js/boucle.js');
const promesse2 = chargerScript('./assets/js/script2.js');
```

Notez que l’état d’une promesse une fois résolue ou rejetée est final et ne peut pas être changé.  
On n’aura donc jamais qu’une seule valeur ou une erreur dans le cas d’un échec pour une promesse.  

## **Exploiter le r&eacute;sultat d’une promesse avec les m&eacute;thodes `then()` et `catch()`**

Pour obtenir et exploiter le résultat d’une promesse, on va généralement utiliser la méthode `then()` du constructeur `Promise`.  

Cette méthode nous permet d’enregistrer deux fonctions de rappel qu’on va passer en arguments : une première qui sera appelée si la promesse est résolue et qui va recevoir le résultat de cette promesse et une seconde qui sera appelée si la promesse est rompue et que va recevoir l’erreur.  

Voyons comment cela va fonctionner en pratique :  

```js
function chargerScript (src) {
    return new Promise((resolve, reject) => {
        let script = document.createElement('script');
        script.src = src;
        document.head.append(script);
        script.onload = () => resolve('Fichier ' + src + ' bien chargé');
        script.onerror = () => reject(new Error('Echec de chargement de ' + src));
    });
}

const promesse1 = chargerScript('./assets/js/boucle.js');
const promesse2 = chargerScript('./assets/js/script2.js');


promesse1.then(
    function(result){alert(result);},
    function(error){alert(error);}
);

// Variante du code précédent avec des fonctions fléchées
promesse2.then(result => alert(result), error => alert(error));
```

Notez qu’on va également pouvoir utiliser `then()` en ne lui passant qu’une seule fonction de rappel en argument qui sera alors appelée si la promesse est tenue.  

```js
function chargerScript (src) {
    return new Promise(resolve => {
        let script = document.createElement('script');
        script.src = src;
        document.head.append(script);
        script.onload = () => resolve('Fichier ' + src + ' bien chargé');
    });
}

const promesse1 = chargerScript('./assets/js/boucle.js');
promesse1.then(alert);
```

Au contraire, dans le cas où on est intéressé uniquement par le cas où une promesse est rompue, on va pouvoir utiliser la méthode `catch()` qui va prendre une unique fonction de rappel en argument qui va être appelée si la promesse est rompue.  

```js
function chargerScript (src) {
    return new Promise((resolve, reject) => {
        let script = document.createElement('script');
        script.src = src;
        document.head.append(script);
        script.onload = () => resolve('Fichier ' + src + ' bien chargé');
        script.onerror = () => reject(new Error('Echec de chargement de ' + src));
    });
}

const promesse1 = chargerScript('./assets/js/boucle.js');
const promesse2 = chargerScript('./assets/js/script2.js');
promesse2.catch(alert);
```

Utiliser à la fois `then()` et `catch()` plutôt que simplement `then()` va souvent créer un code plus rapide dans son exécution et plus clair dans sa syntaxe et va également nous permettre de chainer efficacement les méthodes.  

## **Le cha&icirc;nage des promesses**

« Chainer » des méthodes signifie les exécuter les unes à la suite des autres.  
On va pouvoir utiliser cette technique pour exécuter plusieurs opérations asynchrones à la suite et dans un ordre bien précis.  

Cela est possible pour une raison : la méthode `then()` retourne automatiquement une nouvelle promesse.  
On va donc pouvoir utiliser une autre méthode `then()` sur le résultat renvoyé par la première méthode `then()` et ainsi de suite.  

```js
function chargerScript (src) {
    return new Promise((resolve, reject) => {
        let script = document.createElement('script');
        script.src = src;
        document.head.append(script);
        script.onload = () => resolve('Fichier ' + src + ' bien chargé');
        script.onerror = () => reject(new Error('Echec de chargement de ' + src));
    });
}

const promesse1 = chargerScript('./assets/js/boucle.js');
const promesse2 = promesse1.then(result => alert(result), error => alert(error));
```

Ici, notre deuxième promesse représente l’état de complétion de notre première promesse et des fonctions de rappel passées qui peuvent être d’autres fonctions asynchrones renvoyant des promesses.  

On va donc pouvoir effectuer autant d’opérations asynchrones que l’on souhaite dans un ordre bien précis et avec en contrôlant les résultats de chaque opération très simplement.  

```js
function chargerScript (src) {
    return new Promise((resolve, reject) => {
        let script = document.createElement('script');
        script.src = src;
        document.head.append(script);
        script.onload = () => resolve('Fichier ' + src + ' bien chargé');
        script.onerror = () => reject(new Error('Echec de chargement de ' + src));
    });
}


chargerScript('./assets/js/boucle.js')
.then(result => chargerScript('./assets/js/script2.js', result))
.then(result2 => chargerScript('./assets/js/script3.js', result2))
.catch(alert);


/* Equivalent à 
chargerScript('./assets/js/boucle.js').then(function(result){
    return chargerScript('./assets/js/script2.js', result);
})
.then(function(result2){
    return chargerScript('./assets/js/script3.js', result2);
})
.catch(alert);
*/
```

Pour que ce code fonctionne, il faut cependant bien évidemment que chaque fonction asynchrone renvoie une promesse.  
Ici, on n’a besoin que d’un seul `catch()` car une chaine de promesse s’arrête dès qu’une erreur est levée et va chercher le premier `catch()` disponible pour savoir comment gérer l’erreur.  

Notez qu’il va également être possible de continuer à chaîner après un rejet, c’est-à-dire après une méthode `catch()`.  
Cela va pouvoir s’avérer très utile pour accomplir de nouvelles actions après qu’une action ait échoué dans la chaine.  

```js
function chargerScript (src) {
    return new Promise((resolve, reject) => {
        let script = document.createElement('script');
        script.src = src;
        document.head.append(script);
        script.onload = () => resolve('Fichier ' + src + ' bien chargé');
        script.onerror = () => reject(new Error('Echec de chargement de ' + src));
    });
}
chargerScript('./assets/js/boucle.js')
.then(result => chargerScript('./assets/js/script2.js', result))
.then(result2 => chargerScript('./assets/js/script3.js', result2))
.catch(alert)
.then(() => alert('Blabla'));// On peut imaginer d'autres instructions ici
```

Cela est possible car la méthode `catch()` renvoie également une nouvelle promesse dont la valeur de résolution va être celle de la promesse de base dans le cas d’une résolution (succès) ou va être égale au résultat du gestionnaire de `catch()` dans le cas contraire.  
Si un gestionnaire `catch()` génère une erreur, la nouvelle promesse est également rejetée.  

## **La composition de promesses**

« Composer » des fonctions signifie combiner plusieurs fonctions pour en produire une nouvelle.  

De la même façon, nous allons pouvoir composer des promesses. Pour cela, on va pouvoir utiliser certaines des méthodes de `Promise()`.  

Les premières méthodes à connaitre sont les méthodes `resolve()` et `reject()` qui vont nous permettre de créer manuellement des promesses déjà résolues ou rejetées et qui vont donc être utiles pour démarrer manuellement une chaine de promesses.  

En plus de cela, nous allons pouvoir utiliser la méthode `all()` de `Promise` qui va prendre en argument un tableau de promesses et retourner une nouvelle promesse.  
Cette nouvelle promesse va être résolue si l’ensemble des promesses passées dans le tableau sont résolues ou va être rejetée si au moins l’une des promesses du tableau échoue.  

Cette méthode va être très utile pour regrouper les valeurs de plusieurs promesses, et ceci qu’elles s’exécutent en série ou en parallèle.  

Notez que cette méthode conserve l’ordre des promesses du tableau passé lors du renvoi des résultats.  

On va ainsi pouvoir lancer plusieurs opérations asynchrones en parallèle puis attendre qu’elles soient toutes terminées comme cela :  

```js
Promise.all([func1(), func2(), func3()])
.then(([result1, result2, result3]) => {
    // On fait ce que l'on veut de result1, result2 et result3.
});
```

## **Exemple simple**

```js
console.log("Début du programme");

setTimeout(function() {
  console.log("Le code à l'intérieur de setTimeout est exécuté après 5000 millisecondes (5 secondes)");
}, 5000);

console.log("Fin du programme");
```

**Notez que le message "fin du programme" s'affiche dans la console AVANT celui de la fonction appelée dans la promesse.**

>**Navigation**  
>
> - [Suivant](./async-et-await.md#utiliser-async-et-await-pour-creer-des-promesses-plus-lisibles-en-javascript)  
> - [Précédent](./introduction-asynchrone.md#introduction-a-lasynchrone-en-javascript)  
> - [Menu principal](../menu.md#1-introduction-au-javascript)
