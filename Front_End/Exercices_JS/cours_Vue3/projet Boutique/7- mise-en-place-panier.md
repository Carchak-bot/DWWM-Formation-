---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 04/10/2022 

---
# **Mise en place du panier**

## **Modification de `CartProduct.vue`**

Nous mettons en place en dur le produit du panier pour terminer la mise en page :  

```html
<script setup lang="ts"></script>

<template>
    <div class="mb-10 p-10 d-flex flex-row align-items-center product">
        <strong class="flex-fill mr-10">Macbook Pro</strong>
        <span class="mr-10">Prix : 1500€</span>
        <button class="btn btn-danger">Supprimer</button>
    </div>
</template>

<style lang="scss" scoped>
.product {
    border: var(--border);
    border-radius: var(--border-radius);
    background-color: var(--gray-1);
}
</style>
```

## **Modification de `App.vue`**

Nous modifions légèrement la classe `cart` :  

```css
.cart {
    grid-area: cart;
    border-left: var(--border);
    background-color: white;
}
```
