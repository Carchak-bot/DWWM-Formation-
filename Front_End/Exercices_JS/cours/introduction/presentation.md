---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 22/04/2022  

---
# **C'est parti pour JavaScript !**

>**Navigation**  
>
> - [Suivant](../variables-et-types-valeurs/variables.md#presentation-des-variables-javascript)  
> - [Menu principal](../menu.md#1-introduction-au-javascript)

## **Une première définition du JavaScript**

Le JavaScript est un langage de programmation créé en 1995.  
Le JavaScript est aujourd’hui l’un des langages de programmation les plus populaires et il fait partie des langages web dits « standards » avec le HTML et le CSS.  
Son évolution est gérée par le groupe ECMA International qui se charge de publier les standards de ce langage.  

On dit que le HTML, le CSS et le JavaScript sont des standards du web car les principaux navigateurs web (Google Chrome, Safari, Firefox, etc.) savent tous « lire » (ou « comprendre » ou « interpréter ») ces langages et les interprètent généralement de la même façon ce qui signifie qu’un même code va généralement produire le même résultat dans chaque navigateur.

Pour définir ce qu’est le JavaScript et le situer par rapport aux autres langages, et donc pour comprendre les intérêts et usages du JavaScript il faut savoir que :  

- Le JavaScript est un langage dynamique ;
- Le JavaScript est un langage (principalement) côté client ;
- Le JavaScript est un langage interprété ;
- Le JavaScript est un langage orienté objet.

Pas d’inquiétude, on va définir le plus simplement possible ce que ces qualificatifs signifient !  

### **Le JavaScript, un langage dynamique**

Le JavaScript est un langage dynamique, c’est-à-dire un langage qui va nous permettre de générer du contenu dynamique pour nos pages web.  

Un contenu « dynamique » est un contenu qui va se mettre à jour dynamiquement, c’est-à-dire changer sans qu’on ait besoin de modifier le code manuellement mais plutôt en fonction de différents facteurs externes.  

On oppose généralement les langages « dynamiques » aux langages « statiques » comme le HTML et le CSS.  
Illustrons les différences d’utilisation entre ces types de langage en discutant des possibilités du HTML, du CSS et du JavaScript.  

Pour rappel, le HTML est un langage de balisage (langage qui utilise des balises) qui est utilisé pour structurer et donner du sens aux différents contenus d’une page.  
Le HTML nous permet de communiquer avec un navigateur en lui indiquant que tel contenu est un titre, tel contenu est un simple paragraphe, tel autre est une liste, une image, etc.  

Le navigateur comprend les différentes balises HTML et va alors afficher notre page à nos visiteurs en tenant compte de celles-ci.  

Le contenu HTML ne va jamais être affiché tel quel, brut, mais des règles de mises en forme vont lui être appliquées.  
Ces règles de styles vont être définies en CSS.  
Le CSS va ainsi nous permettre d’arranger les différents contenus HTML de la page en les positionnant les uns par rapport aux autres, en modifiant la couleur des textes, la couleur de fond des éléments HTML, etc.  

Le CSS va ainsi se charger de l’aspect visuel de notre page tandis que le HTML se charge de la structure (définir les contenus) de celle-ci.  

Le HTML et le CSS forment ainsi un premier couple très puissant.  
Cependant, nous allons être limités si nous n’utilisons que ces deux langages tout simplement car ce sont des langages qui ne permettent que de créer des pages « statiques ».  

Une page statique est une page dont le contenu est le même pour tout le monde, à tout moment.  
En effet ni le HTML ni le CSS ne nous permettent de créer des contenus qui vont se mettre à jour par eux-mêmes.  
Le CSS, avec les animations, nous permet de créer des styles pseudo-dynamiques mais tout de même prédéfinis.  

C’est là où le JavaScript entre en jeu : ce langage va nous permettre de manipuler des contenus HTML ou des styles CSS et de les modifier en fonction de divers évènements ou variables.  
Un évènement peut être par exemple un clic d’un utilisateur à un certain endroit de la page tandis qu’une variable peut être l’heure de la journée.  

Regardez par exemple le code suivant :  
`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
  <head>
    <title>Manipuler le DOM (Domain Object Model, la structure du document HTML)</title>
    <meta charset="utf-8">
    <meta name="viewport"
        content="width=device-width, initial-scale=1, user-scalable=no">
    <link rel="stylesheet" href="cours.css">
    <script>
        window.addEventListener('load',horloge);
        function horloge(){
            let d = new Date();
            document.getElementById('heure').innerHTML = d.toLocaleTimeString();
            setTimeout(horloge, 1000);
        }

        document.addEventListener('DOMContentLoaded', function(){
            let cache = document.getElementById('bouton');
            cache.addEventListener('click',cacheHorloge);
            document.getElementById('tog').style.display = 'block';
            function cacheHorloge(){
                let para = document.getElementById('tog');
                if(para.style.display == 'block'){
                    para.style.display = 'none';
                }else{
                    para.style.display = 'block';
                }
            }
      });
    </script>
  </head>

  <body>
    <h1>Titre principal</h1>
    <p id='tog'>Il est actuellement <span id='heure'></span></p>
    <button id='bouton'>Cacher / Afficher l'heure</button>
  </body>
</html>
```

L’idée n’est bien sûr pas ici de vous expliquer comment fonctionne ce code qui est déjà relativement complexe mais de vous donner une idée de ce qu’on va pouvoir réaliser avec quelques lignes de JavaScript.  

Mon code JavaScript est ici placé dans l’élément head de mon fichier HTML à l’intérieur d’un élément script.  
Ce code récupère l’heure actuelle et l’actualise toutes les secondes d’une part, et nous permet de cacher / d’afficher l’heure via un bouton d’autre part.  

Ces deux fonctionnalités sont des fonctionnalités dynamiques qu’on n’aurait pas pu réaliser en HTML ni en CSS.  

### **Le JavaScript, un langage (principalement) côté client**

La catégorisation langages statiques / langage dynamique est une première façon de classer les différents langages de programmation.  

On peut également classer les différents langages selon l’endroit où ils vont s’exécuter : soit côté client, soit côté serveur.  

Pour comprendre ce que sont les langages « côté client » et « côté serveur », il convient avant tout de comprendre ce qu’est un client et ce qu’est un serveur et pour cela il faut savoir ce qu’est un site.  

Un site est un ensemble de ressources et de fichiers liés entre eux.  
Pour que notre site soit accessible sur le web pour tous, on va l’héberger sur un serveur, c’est-à-dire envoyer l’ensemble de nos fichiers sur le serveur et on va également acheter un nom de domaine qui va servir à identifier notre site.  

Un « serveur » est une sorte de super ordinateur, constamment accessible et connectés aux autres serveurs (formant ainsi un réseau qu’on appelle le web) et qui va héberger les fichiers constituant un (ou plusieurs) site(s) web et le(s) « servir » sur demande du client.  

Lorsqu’on demande à accéder à une page web en tapant une URL dans notre navigateur, nous sommes le client ou plus exactement notre navigateur est le logiciel client qui effectue une demande ou « requête » au serveur qui est la suivante : « sers-moi le fichier correspondant à l’adresse que je t’ai envoyée ».  

Les fichiers ou pages d’un site web vont pouvoir être constituées de deux types de codes différents : du code côté serveur et du code côté client.  Lorsqu’on demande à un serveur de nous servir une page, celui-ci se charge d’exécuter le code côté client s’il y en a et ne va renvoyer que du code côté client en résultat.  

Un langage « côté client » ou « client side » est un langage qui va être exécuté dans le navigateur des utilisateurs qui demandent la page.  
On peut également appeler ces langages des langages « web » puisqu’ils sont principalement utilisés dans un contexte web.  

Il existe aujourd’hui 3 langages côté client incontournables qui sont le HTML, le CSS et le JavaScript.  

Les langages côté serveur sont des langages qui vont s’exécuter sur le serveur.  
Les navigateurs ne sont dans la grande majorité des cas pas capables de comprendre les langages serveur.  

Ces langages permettent notamment d’effectuer de manipuler les données pour renvoyer des résultats. Les résultats renvoyés le sont sous forme de code compréhensible par le navigateur (c’est-à-dire du HTML principalement) pour que le navigateur puisse afficher le résultat final.  

La chose importante à retenir ici est que le JavaScript est un langage principalement utilisé côté client, mais qui va également pouvoir s’utiliser côté serveur à condition qu’on mette en place un environnement favorable (en utilisant Node.js par exemple).  

### **Le JavaScript, un langage interprété**

On peut encore séparer les langages selon qu’ils puissent être exécutés directement (on parlera alors de langages interprétés) ou qu’il faille les transformer en une autre forme pour pouvoir les exécuter (on parlera alors le langages compilés).  

Le JavaScript est un langage interprété. Cela signifie qu’il va pouvoir être exécuté directement sous réserve qu’on possède le logiciel interpréteur.  
Pas de panique ici : tous les navigateurs connus possèdent leur interpréteur JavaScript.  

### **Le JavaScript, un langage orienté objet**

Finalement, le JavaScript est un langage orienté objet.  
Il est trop tôt selon moi pour vous expliquer ce que ça signifie ; nous reparlerons de cela dans la partie consacrée aux objets.  

## **Où écrire le code JavaScript ?**

On va pouvoir placer du code JavaScript à trois endroits différents :

- Directement dans la balise ouvrante d’un élément HTML ;
- Dans un élément `<script>` au sein d’une page HTML ;
- Dans un fichier séparé contenant exclusivement du JavaScript et portant l’extension `.js`.

Nous allons dans cette leçon voir comment écrire du code JavaScript dans chacun de ces emplacements et souligner les différents avantages et inconvénients liés à chaque façon de faire.  

### **Placer le code JavaScript dans la balise ouvrante d’un élément HTML**

Il est possible que vous rencontriez encore aujourd’hui du code JavaScript placé directement dans la balise ouvrante d’éléments HTML.  

Ce type de construction était fréquent à l’époque notamment pour prendre en charge des évènements comme par exemple un clic.  

Regardez plutôt l’exemple ci-dessous :  
`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>JavaScript dans la balise ouvrante d’un élément HTML</title>
        <meta charset="utf-8">
        <meta name="viewport"
          content="width=device-width, initial-scale=1, user-scalable=no">
        <link rel="stylesheet" href="cours.css">
    </head>
    <body>
        <h1>Titre principal</h1>
        <button onclick="alert('Bonjour !')">Cliquez moi</button>
        <button onclick="(function(){
            let para = document.createElement('p');
            para.textContent = 'Paragraphe ajouté';
            document.body.appendChild(para);
        })();">
            Ajouter un paragraphe
        </button>
    </body>
</html>
```

Ici, on crée deux boutons en HTML et on place nos codes JavaScript à l’intérieur d’attributs `onclick`.  
Le code à l’intérieur des attributs va s’exécuter dès qu’on va cliquer sur le bouton correspondant.  

Dans le cas présent, cliquer sur le premier bouton a pour effet d’ouvrir une fenêtre d’alerte qui affiche « Bonjour ! ».  

Cliquer sur le deuxième bouton rajoute un élément p qui contient le texte « Paragraphe ajouté » à la suite des boutons.  

Aujourd’hui, de nouvelles techniques nous permettent de ne plus utiliser ce genre de syntaxe et il est généralement déconseillé et considéré comme une mauvaise pratique d’écrire du code JavaScript dans des balises ouvrantes d’éléments HTML.  

La raison principale à cela est que le web et les éléments le composant sont de plus en plus complexes et nous devons donc être de plus en plus rigoureux pour exploiter cette complexité.  

Ainsi, la séparation des différents langages ou codes est aujourd’hui la norme pour essayer de conserver un ensemble le plus propre, le plus compréhensible et le plus facilement maintenable possible.  

En plus de cela, polluer le code HTML comme cela peut conduire à certains bogues dans le code et est inefficace puisqu’on aurait à recopier les différents codes pour chaque élément auquel on voudrait les appliquer.  

### **Placer le code JavaScript dans un élément script, au sein d’une page HTML**

On va également pouvoir placer notre code JavaScript dans un élément `<script>` qui est l’élément utilisé pour indiquer qu’on code en JavaScript.  

On va pouvoir placer notre élément `<script>` n’importe où dans notre page HTML, aussi bien dans l’élément `<head>` qu’au sein de l’élément `<body>`.  

De plus, on va pouvoir indiquer plusieurs éléments `<script>` dans une page HTML pour placer plusieurs bouts de code JavaScript à différents endroits de la page.  

Regardez plutôt l’exemple ci-dessous. Ce code produit le même résultat que le Précédent :  
`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>JavaScript dans un élément script</title>
        <meta charset="utf-8">
        <meta name="viewport"
          content="width=device-width, initial-scale=1, user-scalable=no">
        <link rel="stylesheet" href="cours.css">
        <script>
            document.addEventListener('DOMContentLoaded', function(){
                let bonjour = document.getElementById('b1');
                bonjour.addEventListener('click', alerte);
            
                function alerte(){
                    alert('Bonjour');
                }
            });
        </script>
    </head>
    
    <body>
        <h1>Titre principal</h1>
        <button id='b1'>Cliquez moi</button>
        <button id='b2'>Ajouter un paragraphe</button>
        <script>
            let ajouter = document.getElementById('b2');
            ajouter.addEventListener('click', ajout);
            function ajout(){
                let para = document.createElement('p');
                para.textContent = 'Paragraphe ajouté';
                document.body.appendChild(para);
            }
        </script>
    </body>
</html>
```

Cette méthode est meilleure que la Précédente mais n’est une nouvelle fois pas idéalement celle que nous allons utiliser pour plusieurs raisons.  

Tout d’abord, comme précédemment, la séparation des codes n’est pas optimale ici puisqu’on mélange du JavaScript et du HTML ce qui peut rendre l’ensemble confus et complexe à comprendre dans le cadre d’un gros projet.  

De plus, si on souhaite utiliser les mêmes codes sur plusieurs pages, il faudra les copier-coller à chaque fois ce qui n’est vraiment pas efficient et ce qui est très mauvais pour la maintenabilité d’un site puisque si on doit changer une chose dans un code copié-collé dans 100 pages de notre site un jour, il faudra effectuer la modification dans chacune des pages.  

### **Placer le code JavaScript dans un fichier séparé**

Placer le code JavaScript dans un fichier séparé ne contenant que du code JavaScript est la méthode recommandée et que nous préférerons tant que possible.  

Pour faire cela, nous allons devoir créer un nouveau fichier et l’enregistrer avec une extension .js.  
Ensuite, nous allons faire appel à notre fichier JavaScript depuis notre fichier HTML.  

Pour cela, on va à nouveau utiliser un élément `<script>` mais nous n’allons cette fois-ci rien écrire à l’intérieur.  
A la place, on va plutôt ajouter un attribut `src` à notre élément `<script>` et lui passer en valeur l’adresse du fichier.  
Si votre fichier `.js` se situe dans le même dossier que votre fichier `.html`, il suffira d’indiquer le nom du fichier en valeur de l’attribut src.  

Notez qu’un élément `<script>` ne peut posséder qu’un attribut `src`.  
Dans le cas où on souhaite utiliser plusieurs fichiers JavaScript dans un fichier HTML, il faudra renseigner autant d’éléments `<script>` dans le fichier avec chaque élément appelant un fichier en particulier.  

Le code ci-dessous produit à nouveau les mêmes résultats que précédemment.  
Ne vous préoccupez pas de l’attribut `async` pour le moment.  

`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>JavaScript dans un fichier séparé</title>
        <meta charset="utf-8">
        <meta name="viewport"
          content="width=device-width, initial-scale=1, user-scalable=no">
        <script type="text/javascript" src="assets/js/main.js"></script> <!--defer :D-->
    </head>
    
    <body>
        <h1>Titre principal</h1>
        <button id='b1'>Cliquez moi</button>
        <button id='b2'>Ajouter un paragraphe</button>
    </body>
</html>
```

`main.js`

```js
let bonjour = document.getElementById('b1');
let ajouter = document.getElementById('b2');

bonjour.addEventListener('click', alerte);
ajouter.addEventListener('click', ajout);

function alerte(){
    alert('Bonjour');
}
function ajout(){
    let para = document.createElement('p');
    para.textContent = 'Paragraphe ajouté';
    document.body.appendChild(para);
}
```

Cette méthode sera notre méthode préférée puisqu’elle permet une excellente séparation du code et une maintenabilité optimale de celui-ci.  
En effet, si on veut insérer le code JavaScript contenu dans notre fichier dans 100 pages différentes, il suffira ici d’appeler ce fichier JavaScript dans les 100 pages.  
En cas de modification du code, il suffira alors de le modifier une fois dans le fichier JavaScript.  

### **La place du code et l’ordre d’exécution de celui-ci**

Il y a une autre facteur dont je n’ai pas encore parlé et qu’il faut absolument prendre en compte et comprendre lorsqu’on ajoute du code JavaScript dans nos pages HTML qui est l’ordre d’exécution du code par le navigateur.  

Il est possible que ce que je vais expliquer là vous semble complexe et abstrait et c’est tout à fait normal : c’est un peu tôt dans votre apprentissage pour vous expliquer ce mécanisme.  
Pas d’inquiétude, cependant, nous aurons l’occasion d’en reparler plus tard dans ce cours.  
Pour le moment, essayez simplement de faire votre maximum pour visualiser ce qu’il se passe.  

Ici, il va avant tout être important de bien comprendre que par défaut, un navigateur va lire et exécuter le code dans l’ordre de son écriture.  

Plus précisément, lorsque le navigateur arrive à un élément `<script>`, il va stopper le traitement du reste du HTML jusqu’à ce que le code JavaScript soit chargé dans la page et exécuté.  

Nos codes JavaScript ci-dessus ont besoin des éléments `<button>` de notre page HTML pour fonctionner.  
En effet, les codes `getElementById('b1')` et `getElementById('b2')` vont récupérer les éléments dont les `id` sont « b1 » et « b2 » pour les manipuler.  

Cela risque de poser problème dans le cas présent car si notre code JavaScript est exécuté avant que le code HTML de nos boutons ne soit traité par le navigateur, il ne fonctionnera puisqu’il cherchera à utiliser des éléments qui n’existent pas encore.  

C’est la raison pour laquelle, lorsque j’ai choisi d’insérer le code JavaScript directement dans la page HTML au sein d’éléments `<script>`, j’ai été obligé d’entourer le code JavaScript qui affiche la boite d’alerte déclaré dans l’élément `<head>` par le code `document.addEventListener('DOMContentLoaded', function(){}) ;`.  
Ce code indique en effet au navigateur qu’il doit d’abord charger tout le contenu HTML avant d’exécuter le JavaScript à l’intérieur de celui-ci.  

Dans ce même exemple, mon deuxième élément `<script>` était lui placé en fin de `<body>` et est donc par défaut exécuté après le reste du code.  
Il n’y avait donc pas de problème dans ce cas.  

Notez que le même problème va avoir lieu dans le cas où on fait appel à un fichier JavaScript externe par défaut :  
selon l’endroit dans le code où le fichier est demandé, il pourra ne pas fonctionner s’il utilise du code HTML pas encore défini.  

Ce souci est la raison pour laquelle il a longtemps été recommandé de placer ses éléments `<script>` juste avant la balise fermante de l’élément `<body>`, après tout code HTML.  

Cette façon de faire semble en effet résoudre le problème à priori mais n’est pas toujours optimale en termes de performances.  

En effet résumons ce qu’il se passe dans ce cas :  

1. Le navigateur commence à analyser (ou à traiter) le code HTML ;
2. L’analyseur du navigateur rencontre un élément `<script>` ;
3. Le contenu JavaScript est demandé et téléchargé (dans le cas où il se situe dans un fichier externe) puis exécuté.  
    Durant tout ce temps, l’analyseur bloque l’affichage du HTML, ce qui peut dans le cas où le script est long ralentir significativement le temps d’affichage de la page ;
4. Dès que le JavaScript a été exécuté, le contenu HTML finit d’être analysé et est affiché.  

Ce problème précis de temps d’attente de chargement des fichiers JavaScript va pouvoir être résolu en grande partie grâce au téléchargement asynchrone des données qui va pouvoir être ordonné en précisant un attribut `async` ou `defer` dans nos éléments `<script>`.

Le téléchargement asynchrone est une notion complexe et nous l’étudierons donc beaucoup plus tard dans ce cours. Pour le moment, retenez simplement que nous n’allons pouvoir utiliser les attributs `async` et `defer` que dans le cas où on fait appel à des fichiers JavaScript externes (c’est-à-dire à du code JavaScript stocké dans des fichiers séparés).  

C’est une raison supplémentaire qui nous fera préférer l’enregistrement du code JavaScript dans des fichiers séparés.  

## **Commentaires, indentation et syntaxe de base en JavaScript**

### **Les commentaires en JavaScript**

Comme pour l’immense majorité des langages de programmation, on va également pouvoir commenter en JavaScript.  

Les commentaires sont des lignes de texte (des indications) placées au milieu d’un script et servant à documenter le code, c’est-à-dire à expliquer ce que fait tel ou tel bout de script et éventuellement comment le manipuler.  

Ces indications ne seront pas lues par le navigateur et seront donc invisibles pour les visiteurs (sauf s’ils affichent le code source de la page).  

Commenter va donc servir aux développeurs à se repérer plus facilement dans un script, à le lire et à le comprendre plus vite.  
Cela peut être utile à la fois pour vous même si vous travaillez sur des projets complexes ou pour d’autres développeurs si vous êtes amené à distribuer votre code un jour ou l’autre.  

En JavaScript, il existe deux types de commentaires qui vont s’écrire différemment : les commentaires mono-ligne et les commentaires multi-lignes.  

Notez que la syntaxe des commentaires multi-lignes peut être utilisée pour écrire un commentaire mono-ligne.  
Vous pouvez donc vous contenter de n’utiliser que cette syntaxe.  

Pour écrire un commentaire multilignes, il faudra entourer le texte de notre commentaire avec la syntaxe suivante `/* */`.  

Pour écrire un commentaire monoligne, on utilisera un double slash `//` qui sera suivi du texte de notre commentaire.  

### **L’indentation en JavaScript**

L’indentation correspond au fait de décaler certaines lignes de code par rapport à d’autres.  
Cela est généralement utilisé pour rendre son code plus lisible et donc plus simple à comprendre.  

Pour savoir comment et quand indenter, il suffit de penser en termes de hiérarchie comme on le faisait déjà en HTML.  

Une bonne pratique est d’effectuer un retrait vers la droite équivalent à une tabulation à chaque fois qu’on écrit une nouvelle ligne de code à l’intérieur d’une instruction JavaScript.  
Nous aurons l’occasion d’illustrer cela plus tard.  

### **Un premier point sur la syntaxe de base du JavaScript**

Avant de véritablement apprendre à coder en JavaScript, j’aimerais discuter d’un point qui divise la communauté des développeurs JavaScript : l’usage du point-virgule.  

En effet, sur le net, vous verrez certains tutoriels affirmer que « toute instruction en JavaScript doit être terminée explicitement avec un point-virgule » et d’autres auteurs dire que « les points virgules ne sont souvent pas nécessaires dans le code ».  

Avant tout, vous devez savoir qu’un code JavaScript est composé d’instructions.  
On va avoir différents types d’instruction en JavaScript : la déclaration d’une variable ou d’une fonction, la création d’une boucle, d’une condition, etc. vont toutes être des instructions.  

Le point-virgule est généralement utilisé en informatique pour indiquer la fin d’une instruction, c’est-à-dire pour séparer deux instructions l’une de l’autre et cela va également être le cas en JavaScript.  

L’idée ici est que le langage JavaScript est très bien fait et ne nous oblige pas strictement à utiliser un point-virgule pour notifier la fin de chaque instruction.  
En effet, le JavaScript va être capable de « deviner » quand une instruction se termine et va ajouter automatiquement des points-virgules là où ça lui semble pertinent.  

C’est la raison pour laquelle certains développeurs se passent tant que possible de ces points-virgules.  
Cependant, il y a une limite majeure à cela.  

Celle-ci est que tout langage informatique repose sur un ensemble de règles.  
Ainsi, les points-virgules ne sont pas ajoutés automatiquement par le JavaScript au hasard mais selon un ensemble de règles précises.  

Pour pouvoir se passer des points-virgules, il faut donc déjà bien connaitre le langage et les règles d’ajout automatique des points virgules pour créer un code avec une structure qui va pouvoir être interprétée correctement par JavaScript.  

Sans une connaissance parfaite du comportement de JavaScript et des règles d’ajout, on risque d’avoir des résultats inattendus voire un code non fonctionnel puisqu’il est possible que le JavaScript ajoute des points-virgules là où on ne s’y attend pas.  

Pour cette raison, nous ajouterons explicitement des points-virgules à la fin de (presque) toutes les instructions.  

>**Navigation**  

- [Suivant](../variables-et-types-valeurs/variables.md#presentation-des-variables-javascript)  
- [Menu principal](../menu.md#1-introduction-au-javascript)
