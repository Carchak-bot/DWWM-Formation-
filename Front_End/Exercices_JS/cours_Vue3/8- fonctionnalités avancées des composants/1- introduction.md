---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 13/10/2022 

---
# **Introduction au chapitre**

## **Objectifs du chapitre**

Nous allons voir comment utiliser `v-model` sur les composants.  

Nous allons étudier les cascades d'attributs, les `slots`, l'injection avec `Provide` et `Inject`.  

Nous verrons également des fonctions utilitaires permettant de transformer des objets réactifs en références.  

Enfin, nous verrons les composants asynchrones.

Pour rappel, la directive `v-model` équivaut à l'utilisation de `v-bind` sur l'attribut `value` et de l'utilisation de `v-on` sur l'événement `input`.

Voici l'équivalent de `v-model` :  

`App.vue`

```html
<template>
    <input
        :value="content"
        @input="content = ($event.target as HTMLInputElement).value"
        type="text"
    />
    <p>{{ content }}</p>
</template>

<script setup lang="ts">
    import { ref } from 'vue';

    const content = ref('');
</script>

<style scoped lang="scss"></style>
```
