---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 18/05/2022  

---
# **Utiliser l’API de stockage IndexedDB en JavaScript**

>**Navigation**  
>
> - [Suivant](../exercices.md#exercices)  
> - [Précédent](./api-web-storage.md#lapi-web-storage--localstorage-et-sessionstorage-en-javascript)  
> - [Menu principal](../menu.md#1-introduction-au-javascript)

En plus de Web Storage, il existe une autre API qui va nous permettre de stocker des données côté client : l’API IndexedDB.  

## **Pr&eacute;sentation de l’API IndexedDB**

L’API IndexedDB est une API de stockage de données côté client qui va être utilisée pour stocker des quantités importantes de données structurées.  

La quantité de données qui va pouvoir être stocké est beaucoup plus grande que ce qu’on pourrait stocker avec Web Storage et cela rend donc IndexedDB plus puissante que Web Storage.  

IndexedDB est un système de gestion de bases de données transactionnel.  
On peut le comparer à d’autres systèmes de gestion de base de données basés que le SQL mais, à la différence de ces derniers, IndexedDB est orienté objet.  

On va donc pouvoir stocker des objets sous la forme clé / valeur tout comme on a déjà pu le faire avec Web Storage mais, à la différence des données stockées avec Web Storage, on va ici pouvoir stocker plus ou moins n’importe quel type de valeur et définir également différents types de clés.  

Notez par ailleurs que les opérations effectuées par IndexedDB sont réalisées de manière asynchrone, et ceci afin de ne pas bloquer le reste de la page.  

Notez également qu’IndexedDB respecte la politique de même origine, ce qui signifie qu’on pourra accéder aux données stockées pour le domaine courant uniquement.  

En pratique, pour utiliser IndexedDB, on suivra le schéma suivant :  

- On ouvre une connexion à la base de données
- On crée un objet de stockage ;
- On initie une transaction ;
- On effectue des requêtes ;
- On crée des gestionnaires d’évènements liés au résultat de nos requêtes.  

On va apprendre à faire tout ça dans la suite de cette leçon.  

## **Ouverture de la connexion &agrave; la base de donn&eacute;es**

Pour travailler avec `IndexedDB`, nous allons avant tout devoir ouvrir une base de données.  

Pour cela, on va utiliser la propriété `IndexedDB` qui est une propriété du mixin `WindowOrWorkerGlobalScope` (implémenté par `window`).  
Cette propriété renvoie un objet `IDBFactory`.  

L’interface `IDBFactory` fait partie de l’API IndexedDB et permet aux applications d’accéder à des bases de données de façon asynchrone.  
Cette interface nous fournit une méthode `open()` qui permet d’ouvrir une connexion à une base de données.  

On va donc utiliser cette méthode `open()` avec notre objet (propriété) `IndexedDB`.  
La méthode `open()` prend en argument obligatoire le nom de la base de données qu’on souhaite ouvrir ainsi que la version de cette base de données en argument facultatif.  

```js
let openRequest = indexedDB.open('db', 1);
```

La méthode `open()` renvoie un objet `IDBOpenRequest` et effectue l’opération d’ouverture de la connexion à la base de données de manière asynchrone.  

Si l’ouverture réussit, un évènement `success` est déclenché sur l’objet `IDBOpenRequest` renvoyé par `open()`.  
La propriété `result` de cet évènement aura alors comme valeur la valeur de l’objet `IDBDatabase` associé à la connexion.  

Si l’ouverture de la connexion échoue, un évènement error est déclenché sur l’objet `IDBOpenRequest` renvoyé par `open()`.  

La version de la base de données détermine son organisation et notamment les objets stockés et leur structure.  
Par défaut, le numéro de version retenu est 1.  

Si le numéro de version de la base de données qu’on souhaite ouvrir est inférieur au numéro fourni à `open()`, un évènement `upgradeneeded` est déclenché pour nous permettre de mettre à jour la base de données.  
Si la mise à jour se passe bien, un évènement `success` est déclenché.  

```js
let db = '';
let openRequest = indexedDB.open('db', 1);

openRequest.onupgradeneeded = function () {
    db = openRequest.result;
    // Opérations
}
openRequest.onerror = function () {
    alert('Impossible d\'accéder à IndexedDB');
}

opRequest.onsuccess = function () {
    db = openRequest.result;
    // Opérations
}
```

Ici, on crée trois gestionnaires qui vont gérer les évènements `success`, `error` et `upgradeneeded`.  

Lorsqu’on crée une nouvelle base de données, ou si on met à jour la version de notre base de données, on doit créer les nouveaux objets de stockage pour cette version de la base dans le gestionnaire de `upgradeneeded`.  
Les objets créés dans la version précédente seront automatiquement disponibles ; il est inutile de les copier.  

De plus, si on essaie de créer un objet de stockage avec un nom déjà existant (ou si on essaie de supprimer un objet de stockage avec un nom qui n’existe pas encore), une erreur sera renvoyée.  

Notez que si l’évènement `upgradeneeded` quitte avec succès, l’évènement `success` de la requête d’ouverture de la base de données sera déclenché.  

Dans le cas où l’évènement `success` est déclenché (cas où la connexion s’est effectuée avec succès), `openRequest.result` est une instance de `IDBDatabase` et va donc représenter notre connexion.  

## **Cr&eacute;ation d’un objet de stockage ou « object store »**

Les objets de stockage vont stocker les données.  
Si vous connaissez un petit peu le fonctionnement des bases de données MySQL ou autres, vous pouvez considérer que nos objets de stockage vont être l’équivalent des tables.  

Une base de données peut avoir plusieurs objets de stockage et ces objets de stockage peuvent stocker quasiment toutes formes de données.  
Ces objets de stockage peuvent stocker plusieurs valeurs, et chaque valeur doit être associée à une clé unique au sein d’un objet de stockage.  

On va pouvoir passer la clé manuellement en même temps qu’on ajoute une valeur dans l’objet de stockage (ce qui peut être pratique dans le cas où on stocke une valeur primitive) ou définir une propriété qui servira de clé dans le cas où on stocke des objets.  
On peut également demander à ce que les clés soient générés automatiquement.  

La création ou la modification des objets de stockage va toujours se faire lors de la mise à jour de la version de la base de données, c’est-à-dire au sein du gestionnaire d’évènements `upgradeneeded`.  

Pour créer un objet de stockage, on va utiliser la méthode `createObjectStore()`.  
Cette méthode prend le nom de l’objet de stockage en premier argument ainsi qu’un objet (facultatif) en second argument qui va nous permettre de définir une clé et renvoie un objet appartenant à l’interface `IDBObjectStore`.  

Pour définir une clé, on va utiliser l’une des propriétés `keyPath` ou `autoIncrement` de cette interface.  

La propriété `keyPath` nous permet de définir une propriété qu’IndexedDB utilisera comme clé.  

La propriété `autoIncrement` prend une valeur booléenne.  
Si la valeur passée est true, alors la clé pour chaque objet stocké sera générée automatiquement, en s’incrémentant à chaque fois.  

```js
openRequest.onupgradeneeded = function () {
    db = openRequest.result;
    // Si l'objet de stockage users n'existe pas, on le crée
    if (!db.objectStoreNames.contains('users')) {
        db.createObjectStore('users', {keyPath: 'id'});
    }
}
```

## **Initiation d’une transaction**

On appelle « transaction » un groupe d’opérations dont le destin est lié.  
L’idée principale à retenir à propos des transactions est la suivante : les différentes opérations doivent toutes réussir indépendamment pour que la transaction soit un succès.  
Si une opération échoue, alors la transaction et donc l’ensemble des opérations échouent.  

Dans notre contexte, les transactions vont s’effectuer à partir de l’objet symbolisant la connexion à la base de données (notre instance de `IDBDatabase`).  
Pour démarrer une nouvelle transaction, nous allons utiliser la méthode `transaction()` à partir de cet objet.  

Cette méthode va prendre deux arguments : la liste d’objets de stockage que la transaction va traiter (obligatoire) ainsi que le type ou mode de transaction souhaité (facultatif).  

On peut choisir parmi trois modes de transaction : `readonly` (lecture seule), `readwrite` (lecture et écriture) et `versionchange` (changement de version).  
Ces modes vont définir quelles manipulations on va pouvoir effectuer sur les données. Par défaut, le mode est `readonly`.  

Pour lire les enregistrements d’un objet de stockage existant, la transaction peut être en mode `readonly` ou `readwrite`.  
Pour appliquer des changements à un objet de stockage existant, la transaction doit être en mode `readwrite`.  

Pour changer la structure de la base de données (le schéma), ce qui implique de créer ou supprimer des objets de stockage ou des index, la transaction doit être en mode `versionchange`.  

## **Cr&eacute;ation de requ&ecirc;tes et gestion des r&eacute;sultats**

IndexedDB nous permet d’ajouter, de supprimer, de récupérer ou de mettre à jour des données dans notre base de données.  

En pratique, pour effectuer ces manipulations, on commencera par créer une transaction puis on récupérera l’objet de stockage de celle-ci.  

Ensuite, on va effectuer des requêtes (ajout de données, suppression, etc.) à partir de cet objet `IDBObjectStore` et on va finalement gérer les cas de succès ou d’erreur liés au résultat de nos requêtes.  

L’interface `IDBObjectStore` nous fournit les différentes méthodes qui vont nous permettre de manipuler nos objets de stockage et notamment :  

- Les méthodes `put()` et `add()` pour stocker des données dans la base ;
- Les méthodes `get()` et `getAll()` pour récupérer les données depuis la base ;
- Les méthodes `delete()` et `clear()` pour supprimer des données.  

Pour stocker une nouvelle valeur dans un objet de stockage, par exemple, on pourra écrire un script comme celui-ci :

```js
let db = '';
let openRequest = indexedDB.open('db', 1);

openRequest.onupgradeneeded = function () {
    db = openRequest.result;

    // Si l'objet de stockage users n'existe pas, on le crée
    if (!db.objectStoreNames.contains('users')){
        db.createObjectStore('users', {keyPath: 'id'});
    }
};

openRequest.onerror = function () {
    alert('Impossible d\'accéder à IndexedDB');
};

openRequest.onsuccess = function () {
    db = openRequest.result;
    let transaction = db.transaction('users', 'readwrite');
    
    transaction.oncomplete = function () {
        alert('Transaction terminée');
    };

    let users = transaction.objectStore('users');
    
    let user = {
        id: 1,
        prenom: 'Alain',
        mail: 'alain.orluk@id-formation.fr',
        inscription: new Date()
    };
    
    let ajout = users.add(user);
    
    ajout.onsuccess = function () { 
        alert('Utilisateur ajouté avec la clé ' + ajout.result);
    };
    
    ajout.onerror = function () {
        alert('Erreur : ' + ajout.error);
    };
};
```

Ici, on commence donc par initier une transaction à partir de notre objet représentant la connexion à notre base de données (objet appartenant à `IDBDatabase`).  

Notre objet `let transaction` appartient à `IDBTransaction`. Cette interface possède une méthode `objectStore()` qui renvoie un objet `IDBObjectStore`.  

La ligne `transaction.objectStore()` nous permet donc d’accéder à notre objet de stockage afin d’effectuer des opérations avec celui-ci.  
On place le résultat dans une variable qui est un objet `IDBObjectStore`.  

Ici, on utilise la méthode `add()` de l’interface `IDBObjectStore` qui permet de stocker de nouvelles valeurs dans un objet de stockage.  
Cette méthode prend une valeur en argument obligatoire et une clé en argument facultatif (la clé est fournie automatiquement seulement si l’objet de stockage ne possède pas d’option `keypath` ou `autoIncrement`).  

Pour information, la différence entre les méthodes `put()` et `add()` est la suivante : si on fournit une clé qui existe déjà pour une valeur à `put()`, la clé sera modifiée tandis qu’avec `add()` la requête échouera et une erreur sera générée.  

On effectue donc ici la requête suivante : « ajoute une nouvelle valeur dans notre objet de stockage ».  
Nous n’avons alors plus qu’à mettre en place les gestionnaires d’évènements de succès et d’erreur pour cette requête.  

Notre objet `let request` appartient ici à l’interface `IDBRequest`.  
Cette interface dispose d’une propriété result qui contient le résultat d’une requête.  

Lorsqu’on l’utilise avec une requête de type `add()`, la valeur de `request.result` est la clé de la valeur qui vient d’être ajoutée.  

Cette interface contient également une propriété `error` qui indique le code de l’erreur survenue durant le traitement de la requête.  

On va également pouvoir de manière similaire récupérer des données dans la base ou en supprimer.  
Pour récupérer une donnée en particulier, on pourra par exemple utiliser la méthode get().  
Cette méthode prend la clé de la valeur qu’on souhaite récupérer en argument.  

```js
let db = '';
let openRequest = indexedDB.open('db', 1);

openRequest.onupgradeneeded = function () {
    db = openRequest.result;

    // Si l'objet de stockage users n'existe pas, on le crée
    if (!db.objectStoreNames.contains('users')){
        db.createObjectStore('users', {keyPath: 'id'});
    }
};

openRequest.onerror = function () {
    alert('Impossible d\'accéder à IndexedDB');
};

openRequest.onsuccess = function () {
    db = openRequest.result;
    let transaction = db.transaction('users', 'readwrite');
    
    transaction.oncomplete = function () {
        alert('Transaction terminée');
    };

    let users = transaction.objectStore('users');
    
    let user = {
        id: 1,
        prenom: 'Alain',
        mail: 'alain.orluk@id-formation.fr',
        inscription: new Date()
    };
    
    let ajout = users.put(user);
    
    ajout.onsuccess = function(){ 
        alert('Utilisateur ajouté avec la clé ' + ajout.result);
    };
    
    ajout.onerror = function(){
        alert('Erreur : ' + ajout.error);
    };
    
    let lire = users.get(1);
    lire.onsuccess = function(){ 
        alert('Nom de l\'utilisateur 1 : ' + lire.result.prenom);
    };
    
    lire.onerror = function(){
        alert('Erreur : ' + lire.error);
    };
};
```

On va également pouvoir supprimer des données en utilisant par exemple la méthode `delete()` pour supprimer une ou plusieurs données choisies.  
Cette méthode prend la clé liée à la valeur qu’on souhaite supprimer en argument ou un objet représentant un intervalle de clés liées aux valeurs qu’on souhaite supprimer.  

```js
let db = '';
let openRequest = indexedDB.open('db', 1);

openRequest.onupgradeneeded = function(){
    db = openRequest.result;

    // Si l'objet de stockage users n'existe pas, on le crée
    if (!db.objectStoreNames.contains('users')){
        db.createObjectStore('users', {keyPath: 'id'});
    }
};

openRequest.onerror = function(){
    alert('Impossible d\'accéder à IndexedDB');
};

openRequest.onsuccess = function(){
    db = openRequest.result;
    let transaction = db.transaction('users', 'readwrite');
    transaction.oncomplete = function(){alert('Transaction terminée');};
    let users = transaction.objectStore('users');
    
    let user = {
        id: 1,
        prenom: 'Alain',
        mail: 'alain.orluk@id-formation.fr',
        inscription: new Date()
    };
    
    let ajouter = users.put(user);
    ajouter.onsuccess = function(){ 
        alert('Utilisateur ajouté avec la clé ' + ajouter.result);
    };
    ajouter.onerror = function(){
        alert('Erreur : ' + ajouter.error);
    };
    
    let lire = users.get(1);
    lire.onsuccess = function(){ 
        alert('Nom de l\'utilisateur 1 : ' + lire.result.prenom);
    };
    lire.onerror = function(){
        alert('Erreur : ' + lire.error);
    };
    
    let supprimer = users.delete(1);
    supprimer.onsuccess = function(){ 
        alert('Utilisateur supprimé de la base de données');
    };
    supprimer.onerror = function(){
        alert('Erreur : ' + supprimer.error);
    };
};
```

## **En r&eacute;sum&eacute;**

L’API IndexedDb permet de stocker des quantités importantes de données structurées dans le navigateur de vos visiteurs.  

Ces API fonctionne principalement de manière asynchrone et adhère au principe de « same-origin policy » (politique de même origine).  

IndexedDB est une API orienté objet : les données vont être stockées dans des objets de stockage ou « object store ».  
Les données sont stockées sous la forme de paires clé / valeur.  
Les valeurs peuvent êtres des objets structurés, et les clés peuvent être des propriétés de ces objets.  

Cette API est construite autour d’un modèle de base de données transactionnelles : les différentes manipulations vont s’effectuer dans un contexte de transaction.  

Durant ces transactions, on va effectuer des requêtes pour manipuler nos données.  
Ces requêtes sont des objets qui reçoivent les événements DOM de succès ou d’échec.  

>**Navigation**  
>
> - [Suivant](../exercices.md#exercices)  
> - [Précédent](./api-web-storage.md#lapi-web-storage--localstorage-et-sessionstorage-en-javascript)  
> - [Menu principal](../menu.md#1-introduction-au-javascript)
