---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 01/10/2022 

---
# **Mise en page boutique et panier**

## **Architecture**

Dans le dossier `components` créez un dossier `Cart` et un dossier `Shop`.  

Déplacez le composant `Cart.vue` dans `Cart` et `Shop.vue` dans `Shop`.  

Mettez à jour les chemins d'imports dans `App.vue`.  

Dans le dossier `Cart`, créez les composants `CartProductList.vue` et `CartProduct.vue`.  

Même chose dans le dossier `Shop`, créez deux composants `ShopProductList.vue` et `ShopProduct.vue`.  

## **Modification de `Shop.vue`**

Nous allons importer et utiliser les nouveaux composants relatifs à la liste des produits :  

```html
<script setup lang="ts">
    import ShopProductList from './ShopProductList.vue';
</script>

<template>
    <div>
        <ShopProductList />
    </div>
</template>

<style lang="scss" scoped></style>
```

Dans ce composant nous plaçons le composant `ShopProductList` qui va être responsable de gérer la liste des produits.  

## **Modification de `ShopProductList.vue`**

Dans ce composant nous allons utiliser plusieurs instances de notre composant `ShopProduct` et les disposer en utilisant une **grille CSS** :  

```html
<script setup lang="ts">
    import ShopProduct from './ShopProduct.vue';
</script>

<template>
    <div class="grid p-20">
        <ShopProduct />
        <ShopProduct />
        <ShopProduct />
        <ShopProduct />
        <ShopProduct />
        <ShopProduct />
        <ShopProduct />
        <ShopProduct />
        <ShopProduct />
    </div>
</template>

<style lang="scss" scoped>
.grid {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr;
    grid-auto-rows: 300px;
    gap: 20px;
    }
</style>
```

## **Modification de `ShopProduct.vue`**

Dans ce composant nous affichons juste un titre pour le moment :  

```html
<script setup lang="ts"></script>

<template>
    <div class="b5">
        <h1>Shop Product</h1>
    </div>
</template>

<style lang="scss" scoped></style>
```

## **Modification de `Cart.vue`**

Dans ce composant nous utilisons le composant `CartProductList` responsable de gérer l'affichage des produits du panier :  

```html
<script setup lang="ts">
    import CartProductList from './CartProductList.vue';
</script>

<template>
    <div class="p-20">
        <h2 class="mb-10">Panier</h2>
        <CartProductList />
    </div>
</template>

<style lang="scss" scoped></style>
```

N'oubliez pas de modifier `assets/base.scss` pour ajouter la classe `mb-10` :  

```css
.mb-10 {
    margin-bottom: 10px;
}
```

## **Modification de `CartProductList.vue`**

Dans ce composant nous allons utiliser plusieurs instances du composant `CartProduct` qui sont les produits dans le panier.  

Nous utilisons des flexbox pour positionner les produits.  

```html
<script setup lang="ts">
import CartProduct from './CartProduct.vue';
</script>

<template>
  <div class="d-flex flex-column">
    <CartProduct />
    <CartProduct />
    <CartProduct />
    <CartProduct />
    <CartProduct />
    <CartProduct />
  </div>
</template>

<style lang="scss" scoped></style>
```

## **Modification de `CartProduct.vue`**

Dans ce composant nous affichons pour le moment simplement un titre :  

```html
<script setup lang="ts"></script>

<template>
    <div class="mb-10 b5">
        <h1>Product</h1>
    </div>
</template>

<style lang="scss" scoped></style>
```
