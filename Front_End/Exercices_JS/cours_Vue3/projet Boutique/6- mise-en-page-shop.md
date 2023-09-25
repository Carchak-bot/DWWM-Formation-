---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 04/10/2022 

---
# **Mise en page de la partie Shop**

## **Modification de `ShopProduct.vue`**

Nous mettons pour le moment les détails du produit en dur :  

```html
<script setup lang="ts"></script>

<template>
    <div class="product d-flex flex-column">
        <div class="product-image"></div>
        <div class="p-10 d-flex flex-column">
            <h4>Macbook Pro</h4>
            <p>Performances exceptionnelles avec la puce M1 Pro ou M1</p>
            <div class="d-flex flex-row align-items-center">
                <strong class="flex-fill">Prix : 1500€</strong>
                <button class="btn btn-primary">Ajouter au panier</button>
            </div>
        </div>
    </div>
</template>

<style lang="scss" scoped>
.product {
    background-color: #ffffff;
    border: var(--border);
    border-radius: var(--border-radius);
    &-image {
        border-top-right-radius: var(--border-radius);
        border-top-left-radius: var(--border-radius);
        background-image: url('https://media.ldlc.com/r1600/ld/products/00/05/82/01/LD0005820198_1.jpg');
        background-size: cover;
        background-position: center;
        height: 250px;
    }
}
</style>
```

## **Classes pour les boutons**

Modifiez `assets/base.scss` pour ajouter les classes pour nos boutons :  

```css
// buttons

.btn {
    padding: 8px 15px;
    border: 0;
    border-radius: var(--border-radius);
    cursor: pointer;
    font-weight: 500;
    transition: background-color 0.2s;
}

.btn-primary {
    background-color: var(--primary-1);
    color: var(--text-primary-color);
    &:hover {
        background-color: var(--primary-2);
    }
}

.btn-danger {
    background-color: var(--danger-1);
    color: var(--text-primary-color);
    &:hover {
        background-color: var(--danger-2);
    }
}
```
