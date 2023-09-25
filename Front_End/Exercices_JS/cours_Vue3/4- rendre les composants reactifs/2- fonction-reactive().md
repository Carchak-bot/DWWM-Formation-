---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 26/05/2022  

---
# **La fonction reactive()**

## **La fonction `reactive()`**

Avec **Vue.js**, nous pouvons créer des objets, tableaux, Maps et Sets réactifs avec la fonction `reactive()`.  

Par exemple :  

```ts
import { reactive } from 'vue';

const state = reactive({ compteur: 0 });
```

Nous avons créé un objet réactif avec une propriété `compteur` initialisée à 0.  

Par convention, on utilise `state` (pour état) pour stocker les objets réactifs d'un composant.  

L'état (`state`) d'un composant est l'état des données de sa partie logique et qui peuvent changer au cours du temps en réaction à des changements.  

Comme nous l'avons vu dans la partie précédente précédente, la fonction `reactive()` va en fait utiliser des **Proxies JavaScript** pour pouvoir réagir aux accès et aux modifications des objets réactifs.  

Retenez bien que seul le proxy est réactif (l'objet retourné par la fonction `reactive()`.  
Si vous modifiez un objet directement sans passer par la fonction `reactive()`, il ne se passera rien.  
C'est pour cette raison qu'on déclare souvent un objet `state` avec tous les objets réactifs du composant.  

Une fois un objet rendu réactif, les modifications seront automatiquement propagées au template et rendues par **Vue.js** !  

## **Mise à jour du DOM**

Comme nous l'avons vu, lorsque vous modifiez un ou plusieurs objets réactifs, le **DOM** est mis à jour automatiquement.  

Ces mises à jour sont appliquées à chaque ***tick*** (le nom vient simplement du déplacement de la trotteuse d'une montre), c'est-à-dire à chaque nouveau cycle de mise à jour des composants.  

Ce système est mis en place par **Vue.js** pour s'assurer que chaque composant n'est mis à jour qu'une seule fois pendant chaque cycle de mise à jour, peu importe le nombre de modifications effectuées.  
Cela permet de meilleures performances.  

Il est possible d'exécuter une action spécifique à chaque mise à jour du **DOM** en utilisant la fonction `nextTick()` et en lui passant une fonction de rappel :  

```js
import { nextTick } from 'vue'

function incCompteur() {
    state.compteur++;
    nextTick(() => {
    // le DOM a été mis à jour
    })
}
```

Ici, dans la fonction passée à `nextTick()` nous sommes sûr que le **DOM** a été mis à jour et que la nouvelle valeur du compteur est bien affichée.  

Essayez l'exemple interactif en bas de page pour bien comprendre la réactivité avant de passer à la suite.  

## **Limitation de la fonction `reactive()`**

La fonction `reactive()` ne peut pas rendre une valeur primitive réactive :  

```ts
const state = reactive({ compteur: 0 });

let n = state.compteur;
n++;
```

Cela ne fonctionnera pas car JavaScript passe les valeurs primitives par valeur et non par référence.  

Cela signifie qu'avec ce code, `n` contiendra la valeur `0` et non la référence vers la propriété reactive `compteur`.

`n++` modifiera donc seulement `n` et pas `state.compteur` et aucune mise à jour ne sera déclenchée !  

Nous verrons dans le prochain cours qu'il faut dans ce cas utiliser la fonction `ref()`.  

```html
<template>
    <h1>Bonjour {{ user.prenom }}</h1>
    <h1>Compteur : {{ state.compteur }}</h1>
    <button @click="incCompteur">+1</button>
</template>

<script setup lang="ts">
    import { reactive, nextTick } from 'vue';

    const state = reactive({
        user: { prenom: 'Alain', age: 51 },
        compteur: 0,
    });

    let { user } = state;

    function incCompteur() {
        user.prenom = user.prenom === 'Alain' ? 'Loïc' : 'Zerina';
        state.compteur++;
        nextTick(() => {
            console.log('Tick');
        });
    }
</script>

<style></style>
```
