---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 26/05/2022  

---
# **Les directives v-show et v-pre**

## **La directive `v-show`**

La directive `v-show` est très similaire à la directive `v-if`.  
Elle permet également d'afficher conditionnellement un élément.  

L'usage est identique et nous n'allons donc pas nous y attarder.  

### **Quelle est la différence avec la directive `v-if` ?**

`v-if` permet d'insérer ou de supprimer un élément du **DOM** suivant une condition.  

`v-show` permet d'afficher ou de ne pas afficher un élément suivant une condition.  

`v-show` agit en fait sur la propriété **CSS** `display` de l'élément.  
L'élément est donc toujours présent sur le **DOM** et rendu dès l'affichage de la page.  
Cependant, il est affiché ou non suivant que la condition est remplie.  

Il est à noter que `v-show` ne peut pas être utilisée avec `template` ou avec `v-else` et `v-else-if`.  

### **Quand est-il recommandé d'utiliser `v-if` et `v-show` ?**

Il faut utiliser `v-show` lorsqu'un élément sera affiché puis non affiché de manière répétée.  
En effet, le coût en performances de rendre visible et de cacher un élément est faible.  
Il n'y a pas de manipulation du **DOM** mais seulement la modification d'une propriété **CSS**.  

A l'inverse, il vaut mieux utiliser `v-if` si un élément sera affiché ou non suivant une condition et que cela ne changera pas après l'affichage de la page.  
En effet, contrairement à `v-show`, si la condition n'est pas remplie, l'élément ne sera pas inséré sur le **DOM** et cela coûtera donc moins cher en termes de performances.  

## **La directive `v-pre`**

La directive `v-pre` permet de sauter la compilation par **Vue.js** pour un élément.

Cela sert très rarement et uniquement pour afficher des syntaxes **Vue.js** sans les compiler, par exemple :  

```html
<span v-pre>{{ Cela sera affiché tel quel }}</span>
```

```html
<template>
    <button @click="toggle = !toggle">Toggle</button>
    <h1 v-show="toggle">Bonjour tout le monde !</h1>
    <h2 v-pre>{{ uneVariable }}</h2>
</template>

<script setup lang="ts">
    import { ref } from 'vue';

    const toggle = ref(true);
    const uneVariable = ref('une valeur');
</script>

<style scoped lang="scss"></style>
```
