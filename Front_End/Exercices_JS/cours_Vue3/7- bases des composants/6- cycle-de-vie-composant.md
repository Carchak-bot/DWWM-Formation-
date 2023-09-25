---
Author: Alain ORLUK / ID-Formation
Formation: Développeur Web & Web mobile
Lieu: Strasbourg
Date: 01/10/2022
---

# **Le cycle de vie d'un composant**

## **Le cycle de vie des composants**

Les composants **Vue.js** passent par différents stades de leur initialisation, à l'affichage sur le **DOM**, puis à leurs mises à jour et enfin à leur destruction et enlèvement du **DOM**.

![Bundler](../assets/img/cycle-vie-composant.png)

Lors de ces étapes de leur cycle, des fonctions peuvent être appelées pour effectuer des tâches.  
Ces fonctions sont appelées des `lifecycle hooks` (littéralement des accroches du cycle de vie).

Les `hooks` les plus utilisés sont :

- `onMounted()` : appelée juste après que le composant soit monté (donc lorsque le composant et ses descendants sont affichés sur le **DOM**).
- `onUpdated()` : appelée lorsque le composant a été mis à jour et qu'un changement sur le **DOM** a été effectué.
- `onUnmounted()` : appelée après que tous les effets réactifs aient été stoppés et lorsque le composant va être retiré du **DOM**. On l'utilise pour faire des opérations de nettoyage.

Les autres `hooks` sont :

- `onBeforeMount()` : qui est appelée lorsque le composant a été initialisé (notamment son état réactif) mais lorsqu'aucun élément n'a encore été créé sur le **DOM**.
- `onBeforeUpdate()` : appelée juste avant que le composant n'ait mis à jour son **DOM** suite à un changement de son état réactif.
- `onBeforeUnmount()` : appelée lorsque le composant est encore fonctionnel mais va être détruit.
- `onErrorCaptured(`) : appelée lorsqu'une erreur se propage depuis un composant enfant.

_Nous verrons les autres `hooks` qui ont des cas avancés d'utilisations : `onRenderTracked()`, `onRenderTriggered()`, `onActivated()`, `onDeactivated()` et `onServerPrefetch()`._  
_Ils sont relatifs au développement, aux composants `keepalive` et au `SSR`._

## **Utiliser un hook**

Pour utiliser un `hook` c'est très simple, il suffit d'utiliser la fonction de `hook` adéquate et de lui passer une fonction de rappel contenant les tâches à exécuter lorsque l'état est atteint :

```html
<script setup>
  import { onMounted } from "vue";

  onMounted(() => {
    console.log("Le composant est présent sur le DOM.");
  });
</script>
```

## **Exemple**

App.vue :

```html
<template>
  <button @click="toggle = !toggle">Toggle</button>
  <div v-if="toggle">
    <Blog />
  </div>
</template>

<script setup lang="ts">
  import { ref } from "vue";
  import Blog from "./Blog.vue";

  const toggle = ref(true);
</script>

<style scoped lang="scss"></style>
```

Blog.vue :

```html
<template>
  <h1>Blog</h1>
  <button @click="count++">+1</button>
  <p>{{ count }}</p>
</template>

<script setup lang="ts">
  import {
    onBeforeMount,
    onBeforeUnmount,
    onBeforeUpdate,
    onMounted,
    onUnmounted,
    onUpdated,
    ref,
  } from "vue";

  const count = ref(0);

  const intervalId = setInterval(() => {
    console.log("tick");
  }, 1000);

  onBeforeMount(() => {
    console.log("Avant le montage");
  });
  onMounted(() => {
    console.log("Après le montage");
  });
  onBeforeUpdate(() => {
    console.log("Avant la mise à jour");
  });
  onUpdated(() => {
    console.log("Après la mise à jour");
  });
  onBeforeUnmount(() => {
    console.log("Avant la destruction / démontage");
  });
  onUnmounted(() => {
    clearInterval(intervalId);
    console.log("Démontage");
  });
</script>

<style scoped lang="scss"></style>
```
