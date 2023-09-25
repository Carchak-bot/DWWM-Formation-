---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 01/10/2022

---
# **Les props**

## **Communications entre les composants**

Nous avons vu dans les chapitres précédents comment utiliser des composants : comment les définir, comment les instancier, comment fonctionne une architecture en arbre de composants monofichiers etc.  

Mais il reste un problème : **comment faire passer des données le long de notre arbre de composants ?**  

**Comment communiquer des données d'un composant parent vers un composant enfant et d'un composant enfant vers un composant parent ?**  

C'est ce que nous allons voir maintenant.  

## **Utilisation des attributs `props`**

Vous pouvez passer des valeurs dans le sens parent -> enfant en utilisant des `props`.

Nous allons partir d'un exemple simple pour bien comprendre.  

Supposons que nous avons deux composants : `Parent.vue` et `Enfant.vue`.

Voici notre composant `Enfant.vue` :  

```html
<template>
    <h3>{{ prenom }}</h3>
</template>

<script setup>
    const props = defineProps(['prenom']);
    console.log(props.prenom);
</script>
```

La fonction `defineProps()` permet de déclarer les propriétés récupérées sur le composant enfant depuis le composant parent.  
Ici nous récupérons `prenom`.  

Elles sont directement utilisables sur le **template** et nous pouvons les récupérer dans la partie **script** en déclarant une variable `props`.  

Dans notre composant `Parent.vue` :  

```html
<template>
    <Enfant prenom="Zerina" />
</template>

<script>
    import Enfant from './Enfant.vue';
</script>
```

Nous passons de la donnée de manière unidirectionnelle de `Parent.vue` vers `Enfant.vue`.  

Pour ce faire, nous utilisons simplement un attribut `prenom` et lui donnons pour l'instant une valeur fixe.  

Nous pouvons définir n'importe quel attribut personnalisé de cette manière, du moment qu'il n'entre pas en collision avec le nom d'un attribut HTML natif (par exemple `style`).  

**Il ne faut jamais modifier une props dans un composant enfant. Nous verrons comment passer des données du composant enfant vers le composant parent.**

## **Utilisation d'une liaison dynamique**

Nous souhaitons maintenant que les données que nous passons soient liées de manière dynamique.  

**C'est-à-dire que nous voulons que le composant enfant puisse recevoir la nouvelle valeur de l'attribut que nous lui passons depuis le composant parent lorsqu'elle change.**  

**Pour ce faire il suffit d'utiliser la directive `v-bind`** :  

```html
<template>
    <Enfant :prenom="prenom" />
</template>

<script>
    import Enfant from './Enfant.vue';
    import { ref } from 'vue';

    const prenom = ref('Zerina');
</script>
```

Nous définissons une variable réactive sur notre composant parent `prenom`.  

Nous utilisons la directive `v-bind` pour lier cette propriété réactive à la `prop` passée au composant enfant.  

## **Typage des propriétés `props`**

Nous avons vu que nous pouvions utiliser sur le composant enfant une fonction `defineProps()` et lui passer un tableau avec le nom des `props` que nous passons depuis le composant parent.  

Pour plus de sécurité lors du développement, nous pouvons typer les propriétés sur `props` afin de définir le type de valeur attendu.  

Les types possibles sont `String`, `Number`, `Boolean`, `Array`, `Object`, `Function`, `Date` et `Symbol`.  

Par exemple, pour notre attribut prenom nous souhaitons que ce dernier soit de type `String`.  

Nous allons donc typer la `props` en utilisant un objet au lieu d'un tableau dans la fonction `defineProps()` sur le composant enfant :  

```html
<script>
    ...
    const props = defineProps({
        prenom: String,
    });
</script>
...
```

Si la valeur de `prenom` passée n'est pas de type `String`, alors **Vue** nous affichera un message d'erreur dans la console **JavaScript** de notre navigateur.  

En outre, grâce à **Volar** et **TypeScript** nous aurons l'**auto-complétion des props** et le **contrôle des types**.  

Vous pouvez également typer une propriété en permettant plusieurs types, par exemple `[String, Number]` :  

```html
<script>
    ...
    const props = defineProps({
        prenom: [String, Number],
});
</script>
...
```

Dans ce cas, cette propriété pourra être une chaîne de caractères ou un nombre.  

## **Utilisation d'un objet pour plus d'options de type**

Vous pouvez également utiliser un objet pour accéder à plus d'options de typage et à des validateurs :

Vous pouvez rendre un attribut obligatoire avec `required` :  

```html
<script>
    ...
    const props = defineProps({
        prenom: {
            type: String,
            required: true
        }
    });
</script>
...
```

Vous pouvez attribuer une valeur par défaut à un attribut :  

```html
<script>
    ...
    const props = defineProps({
        prenom: {
            type: String,
            required: true,
            default: 'Alain'
        }
    });
</script>
...
```

## **Valeur par défaut des propriétés `props` de type `Object`**

Si vous souhaitez passer un objet comme donnée depuis un composant parent à un composant enfant, vous pouvez utiliser les mêmes fonctionnalités, cependant vous devrez effectuer une adaptation.  

La raison est toujours la même : les objets et les tableaux sont passés par référence et non par valeur en JavaScript.  

Il est donc nécessaire d'utiliser des fonctions pour fabriquer de nouveaux objets pour chaque instance.  

Dans le cas contraire, le même objet serait utilisé pour toutes les instances d'un composant enfant.  

Il faut donc utiliser une fonction pour définir une valeur par défaut à notre objet :  

```js
titre: {
    type: Object,
    default() {
        return { title: 'Mon super titre' }
    }
},
```

## **Nommage des `props`**

Si vos noms de `props` sont longs, il est recommandé d'utiliser côté composant parent le `kebab-case` :  

```html
<Enfant une-longue-prop="test" />
```

Côté composant enfant il ***faut*** utiliser le `camelCase` pour récupérer la `prop` :  

```html
<script setup lang="ts">
    defineProps({
        uneLongueProp: String
    })
</script>
```

## **Passer des types statiques autres que des chaînes de caractères**

Pour passer des `props` statiques autre que des chaînes de caractères, il faut utiliser `v-bind` :  

```html
<Enfant :nombre="42" :booleen="false" />
```

De même pour les tableaux ou les objets :  

```html
<Enfant :tableau="[5, 2, 1]" />
```

## **Passer un objet de `props`**

Si vous avez de nombreuses `props` vous pouvez passer un objet en utilisant la notation longue de `v-bind` :  

```html
<script>
    const objet = {
        id: 1,
        title: 'Un titre'
    };
</script>

<template>
    <Enfant v-bind="objet" />
</template>
```

Dans Product.vue :  

```html
<template>
    <h3>{{ title }} - {{ price }}€</h3>
</template>

<script setup lang="ts">
    import { computed } from 'vue';
    const props = defineProps({
        name: {
            type: String,
            required: true,
        },
        price: Number,
    });
    const title = computed(() => props.name.toUpperCase());
</script>

<style scoped lang="scss"></style>
```

Dans App.vue :  

```html
<template>
    <Product :price="1500" :name="product" />
</template>

<script setup lang="ts">
    import { ref } from 'vue';
    import Product from './Product.vue';

    const product = ref('Voiture');
</script>

<style scoped lang="scss"></style>

```
