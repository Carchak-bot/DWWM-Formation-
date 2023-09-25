---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 22/04/2022  

---
# **Empecher un evenement de se propager et annuler son comportement par defaut en JavaScript**

>**Navigation**  
>
> - [Suivant](../asynchrone/introduction-asynchrone.md#introduction-a-lasynchrone-en-javascript)  
> - [Précédent](./propagation-evenements.md#la-propagation-des-evenements-en-javascript)  
> - [Menu principal](../menu.md#1-introduction-au-javascript)

Dans la leçon Précédente, nous avons étudié et compris comment les évènements se propageaient.  
Dans cette nouvelle leçon, nous allons apprendre à stopper la propagation d’un évènement ou à faire en sorte qu’un évènement ne soit pas du tout pris en compte et voir dans quelle situation cela peut s’avérer utile.  

## **Stopper la propagation d’un évènement**

Pour stopper la propagation d’un évènement, on va pouvoir utiliser la méthode `stopPropagation()` de l’interface `Event`.  
Cette méthode va stopper la propagation d’un évènement après qu’un gestionnaire d’évènement (gérant l’évènement en question) ait été atteint.  

Cela signifie que si la phase de bouillonnement est choisie, le gestionnaire le plus proche de l’élément cible de l’évènement sera exécuté et les gestionnaires de ce même évènement attachés aux éléments parents seront ignorés.  

Dans le cas où c’est la phase de capture qui est choisie, le gestionnaire pour cet évènement le plus lointain de l’élément cible de l’évènement sera exécuté et les autres seront ignorés.  

Notez que si plusieurs gestionnaires d’un même évènement sont attachés à un même élément (et si cet élément est le premier atteint), ils seront exécutés à la suite.  

Si on ne souhaite véritablement exécuter qu’un seul gestionnaire d’un évènement et ignorer tous les autres, on utilisera plutôt la méthode `stopImmediatePropagation()` de cette même interface.  

Dans le cas où on utilise `stopImmediatePropagation()`, seul le premier gestionnaire de l’évènement attaché au premier élément atteint sera exécuté.  

Stopper la propagation d’un évènement va pouvoir s’avérer très pratique dans le cas où nous avons plusieurs gestionnaires d’évènements pour le même évènement attachés à différents éléments dans la page et où on souhaite n’exécuter que le gestionnaire le plus proche de l’élément cible de l’évènement.  
`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Stopper la propagation d’un évènement</title>
        <meta charset="utf-8">
        <meta name="viewport"
        content="width=device-width, initial-scale=1, user-scalable=no">
        <script src='assets/js/main.js' async></script>
    </head>
    
    <body>
        <h1>Titre principal</h1>
        <p>Un premier paragraphe</p>
        <div id='d1'>
            <p id='d1p1'>Un paragraphe dans une div</p>
            <p id='d1p2'>Un autre paragraphe dans la div</p>
        </div>
    </body>
</html>
```

`main.js`

```js
// On sélectionne les éléments du document avec les ids d1 et d1p1
let d1 = document.querySelector('#d1');
let d1p1 = document.querySelector('#d1p1');

// On utilise la phase de capture
d1.addEventListener('click', function () {
    alert('div cliqué')
});
d1p1.addEventListener('click', cliqueAndStop);

// L'argument 'e' ici sert de référence à un objet Event
function cliqueAndStop (e) {
    alert('Paragraphe cliqué - Arrêt de la propagation');
    e.stopPropagation();
}
```

Dans cet exemple, on attache deux gestionnaires d’évènement `click` à la première `div` et au premier paragraphe dans cette `div` de notre document.  
Par défaut, ces gestionnaires vont se déclencher durant la phase de bouillonnement.  

Cela signifie qu’en cas de clic sur le paragraphe, le gestionnaire du paragraphe va se déclencher avant celui de la `div`.  

Ici, la fonction passée au gestionnaire du paragraphe utilise la méthode `stopPropagation()` ce qui implique que l’évènement `click` cessera de se propager après l’exécution de celle-ci.  
Le gestionnaire d’évènement de la `div` n’enregistrera donc pas d’évènement et ne sera pas déclenché.  

## **Prévenir le comportement de base d’un évènement**

Nous allons également pouvoir faire en sorte que l’action par défaut d’un évènement ne soit pas prise en compte par le navigateur.  
Pour faire cela, nous allons utiliser la méthode preventDefault() de l’interface Event.  

Cela va notamment s’avérer très intéressant pour prévenir l’envoi d’un formulaire mal rempli.  

En effet, lorsqu’un utilisateur souhaite envoyer un formulaire, il clique sur un bouton d’envoi. L’action associée par défaut à ce clic est l’envoi du formulaire.  
La méthode preventDefault() va nous permettre de neutraliser cette action par défaut (l’envoi du formulaire).  
On va vouloir faire ça dans le cas où on s’aperçoit que l’utilisateur a mal rempli le formulaire par exemple.  
`index.html`

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Stopper la propagation d’un évènement</title>
        <meta charset="utf-8">
        <meta name="viewport"
        content="width=device-width, initial-scale=1, user-scalable=no">
        <script src='assets/js/main.js' async></script>
    </head>
    
    <body>
        <p>Un premier paragraphe</p>
        
        <!--On imagine que formulaire.php existe-->
        <form method='post' action='formulaire.php'>
            <label for='prenom'>Entrez un prénom</label>
            <input type='text' name='prenom' id='prenom'>
            
            <input type='submit' value='Envoyer' id='btn-envoi'>
        </form>
    </body>
</html>
```

`main.js`

```js
let envoi = document.getElementById('btn-envoi');

envoi.addEventListener('click', testDonnees);

function testDonnees (e) {
    /* Si (if...) les données ne remplissent pas certaines conditions, renvoie un
    message et empêche l'action par défaut du clic = l'envoie du formulaire */
    alert('Envoi du formulaire bloqué');
    e.preventDefault();
}
```

Dans l’exemple ci-dessus, on attache un gestionnaire d’évènement `click` au bouton d’envoi du formulaire.  
L’idée va ici être d’empêcher l’action par défaut liée au clic sur ce bouton qui est l’envoi du formulaire si les données envoyées ne respectent pas la forme attendue.  

Ici, nous ne créons pas la condition associée qui teste les données envoyées (ni la page de traitement des données `formulaire.php` d’ailleurs) car ce n’est pas le sujet de la leçon (nous verrons plus tard comment interagir avec les formulaires HTML en JavaScript).  
Il faut donc les imaginer.

>**Navigation**  
>
> - [Suivant](../asynchrone/introduction-asynchrone.md#introduction-a-lasynchrone-en-javascript)  
> - [Précédent](./propagation-evenements.md#la-propagation-des-evenements-en-javascript)  
> - [Menu principal](../menu.md#1-introduction-au-javascript)
