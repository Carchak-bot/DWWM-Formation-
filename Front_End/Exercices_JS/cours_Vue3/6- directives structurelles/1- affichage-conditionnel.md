---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 26/05/2022  

---
# **Affichage conditionnel avec les directives v-if, v-else et v-else-if**

## **La directive `v-if`**

La directive `v-if` permet d'afficher ou non un bloc conditionnellement.  

```html
<h1 v-if="condition1 && condition2">Affiché si condition1 et condition2 valent true</h1>
```

**Autrement dit, elle permet d'insérer dynamiquement sur le DOM un bloc d'un ou plusieurs éléments HTML si une ou plusieurs conditions est / sont remplie(s), et de les enlever du DOM dans le cas contraire.**

`v-if` doit forcément être utilisé sur un élément.  
Si vous voulez l'utiliser sur un ensemble d'éléments HTML de même niveau, il faut les imbriquer dans un template qui est un élément invisible (il ne sera pas inséré sur le DOM).  

```html
<template v-if="condition">
    <h1>Titre</h1>
    <p>Paragraphe 1</p>
    <p>Paragraphe 2</p>
</template>
```

## **La directive `v-else`**

Comme son nom l'indique, `v-else` permet d'afficher un bloc alternatif si la condition passée à `v-if` n'est pas remplie.  

L'élément sur lequel est attaché `v-else` doit être immédiatement après l'élément auquel est attaché un `v-if`.  

```html
<button @click="condition = !condition">Toggle</button>

<h1 v-if="condition">Condition vaut true</h1>
<h1 v-else>Condition vaut false</h1>
```

## **La directive `v-else-if`**

`v-else-if` permet d'afficher un bloc alternatif si la condition de `v-if` n'est pas remplie.  

Il est possible de chaîner les `v-else-if` :  

```html
<template>
    <input type="text" v-model="letter" />
    <h1 v-if="letter === 'A'">A</h1>
    <h1 v-else-if="letter === 'B'">B</h1>
    <h1 v-else-if="letter === 'C'">C</h1>
    <h1 v-else>Autre</h1>
</template>

<script setup lang="ts">
    import { ref } from 'vue';

    const letter = ref('');
</script>

<style scoped lang="scss"></style>
```
