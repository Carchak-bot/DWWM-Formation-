---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 26/05/2022  

---
# **Les directives v-once et v-memo**

## **La directive `v-once`**

La directive `v-once` permet de rendre un élément une seule fois et de ne plus le mettre à jour ensuite.  

Autrement dit, après le premier rendu par **Vue.js**, les éléments sur lesquels sont appliqués la directive `v-once` sont considérés comme étant du contenu statique.  

Cette directive permet d'optimiser les performances, par exemple sur un composant contenant des composants étant mis à jour très souvent et d'autres composants n'ayant pas besoin d'être mis à jour.  

Par exemple :  

```html
<ul>
    <li v-for="i in list" v-once>{{i}}</li>
</ul>
<enfant1></enfant1>
```

Ici nous supposons que cette liste ne sera pas mise à jour après l'affichage, mais qu'un composant enfant est mis à jour fréquemment.  

Dans ce cas, `v-once` permet de ne pas devoir mettre à jour la liste à chaque fois.  

## **La directive `v-memo`**

La directive `v-memo` est assez proche de la logique de `computed()` : elle permet de suivre des dépendances et de mettre à jour un ou plusieurs éléments du **DOM** uniquement si ces dépendances sont mises à jour.  

```html
<div v-memo="[valeurA, valeurB, valeurC]">
  ...
</div>
```

Ici, la `div` et tous les éléments imbriqués ne seront mis à jour que si valeurA, valeurB et/ou valeurC sont modifiées.  

```html
<template>
    <h1 v-memo="[title]">
        <p>{{ title }}</p>
    </h1>
    <input type="text" v-model="input" />
    <p>{{ input }}</p>
</template>

<script setup lang="ts">
    import { ref } from 'vue';

    const title = ref('Je suis un titre');
    const input = ref('');
</script>

<style scoped lang="scss"></style>
```
