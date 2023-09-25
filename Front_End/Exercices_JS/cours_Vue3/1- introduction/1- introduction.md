---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 26/05/2022  

---
# **Qu'est-ce que Vue ?**

## **Introduction à Vue.js**

Qu'est ce que Vue.js ?

Vue.js est un framework permettant de développer des interfaces utilisateur.  

Il est développé entièrement en **TypeScript** depuis sa version 3.  

**TypeScript** est un langage de programmation open source développé par **Microsoft**. C'est un sur-ensemble syntaxique de **JavaScript**.  

Cela signifie que c'est du JavaScript ***amélioré***, qui permet notamment un ***typage fort***. Il est ensuite transformé en JavaScript.  
Les navigateurs ne comprennent en effet que les langages HTML, CSS et JavaScript.  

**Vue.js** est fondé sur deux concepts clés : le **rendu déclaratif** et la **réactivité**.  

Le **rendu déclaratif** est le fait de décrire le rendu (**HTML**) en fonction de l'état de l'application (en **JavaScript**).  

La **réactivité** est le fait que **Vue** suit les changements d'état dans le code **JavaScript** et met à jour le **DOM** de manière optimisée si des changements doivent être faits.  

Vue est ce qu'on appelle un **framework orienté composant**.  
Un **composant** est une sorte de brique qui contient plusieurs parties :  

- Une partie logique (en JavaScript) qui va permetre l'interaction ;
- Une partie visuelle (en HTML & CSS).  

Ces composants vont être réactifs, c'est à dire que toute la partie logique va avoir un impact sur la partie visuelle.  
Par exemple, cliquer sur un bouton va avoir un effet sur la partie visuelle en ouvrant un menu.  
Au sein d'une application web classique, on trouve souvent un header avec une navigation, une partie **main** avec des **menus latéraux** et une **partie centrale**, et enfin un **footer**.  
Chacun de ces éléments va être un composant que l'on va pouvoir gérer de manière autonome au sein de l'application **Vue**.  

## **Un framework progressif**

L'une des grandes forces de **Vue.js** est d'être progressif : vous pouvez faire une application très simple sans étape de **build** juste avec la librairie `core`, mais vous pouvez aussi faire une application très complexe avec beaucoup d'étapes de **build** automatisés, une gestion des routes, de l'état de l'application etc.  

Nous verrons ainsi notamment les librairies officielles suivantes, qui font partie du `framework Vue.js` :

`Vue Router` : permet de gérer la navigation de l'utilisateur dans l'application.  

`Pinia` : permet de gérer l'état de l'application.  

`Vite` : permet de construire l'application (par exemple en transpilant le `Sass` et `CSS` ou le `TypeScript` en `JavaScript`) et de l'optimiser.  

***Transpiler signifie convertir dans un autre langage de même niveau (contrairement à la compilation qui transforme du code dans un langage de haut niveau à un langage plus proche du langage machine).***  

## **Tous les rendus possibles !**

Vue.js permet aujourd'hui de faire des applications de tous les principaux types de rendu :

- `SPA` (**Single-Page Application**) : le serveur envoie une page HTML avec un lien vers des fichiers JavaScript qui contiennent toute l'application.  
Le navigateur va charger toute l'application qui va gérer un grand nombre d'opérations comme le routage entre les pages.
- `SSR` (**Server Side Rendering**) : la page Web est générée par le serveur qui construit le HTML, le CSS et le JavaScript nécessaires en fonction de la requête, pour rendre la page. Pendant ce temps, le navigateur télécharge la SPA qui sera ensuite utilisée.  
Cela permet aux utilisateurs d'avoir un premier affichage quasi-immédiat sans avoir à attendre le chargement de l'application.  
Lorsque le SSR est configurée on dit alors que l'application est universelle car elle est rendue à la fois côté serveur et côté client.
- `SSG` (**Static-Site-Generation** / **JAMStack** ) : toutes les pages sont pré-générées sur le serveur (tout le HTML, le CSS et le JavaScript est générés en amont) et servies au navigateur en fonction des requêtes.  
C'est utile pour faire de petits sites statiques. Vous pouvez alors utiliser **VitePress**, la librairie SSG officielle de Vue.

Vous pouvez également faire des applications bureautiques (par exemple avec ***Electron*** ou ***Tauri***), des applications mobiles (par exemple avec ***Ionic*** ou ***Quasar***) ou encore utiliser ***WebGL*** ou développer des applications pour le terminal.  

## **Une traction incroyable**

Contrairement à Angular ou React aucun géant du numérique ne se cache derrière Vue.js mais seulement Evan You, et bien sûr de très nombreux contributeurs.  

Vue.js a une traction phénoménale ces dernières années : il dépasse les 3 millions de téléchargements par semaine sur npm !  

C'est le framework JavaScript qui a le plus d'étoiles sur Github (environ 200 000).  

Le framework est aujourd'hui très stable et est utilisé notamment par Laravel (comme framework Javascript par défaut), par GitLab et par PageKit.  

En Chine, il s'agit du framework le plus utilisé avec notamment Alibaba, Baidu, Sina Weibo et Xiaomi qui l'utilisent en production.  

Nous pouvons donner quelques autres exemples de sites connus faits avec **Vue.js** : Behance,  Back Market, Louis Vuitton USA, Ecosia, Google Carreers, plusieurs sites de Microsoft (par exemple Azure for Partners), de très nombreux sites d'Alibaba, Baidu.  

Quelques exemples d'interfaces utilisateurs développées avec Vue :  

- [Gitlab](https://about.gitlab.com/) ;
- [chess.com](https://www.chess.com/) ;
- [Plateforme freelance](https://www.upwork.com/).

## **Vue.js 3**

Vue.js 3 est sorti en septembre 2020 et est devenu la version officielle par défaut en février 2022 (le temps que les autres librairies du framework soient également réécrites).  

L'ensemble du framework a été entièrement réécrit en **TypeScript** et a de bien meilleures performances que la version 2. Il est encore plus léger et optimisé.  

Il bénéficie également d'une toute nouvelle **API** appelée ***Composition API*** qui permet de rendre plus facile le développement d'applications complexes.  

Vue.js 3 est donc une nouvelle version vraiment différente de la version 2 avec de nombreuses modifications.  

Les librairies composants le **framework** ont également changé : **Vite** a remplacé Webpack et **Pinia** a remplacé Vuex par exemple.  

## **Avantages**

### **Taille**

La librairie Vue.js fait seulement **20kB** lorsqu'elle est minimisée et compressée, c'est donc un framework très léger qui se charge instantanément par le client.  

### **Rapidité**

Les performances de Vue sont excellentes et elles surpassent même celles de **React** sur le rendu et la mise à jour du DOM.  

Vue.js utilise un DOM virtuel pour minimiser le nombre de mutations du DOM nécessaires lors de changements.  

Vue.js a des algorithmes de calcul des mutations nécessaires qui s'avèrent plus performants et légers que ceux de **React**.  

## **Un framework complet**

Vue comporte tous les éléments pour une application moderne complexe : gestion de la navigation, gestion avancée de l'état, gestion de la construction de l'application de manière optimisée, gestion des rendus (même universel avec le SSR) etc.  

Autrement dit, Vue gère tout !  

## **Note sur le choix des technologies**

Dans ce cours, nous suivrons l'intégralité des recommandations officielles de Vue.js pour le choix des technologies.

Pour cette raison, nous utiliserons `TypeScript`, `Vite`, le `Router Vue`, `Pinia`, `Visual Studio Code`, `Volar`, `Vue browser devtools`, `Cypress`, `Vitest`, `eslint-plugin-vue` et `Jest`.
