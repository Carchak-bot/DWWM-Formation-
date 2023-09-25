---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 06/10/2022 

---
# **Gestion des quantités**

## **Création de l'interface `ProductCartInterface.ts`**

Dans le dossier `src/interfaces`, créez le fichier `ProductCart.interface.ts` :  

```js
import type { ProductInterface } from "./Product.interface";

export interface ProductCartInterface extends ProductInterface {
    quantity: number;
}
```

La nouvelle interface étend simplement l'interface `ProductInterface` en ajoutant une propriété pour la quantité.  

## **Création d'un index pour les interfaces**

Créez un fichier `src/interfaces/index.ts` :  

```js
export * from './Product.interface';
export * from './ProductCart.interface';
```

Cela permet simplement de simplifier les imports des interfaces dans nos composants.  

## **Modification de `CartProduct.vue`**

Nous utilisons notre nouvelle interface et nous affichons la quantité de chaque produit dans le panier :  

```html
<script setup lang="ts">
    import type { ProductCartInterface } from '@/interfaces';

    defineProps<{
        product: ProductCartInterface;
    }>();

    const emit = defineEmits<{
        (e: 'removeProductFromCart', productId: number): void;
    }>();
</script>

<template>
    <div class="mb-10 p-10 d-flex flex-row align-items-center product">
        <strong class="mr-10">{{ product.title }}</strong>
        <span class="flex-fill mr-10">x {{ product.quantity }}</span>
        <span class="mr-10">Prix : {{ product.price }}€</span>
        <button
            class="btn btn-danger"
            @click="emit('removeProductFromCart', product.id)"
        >
        Supprimer
        </button>
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

## **Modification de `CartProductList.vue` et `Cart.vue`**

Utilisez la nouvelle interface :  

```js
import type { ProductCartInterface } from '@/interfaces';

const props = defineProps<{
    cart: ProductCartInterface[];
}>();
```

## **Modification de `App.vue`**

Nous gérons maintenant l'incrémentation ou la décrémentation de la quantité lors de l'ajout ou de la suppression d'un élément du panier.  

Voici le composant :  

```html
<script setup lang="ts">
    import TheHeader from '@/components/Header.vue';
    import TheFooter from '@/components/Footer.vue';
    import Shop from '@/components/Shop/Shop.vue';
    import Cart from '@/components/Cart/Cart.vue';
    import data from '@/data/product';

    import { reactive } from 'vue';
    import type { ProductInterface } from '@/interfaces';
    import type { ProductCartInterface } from '@/interfaces';

    const state = reactive<{
        products: ProductInterface[];
        cart: ProductCartInterface[];
    }>({
        products: data,
        cart: [],
    });

    function addProductToCart(productId: number): void {
        const product = state.products.find((product) => product.id === productId);
        if (product) {
                const productInCart = state.cart.find(
                    (product) => product.id === productId
            );
            if (productInCart) {
                productInCart.quantity++;
            } else {
                state.cart.push({ ...product, quantity: 1 });
            }
        }
    }
    function removeProductFromCart(productId: number): void {
        const productFromCart = state.cart.find(
            (product) => product.id === productId
        );
        if (productFromCart) {
            if (productFromCart.quantity === 1) {
                state.cart = state.cart.filter((product) => product.id !== productId);
            } else {
                productFromCart.quantity--;
            }
        }
        
    }
</script>

<template>
    <div class="app-container">
        <TheHeader class="header" />
        <Shop
            :products="state.products"
            @add-product-to-cart="addProductToCart"
            class="shop"
        />
        <Cart
            :cart="state.cart"
            class="cart"
            @remove-product-from-cart="removeProductFromCart"
        />
        <TheFooter class="footer" />
    </div>
</template>

<style lang="scss">
@import '@/assets/base.scss';
@import '@/assets/debug.scss';

.app-container {
    min-height: 100vh;
    display: grid;
    grid-template-areas: 'header header' 'shop cart' 'footer footer';
    grid-template-columns: 75% 25%;
    grid-template-rows: 48px auto 48px;
}
.header {
    grid-area: header;
}
.shop {
    grid-area: shop;
}
.cart {
    grid-area: cart;
    border-left: var(--border);
    background-color: white;
}
.footer {
    grid-area: footer;
}
</style>
```
