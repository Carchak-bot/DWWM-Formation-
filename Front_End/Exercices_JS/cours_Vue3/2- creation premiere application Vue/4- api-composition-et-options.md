---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 26/05/2022  

---
# **Les API composition et options**

Vue.js propose deux API pour écrire des composants Vue : l'API options et l'API composition.  

L'API options est l'API originelle qui existe depuis la première version du framework.  

L'API composition est l'API avec laquelle Vue a été réécrite pour la version 3.  

C'est la nouvelle API qui est aujourd'hui recommandée et celle que nous verrons dans la cours.  

## **L'API `options`**

Dans l'ancienne **API** `options`, la logique du composant est définie dans un objet comportant des options
comme `data`, `methods` ou `mounted` par exemple.  

Les propriétés sont définies sur l'objet `this` disponible dans les options.  

Nous ne détaillerons pas plus car ce n'est pas l'API que nous utiliserons.  

Je la présente uniquement pour que vous puissiez la reconnaître lorsque vous la rencontrez.  

Voici à quoi ressemble un composant écrit avec l'**API** `options` :  

```html
<script>
    export default {
        data() {
            return {
                count: 0;
            }
        },
        methods: {
            increment() {
                this.count++;
            }
        },
        mounted() {
            console.log(`La valeur initiale est ${this.count}.`);
        }
    }
</script>
<template>
    <button @click="increment">
        Valeur du compteur : {{ count }}
    </button>
</template>
```

## **L'API `composition`**

Avec l'**API** `composition` nous définissons la logique d'un composant en important des fonctions.  

Voilà le même exemple **avec la nouvelle API** :  

```html
<script setup>
    import { ref, onMounted } from 'vue';

    const count = ref(0);

    function increment() {
        count.value++;
    }

    onMounted(() => {
        console.log(`La valeur initiale est ${count.value}.`);
    })
</script>
<template>
    <button @click="increment">
        Valeur du compteur : {{ count }}
    </button>
</template>
```

## **Les Single-File Components (SFC)**

Les **SFC** sont des composants écrits dans des fichiers qui terminent par l'extension `.vue`.  

Un SFC comporte la ***logique*** du composant (partie `script` en **JavaScript** / **TypeScript**), le ***template*** (en
**HTML**) et le ***style*** (en **CSS** ou **Sass**).  

Il est fortement recommandé d'utiliser les SFC pour écrire des composants **Vue.js**.  
C'est d'ailleurs ce que nous utiliserons tout le long du cours.
