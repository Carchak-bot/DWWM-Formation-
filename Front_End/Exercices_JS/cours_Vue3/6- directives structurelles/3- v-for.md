---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 26/05/2022  

---
# **La directive v-for**

## **Syntaxe de la directive `v-for`**

`v-for` est une directive permettant d'afficher une liste d'éléments contenus dans un itérable (par exemple un tableau).  

La syntaxe de `v-for` est la suivante : `v-for="element in elements"`.  

Vous pouvez également utiliser l'opérateur `of` à la place de `in`, cela ne fait aucune différence.  

`elements` étant le tableau contenant une liste d'éléments.  

## **Accès à l'index de l'élément dans le tableau**

La directive `v-for` permet de nous donner très facilement accès à l'**index** de l'élément dans le tableau.  

La syntaxe est la suivante : `v-for="(element, index) in elements"`.  
Par exemple :  

```html
<li v-for="(elem, index) in elements">
    {{ index }} - {{ elem }}
</li>
```

Avec un tableau **côté script** :  

```js
const elements = ref([22, 12, 17]);
```

## **Itérer sur les propriétés d'un objet**

Vous pouvez également utiliser `v-for` pour itérer sur les propriétés d'un objet.  

Si vous utilisez un seul alias, comme dans l'exemple suivant `valeur`, vous aurez accès aux valeurs de l'objet : `v-for="valeur in objet"`.  

Si vous en utilisez deux, vous aurez accès aux valeurs et aux clés : (`valeur`, `clé`).  

Si vous en utilisez trois, vous aurez également accès aux index : (`valeur`, `clé`, `index`).  

```js
const monObjet = reactive({
    titre: 'Boucler sur des listes en Vue',
    auteur: 'Dyma',
    date: '2023-04-10'
});
```

Et **côté template** :  

```html
<ul>
    <li v-for="valeur in monObjet">
    {{ valeur }}
    </li>
</ul>
```

Vous pouvez également imbriquer un `v-for` dans un autre `v-for` et utiliser l'affectation par décomposition **JavaScript** :  

```html
<template>
    <ul>
        <li v-for="({ prenom, notes }, index) of utilisateurs">
            {{ `${index} : ${prenom}` }}
            <span v-for="note in notes">{{ note }} / </span>
        </li>
    </ul>
</template>

<script setup lang="ts">
    import { reactive } from 'vue';

    const utilisateurs = reactive([
    { prenom: 'Alain', notes: [14, 15, 18] },
    { prenom: 'Zerina', notes: [12, 10, 8] },
    { prenom: 'Samir', notes: [3, 15, 18] },
    ]);
</script>
```

## **Itérer sur un nombre**

Avec `v-for` vous pouvez également itérer sur un nombre pour créer un intervalle (`range`) :  

```html
<span v-for="n in 10">{{ n }}</span>
```

***A noter que la première itération commence à 1 et non pas 0 !***

## **Utilisation d'un élément `template`**

Comme pour la directive `v-if`, vous pouvez utiliser l'élément invisible `template` pour itérer sur plusieurs éléments **HTML** de même niveau :  

```html
<ul>
    <template v-for="elem in elements">
        <li>{{ elem }}</li>
        <li> test </li>
    </template>
</ul>
```

```html
<template>
    <ul>
        <li v-for="(fruit, index) in fruits">{{ `${index} - ${fruit}` }}</li>
    </ul>

    <ul>
        <li v-for="({ prenom, notes }, index) of utilisateurs">
            {{ `${index} : ${prenom}` }}
            <span v-for="note in notes">{{ note }} / </span>
        </li>
    </ul>
    <ul>
        <li v-for="(valeur, cle, index) of voiture">
            {{ `${index} : ${valeur} - ${cle}` }}
        </li>
    </ul>
    <ul>
        <li v-for="n in 4">Bonjour !</li>
    </ul>
</template>

<script setup lang="ts">
    import { reactive } from 'vue';

    const fruits = reactive(['fraise', 'pomme', 'kiwi']);
    const utilisateurs = reactive([
        { prenom: 'Alain', notes: [20, 20, 19] }, // Ben oui, je suis pas parfait mais presque :D
        { prenom: 'Zerina', notes: [12, 10, 13] },
        { prenom: 'Samir', notes: [13, 15, 18] },
    ]);
    const voiture = {
        roues: 4,
        prix: 4000,
    };
</script>

<style scoped lang="scss"></style>
```
