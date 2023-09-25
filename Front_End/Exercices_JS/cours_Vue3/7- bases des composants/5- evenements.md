---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 01/10/2022 

---
# **Les événements**

## **Communiquer des composants enfants vers les composants parents**

Nous allons maintenant nous intéresser au sens de communication inverse : des composants enfants vers les composants parents.  

Pour communiquer dans ce sens, nous utilisons les événements personnalisés.  

Il faut **déclarer l'événement sur le composant enfant et l'écouter sur le composant parent**.  

Dans le **template** du composant parent, nous enregistrons l'écoute d'un événement personnalisé avec la directive `v-on` :  

```html
<Enfant
    ...
    @un-evenement="gestionnaire"
/>
```

Dans la partie **script** du composant enfant, nous déclarons l'événement avec `defineEmits()` :  

```js
const emit = defineEmits(['un-evenement']);
```

Nous pouvons émettre l'événement côté script en utilisant :  

```js
emit('un-evenement');
```

## **Émettre des événements sans utiliser `defineEmits()`**

Côté composant enfant, vous pouvez émettre directement des événements sans passer par `defineEmits()`, en utilisant `$emit()` dans le **template** :  

```html
<button @click="$emit('unEvenement')">Cliquer</button>
```

**Il faut utiliser le `camelCase` pour le nom de l'événement.**  

Côté composant, parent, cela ne change pas, nous utilisons `v-on` pour écouter **l'événement écrit en `kebabcase`** :  

```html
<Enfant @un-evenement'="gestionnaire" />
```

## **Passer des arguments**

Vous pouvez passer des arguments lors de l'émission d'un événement.  
Il suffit de les passer en argument dans le composant enfant :  

```html
<button @click="$emit('unEvenement', 42, 'unEvenement')">Cliquer</button>
```

Côté composant parent vous pouvez les récupérer dans le gestionnaire d'événement :  

```html
<Enfant @un-evenement'="gestionnaire" />
```

Par exemple :  

```js
function gestionnaire(arg1, arg2) {
    console.log(arg1, arg2);
}
```

## **Validation des évenements**

Comme pour les `props`, il est possible de valider les événements, même si c'est assez peu utilisé.  

Par exemple :  

```html
<script setup>
    const emit = defineEmits({
        submit: ({ email, password }) => {
            if (email && password) {
                return true;
            } else {
                return false;
            }
        }
    })
    function submitForm(email, password) {
        emit('submit', { email, password });
    }
</script>
```

Ici notre événement `submit` prend en argument un objet `{ email, password }`.  

La fonction de validation définie dans `defineEmits()` reçoit cet argument dans une fonction de rappel.  

Cette fonction de rappel retourne `true` si l'événement est valide et `false` sinon.  

Ici, il est considéré que l'événement est valide si `email` et `password` sont définis.  

Nous ne détaillerons pas davantage car ce type de validation est très rarement utilisé, et seulement en développement.  
Nous verrons comment valider des formulaires plus tard.  

## **Syntaxe recommandée : utilisation de `defineEmits` avec TypeScript**

Dans la suite du cours nous utiliserons ce qui est recommandé par **Vue** officiellement : déclarer explicitement les événements utilisés avec `defineEmits()` en utilisant **TypeScript**.  

Comme pour les `props`, il suffit de passer un générique à la fonction pour déclarer les types des événements utilisés :  

```js
const emit = defineEmits<{
    (e: 'change', id: number): void;
    (e: 'update', value: string): void;
    }>()
```

Ici nous déclarons un événement `change` qui contient un argument `id` de type `number` et un événement `update` qui contient un argument `value` de type chaîne de caractères.  

## **Exemple**

App.vue :

```html
<template>
    <Blog @bigger="incSize" @smaller="fontSize--" :fontSize="fontSize" />
    <Blog @bigger="incSize" @smaller="fontSize--" :fontSize="fontSize" />
</template>

<script setup lang="ts">
    import { ref } from 'vue';
    import Blog from './Blog.vue';

    const fontSize = ref(12);

    function incSize(inc: number) {
        fontSize.value += inc;
    }
</script>

<style scoped lang="scss"></style>
```

Blog.vue :

```html
<template>
    <h2>Un titre d'article</h2>
    <button @click="emit('bigger', 2)">+</button>
    <button @click="emit('smaller')">-</button>
    <p :style="{ fontSize: props.fontSize + 'px' }">
        Lorem Ipsum is simply dummy text of the printing and typesetting industry.
        Lorem Ipsum has been the industry's standard dummy text ever since the
        1500s, when an unknown printer took a galley of type and scrambled it to
        make a type specimen book. It has survived not only five centuries, but also
        the leap into electronic typesetting, remaining essentially unchanged. It
        was popularised in the 1960s with the release of Letraset sheets containing
        Lorem Ipsum passages, and more recently with desktop publishing software
        like Aldus PageMaker including versions of Lorem Ipsum.
    </p>
</template>

<script setup lang="ts">
    const props = defineProps<{ fontSize: Number }>();

    const emit = defineEmits<{
        (e: 'bigger', inc: number): void;
        (e: 'smaller'): void;
    }>();
</script>

<style scoped lang="scss"></style>
```
