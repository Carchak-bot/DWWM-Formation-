---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 26/05/2022  

---
# **Utilisation de Sass**

L'utilisation de **Sass** avec **Vite** et **Vue.js** est extrêmement simple.  

Il suffit d'installer **sass** :  

```bash
npm add -D sass
```

Et dans les **composants SFC** de préciser, comme pour **TypeScript** côté **template**, que les styles sont écrits en **Sass** :  

```html
<template>
    <h1><span>Bonjour</span> le monde !</h1>
</template>

<script setup lang="ts"></script>

<style scoped lang="scss">
    h1 {
        color: red;
        span {
            color: blue;
        }
    }
</style>
```
