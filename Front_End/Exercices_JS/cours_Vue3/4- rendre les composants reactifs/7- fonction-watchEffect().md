---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 26/05/2022  

---
# **La fonction watchEffect()**

## **La fonction `watchEffect()`**

La fonction `watch()` est paresseuse (`lazy`), cela signifie que la fonction de rappel passée en deuxième argument ne sera exécutée que si les sources sont modifiées.  

Dans certains cas, vous voulez que la fonction de rappel soit exécutée dès le chargement du composant, par exemple pour récupérer des données initiales.  

La fonction `fetch()` permet d'exécuter immédiatement la fonction de rappel, appelée effet, et d'enregistrer automatiquement toutes les propriétés réactives utilisées comme étant des sources.  

Lorsque ces propriétés réactives enregistrées comme dépendances seront modifiées, la fonction de rappel de `watchEffect()` sera automatiquement ré-exécutée.  

## **Différences entre `watch()` et `watchEffect()`**

La fonction `watch()` : n'enregistre en sources (ou dépendances) que celles explicitement passées en premier argument.  
Elle n'enregistre pas automatiquement les propriétés réactives utilisées dans la fonction de rappel.  
La fonction de rappel ne s'exécute que si au moins une source change.  

La fonction `watchEffect()` : enregistre automatiquement toutes les propriétés réactives, utilisées dans la fonction de rappel passée en premier argument, comme des dépendances.  
La fonction de rappel est exécutée une première fois dès le chargement puis à chaque fois qu'une des propriétés réactives utilisées dans la fonction de rappel sont modifiées.  

## **Ordre d'exécution**

Lorsque vous modifiez des propriétés réactives, **Vue.js** peut devoir modifier le **DOM** (si les propriétés réactives sont utilisées côté template) et devoir exécuter vos **watchers** (si les propriétés réactives sont enregistrées comme des sources / dépendances dans des `watch()` et/ou des `watchEffect()`).  

Par défaut, **Vue.js** va d'abord exécuter vos **watchers** avant de mettre à jour le **DOM**.  

Cela veut dire que dans les fonctions de rappel de vos **watchers**, le **DOM** sera dans l'état avant la modification des propriétés réactives.  
Il faut y penser si vous utilisez le **DOM** dans les **watchers**.

Si vous voulez que des watchers soient exécutées après la mise à jour du **DOM**, il suffit d'utiliser la propriété `flush: 'post'` :  

```js
watch(source, fonctionDeRappel, {
    flush: 'post'
})

watchEffect(fonctionDeRappel, {
    flush: 'post'
})
```

```html
<template>
    <div>
        <label for="quantity">Nombre de livres : </label>
        <input id="quantity" type="number" v-model="produit.quantite" />
    </div>

    <div>
        <label for="prix">Prix : </label>
        <input id="prix" type="number" v-model="produit.prix" />
    </div>
    <h2>Prix total HT : {{ totalPrixHT }}€</h2>
    <h2>Prix total TTC : {{ totalPrixTTC }}€</h2>
    <h3>Modifications : {{ produit.nbrModifs }}</h3>
</template>

<script setup lang="ts">
    import { computed, reactive, watch, watchEffect } from 'vue';

    interface Produit {
        quantite: number;
        prix: number;
        nom: string;
        nbrModifs: number;
        derniereModif?: number;
    }

    const produit = reactive<Produit>({
        quantite: 3,
        prix: 10,
        nom: 'livre',
        nbrModifs: 0,
    });

    const totalPrixHT = computed(() => produit.quantite * produit.prix);
    const totalPrixTTC = computed(() => produit.quantite * produit.prix * 1.2);

    watch(
    () => [produit.quantite, produit.prix],
        (nouvelleVal, ancienneVal) => {
            console.log(nouvelleVal, ancienneVal);
            produit.nbrModifs++;
        }
    );

    watchEffect(() => {
        produit.derniereModif = Date.now();
        console.log(produit);
    });
</script>

<style></style>
```
