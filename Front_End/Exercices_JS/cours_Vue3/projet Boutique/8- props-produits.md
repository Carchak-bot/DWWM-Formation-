---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 04/10/2022 

---
# **Utilisation des props pour les produits**

## **Création des interfaces**

Créez un dossier `interfaces` dans `src`.  

Créez dans ce dossier un fichier `Product.interface.ts` :  

```js
export interface ProductInterface {
    title: string;
    image: string;
    price: number;
    reference: string;
}
```

## **Données en dur**

En attendant d'avancer plus dans le projet et d'utiliser des requêtes **HTTP** pour récupérer les produits, nous allons mettre les données en dur.  

Pour ce faire, créez un dossier `data` dans `src`.  

Dans ce dossier, créez un fichier `product.ts` :  

```js
export default [
    {
        id: 1,
        image: 'src/assets/images/character_venti.JPG',
        title: 'Venti',
        reference:
            'SHINF65244',
        price: 69.90,
    },
    {
        id: 2,
        image: 'src/assets/images/character_mona.JPG',
        title: 'Mona',
        reference:
            'SHINF99683',
        price: 199.90,
    },
    {
        id: 3,
        image: 'src/assets/images/character_ningguang.JPG',
        title: 'Ningguang',
        reference:
            'SHINF00408',
        price: 434.90,
    },
    {
        id: 4,
        image: 'src/assets/images/character_keqing.JPG',
        title: 'Keqing',
        reference:
            'SHINF20513',
        price: 279.90,
    },
    {
        id: 5,
        image: 'src/assets/images/character_ganyu.JPG',
        title: 'Ganyu',
        reference:
            'SHINF18389',
        price: 234.90,
    },
    {
        id: 6,
        image: 'src/assets/images/character_barbara.JPG',
        title: 'Barbara',
        reference:
            'SHINF54713',
        price: 264.90,
    },
    {
        id: 7,
        image: 'src/assets/images/character_xiao.JPG',
        title: 'Xiao',
        reference:
            'SHINF18361',
        price: 339.90,
    },
    {
        id: 8,
        image: 'src/assets/images/character_lumine.JPG',
        title: 'Lumine',
        reference:
            'SHINF65871',
        price: 229.90,
    },
    {
        id: 9,
        image: 'src/assets/images/character_aether.JPG',
        title: 'Aether',
        reference:
            'SHINF93223',
        price: 229.90,
    },
  ];
```

## **Modification de `App.vue`**

Dans le composant racine, nous allons importer les données et les types dans une propriété réactive.  

Nous allons ensuite les passer à notre composant enfant `Shop` en utilisant une liaison de données avec `v-bind`.  

```html
<script setup lang="ts">
    import TheHeader from '@/components/Header.vue';
    import TheFooter from '@/components/Footer.vue';
    import Shop from '@/components/Shop/Shop.vue';
    import Cart from '@/components/Cart/Cart.vue';
    import data from '@/data/product';

    import { reactive } from 'vue';
    import type { ProductInterface } from '@/interfaces/Product.interface.ts';
    const products = reactive<ProductInterface[]>(data);
</script>

<template>
    <div class="app-container">
        <TheHeader class="header" />
        <Shop :products="products" class="shop" />
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

`reactive<ProductInterface[]>(data)` : nous passons en type générique un tableau de produits qui doivent respecter l'interface `ProductInterface`.  

Nous initialisons la propriété réactive avec nos données contenues dans `data`.  

## **Modification de `Shop.vue`**

Dans le composant `Shop.vue`, nous définissons la `prop` reçue depuis le composant parent grâce à `defineProps`, à savoir la liste de tous les produits.  

Nous typons la `props` en passant le type générique `{ products: ProductInterface[] }` : cela signifie que nous recevons un objet contenant une propriété `products` qui a pour valeur un tableau contenant des `ProductInterface`.  

Nous repassons ensuite la `prop` reçue plus bas dans l'arbre :  

```html
<script setup lang="ts">
    import type { ProductInterface } from '../.@/interfaces/Product.interface.ts';
    import ShopProductList from './ShopProductList.vue';

    defineProps<{
        products: ProductInterface[];
    }>();
</script>

<template>
    <div>
        <ShopProductList :products="products" />
    </div>
</template>

<style lang="scss" scoped></style>
```

## **Modification de `ShopProductList.vue`**

Dans le composant `ShopProductList`, nous récupérons également la `prop` que nous typons comme dans le composant parent `Shop`.  

Cette fois, nous utilisons la directive `v-for` pour boucler sur les produits et nous utilisons une liaison de propriété pour passer le produit à chaque instance du composant `ShopProduct`.  

```html
<script setup lang="ts">
    import type { ProductInterface } from '@/interfaces';
    import ShopProduct from './ShopProduct.vue';
    defineProps<{
        products: ProductInterface[];
    }>();
</script>

<template>
    <div class="grid p-20">
        <ShopProduct v-for="product of products" :product="product" />
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

Dans le composant `ShopProduct`, nous récupérons le produit en `props` et nous utilisons la notation raccourcie de la directive `v-text` pour afficher les différentes propriétés du produit.  

```html
<script setup lang="ts">
    import type { ProductInterface } from '@/interfaces';
    defineProps<{
        product: ProductInterface;
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
        background-size: cover;
        background-position: center;
        height: 250px;
  }
}
</style>
```
