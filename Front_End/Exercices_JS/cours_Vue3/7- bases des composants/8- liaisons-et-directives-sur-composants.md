---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 01/10/2022 

---
# **Utilisation des liaisons et des directives sur les composants**

## **Utilisation des classes sur les composants**

Lorsque vous utilisez l'attribut `class` avec un composant enfant, ces classes seront ajoutées sur l'élément racine, c'est-à-dire l'élément imbriquant tous les autres éléments du **template** du composant enfant.  

Par exemple, si le composant enfant a pour **template** :  

```html
<div class="classe1">
    <p>Bonjour !</p>
</div>
```

Et que nous utilisons l'attribut `class` dans le **template** du composant parent, sur le composant enfant :  

```html
<Enfant class="classe2" />
```

**Vue.js** résolvera les classes en les fusionnant :  

```html
<div class="classe1 classe2">
    <p>Bonjour !</p>
</div>
```

**Attention !**  
Si le composant enfant n'a pas d'élément racine imbriquant les autres éléments du **template**, il faudra utiliser la valeur spéciale `$attrs.class` mise à disposition par **Vue.js**.  

Ainsi, nous devrons faire :  

```html
<p :class="$attrs.class">Bonjour </p>
<span>C'est le template du composant enfant</span>
```

Ici nous disons à **Vue.js** d'appliquer les classes définies dans le composant parent sur l'élément paragraphe.  

C'est tout à fait logique : **Vue.js** ne sait pas où appliquer les classes si nous ne lui indiquons pas et donc par défaut il ne va rien appliquer.  

## **Utilisation de la directive `v-for` avec des composants**

La directive `v-for` est utilisable directement sur tout composant :  

```html
<Composant v-for="item in items" :key="item.id" />
```

Pour passer des données au composant enfant, il faut utiliser la liaison de données avec `v-bind` :  

```html
<Composant v-for="(item, index) in items" :item="item" :index="index" :key="item.id"  />
```

## **Utilisation de la directive `v-if` avec des composants**

Il n'y a rien de particulier pour la directive `v-if` que vous pouvez appliquer sur tous les composants :  

```html
<Composant v-if="active" />
```

## **Exemple**

App.vue :  

```html
<template>
    <button @click="toggle = !toggle">Toggle</button>
    <template v-if="toggle">
        <Blog v-for="title of titles" :title="title" :key="title" class="parent"
    /></template>
</template>

<script setup lang="ts">
    import { onMounted, reactive, ref } from 'vue';
    import Blog from './Blog.vue';

    const titles = ref(['Un titre', 'Un autre titre', 'Encore un dernier titre']);

    const toggle = ref(true);
</script>

<style scoped lang="scss"></style>
```

Blog.vue :  

```html
<template>
    <h2>{{ title }}</h2>
</template>

<script lang="ts" setup>
    import { ref } from 'vue';

    defineProps<{ title: string }>();
</script>
```
