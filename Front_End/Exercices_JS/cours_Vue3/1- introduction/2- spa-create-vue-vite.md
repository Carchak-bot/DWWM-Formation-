---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 26/05/2022  

---
# **Les Single Page Applications**

Comme nous l'avons vu précédemment, **Vue.js** permet de construire des **Single Page Applications**.  

Vous connaissez forcément des SPA : ***Gmail***, ***Google Analytics***, ***Trello***, ***Dropbox*** en sont des exemples parmi tant d'autres.  

La plupart des frameworks ont adopté cette architecture (***Vue***, ***Angular***, ***React***, ***Ember***, ***Meteor*** etc).  

Nous allons maintenant un peu plus détailler les SPA.  

Une **single page application** (SPA) est une application qui fonctionne dans un navigateur sans que l'utilisateur n'ait besoin de recharger la page.  

Le principe est de simuler une application hors ligne : pas de rechargement des pages, de la rapidité, pas d'attente supplémentaire dûe au réseau etc.  

Les principales caractéristiques de la SPA sont :  

- le rendu est effectué côté client (quand un élément change, la page est modifié grâce aux scripts de l'application chargée côté client)
- pour fonctionner elle charge en principe une seule fois l'application (HTML, CSS et JavaScript)
- seules les données sont transmises, si nécessaire, entre le serveur et l'application client (le plus souvent au format JSON)
- le développement mobile est simplifié car le code backend peut être utilisé que l'application soit Web ou native (iOS, Android).
- elle est particulièrement adaptée pour stocker les données localement et de n'envoyer des requêtes au serveur lorsque c'est nécessaire

## **La librairie create-vue**

create-vue est la librairie officielle de Vue.js permettant de construire facilement un projet avec Vue.js.  

Elle permet de configurer entièrement le framework suivant ses souhaits : utiliser ou non TypeScript, utiliser ou non JSX (le langage de template de Reac), utiliser le Router de Vue, le gestionnaire d'état, la librairie de tests end-to-end etc.  

Nous verrons bien sûr à plusieurs reprises comment configurer parfaitement un projet Vue.js en utilisant la librairie.  

## **Fonctionnement de Vite**

**Vite** est un outil de build conçu par le créateur de Vue.js pour remplacer Webpack.  

C'est donc tout naturellement que Vue.js recommande aujourd'hui cet outil de build pour réaliser des applications.  

Les deux principales fonctionnalités de **Vite** sont un serveur de développement et un outil de build pour la mise en production.  

***Le serveur de développement*** : permet d'accéder à l'application durant le développement et de recharger ou de réafficher l'application lors de modifications du code de la manière la plus rapide possible.  

## **La notion de bundler ("empaqueteur")**

![Bundler](../assets/img/bundler.png)

Un bundle est un regroupement des fichiers JavaScript, HTML et CSS permettant d'accélérer le chargement.  

Aujourd'hui, les applications web sont devenues très sophistiquées, c'est pourquoi les frameworks comme Vue.js morcellent le JavaScript, le CSS et le HTML en de nombreux fichiers afin que le code soit maintenable et réutilisable.  

Il n'est ainsi pas rare qu'une application complexe dépasse le millier de fichiers.  

Les frameworks utilisent des modules JavaScript et gère les dépendances de chaque fichier avec import et export.  Les fichiers importent les dépendances qu'ils ont besoin parmi ce qui est exporté par d'autres fichiers.  

Or, les navigateurs Web ont besoin que les fichiers soient organisés d'une certaine manière pour fonctionner. Un bundler permet de les organiser de manière optimisée pour les navigateurs.  

Un bundler peut gérer l'arbre de dépendances créés par les imports et exports pour générer des fichiers uniques.  

Il réalise également d'autres tâches comme la minification et la compression qui permettent d'obtenir des performances bien supérieures (en rendant le code extrêmement compact et parfois même en le compressant).  

## **Vite en détail**

Pour le développement, Vite utilise un pré-bundler pour les dépendances. Il permet de bundler les dépendances de 10 à 100 fois plus vite que les outils existants car il est écrit dans un langage plus performant pour ce genre de tâche (Go).  

Il utilise également le remplacement à chaud de module (Hot Module Replacement), la mise en cache des dépendances par le navigateur, le rechargement uniquement des modules modifiés et la mise en cache des ressources non modifiés pour accélérer au maximum les rechargements lors des modifications du code en tirant profit des dernières évolutions des navigateurs et du langage JavaScript (principalement les modules EcmaScript, appelés ESM).  

Pour la production, Vite va regrouper tous les fichiers JavaScript, HTML et CSS dans un bundle découpé en morceaux (appelés chunks).  

La taille des chunks est optimisé pour le chargement par les navigateurs (notamment en tirant profit du nouveau protocole HTTP2) en évitant les allers-retours (requête client / réponse serveur) au maximum.  

Les chunks sont également optimisées pour la mise en cache (seules les parties de l'application qui sont modifiées entre deux mises en production auront besoin d'être rechargées par le navigateur).  

Elles permettent enfin d'être chargées au bon moment suivant la route pour limiter les chargements inutiles de code côté navigateur (c'est ce qu'on appelle le lazy-loading, nous y reviendrons).  

Enfin, Vite permet de tree-shaker l'application : à savoir enlever automatiquement du bundle final, toutes les parties de l'application et les dépendances qui ne sont pas utilisées effectivement par l'application.  

Pour le développement et la production, Vite s'assure du pré-traitement (pre-processing) nécessaires pour que l'application puisse être exécutée par les navigateurs.  

A titre d'exemple, il va transpiler le TypeScript en JavaScript ou le Sass en CSS.  

Vite est donc un outil très puissant qui réalise énormément d'opérations qui sont cachées au développeur pour optimiser la productivité lors de la phase de développement et la performance lors de la production de l'application.  

Une fois qu'on a goûté à Vite, il n'est plus possible de s'en passer !  

## **Qu'est-ce que TypeScript ?**

![TypeScript](../assets/img/typescript.png)

Les projets utilisant JavaScript se sont complexifiés énormément et il est devenu de plus en plus difficile de les maintenir.  

Il est compliqué de pouvoir comprendre ce que fait du code JavaScript lorsqu'on arrive sur un projet impliquant de nombreux développeurs.  

Il est difficile de savoir ce qu'accepte une fonction et ce qu'elle retourne, et devoir à chaque fois lire les éventuels commentaires pour chaque fonction dans plusieurs fichiers est fastidieux.  

De très nombreux langages ou environnement ont tenté d'y remédier, on peut citer notamment : Flow, Dart, Elm, Reason, et Closure.  

Mais le seul qui a vraiment conquis l'écosystème et s'est imposé dans une quantité astronomique de projets majeurs est TypeScript.  

TypeScript a été créé par Microsoft en 2012, il est depuis le départ un projet open-source.  

C'est un langage avec un typage fort et qui transpile en JavaScript.  

Transpiler signifie compiler vers un langage de même niveau.  

Il est conçu comme une addition pour faire de JavaScript un langage qui scale en ajoutant des types.  

Ses avantages immédiats sont :  

- Du code beaucoup plus lisible.

- Du code beaucoup plus maintenable.

- Beaucoup de bugs en moins grâce au compilateur.

Depuis la version 3 de Vue.js, le framework entier est codé en TypeScript et l'équipe recommande fortement l'utilisation de TypeScript.  

Si l'utilisation de TypeScript peut paraître fastidieuse au départ c'est un investissement extrêmement lucratif ! Les gains de productivité sont énormes.  

Dans le cours nous utiliserons donc TypeScript en vous présentant toutes les bases du langages nécessaires. Si vous voulez ensuite aller plus loin, vous pourrez simplement suivre le cours TypeScript sur la plateforme.
