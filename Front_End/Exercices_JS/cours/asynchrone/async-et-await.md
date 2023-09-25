---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 18/05/2022  

---
# **Utiliser `async` et `await` pour creer des promesses plus lisibles en JavaScript**

>**Navigation**  
>
> - [Suivant](./chemin-critique-async-defer.md#le-chemin-critique-du-rendu-et-les-attributs-html-async-et-defer)  
> - [Précédent](./promesses.md#les-promesses-en-javascript)  
> - [Menu principal](../menu.md#1-introduction-au-javascript)

La déclaration `async function` et le mot-clé `await` sont des « sucres syntaxiques », c’est-à-dire qu’ils n’ajoutent pas de nouvelles fonctionnalités en soi au langage mais permettent de créer et d’utiliser des promesses avec un code plus intuitif et qui ressemble davantage à la syntaxe classique du JavaScript à laquelle nous sommes habitués.  

Ces mots-clés sont apparus avec la version 2017 du JavaScript et sont très prisés et utilisés par les API modernes.  
Il est donc intéressant de comprendre comment les utiliser.  

## **Le mot-clé `async`**

Nous allons pouvoir placer le mot-clé `async` devant une déclaration de fonction (ou une expression de fonction, ou encore une fonction fléchée) pour la transformer en fonction asynchrone.  

Utiliser le mot-clé `async` devant une fonction va faire que la fonction en question va toujours retourner une promesse.  
Dans le cas où la fonction retourne explicitement une valeur qui n’est pas une promesse, alors cette valeur sera automatiquement enveloppée dans une promesse.  

Les fonctions définies avec `async` vont donc toujours retourner une promesse qui sera résolue avec la valeur renvoyée par la fonction asynchrone ou qui sera rompue s’il y a une exception non interceptée émise depuis la fonction asynchrone.  

```js
async function bonjour () {
  return 'Bonjour';
}
// La valeur retournée par bonjour() est enveloppée dans une promesse
bonjour().then(alert); // Bonjour
```

## **Le mot-clé `await`**

Le mot-clé `await` est uniquement valide au sein de fonctions asynchrones définies avec `async`.  

Ce mot-clé permet d’interrompre l’exécution d’une fonction asynchrone tant qu’une promesse n’est pas résolue ou rejetée. La fonction asynchrone reprend ensuite puis renvoie la valeur de résolution.  

```js
async function test () {
    const promise = new Promise((resolve, reject) => {
        setTimeout(() => resolve('Ok !'), 2000)
    });
    
    let result = await promise; // Attend que la promesse soit résolue ou rejetée
    alert(result);
}
test();
```

Le mot-clé `await` permet de mettre en pause l’exécution du code tant qu’une promesse n’est pas consommée, puis retourne ensuite le résultat de la promesse.  
Cela ne consomme aucune ressource supplémentaire puisque le moteur peut effectuer d’autres tâches en attendant : exécuter d’autres scripts, gérer des événements, etc.  

Au final, `await` est une syntaxe alternative à `then()`, plus facile à lire, à comprendre et à écrire.  

## **Utiliser async et await pour r&eacute;&eacute;crire nos promesses**

Prenons immédiatement un exemple concret d’utilisation de `async` et `await`.  

Dans la leçon précédente, nous avons utilisé les promesses pour télécharger plusieurs scripts à la suite.  
Notre code ressemblait à cela :  

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
```

Modifions ce code en utilisant `async` et `await`.  
Pour cela, il va nous suffire de définir une fonction `async` et de remplacer les `then()` par des `await` comme ceci :  

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

async function test () {
  const test1 = await chargerScript('./assets/js/boucle.js');
  alert(test1);
  const test2 = await chargerScript('./assets/js/script2.js');
  alert(test2);
  const test3 = await chargerScript('./assets/js/scriptinexistant.js');
  alert(test3);
}
test();
```

Notre script fonctionne (sauf pour le 3éme appel) et ajoute les fichiers les uns à la suite des autres.  
Le problème ici est que nous n’avons aucune prise en charge des erreurs et donc le 3ème appel ne renvoie pas une erreur.  
Nous allons immédiatement remédier à cela.  

## **La gestion des erreurs avec la syntaxe `async / await`**

Si une promesse est résolue (opération effectuée avec succès), alors `await promise` retourne le résultat.  
Dans le cas d’un rejet, une erreur va être lancée de la même manière que si on utilisait `throw`.  

Pour capturer une erreur lancée avec `await`, on peut tout simplement utiliser une structure `try…catch` classique.

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

async function test () {
    try{
        const test1 = await chargerScript('./assets/js/boucle.js');
        alert(test1);
        const test2 = await chargerScript('./assets/js/script2.js');
        alert(test2);
        const test3 = await chargerScript('./assets/js/scriptinexistant.js');
        alert(test3);
    }catch(err){
        alert(err);
        let script = document.head.lastChild;
        script.remove(); // Supprime le script ajouté qui n'a pas pu être lu 
    }
}
test();
```

## `Async/ await` et `all()`

On va tout à fait pouvoir utiliser la syntaxe `async / await` avec la méthode `all()`.  
Cela va nous permettre d’obtenir la liste des résultats liés à ensemble de promesses avec un code plus lisible.  

## **&Agrave; retenir – La syntaxe `async / await`**

Les mots-clés `async` et `await` sont un sucre syntaxique ajouté au JavaScript pour nous permettre d’écrire du code asynchrone : ils n’ajoutent aucune fonctionnalité en soi mais fournissent une syntaxe plus intuitive et plus claire pour définir des fonctions asynchrones et utiliser des promesses.  

Utiliser le mot-clé `async` devant une fonction force la fonction à retourner une promesse et nous permet d’utiliser `await` dans celle-ci.  

En utilisant le mot-clé `await` devant une promesse, on oblige le JavaScript à attendre que la promesse soit consommée.  
Si la promesse est résolue, le résultat est retourné.  
Si elle est rompue, une erreur (exception) est générée.  

Utiliser `async` / `await` permet ainsi d’écrire du code asynchrone qui ressemble dans sa structure à du code synchrone auquel nous sommes habitués et nous permet notamment de nous passer de `then()` et de `catch()` (qu’on va tout de même pouvoir utiliser si le besoin s’en ressent).  

>**Navigation**  
>
> - [Suivant](./chemin-critique-async-defer.md#le-chemin-critique-du-rendu-et-les-attributs-html-async-et-defer)  
> - [Précédent](./promesses.md#les-promesses-en-javascript)  
> - [Menu principal](../menu.md#1-introduction-au-javascript)
