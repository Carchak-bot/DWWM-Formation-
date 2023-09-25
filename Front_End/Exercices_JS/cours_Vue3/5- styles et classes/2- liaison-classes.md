---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 26/05/2022  

---
# **La liaison de classes**

Nous avons vu qu'il était possible de lier une ou plusieurs classes à l'attribut `class` en utilisant la directive
`v-bind`.  

Pour permettre une utilisation très flexible, **Vue.js** permet plus de syntaxes lorsque nous utilisons `v-bind`
avec les classes ou les styles.  

Bien sûr la liaison n'a de sens que si les classes sont réactives suivant la valeur de propriétés.  
Sinon il suffit d'écrire les classes en dur côté **template**.  

Nous allons récapituler toutes les syntaxes possibles.  

## **Liaison avec des objets**

La première syntaxe permet d'utiliser un objet :  

```html
<div :class="{ actif: estActif }"></div>
```

La classe `actif` sera ajoutée si la propriété `estActif` vaut `true` :

```js
const estActif = ref(true);
```

Si la propriété réactive passe à `false`, la classe sera automatiquement retirée.  

## **Combinaison de l'attribut `class` et d'une liaison `:class`**

Vous pouvez combiner sans problème l'attribut `class` avec une liaison avec la directive `v-bind` en utilisant
`:class` :  

```html
<div
    class="classe1"
    :class="{ active: isActive, error: hasError }"
>
</div>
```

Ici nous aurons quoiqu'il arrive la `classe1`.  

La classe `active` sera ajoutée si la propriété `isActive` vaut `true`.  
La classe `error` sera ajoutée si la propriété `hasError` vaut `true`.  

Dans tous les cas, **Vue.js** créera la **div** sur le **DOM** avec un seul attribut classe, par exemple :  

```html
<div class="classe1 isActive hasError"></div>
```

## **Utilisation d'un objet réactif**

Vous pouvez utiliser un objet réactif côté script pour la liaison avec l'attribut `class` :  

```js
const mesClasses = reactive({
    active: true,
    error: false,
    classeX: false
});
```

Il suffit ensuite de le passer à `v-bind` :  

```html
<div :class="mesClasses"></div>
```

## **Utilisation d'une propriété calculée**

Vous pouvez même utiliser une **propriété calculée** :  

```js
const mesClasses = computed(() => ({
    active: isActive.value && !error.value,
    error: error.value && error.value.type === 'fatal'
}));
```

## **Utilisation d'un tableau de classes**

Vous pouvez utiliser un tableau de classes :  

```html
<div :class="[classe1, classe2]"></div>
```

```html
<template>
    <input
        class="input"
        :class="{ inputOngoing, inputError, inputValid }"
        type="text"
        @focus="
            input.focus = true;
            input.touched = true;
        "
        @blur="input.focus = false"
        v-model="input.value"
    />
</template>

<script setup lang="ts">
    import { reactive, computed } from 'vue';

    const input = reactive({
        value: '',
        focus: false,
        touched: false,
    });

    const inputOngoing = computed(() => input.focus && input.value.length);
    const inputError = computed(
    () => !input.focus && input.touched && input.value.length < 5
    );
    const inputValid = computed(
    () => !input.focus && input.touched && !inputError.value
    );
</script>

<style scoped>
    input {
        outline: 0;
        border: 2px solid black;
        border-radius: 4px;
    }

    .inputOngoing {
        border-color: blue;
    }

    .inputError {
        border-color: red;
    }

    .inputValid {
        border-color: green;
    }
</style>
```
