---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 18/05/2022  

---
# **L’API Web Storage : `localstorage` et `sessionstorage` en JavaScript**

>**Navigation**  
>
> - [Suivant](./api-stockage-indexedDB.md#utiliser-lapi-de-stockage-indexeddb-en-javascript)  
> - [Précédent](./cookies.md#les-cookies-en-javascript)  
> - [Menu principal](../menu.md#1-introduction-au-javascript)

Les cookies permettent de stocker des informations côté client.  
Cependant, ce n’est pas le seul outil dont nous disposons pour stocker des données dans le navigateur des visiteurs.  
Nous pouvons également utiliser l’une des deux APIs Web Storage ou IndexedDB.  

## **Pr&eacute;sentation de l’API Web Storage et des propri&eacute;t&eacute;s `localstorage` et `sessionstorage`**

L’API Web Storage permet de stocker des données sous forme de paires clés/valeurs qui doivent obligatoirement être des chaines de caractères dans le navigateur de vos visiteurs.  

Pour stocker des données avec Web Storage, on va pouvoir utiliser les propriétés (qui sont avant tout des objets) `localstorage` et `sessionstorage`.  
On va utiliser ces propriétés avec l’objet implicite Window.  

Pour être tout à fait précis, un objet `Storage` est créé lorsqu’on utilise une de ces propriétés.  
On va pouvoir manipuler les données à travers cet objet. Notez que l’objet de stockage créé est différent pour `localstorage` et `sessionstorage`.  

La principale différence entre `localstorage` et `sessionstorage` est la suivante : dans le cas où on utilise `sessionstorage`, les données enregistrées ne vont subsister qu’après un rechargement de la page courante tandis que si on utilise `localstorage` les données vont subsister même après qu’un visiteur ait quitté son navigateur.  

Pour cette raison, la propriété `localstorage` est beaucoup plus utilisée que `sessionstorage`.  
Nous allons donc particulièrement nous concentrer sur cette première ici.  
Dans tous les cas, ces deux objets disposent des mêmes méthodes et propriétés, vous n’aurez donc aucun mal à utiliser le second si vous comprenez comment utiliser le premier.  

## **Pourquoi utiliser des objets de stockage plut&ocirc;t que des cookies ?**

Chaque système de stockage va posséder des forces et des champs d’application différents.  

Les cookies vont être très utiles pour stocker un petit nombre de données et notamment pour stocker des données d’identification (données de connexion).  

Cela est dû au fait que les cookies vont être envoyés au serveur en même temps que chaque requête, ce qui fait que le serveur va pouvoir utiliser les données fournies par ceux-ci identifier immédiatement un visiteur.  

D’un autre côté, les autres systèmes de stockage dans le navigateur comme l’API Web Storage stockent des données qui vont rester dans le navigateur : les objets ne vont pas être envoyés au serveur.  

Cela fait qu’on va pouvoir stocker un nombre beaucoup plus important de données sans ralentir l’exécution du script comme le ferait un cookie à cause du transfert des données au serveur.  

En plus de cela, l’API Web Storage va nous permettre de stocker des données plus simplement que les cookies et applique la politique de même origine, ce qui limite les problèmes de sécurité.  

Une origine est la combinaison d’un protocole, un hôte et d’un numéro de port.  
La politique de même origine indique qu’il n’est pas possible d’accéder à un contenu d’une certaine origine depuis une autre origine.  

## **Les propri&eacute;t&eacute;s et m&eacute;thodes de `localstorage` et de `sessionstorage`**

Les objets `localstorage` et `sessionstorage` vont nous fournir les propriétés et méthodes suivantes :

- `setItem()` : permet de stocker une paire clé/valeur. Prend une clé et une valeur en arguments ;
- `getItem()` : permet d’obtenir une valeur liée à une clé. Prend une clé en argument ;
- `removeItem()` : permet de supprimer une paire clé/valeur. Prend une clé en argument ;
- `clear()` : permet de supprimer tous les objets de stockage. Ne prend pas d’argument ;
- `key()` : permet d’obtenir une clé située à une certaine position. Prend un index en argument ;
- `length` : permet d’obtenir le nombre de données stockées.  

## **Utiliser l’API Web Storage – Exemple pratique**

Pour cet exemple, on va imaginer qu’on possède une application web et on va vouloir proposer un thème sombre à nos utilisateurs.  
Ici, on va se contenter de changer la couleur de fond de la page.  

On va enregistrer le choix fait par l’utilisateur en utilisant `localstorage` afin que celui-ci soit conservé pour ses prochaines visites.  

Côté HTML, on va utiliser un élément de formulaire pour laisser la possibilité à l’utilisateur de choisir sa couleur de fond.  

`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Utiliser l'API Web Storage</title>
        <meta charset="utf-8">
        <meta name="viewport"
        content="width=device-width, initial-scale=1, user-scalable=no">
        <script src='assets/js/main.js' defer></script>
    </head>
    
    <body>
        <form>
            <div>
                <label>Choisissez un thème (hexa) : <input class="text" id="bg_theme" value="fafafa" pattern="[a-fA-F0-9]{6}">
            </div>
        </form>
    </body>
</html>
```

`main.js`

```js
let htmlElement = document.querySelector('html');
let bgColor = document.getElementById('bg_theme');
if (localStorage.getItem('bgtheme')) {
    updateBg();
} else {
    setBg();
}
function updateBg () {
    let bg = localStorage.getItem('bgtheme');
    htmlElement.style.ackgroundColor = '#' + bg;
    bgColor.value = bg;
}

function setBg () {
    localStorage.setItem('bgtheme', bgColor.value);
    updateBg();
}

bgColor.addEventListener('change', setBg);
```

Dès qu’un utilisateur quitte le champ de formulaire, la couleur de fond de la page est mise à jour.  
Si l’utilisateur quitte le site et revient plus tard, les changements sont enregistrés et la dernière couleur choisie est conservée.  

Notez par ailleurs qu’un évènement `StorageEvent` est lancé dès qu’un changement est apporté à un objet de stockage `localstorage`.  
L’idée principale à retenir ici est que l’évènement est déclenché dans toutes les pages ayant accès à l’objet excepté pour la page courante.  

Cela permet aux autres pages d’un domaine qui utilisent le même objet d’appliquer automatiquement les mêmes changements que ceux effectués sur la page courante.  

>**Navigation**  
>
> - [Suivant](./api-stockage-indexedDB.md#utiliser-lapi-de-stockage-indexeddb-en-javascript)  
> - [Précédent](./cookies.md#les-cookies-en-javascript)  
> - [Menu principal](../menu.md#1-introduction-au-javascript)
