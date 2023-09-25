---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 06/10/2022 

---
# **Affichage du total et affichage initial du panier**

## **Création dossier pour les styles**

Dans le dossier `assets`, créez un dossier `scss` et placez-y les fichiers `base.scss` et `debug.scss`.  

N'oubliez pas de modifier en conséquence les imports dans `App.vue` :  

```html
<style lang="scss">
    @import './assets/scss/base.scss';
    @import './assets/scss/debug.scss';
```

## **Ajout d'une classe**

Dans le fichier `base.scss`, ajoutez la classe suivante :  

```css
.btn-success {
    background-color: var(--success-1);
    color: var(--text-primary-color);
    &:hover {
        background-color: var(--success-2);
    }
}
```

## **Modification de `Cart.vue`**

Nous utilisons une propriété calculée pour calculer le total du panier :  

```html
<script setup lang="ts">
    import type { ProductCartInterface } from '@/interfaces';
    import { computed } from 'vue';
    import CartProductList from './CartProductList.vue';
    const props = defineProps<{
        cart: ProductCartInterface[];
    }>();
    const totalPrice = computed(() =>
        props.cart.reduce((acc, product) => acc + product.price * product.quantity, 0)
        );
    const emit = defineEmits<{
        (e: 'removeProductFromCart', productId: number): void;
    }>();
</script>

<template>
    <div class="p-20 d-flex flex-column">
        <h2 class="mb-10">Panier</h2>
        <CartProductList
            class="flex-fill"
            :cart="cart"
            @remove-product-from-cart="emit('removeProductFromCart', $event)"
        />
        <button class="btn btn-success">Commander ({{ totalPrice }}€)</button>
    </div>
</template>

<style lang="scss" scoped></style>
```

## **Modification de `App.vue`**

Nous utilisons une propriété calculée pour calculer pour savoir si le panier est vide ou non.  

Si le panier est vide, nous n'affichons pas le composant panier grâce à la directive `v-if`.  

Nous utilisons également une liaison de classe avec la directive `v-bind` pour appliquer la classe `gridEmpty` si le panier est vide.  

Cette classe permet de modifier simplement la grille **CSS**.  

```html
<script setup lang="ts">
    import TheHeader from './components/Header.vue';
    import TheFooter from './components/Footer.vue';
    import Shop from './components/Shop/Shop.vue';
    import Cart from './components/Cart/Cart.vue';
    import data from './data/product';

    import { computed, reactive } from 'vue';
    import type { ProductInterface } from './interfaces';
    import type { ProductCartInterface } from './interfaces';

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
    if (productFromCart?.quantity === 1) {
        state.cart = state.cart.filter((product) => product.id !== productId);
    } else {
        productFromCart.quantity--;
    }
    }

    const cartEmpty = computed(() => state.cart.length === 0);
</script>

<template>
    <div
        class="app-container"
        :class="{
            gridEmpty: cartEmpty,
        }"
    >
        <TheHeader class="header" />
        <Shop
            :products="state.products"
            @add-product-to-cart="addProductToCart"
            class="shop"
        />
        <Cart
            v-if="!cartEmpty"
            :cart="state.cart"
            class="cart"
            @remove-product-from-cart="removeProductFromCart"
        />
        <TheFooter class="footer" />
    </div>
</template>

<style lang="scss">
@import './assets/scss/base.scss';
@import './assets/scss/debug.scss';

.app-container {
    min-height: 100vh;
    display: grid;
    grid-template-areas: 'header header' 'shop cart' 'footer footer';
    grid-template-columns: 75% 25%;
    grid-template-rows: 48px auto 48px;
}

.gridEmpty {
    grid-template-areas: 'header' 'shop' 'footer';
    grid-template-columns: 100%;
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
