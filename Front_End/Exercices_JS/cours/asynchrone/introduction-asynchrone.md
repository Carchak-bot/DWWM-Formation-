---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 18/05/2022  

---
# **Introduction a l’asynchrone en JavaScript**

>**Navigation**  
>
> - [Suivant](./promesses.md#les-promesses-en-javascript)  
> - [Précédent](../manipulation-dom/event-empecher-annuler.md#empecher-un-evenement-de-se-propager-et-annuler-son-comportement-par-defaut-en-javascript)  
> - [Menu principal](../menu.md#1-introduction-au-javascript)

Dans cette nouvelle partie, nous allons traiter de l’asynchrone en JavaScript. Nous allons déjà commencer par définir ce qu’est une opération asynchrone puis nous verrons les bénéfices de l’asynchrone et comment créer du code qui exploite ces bénéfices.  

## **Une premiere definition des termes « synchrone » et « asynchrone »**

Dans la vie de tous les jours, on dit que deux actions sont synchrones lorsqu’elles se déroulent en même temps ou de manière synchronisée. Au contraire, deux opérations sont asynchrones si elles ne se déroulent pas en même temps ou ne sont pas synchronisées.  

En informatique, on dit que deux opérations sont synchrones lorsque la seconde attend que la première ait fini son travail pour démarrer.  
Ce qu’il faut retenir de cette définition est le concept de dépendance (la notion de « synchronisation » dans la première définition donnée de synchrone au-dessus) : le début de l’opération suivante dépend de la complétude de l’opération précédente.  

Au contraire, deux opérations sont qualifiées d’asynchrones en informatique lorsqu’elles sont indépendantes c’est-à-dire lorsque la deuxième opération n’a pas besoin d’attendre que la première se termine pour démarrer.  

Les définitions de « synchrone » et « d’asynchrone » en programmation peuvent parfois dérouter au premier abord car on pourrait penser qu’elles sont contraires à celles citées ci-dessus puisqu’on peut ici en déduire que deux opérations asynchrones en informatique vont pouvoir se dérouler en même temps tandis que deux opérations synchrones ne vont pas pouvoir le faire.  

C’est à moitié vrai, mais ça reste malheureusement le vocabulaire et les définitions avec lesquelles nous devons travailler.  
Encore une fois, essayez pour commencer de vous concentrer un maximum sur le concept d’opérations dépendantes ou indépendantes les unes des autres.  

Pour faire un parallèle avec la vie de tous les jours et pour être sûr que vous compreniez bien les concepts de synchrone et d’asynchrone en informatique, on peut prendre l’exemple d’un restaurant.  

Plusieurs clients sont attablés. Ils peuvent passer commande en même temps s’ils le souhaitent et être servis dès que leur plat est prêt. D’un point de vue programmation, ce scénario est asynchrone.  

Imaginons maintenant que le restaurant ne possède qu’un employé qui est donc à la fois serveur et cuisinier et que celui-ci ne puisse faire qu’un plat à la fois.  
Chaque client doit donc attendre que le précédent ait été servi pour passer commande.  
D’un point de vue informatique, ce scénario est synchrone.  

## **L’importance de l’asynchrone en programmation**

Par défaut, le JavaScript est un langage synchrone, bloquant et qui ne s’exécute que sur un seul thread. Cela signifie que :  

- Les différentes opérations vont s’exécuter les unes à la suite des autres (elles sont synchrones) ;
- Chaque nouvelle opération doit attendre que la précédente ait terminé pour démarrer (l’opération précédente est « bloquante ») ;
- Le JavaScript ne peut exécuter qu’une instruction à la fois (il s’exécute sur un thread, c’est-à-dire un « fil » ou une « tache » ou un « processus » unique).  

Cela peut rapidement poser problème dans un contexte Web : imaginons qu’une de nos fonctions ou qu’une boucle prenne beaucoup de temps à s’exécuter.  
Tant que cette fonction n’a pas terminé son travail, la suite du script ne peut pas s’exécuter (elle est bloquée) et le programme dans son ensemble parait complètement arrêté du point de vue de l’utilisateur.  

```js

let x = 0;

// L'exécution de cette boucle devrait prendre un certain temps
while (x <= 1000000000000){
    x++;
}

// La suite du script de ne s'exécute qu'après la fin de l'opération précédente
alert('Suite du script');
```

Pour éviter de bloquer totalement le navigateur et le reste du script, on aimerait que ce genre d’opérations se déroule de manière asynchrone, c’est-à-dire en marge du reste du code et qu’ainsi le reste du code ne soit pas bloqué.  

Cela est aujourd’hui possible puisque les machines disposent de plusieurs cœurs, ce qui leur permet d’exécuter plusieurs tâches de façon indépendante et en parallèle et que le JavaScript nous fournit des outils pour créer du code asynchrone.  

## **Les fonctions de rappel : &agrave; la base de l’asynchrone en JavaScript**

Au cours de ces dernières années les machines sont devenues de plus en plus puissantes et les scripts de plus en plus complexes et de plus en plus gourmands en ressources.  
Dans ce contexte, il faisait tout à fait sens pour le JavaScript de fournir des outils pour permettre à certaines opérations de se faire de manière asynchrone.  

En JavaScript, les opérations asynchrones sont placées dans des files d’attentes qui vont s’exécuter après que le fil d’exécution principal ou la tâche principale (le « main thread » en anglais) ait terminé ses opérations.  
Elles ne bloquent donc pas l’exécution du reste du code JavaScript.  

L’idée principale de l’asynchrone est que le reste du script puisse continuer à s’exécuter pendant qu’une certaine opération plus longue ou demandant une réponse / valeur est en cours.  
Cela permet un affichage plus rapide des pages et en une meilleure expérience utilisateur.  

Le premier outil utilisé en JavaScript pour générer du code asynchrone a été les fonctions de rappel.  
En effet, une fonction de rappel ou « callback » en anglais est une fonction qui va pouvoir être rappelée (« called back ») à un certain moment et / ou si certaines conditions sont réunies.  

L’idée ici est de passer une fonction de rappel en argument d’une autre fonction.  
Cette fonction de rappel va être rappelée à un certain moment par la fonction principale et pouvoir s’exécuter, sans forcément bloquer le reste du script tant que ce n’est pas le cas.  

Nous avons déjà vu dans ce cours des exemples d’utilisation de fonctions de rappel et de code asynchrone, notamment avec l’utilisation de la méthode `setTimeout()` qui permet d’exécuter une fonction de rappel après un certain délai ou encore avec la création de gestionnaires d’évènements qui vont exécuter une fonction seulement lorsqu’un évènement particulier se déclenche.  

```js
/* setTimeout() est asynchrone : le reste du script va pouvoir s'exécuter
 * sans avoir à attendre la fin de l'exécution de setTimeout()*/
setTimeout(alert, 5000, 'Message affiché après 5 secondes');

// Cette alerte sera affichée avant celle définie dans setTimeout()
alert('Suite du script');
```

Utiliser des fonctions de rappel nous permet donc de créer du code qui va pouvoir être appelé à un certain moment défini ou indéfini dans le futur et qui ne va pas bloquer le reste du script, c’est-à-dire du code asynchrone.  

## **Les limites des fonctions de rappel : le « callback hell »**

Utiliser des fonctions de rappel pour générer du code asynchrone fonctionne mais possède certains défauts.  
Le principal défaut est qu’on ne peut pas prédire quand notre fonction de rappel asynchrone aura terminé son exécution, ce qui fait qu’on ne peut pas prévoir dans quel ordre les différentes fonctions vont s’exécuter.  

Dans le cas où nous n’avons qu’une opération asynchrone définie dans notre script ou si nous avons plusieurs opérations asynchrones totalement indépendantes, cela ne pose pas de problème.  

En revanche, cela va être un vrai souci si la réalisation d’une opération asynchrone dépend de la réalisation d’une autre opération asynchrone. Imaginons par exemple un code JavaScript qui se charge de télécharger une autre ressource relativement lourde.  
On va vouloir charger cette ressource de manière asynchrone pour ne pas bloquer le reste du script et pour ne pas que le navigateur « freeze ».  

Lorsque cette première ressource est chargée, on va vouloir l’utiliser et charger une deuxième ressource, puis une troisième, puis une quatrième et etc.  

Le seul moyen de réaliser cela en s’assurant que la ressource précédente soit bien disponible avant le chargement de la suivante va être d’imbriquer le deuxième code de chargement dans la fonction de rappel du premier code de chargement, puis le troisième code de chargement dans la fonction de rappel du deuxième code de chargement et etc.  

```js
/* La fonction chargerScript() crée un nouvel élément script et ajoute la
valeur passée en argument à l'attribut src puis insère l'élément script
dans l'élément head de notre fichier HTML */
function chargerScript(src, callback) {
    let script = document.createElement('script');
    script.src = src;
    script.onload = () => callback(script);
    document.head.append(script);
}

chargerScript('boucle.js', function(script){
    alert('Le fichier ' + script.src + ' a bien été chargé. x vaut : ' + x);
    chargerScript('script2.js', function(script){
        // Utilise les éléments du script boucle.js pour effectuer des opérations…
        alert('Le fichier ' + script.src + ' a bien été chargé');
        chargerScript('script3.js', function(script){
            /* Utilise les éléments des scripts boucle.js et script2.js
            pour effectuer des opérations… */
            alert('Le fichier ' + script.src + ' a bien été chargé');
        });
    });
});

alert('Message d\'alerte du script principal');
```

Ici, notre code n’est pas complet car on ne traite pas les cas où une ressource n’a pas pu être chargée, c’est-à-dire les cas d’erreurs qui vont impacter le chargement des ressources suivantes.  
Dans le cas présent, on peut imaginer que seul le script `boucle.js` est accessible et qu’il ressemble à cela.  

Pour gérer les cas d’erreur, nous allons passer un deuxième argument à nos fonctions de rappel.  

```js
function chargerScript(src, callback) {
    let script = document.createElement('script');
    script.src = src;
    script.onload = () => callback(null, script);
    script.onerror = () => callback(new Error('Erreur de chargement de ' + src));
    document.head.append(script);
}

chargerScript('boucle.js', function(error, script){
    if(error){
        alert(error.message);  
    }else{
        alert('Le fichier ' + script.src + ' a bien été chargé. x vaut : ' + x);
        chargerScript('script2.js', function(error, script){
            if(error){
                alert(error.message);
            }else{
                alert('Le fichier ' + script.src + ' a bien été chargé');
                chargerScript('script3.js', function(error, script){
                    if(error){
                        alert(error.message);
                    }else{
                        alert('Le fichier ' + script.src + ' a bien été chargé');
                    }
                });
            }
        });
    }
});

alert('Message d\'alerte du script principal');
```

La syntaxe adoptée ici est très classique et est issue de la convention « error-first ».  
L’idée est de réserver le premier argument d’une fonction de rappel pour la gestion des erreurs si une erreur se produit.  
Dans ce cas-là, on rentre dans le if. Dans le cas où aucune erreur ne survient, on passe dans le `else`.  

Cela fonctionne mais je suppose que vous commencez à voir le souci ici : pour chaque nouvelle opération asynchrone qui dépend d’une précédente, nous allons devoir imbriquer une nouvelle structure dans celle déjà existante.  
Cela rend très rapidement le code complètement illisible et très difficile à gérer et à maintenir.  
C’est ce phénomène qu’on a appelé le « callback hell » (l’enfer des fonctions de retour), un nom relativement évocateur !  

## **L’introduction des promesses : vers une gestion sp&eacute;cifique de l’asynchrone**

L’utilisation de fonctions de rappel pour effectuer des opérations asynchrones a pendant longtemps été la seule option en JavaScript.  

En 2015, cependant, le JavaScript a intégré un nouvel outil dont l’unique but est la génération et la gestion du code asynchrone : les promesses avec l’objet constructeur `Promise`.  
C’est à ce jour l’outil le plus récent et le plus puissant fourni par le JavaScript nous permettant d’utiliser l’asynchrone dans nos scripts (avec la syntaxe `async` et `await` basée sur les promesses et que nous verrons en fin de partie).  

Une « promesse » est donc un objet représentant l’état d’une opération asynchrone.  
Comme dans la vie réelle, une promesse peut être soit en cours (on a promis de faire quelque chose mais on ne l’a pas encore fait), soit honorée (on a bien fait la chose qu’on avait promis), soit rompue (on ne fera pas ce qu’on avait promis et on a prévenu qu’on ne le fera pas).  

Plutôt que d’attacher des fonctions de rappel à nos fonctions pour générer des comportements asynchrones, nous allons créer ou utiliser des fonctions qui vont renvoyer des promesses et allons attacher des fonctions de rappel aux promesses.  

Notez qu’aujourd’hui de plus en plus d’API utilisent les promesses pour gérer les opérations asynchrones.  
Ainsi, bien souvent, nous ne créerons pas nous même de promesses mais nous contenterons de manipuler des promesses déjà consommées, c’est-à-dire des promesses renvoyées par les fonctions de l’API utilisée.  

>**Navigation**  
>
> - [Suivant](./promesses.md#les-promesses-en-javascript)  
> - [Précédent](../manipulation-dom/event-empecher-annuler.md#empecher-un-evenement-de-se-propager-et-annuler-son-comportement-par-defaut-en-javascript)  
> - [Menu principal](../menu.md#1-introduction-au-javascript)
