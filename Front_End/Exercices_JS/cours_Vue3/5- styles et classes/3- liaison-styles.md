---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 26/05/2022  

---
# **Liaison de styles**

Passons maintenant aux différentes syntaxes possibles pour les liaisons de style.  

## **Liaison avec des objets**

La première syntaxe permet d'utiliser un objet :  

```html
<div :style="{ color: activeColor, fontSize: fontSize + 'px' }"></div>
```

Avec **côté script** :  

```js
const activeColor = ref('red');
const fontSize = ref(30);
```

## **Utilisation des propriétés CSS natives**

Vous pouvez également utiliser directement les noms des propriétés **CSS** en utilisant des guillemets simples :  

```html
<div :style="{ 'font-size': fontSize + 'px' }"></div>
```

## **Utilisation d'un objet réactif**

Vous pouvez utiliser un objet réactif **côté script** pour la liaison avec l'attribut `style` :  

```js
const mesStyles = reactive({
    color: 'red',
    fontSize: '13px'
});
```

Et **côté template** :  

```html
<div :style="mesStyles"></div>
```

## **Utilisation d'un tableau**

Vous pouvez enfin utiliser un tableau :  

```html
<div :style="[stylesDeBase, stylesParticuliers]"></div>
```

Ici les styles contenus dans l'objet `stylesDeBase` seront appliqués.  

Ensuite les styles contenus dans l'objet `stylesParticuliers` seront fusionnés.  
Si certaines propriétés sont dans les deux objets, les valeurs du dernier objet écraseront les valeurs précédentes.  

Autrement dit, si par exemple il y a `color: 'red'` dans `stylesDeBase` et `color: 'blue'` dans `stylesParticuliers`, la valeur de la propriété `color` sera `blue`.  

```html
<template>
    <h1 :style="[{ fontSize: fontSize + 'px' }, color]">Bonjour le monde !</h1>
    <button @click="fontSize += 10">Grossir</button>
    <button @click="fontSize -= 10">Réduire</button>
</template>

<script setup lang="ts">
    import { ref } from 'vue';

    const fontSize = ref(20);
    const color = ref('color: red');
</script>

<style scoped></style>
```
