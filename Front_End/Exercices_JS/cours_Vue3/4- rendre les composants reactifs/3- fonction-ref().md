---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 26/05/2022  

---
# **La fonction ref()**

## **La fonction `ref()`**

**Vue.js** met à disposition la fonction `ref()` qui permet de créer des variables réactives contenant tout type de valeur, y compris des primitives.  

Par exemple :  

```ts
import { ref } from 'vue';
const compteur = ref(0);
```

`ref()` prend la valeur en argument et va en fait tout simplement créer un objet contenant une propriété value avec la valeur passée.  

Cela permet de contourner le problème que nous avions vu dans la leçon précédente :  
`compteur` contient donc bien un objet et celui-ci est passé par référence.  

Nous pouvons donc le modifier et **Vue.js** pourra intercepter les changements pour effectuer les mises à jour nécessaires.  

Pour modifier la valeur, il faut modifier la propriété `value` automatiquement créée :  

```ts
compteur.value++
```

Si vous modifiez `compteur`, il ne se passera rien.  

En revanche, côté **template**, vous n'avez pas besoin d'utiliser `compteur.value`.  

**Vue.js** va automatiquement accéder à la propriété `.value` pour les variables réactives créées avec
`ref()`.  

## **Accès automatique aux propriétés réactives**

Lorsque vous créez une propriété réactive avec `ref()` sur un objet réactif créé avec `reactive()`, **Vue.js**
va automatiquement utiliser le `.value` pour vous lorsque vous essayerez de modifier ou d'accéder à cette
propriété :  

```ts
import {ref, reactive} from 'vue';
let compteur = ref(0);
const state = reactive({
    compteur
})
console.log(state.compteur); // 0
state.compteur = 2;
console.log(state.compteur); // 2
```

Ici nous n'avons donc pas besoin de faire `state.compteur.value = 2` mais directement `state.compteur = 2`. Vue.js s'en charge pour nous.  

## **Rappels sur l'inférence de type TypeScript**

Comme nous l'avons vu, l'inférence de type permet de déduire le type de vos assignations.  

Par exemple :  

```ts
let x = 42;
```

Par l'inférence de type, **TypeScript** déclare implicitement que la variable est de type `number`, vous ne pourrez donc pas lui assigner une chaîne de caractères plus tard dans votre code.  

Ce type d'inférence se produit lors des assignations de variable, lors de la déclaration de paramètres par défaut pour des fonctions et pour les retours de fonctions.  

C'est cette fonctionnalité qui pousse les débutants à mettre `any` partout car le compilateur va se plaindre d'assignation successible de types différents sans que vous ayez indiqué que la variable pouvait avoir plusieurs types.

```html
<template>
    <h1>Compteur : {{ compteur }}</h1>
    <button @click="incCompteur">+1</button>
</template>

<script setup lang="ts">
    import { ref } from 'vue';

    const compteur = ref(0);

    function incCompteur() {
        compteur.value++;
    }
</script>

<style></style>
```
