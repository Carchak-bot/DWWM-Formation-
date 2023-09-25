---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 01/10/2022 

---
# **Mise en page globale**

## **Création de l'architecture**

Créez un dossier `assets/images` et placez-y les ressources au format png qui se trouvent dans le dossier `assets/img/img-projet-boutique` du support de cours.  

Supprimez tout le contenu du dossier `components` dans le dossier `src`.  

Puis créez-y les fichiers `Footer.vue`,`Header.vue`, `Shop.vue` et `Cart.vue`.  

## Composant `Footer.vue`**

Mettez dans le composant :  

```html
<script setup lang="ts"></script>

<template>
    <footer>
        <h1>Footer</h1>
    </footer>
</template>

<style lang="scss" scoped></style>
```

## **Composant `Header.vue`**

Mettez dans le composant :  

```html
<script setup lang="ts"></script>

<template>
    <header>
        <h1>Header</h1>
    </header>
</template>

<style lang="scss" scoped></style>
```

## **Composant `Shop.vue`**

Mettez dans le composant :  

```html
<script setup lang="ts"></script>

<template>
    <div>
        <h1>Shop</h1>
    </div>
</template>

<style lang="scss" scoped></style>
```

## **Composant `Cart.vue`**

Mettez dans le composant :  

```html
<script setup lang="ts"></script>

<template>
    <div>
        <h1>Cart</h1>
    </div>
</template>

<style lang="scss" scoped></style>
```

Notez que nous utilisons `scoped` pour limiter la portée des styles déclarés dans ces composants.  

## **Modification de `App.vue`**

Modifions notre composant racine pour importer et utiliser les composants que nous avons créés :  

```html
<script setup lang="ts">
    import TheHeader from '@/components/Header.vue';
    import TheFooter from '@/components/Footer.vue';
    import Shop from '@/components/Shop.vue';
    import Cart from '@/components/Cart.vue';
</script>

<template>
    <div class="app-container">
        <TheHeader class="header b1" />
        <Shop class="shop b2" />
        <Cart class="cart b3" />
        <TheFooter class="footer b4" />
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
}

.footer {
  grid-area: footer;
}

</style>
```

*Nous utilisons une grille **CSS**, n'hésitez pas à revoir le chapitre sur les grilles dans la formation **CSS***.
