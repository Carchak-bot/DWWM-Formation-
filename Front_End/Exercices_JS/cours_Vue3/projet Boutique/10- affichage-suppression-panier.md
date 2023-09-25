---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 06/10/2022 

---
# **Affichage et suppression pour la partie panier**

## **Logique à mettre en place**

De la même manière que précédemment pour la partie **Shop**, nous souhaitons faire descendre l'information du contenu du panier le long de l'arbre des composants de cette manière :  

`App > Cart > CartProductList > CartProduct`.  

De cette manière, nous pourrons afficher le contenu du panier.  

Nous allons simplement utiliser une prop sur les différents niveaux de composants pour passer cette information.  

Nous souhaitons également faire remonter l'information dans le sens inverse lorsque l'utilisateur clique sur le bouton "Supprimer" d'un élément du panier :  

`CartProduct > CartProductList > Cart > App`.  

Pour ce faire, nous allons utiliser un événement personnalisé, qui contiendra l'`id` du produit à supprimer du panier.  

Cet événement sera émis depuis le composant `CartProduct` concerné, puis sera réémis par `CartProductList` puis par `Cart`.  

Une fois que l'événement sera arrivé au composant `App`, nous pourrons utiliser l'`id` du produit pour le supprimer du panier.  

La logique est donc similaire à celle utilisée pour la partie **Shop**.  

## **Modification de `App.vue`**

Dans `App.vue` :  

```html
<script setup lang="ts">
    import TheHeader from '@/components/Header.vue';
    import TheFooter from '@/components/Footer.vue';
    import Shop from '@/components/Shop/Shop.vue';
    import Cart from '@/components/Cart/Cart.vue';
    import data from '@/data/product';

    import { reactive } from 'vue';
    import type { ProductInterface } from '@/interfaces';

    const state = reactive<{
        products: ProductInterface[];
        cart: ProductInterface[];
    }>({
        products: data,
        cart: [],
    });

    function addProductToCart(productId: number): void {
        const product = state.products.find((product) => product.id === productId);
        if (product && !state.cart.find((product) => product.id === productId)) {
            state.cart.push({ ...product });
        }
    }

    function removeProductFromCart(productId: number): void {
        state.cart = state.cart.filter((product) => product.id !== productId);
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

Nous définissons une fonction `removeProductFromCart()` pour supprimer un article du panier lorsque nous recevons l'événement `removeProductFromCart`.  

`@remove-product-from-cart="removeProductFromCart"` :  nous écoutons l'événement remove-product-from-cart et enregistrons la fonction `removeProductFromCart()` comme gestionnaire d'événement.  

Notez bien que nous n'utilisons pas de parenthèses avec `removeProductFromCart`.  
En JavaScript cela signifie que nous passons la fonction avec tous les arguments récupérés.  

Notez également bien que l'événement côté **template** est en `kebab-case` (`remove-product-from-cart`) et qu'il doit être en `camelCase` côté script (`removeProductFromCart`).  

`:cart="state.cart"` :  nous passons le contenu du panier avec une props au composant Cart.  

## **Modification de `Cart.vue`**

Voici le composant `Cart.vue` :  

```html
<script setup lang="ts">
    import CartProductList from './CartProductList.vue';
    import type { ProductInterface } from '@/interfaces';

    const props = defineProps<{
        cart: ProductInterface[];
    }>();

    const emit = defineEmits<{
        (e: 'removeProductFromCart', productId: number): void;
    }>();
</script>

<template>
    <div class="p-20">
        <h2 class="mb-10">Panier</h2>
        <CartProductList
            :cart="cart"
            @remove-product-from-cart="emit('removeProductFromCart', $event)"
        />
    </div>
</template>

<style lang="scss" scoped></style>
```

Il ne fait que transmettre dans un sens une `prop et dans l'autre un événement.  
Vous pouvez le voir comme un "relais" des informations dans les deux sens.  

## **Modification de `CartProductList.vue`**

Voici le composant :  

```html
<script setup lang="ts">
    import CartProduct from './CartProduct.vue';
    import type { ProductInterface } from '@/interfaces';

    const props = defineProps<{
        cart: ProductInterface[];
    }>();

    const emit = defineEmits<{
        (e: 'removeProductFromCart', productId: number): void;
    }>();
</script>

<template>
    <div class="d-flex flex-column">
        <CartProduct
        v-for="product of cart"
            :product="product"
            @remove-product-from-cart="emit('removeProductFromCart', $event)"
        />
    </div>
</template>

<style lang="scss" scoped></style>
```

Même chose, ce composant relaie les informations dans les deux sens à chaque instance du composant `CartProduct`.  

Pour rappel, il y a un composant `CartProduct` pour chaque produit grâce à la directive `v-for`.  

## **Modification de `CartProduct.vue`**

Voici le composant :  

```html
<script setup lang="ts">
    import type { ProductInterface } from '@/interfaces';

    defineProps<{
        product: ProductInterface;
    }>();

    const emit = defineEmits<{
        (e: 'removeProductFromCart', productId: number): void;
    }>();
</script>

<template>
    <div class="mb-10 p-10 d-flex flex-row align-items-center product">
        <strong class="mr-10">{{ product.title }}</strong>
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

Le composant émet un événement `removeProductFromCart` lorsque l'utilisateur clique sur le bouton de suppression d'un article du panier.  

L'événement contient l'`id` unique du produit à supprimer.  

Il affiche les informations du produit contenues dans la `prop` reçue.
