---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 26/05/2022  

---
# **Utilisation de fonctions**

## **Utilisation de fonction dans les liaisons**

Comme nous l'avons vu, il est possible d'utiliser des **expressions JavaScript** dans les templates.  
Nous pouvons donc invoquer des fonctions.  

Il est donc courant de voir :  

```html
<template>
    <h1>{{ getTitle() }}</h1>
    <input :type="getType()" />
</template>

<script setup lang="ts">
    function getTitle() {
        return 'Je suis un titre';
    }

    function getType() {
        return 'password';
    }
</script>

<style></style>
```

Ici, nous utilisons deux invocations de fonction.  
L'une avec `v-bind` et l'autre avec `v-text`.  

Nous verrons de nombreux exemples au fil du cours car c'est courant dasn les projets Vue.js.
