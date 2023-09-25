---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 01/10/2022  

---
# **Les références de template**

## **Les références de templates**

Parfois, vous voudrez accéder directement à un élément du **DOM** pour effectuer des opérations particulières.  

Dans ce cas, **Vue.js** propose de créer une référence côté template avec l'attribut `ref` :  

```html
<input ref="input">
```

L'élément du **DOM** référencé devient alors accessible depuis le **script** :  

```html
<script setup>
    import { ref, onMounted } from 'vue';
    const input = ref(null);
    onMounted(() => {
        input.value.focus();
    });
</script>
```

Le code précédent récupère le champ en utilisant la référence déclarée et va ensuite utiliser la méthode `focus()` permettant de cibler l'élément.  

Nous sommes sûr que le champ a été créé sur le **DOM**, car nous utilisons le hook `onMounted()` que nous avons vu dans la leçon précédente.  

**Nous sommes obligé d'utiliser le hook `onMounted()` car nous manipulons un élément du DOM et il faut donc que celui-ci soit créé sur le DOM avant que nous y accédions.**  

## **Utilisation des refs avec `v-for`**

Lorsque nous utilisons `ref` avec la directive `v-for`, il faut que la référence côté **script** contienne un tableau qui contiendra les éléments :  

```html
<script setup>
    import { ref, onMounted } from 'vue';
    const list = ref([1, 2, 3, 4]);
    const itemRefs = ref([]);
    onMounted(() => console.log(itemRefs.value));
</script>
<template>
    <ul>
        <li v-for="item in list" ref="itemRefs">
            {{ item }}
        </li>
    </ul>
</template>
```

## **Utilisation des refs avec des composants**

L'attribut `ref` peut également être utilisé sur les composants enfants.  

Par exemple :  

```html
<script setup>
    import { ref, onMounted } from 'vue';
    import Enfant from './Enfant.vue';
    const enfant = ref(null);
    onMounted(() => {
        // enfant.value contient l'élément Enfant
    });
</script>
<template>
    <Enfant ref="enfant" />
</template>
```

**Attention ! Il n'est pas possible par défaut d'accéder aux propriétés des composants enfants en utilisant une référence car ces propriétés sont privées par défaut.**  

**Il faut exposer, avec `defineExpose()`, les propriétés auxquelles vous souhaitez accéder dans le composant parent, depuis le composant enfant :**  

```html
<script setup>
    import { ref } from 'vue';
    const a = 21;
    const b = ref(42);
    defineExpose({
        a,
        b
    });
</script>
```

En utilisant `defineExpose()` nous rendons accessibles les deux variables depuis le composant parent qui peut ensuite les récupérer sur `enfant.value` : `enfant.value.a` et `enfant.value.b`.  

## **Utilisation de TypeScript**

Bien entendu, il faut également typer avec **TypeScript** les références.  
Nous allons voir comment le faire.  

## **Typer les références contenant des éléments HTML**

**Les références doivent être typées avec une union de types entre `null` et le type d'élément HTML contenu dans la `ref`.**  

Par exemple, pour un champ :  

```html
<script setup lang="ts">
    import { ref, onMounted } from 'vue';
    const el = ref<HTMLInputElement | null>(null);
    onMounted(() => {
        el.value?.focus();
    });
</script>
<template>
    <input ref="el" />
</template>
```

Ici nous passons en type générique `<HTMLInputElement | null>` à `ref()` pour lui indiquer que la référence peut être `null` (lorsque l'élément n'est pas encore sur le **DOM**) ou alors un élément de type `HTMLInputElement`.  

Notez également qu'il faut indiquer que la référence est `null` lors de l'initialisation du composant en passant `null` comme valeur initiale à `ref()`.  

*L'opérateur de chaînage optionnel `?.` est un opérateur **JavaScript** qui permet de lire la valeur d'une propriété sans avoir à valider expressément que chaque référence dans la chaîne n'est ni `null` ni `undefined`.*  

Ici nous avons besoin d'utiliser cet opérateur car `el` est `null` avant le montage du composant sur le **DOM**.  

La référence peut également être `null` dans d'autres cas, par exemple en utilisant la directive `v-if` et si la condition n'est pas remplie.  

## **Typer les références contenant des composants**

Pour les composants, il faut typer de cette manière :  

```html
<script setup lang="ts">
    import Enfant from './Enfant.vue';
    const modal = ref<InstanceType<typeof Enfant> | null>(null);
    const openModal = () => {
        modal.value?.open();
    };
</script>
```

`typeof` : permet de récupérer le type d'un élément, ici le type du composant enfant.  

`InstanceType` : permet de créer un type à partir d'un type d'une instance de fonction constructrice.  

`ref<InstanceType<typeof Enfant> | null>` : nous récupérons l'instance du composant, récupérons son type avec `typeof`, construisons le type de la fonction constructrice du composant à partir de cette instance du composant.  
Nous indiquons également que la référence peut être `null`.  

## **Exemple**

App.vue :  

```html
<template>
    <h2>Form</h2>
    <input ref="input" type="text" placeholder="Nom" />
    <ul>
        <li ref="fruitRef" v-for="fruit of arr" :key="fruit">
            {{ fruit }}
        </li>
    </ul>
    <Blog ref="blogRef" />
</template>

<script setup lang="ts">
    import { onMounted, reactive, ref } from 'vue';
    import Blog from './Blog.vue';

    const input = ref<HTMLInputElement | null>(null);
    const arr = reactive(['pomme', 'fraise', 'poire']);
    const fruitRef = ref<HTMLLinkElement[] | []>([]);
    const blogRef = ref<InstanceType<typeof Blog> | null>(null);

    onMounted(() => {
        console.log(input.value?.focus);
        console.log(fruitRef.value);
        console.log(blogRef.value?.count);
        console.log(blogRef.value?.arrTest);
        blogRef.value?.display();
    });
</script>

<style scoped lang="scss"></style>
```

Blog.vue :  

```html
<template>
    <h2>Blog</h2>
</template>

<script lang="ts" setup>
    import { reactive, ref, type Ref } from 'vue';

    const count = ref(15);
    const arrTest = reactive([1,2,3]);
    function display() {
        console.log('Display');
    }

    defineExpose<{count: Ref<number>, arrTest: number[], display: () => void}>({count, arrTest, display});
</script>
```
