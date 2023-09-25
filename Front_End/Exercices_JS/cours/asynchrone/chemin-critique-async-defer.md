---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 18/05/2022  

---
# **Le chemin critique du rendu et les attributs HTML `async` et `defer`**

>**Navigation**  
>
> - [Suivant](../stockage-dans-navigateur.md/cookies.md#les-cookies-en-javascript)  
> - [Précédent](./async-et-await.md#utiliser-async-et-await-pour-creer-des-promesses-plus-lisibles-en-javascript)  
> - [Menu principal](../menu.md#1-introduction-au-javascript)

Pour finir avec l'asynchrone, nous allons nous intéresser aux attributs HTML `async` et `defer` qui vont nous permettre d’indiquer quand doit être chargé un document JavaScript externe.  
Pour bien comprendre leurs cas d’utilisation et leur intérêt, nous allons également définir ce qu’est le chemin critique du rendu et voir l’impact du chargement et de l’analyse des ressources par le navigateur sur le temps de chargement d’une page.  

## **Le chemin critique du rendu et la performance d’un site**

Lorsqu’un utilisateur essaie d’accéder à une page d’un site Internet en tapant une URL dans son navigateur, le navigateur se charge de contacter le serveur qui héberge la page et lui demande de renvoyer le document demandé ainsi que les ressources nécessaires à son bon fonctionnement (images, etc.).  

A partir de là, le navigateur interprète le code HTML, CSS et JavaScript renvoyé par le serveur et s’en sert pour afficher une page qui n’est autre qu’un ensemble de pixels dessinés à l’écran.  

Le passage du code brut au rendu final se fait en différentes étapes que le navigateur va exécuter à la suite et qu’on appelle également le « chemin critique du rendu ».  

Une bonne connaissance de ces étapes et donc du chemin critique du rendu est extrêmement précieuse pour comprendre comment améliorer la vitesse d’affichage de nos pages et donc les performances de notre site en général.  

Je vous rappelle ici que l’optimisation technique d’un site est avant tout à la charge du développeur : c’est donc un thème qu’il convient de ne pas négliger et c’est une qualité très appréciée et qui permettra de vous démarquer.  

Le chemin critique du rendu est constitué de 6 grandes étapes :  

1. La construction de l’arborescence du DOM (Document Object Model) ;
2. La construction de l’arborescence du CSSOM (CSS Object Model) ;
3. L’exécution du code JavaScript ;
4. La construction de l’arbre de rendu ;
5. La génération de la mise en page ;
6. La conversion du contenu visible final de la page en pixels.  

Le navigateur va donc commencer par créer le DOM (Document Object Model ou modèle objet de document) à partir du balisage HTML fourni.  
L’un des grands avantages du HTML est qu’il peut être exécuté en plusieurs parties.  
Il n’est pas nécessaire que le document complet soit chargé pour que le contenu apparaisse sur la page.  

Ensuite, le navigateur va construire le CSSOM (CSS Object Model ou modèle objet CSS) à partir du balise CSS fourni.  
Le CSSOM est l’équivalent CSS du DOM pour le HTML.  

Le CSS, à la différence du HTML, doit être complètement analysé pour pouvoir être à cause de la notion d’héritage en cascade.  
En effet, les styles définis ultérieurement dans le document peuvent remplacer et modifier les styles précédemment définis.  

Ainsi, si nous commençons à utiliser les styles CSS définis précédemment dans la feuille de style avant que celle-ci ne soit analysée dans son intégralité, nous risquons d’obtenir une situation dans laquelle le code CSS incorrect est appliqué.  

Le CSS est donc considéré comme une ressource bloquant le rendu : l’arbre de ne peut pas être construit tant qu’il n’a pas été complètement analysé.  

Le CSS peut également être bloquant pour des scripts.  
Cela est dû au fait que les fichiers JavaScript doivent attendre la construction du fichier CSSOM avant de pouvoir être exécuté.  

Le JavaScript, enfin, est considéré comme une ressource bloquante pour l’analyseur : l’analyse du document HTML lui-même est bloquée par le JavaScript.  

Lorsque l’analyseur atteint une balise `script`, il s’arrête pour l’exécuter, que celle-ci pointe vers un document externe ou pas (si la balise pointe vers un fichier externe, le fichier sera avant tout récupéré).  
C’est la raison pour laquelle il a pendant longtemps été recommandé de placer le code JavaScript en fin de `body`, après le code HTML, pour ne pas bloquer l’analyse de celui-ci.  

Aujourd’hui, le JavaScript externe peut cependant être chargé de manière asynchrone en utilisant l’attribut `async` que nous allons étudier par la suite.  
Cela permet d’éviter que le JavaScript ne bloque l’analyseur.  

L’arbre de rendu est une combinaison du DOM et du CSSOM.  
Il représente ce qui va être affiché sur la page (c’est-à-dire uniquement le contenu visible).  

Le « layout », c’est-à-dire la disposition ou mise en page est ce qui détermine la taille de la fenêtre active (le « viewport »).  
Déterminer cela va être essentiel pour pouvoir appliquer les styles CSS définis avec des unités en pourcentage ou en viewport. Le viewport est déterminé par la balise `meta name="viewport"`.  

Une fois la mise en page générée, le contenu visible de la page peut finalement être converti en pixels qui vont être affichés à l’écran.  

Le temps nécessaire à la réalisation de ces opérations détermine en partie la vitesse d’affichage des pages de votre site.  
Il va donc être important d’optimiser son code et notamment d’insérer les fichiers JavaScripts (qui sont souvent responsables de la majorité du délai d’affichage) de la façon la plus adaptée.  

## **Les attributs `async` et `defer`**

Avec l’évolution des technologies, de la puissance des machines et de la vitesse de connexion, les sites Web se complexifient de plus en plus et font appel à toujours plus de ressources externes.  

Parmi ces ressources externes, on retrouve au premier plan les scripts JavaScript : chargement de telle librairie, script de récolte des données comme Google Analytics, etc.  

Le chargement de ces scripts impacte le temps de chargement de chaque page d’un site et, si celui-ci est mal exécuté, peut bloquer l’affichage de la page pendant de précieuses secondes.  

Pour résoudre ce problème de blocage de l’analyseur lors du chargement d’un script JavaScript externe, le HTML5 nous fournit deux nouveaux attributs : `async` et `defer` qu’on va pouvoir inclure dans nos balises `script` servant à charger un fichier externe.  

L’attribut `async` est utilisé pour indiquer au navigateur que le fichier JavaScript peut être exécuté de manière asynchrone.  
L’analyseur HTML n’a pas besoin de faire une pause au moment où il atteint la balise script pour l’extraire et l’exécuter : le script sera extrait pendant que l’analyseur finit son travail et sera exécuté dès qu’il sera prêt.  

L’attribut `defer` permet d’indiquer au navigateur que le fichier JavaScript ne doit être exécuté qu’une fois que le code HTML a fini d’être analysé.  
De la même manière que pour `async`, le fichier JavaScript pourra être téléchargé pendant l’analyse du code HTML.  

## **Quand utiliser `async` ou `defer` ?**

Concrètement, si vous placez vos balises `script` en fin de document, les attributs `async` et `defer` n’auront aucun effet puisque l’analyse du document HTML sera déjà effectuée.  

En revanche, dans de nombreuses situations, nous n’allons pas pouvoir placer nos balises `script` où on le souhaite dans la page.  
Dans ce cas-là, il va pouvoir être intéressant d’utiliser `async` ou `defer`.  

Si on doit télécharger plusieurs scripts dans notre page et que la bonne exécution de chaque script de dépend pas des autres, alors utiliser l’attribut `async` semble être la meilleure solution puisque l’ordre de chargement des scripts nous importe peu.  

Si un fichier de script interagit avec le DOM de la page, alors il faudra s’assurer que le DOM ait été entièrement créé avant d’exécuter le script en question afin que tout fonctionne bien.  
Dans ce cas, l’utilisation de l’attribut `defer` semble la plus appropriée.  

De même, si certains scripts ont besoin que d’autres scripts soient déjà disponibles pour fonctionner, alors on utilisera plutôt l’attribut `defer` et on fera attention à l’ordre d’inclusion des scripts dans la page.  
En effet, l’attribut `defer` va permettre d’exécuter les scripts dans l’ordre donné dès la fin du chargement de la page au contraire de `async` qui va exécuter les scripts dès que ceux-ci sont prêts.  

>**Navigation**  
>
> - [Suivant](../stockage-dans-navigateur.md/cookies.md#les-cookies-en-javascript)  
> - [Précédent](./async-et-await.md#utiliser-async-et-await-pour-creer-des-promesses-plus-lisibles-en-javascript)  
> - [Menu principal](../menu.md#1-introduction-au-javascript)
