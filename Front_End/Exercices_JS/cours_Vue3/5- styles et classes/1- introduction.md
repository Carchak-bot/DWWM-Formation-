---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 26/05/2022  

---
# **Introduction et portée des styles**

## **Comportement par défaut**

Par défaut, tout le **CSS** est global car il est réuni dans le **bundle** par **Vite**.  

Si vous définissez des classes à l'intérieur des balises `<style>`, ces classes s'appliqueront donc à tous vos composants.  

## **L'attribut `scoped`**

L'attribut `scoped` permet d'encapsuler le **CSS** d'un composant monofichier (**SFC**) en ajoutant, grâce à **PostCSS** un attribut unique (*par exemple `data-v-29e5g83`*) à l'élément en compilant par exemple `.ma-classe` en `.ma-classe[data-v-29e5g83]`.  

Cette encapsulation est effectuée automatiquement par **Vite**.  
Vous n'avez rien à faire d'autre que d'ajouter l'attribut `scoped`.  

Pour utiliser `scoped`, il suffit de l'ajouter sur la balise style de votre composant monofichier :  

```html
<template>
    <h1>Allo le monde !</h1>
</template>

<script setup lang="ts"></script>

<style scoped>
    h1 {
        color: red;
    }
</style>
```
