---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 01/10/2022 

---
# **Mise en page du header et du footer**

## **Modification de `assets/base.scss`**

Ajoutez les classes utilitaires dont nous aurons besoin :  

```css
.px-20 {
    padding-left: 20px;
    padding-right: 20px;
}

.p-30 {
    padding: 30px;
}

// margin

.m-10 {
    margin: 10px;
}

.mb-10 {
    margin-bottom: 10px;
}

.mr-10 {
    margin-right: 10px;
}

.mr-20 {
    margin-right: 20px;
}
```

## **Modification de `Header.vue`**

Nous mettons en place notre header :  

```html
<script setup lang="ts"></script>

<template>
    <header class="px-20 d-flex flex-row align-items-center">
        <a href="#" class="d-flex flex-row align-items-center mr-20">
            <img src=".@/assets/logo.svg" />
            <span class="logo">Dyma</span>
        </a>
        <ul class="d-flex flex-row flex-fill">
            <li class="mr-10">
                <a href="#">Boutique</a>
            </li>
            <li>
                <a href="#">Admin</a>
            </li>
        </ul>
        <ul class="d-flex flex-row">
            <li class="mr-10">
                <a href="#">Inscription</a>
            </li>
            <li>
                <a href="#">Connexion</a>
            </li>
        </ul>
    </header>
</template>

<style lang="scss" scoped>
header {
    background-color: var(--primary-1);
    a {
        color: var(--text-primary-color);
        img {
            width: 20px;
            margin-right: 5px;
        }
        .logo {
            font-weight: 700;
            font-size: 20px;
        }
    }
}
</style>
```

## **Modification de `Footer.vue`**

Nous mettons en place notre footer :  

```html
<script setup lang="ts"></script>

<template>
    <footer class="d-flex flex-row justify-content-center align-items-center">
        <p>Copyright © 2014-2022 Dyma</p>
    </footer>
</template>

<style lang="scss" scoped>
footer {
    background-color: var(--gray-3);
    color: var(--text-primary-color);
}
</style>
```
