---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 26/05/2022  

---
# **La directive v-model**

## **La directive `v-model`**

La directive `v-model` permet de créer une liaison dans les deux sens (entre partie template et partie script).  

Elle peut être utilisée sur :  

- les `input`
- les `select`
- les `textarea`
- les composants

Prenons un exemple pour lier une propriété à la valeur d'un input :  

```html
<input
:value="text"
@input="event => text = event.target.value">
```

Ici nous lions la valeur du champ avec la directive `v-bind` à la propriété `text` (sens *script* vers *template*).  

Et nous lions l'événement `input` avec la directive `v-on` pour que la valeur de la propriété `text` soit égale à la valeur du champ lorsque l'utilisateur le modifie (événement `input`).  
C'est dans le sens *template* vers *script*.  

Étant donné que cette liaison bidirectionnelle est très courante, **Vue.js** mets à disposition la directive `v-model` qui permet de faire exactement la même chose mais avec une syntaxe beaucoup plus concise et élégante :  

```html
<input v-model="text">
```

Nous la verrons plus en détail dans le chapitre sur les formulaires.  

```html
<template>
    <label for="quantity">Nombre de livres : </label>
    <input id="quantity" type="number" v-model="produit.quantite" />
    <h2>Prix total HT : {{ totalPrixHT }}€</h2>
    <h2>Prix total TTC : {{ totalPrixTTC }}€</h2>
</template>

<script setup lang="ts">
    import { computed, reactive } from 'vue';

    const produit = reactive({
        quantite: 3,
        prix: 10,
        nom: 'livre',
    });

    const totalPrixHT = computed(() => produit.quantite * produit.prix);
    const totalPrixTTC = computed(() => produit.quantite * produit.prix * 1.2);
</script>

<style></style>
```
