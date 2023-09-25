---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 04/10/2022 

---
# **Ajout d'un produit dans le panier**

## **Logique à mettre en place**

De la même manière que nous faisons descendre la liste de produits dans l'arbre des composants dans cet ordre `App > Shop > ShopProductList > ShopProduct`, nous souhaitons maintenant propager de l'information dans ce sens :  

`ShopProduct > ShopProductList > Shop > App`.  

En effet, nous souhaitons que lorsqu'un utilisateur clique sur le bouton d'ajout au panier dans un composant `ShopProduct`, que cet événement remonte le long de l'arbre des composants et qu'il puisse nous informer du produit que l'utilisateur souhaite ajouter.  

Pour ce faire, nous allons utiliser un événement personnalisé, qui contiendra l'`id` du produit à ajouter au panier.  

Cet événement sera émis depuis le composant `ShopProduct` concerné, puis sera réémis par `ShopProductList` puis par `Shop`.  

Une fois que l'événement est arrivé au composant `App`, nous pourrons utiliser l'`id` du produit pour l'ajouter au panier.  

En effet, dans notre composant `App` nous centralisons les informations relatives au panier et aux produits.  

## **Modification de `App.vue`**

Dans le composant racine, nous modifions notre propriété réactive pour ajouter une propriété `cart` contenant les produits du panier.  

Nous initialisons le panier avec un tableau vide.  

Nous créons une fonction `addProductToCart()` qui va permettre d'ajouter un produit dans le panier en utilisant son `id` unique.  

La logique est simple : nous récupérons le produit à l'aide de son `id` depuis la propriété réactive `state`, ensuite nous vérifions qu'il n'est pas déjà dans le panier et enfin nous l'ajoutons au panier.  

Notez bien que nous utilisons `{ ...product }` pour créer une copie de l'objet qui ne soit pas un **Proxy** vers l'objet du produit contenu dans la propriété réactive.  

Rappelez-vous en effet que les propriétés réactives contiennent des **Proxys** vers les objets que nous passons.  

De cette manière, nous obtenons un nouvel objet qui a une nouvelle référence et qui est totalement différent de l'objet dans la propriété réactive.  

Nous créons également un événement personnalisé `@add-product-to-cart` qui va déclencher la fonction `addProductToCart()` lorsqu'il est reçu. Ici, `addProductToCart()` est donc le gestionnaire pour cet événement.  

Notez bien que l'événement personnalisé est en `kebab-case`.  

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
</script>

<template>
    <div class="app-container">
        <TheHeader class="header" />
        <Shop
            :products="state.products"
            @add-product-to-cart="addProductToCart"
            class="shop"
        />
        <Cart class="cart" />
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

## **Modification de `Shop.vue`**

Ici nous ajoutons la directive `v-on` pour écouter l'événement `add-product-to-cart` lorsqu'il est émis par le composant `ShopProductList`.  

Nous ne faisons que le retransmettre en déclarant un événement avec `defineEmits` qui est identique à celui reçu.  

L'événement qui va être retransmis est `addProductToCart` (notez bien le `camelCase`) et il contient un seul argument qui est le `productId` de type `number`.  

```html
<script setup lang="ts">
    import type { ProductInterface } from '@/interfaces';
    import ShopProductList from './ShopProductList.vue';

    defineProps<{
        products: ProductInterface[];
    }>();

    const emit = defineEmits<{
        (e: 'addProductToCart', productId: number): void;
    }>();
</script>

<template>
    <div>
        <ShopProductList
            @add-product-to-cart="emit('addProductToCart', $event)"
            :products="products"
        />
    </div>
</template>

<style lang="scss" scoped></style>
```

## **Modification de `ShopProductList.vue`**

Même logique, nous ne faisons que retransmettre l'événement provenant du composant `ShopProduct` vers le composant `Shop` :  

```html
<script setup lang="ts">
    import type { ProductInterface } from '@/interfaces';
    import ShopProduct from './ShopProduct.vue';

    defineProps<{
        products: ProductInterface[];
    }>();

    const emit = defineEmits<{
        (e: 'addProductToCart', productId: number): void;
    }>();
</script>

<template>
    <div class="grid p-20">
        <ShopProduct
            @add-product-to-cart="emit('addProductToCart', $event)"
            v-for="product of products"
            :product="product"
        />
    </div>
</template>

<style lang="scss" scoped>
.grid {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr;
    grid-auto-rows: 400px;
    gap: 20px;
}
</style>
```

## **Modification de `ShopProduct.vue`**

La logique est la suivante :  

`@click` :  
Ici nous créons une liaison d'événement avec `v-on` sur l'événement `click` sur le bouton d'ajout au panier.  

`const emit = defineEmits<{ (e: 'addProductToCart', productId: number): void; }>();` :  
Nous créons un événement personnalisé `'addProductToCart'` qui va contenir un seul argument : le `productId`.  

`@click="emit('addProductToCart', product.id)"` :  
Nous l'émettons avec `emit()` lors d'un clic sur le bouton.  
Le premier argument est le nom de l'événement en `camelCase` et le second argument est l'`id` du produit.  

Voici le code du composant :  

```html
<script setup lang="ts">
    import type { ProductInterface } from '@/interfaces';

    defineProps<{
        product: ProductInterface;
    }>();

    const emit = defineEmits<{
        (e: 'addProductToCart', productId: number): void;
    }>();
</script>

<template>
    <div class="product d-flex flex-column">
        <div
            class="product-image"
            :style="{ backgroundImage: `url(${product.image})` }"
        ></div>
        <div class="p-10 d-flex flex-column">
            <h4>{{ product.title }}</h4>
            <p>{{ product.reference }}</p>
            <div class="d-flex flex-row align-items-center">
                <strong class="flex-fill">Prix : {{ product.price }}€</strong>
                <button
                    class="btn btn-primary"
                    @click="emit('addProductToCart', product.id)"
                >
                Ajouter au panier
                </button>
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
        background-size: cover;
        background-position: center;
        height: 250px;
  }
}
</style>
```
