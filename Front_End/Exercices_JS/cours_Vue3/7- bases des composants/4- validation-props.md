---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 01/10/2022  

---
# **Validation des props et utilisation de TypeScript**

## **Utilisation des validateurs**

Vous pouvez créer un validateur personnalisé pour la valeur de votre attribut.  

Celui-ci doit être une fonction prenant en paramètre la valeur de l'attribut et doit tester cette valeur puis retourner un booléen :  

```js
defineProps({
    title: {
        type: String,
        validator(value) {
            return value.length > 2;
        }
    }
}
```

## **Notation raccourcie pour les booléens**

Les `props` de type booléen ont une notation raccourcie.  
Par exemple si vous définissez sur le composant enfant :  

```js
defineProps({
    available: Boolean
})
```

Vous pouvez directement passer la `prop` de cette manière côté parent :  

```html
<Enfant available />
```

## **Les génériques TypeScript**

Les génériques sont une fonctionnalité de **TypeScript** permettant une grande flexibilité combinée à une sécurité du typage.  

Lorsque vous débuterez avec **TypeScript** vous rencontrerez deux travers :  

1. **Trop typer en `any`**. Cela vous donne une grande flexibilité mais vous perdez totalement en sécurité et
en autocomplétion.
2. **Tout typer correctement sans utiliser de génériques**. Cela conférera à votre code la sécurité et l'autocomplétion permis par le typage fort mais vous perdrez en flexibilité, ce qui provoquera beaucoup de duplications et de lourdeurs dans votre code.

En résumé, l'objectif des génériques est de permettre d'utiliser des éléments (fonctions, classes, interfaces, etc) qui puissent fonctionner avec une diversité de types tout en conservant l'utilité de TypeScript, à savoir la sécurité et l'autocomplétion.  

Nous allons donner deux exemples de types génériques utilisés nativement.  

## **Le typage des tableaux**

Nous avons vu comment typer des tableaux pour qu'ils n'acceptent qu'un seul type en faisant :  

```js
const tableau: string[] = ['Des', 'chaînes', 'de', 'caractères'];
```

La notation alternative est :

```js
const tableau: Array<string> = ['Des', 'chaînes', 'de', 'caractères'];
```

Si vous passez la souris sur `Array` vous verrez `interface Array<T>`.  
Cela signifie que `Array` prend en fait un argument appelé `T` par convention pour type.  
L'interface `Array<T>` utilise donc un type générique, nous pouvons passer n'importe quel type comme argument et le tableau devra comporter le type défini.  

Exemple avec une union de types :  

```js
const tableau: Array<string | boolean> = ['Des', 'chaînes', 'de', 'caractères', true];
```

Autre exemple en utilisant une interface :  

```js
interface User {
    name: string;
}
const tableau: Array<User> = [{name: 'Paul'}, {name: 'Jean'}];
```

Vous commencez à percevoir l'idée de générique : nous passons en argument n'importe quel type à l'interface `Array<T>`, et **TypeScript** nous obligera à le respecter.  

## **Autre exemple : les promesses**

Prenons un exemple avec une promesse :  

```js
let condition: boolean;
const promesse = new Promise((resolve, reject) => {
    if (condition) {
        resolve(42);
    } else {
        reject('Erreur');
    }
});
```

Dans **VS Code**, si vous passez la souris sur la constante, vous aurez `Promise<unknown>`.  

Ici, **TypeScript** utilise également un générique pour typer la valeur retournée par la promesse. Autrement dit, il utilise une `interface Promise<T>`, et donc les génériques.  

Ici, il ne peut pas détecter le type par inférence et précise donc que la valeur retournée est de type inconnu : `unknown`.  

En revanche, si nous passons un argument, **TypeScript** saura que les valeurs retournées dans les promesses seront du type spécifié :  

```js
let condition: boolean;
const promesse: Promise<number | string> = new Promise((resolve, reject) => {
    if (condition) {
        resolve(42);
    } else {
        reject('Erreur');
    }
});
```

Ici, nous indiquons à **TypeScript** les valeurs potentiellement retournées dans la promesse ce qui permet la sécurité et l'autocomplétion.  

A savoir que si vous essayez d'utiliser par exemple une méthode disponible sur les tableaux ou les objets sur la valeur de retour, **TypeScript** vous renverra une erreur.  

Par exemple :  

```js
let condition: boolean;
const promesse: Promise<number | string> = new Promise((resolve, reject) => {
    if (condition) {
        resolve(42);
    } else {
        reject('Erreur');
    }
});
promesse.then((val) => {
    val.map();
})
```

Ici, vous aurez une erreur `Property 'map' does not exist on type 'string | number'`.  

De même, **VS Code** vous proposera en autocomplétion sur `val` les méthodes et propriétés partagées par les types nombre et chaînes de caractères.

Si vous mettiez `Promise<any>`, **TypeScript** ne ferait plus de contrôle sur les valeurs de retour, sur les méthodes que l'on tente d'accéder etc.  

```js
let condition: boolean;
const promesse: Promise<any> = new Promise((resolve, reject) => {
    if (condition) {
        resolve(42);
    } else {
        reject('Erreur');
    }
});
promesse.then((val) => {
    val.map();
})
```

Ici aucun problème lors de la compilation et dans **VS Code**, pourtant l'accès à la méthode `map()` provoquera une erreur lors de l'exécution.  

## **Utilisation de TypeScript avec les `props`**

Vous pouvez également utiliser la syntaxe **TypeScript** au lieu de passer un objet à `props`, dans ce cas on utilise un type générique.  

```html
<script setup lang="ts">
    defineProps<{
        prenom?: string
        age?: number
    }>();
</script>
```

Remarquez que nous utilisons un type générique et non plus un argument passé à `defineProps()`.  

Le plus souvent nous utiliserons des **interfaces** de cette manière :  

```html
<script setup lang="ts">
    interface Props {
        prenom: string
        age?: number
    }
    const props = defineProps<Props>();
</script>
```

## **Exemple**

App.vue :

```html
<template>
    <Product :product="product" />
</template>

<script setup lang="ts">
    import { reactive } from 'vue';
    import Product from './Product.vue';
    import ProductI from '@/interfaces/product.interface.ts';

    const product: ProductI = reactive({
        available: true,
        price: 1500,
        name: 'Moto',
    });
</script>

<style scoped lang="scss"></style>
```

product.interface.ts :

```js
export interface ProductI {
    price: number;
    name: string;
    available: boolean;
}
```

Product.vue :

```html
<template>
    <h3>{{ title }}</h3>
</template>

<script setup lang="ts">
    import { computed } from 'vue';
    import ProductI from '@/interfaces/product.interface.ts';

    const props = defineProps<{ product: ProductI }>();
    const title = computed(() => props.product.name.toUpperCase());
</script>

<style scoped lang="scss"></style>
```
