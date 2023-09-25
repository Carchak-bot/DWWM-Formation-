---
Author: Alain ORLUK / ID-Formation
Formation: Développeur Web & Web mobile
Lieu: Strasbourg
Date: 01/10/2022
---

# **Introduction aux composants**

## **Les composants**

Nous avions déjà commencé à aborder les composants : ils permettent de créer des briques d'**UI** réutilisables et indépendantes.

Nous avions également vu qu'ils étaient organisés de façon hiérarchique en **arbre de composants**.

Le composant au sommet de l'arbre étant le **composant racine** (`root` en anglais).

Ce schéma montre que l'interface utilisateur de gauche est découpée en plusieurs composants : un composant pour l'en-tête, un composant pour la partie principale à gauche et un composant pour la partie droite :  
![Arbre des composants](../assets/img/arbre-composants-2.png)

Remarquez que des composants sont réutilisés plusieurs fois : un composant `Article` pour les deux articles affichés et un composant Item pour les trois informations affichées à droite.

## **Syntaxe des composants**

Nous avons vu que les fichiers des composants étaient écrits en `PascalCase` et devaient terminer par l'extension `.vue`.

Cette syntaxe permet de créer des composants monofichiers (**SFCs**) avec une partie `template`, une partie `script` et une partie `style`.

Cette syntaxe est rendue possible grâce à **Vite** et plus précisément au **plugin Vue** qui va transformer les **SFCs** lors d'une étape de **build**.

## **Utiliser des composants enfants**

Pour utiliser un composant enfant dans un composant parent, il suffit d'importer le ou les composants dans la partie `script` et de les utiliser dans la partie `template`.

La syntaxe recommandée pour utiliser un composant enfant est `<ComposantEnfant />`.

Cela permet de distinguer en un coup d'œil les composants `Vue.js` des éléments **HTML**.

Dans notre exemple, nous aurions par exemple dans le composant **Root** :

```html
<script setup>
  import Header from "./Header.vue";
  import Main from "./Main.vue";
  import Aside from "./Aside.vue";
</script>

<template>
  <header />
  <main />
  <aside />
</template>
```

Les composants sont automatiquement exportés grâce à l'utilisation de l'attribut `setup` sur les balises `script`.  
Aussi, il n'y a rien à exporter manuellement dans les composants enfants.

Dans Product.vue :

```html
<template>
  <h3>Voiture</h3>
  <ul>
    <li>Prix: 1500€</li>
  </ul>
  <button @click="count++">Ajouter une voiture au panier</button>
  <p>Vous avez ajouté {{ count }} voiture</p>
</template>

<script setup lang="ts">
  import { ref } from "vue";

  const count = ref(0);
</script>

<style scoped lang="scss"></style>
```

Et dans App.vue :

```html
<template>
  <Product />
  <Product />
  <Product />
</template>

<script setup lang="ts">
  import Product from "./Product.vue";
</script>

<style scoped lang="scss"></style>
```
