---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 26/05/2022  

---
# **Directive v-for, détection des changements et combinaison avec v-if**

## **Utilisation combinée des directives `v-if` et de `v-for`**

Lors d'une utilisation combinée sur un même élément HTML, `v-if` est prioritaire sur `v-for`.  

Concrètement cela veut dire que `v-if` n'a pas accès aux variables fournies par `v-for` (c'est-à-dire aux
éléments itérés).  

Pour cette raison, **Vue.js** recommande officiellement de ne pas utiliser `v-if` et `v-for` sur un même
élément.  

Si vous avez besoin de les cumuler, utilisez par exemple un élément invisible `template` :  

```html
<template v-for="todo in todos">
    <li v-if="!todo.done">
        {{ todo.name }}
    </li>
</template>
```

Ici seules les `todos` dont la propriété `done` vaut `false` seront affichées.  

## **Optimisation des performances**

Par défaut, lorsque **Vue.js** met à jour une liste d'éléments utilisant `v-for`, il utilise une stratégie de mise à
jour des valeurs.
Autrement dit, **Vue.js** ne va pas effectuer des manipulations du **DOM** coûteuses en performance en déplaçant les éléments du **DOM**.  

Il va mettre à jour la valeur des éléments du **DOM** sans le déplacer.  

Par défaut, **Vue** utilise l'index de l'élément pour savoir si la valeur est affichée au bon index.  

Cette stratégie par défaut est efficace mais ne convient que lorsque le rendu de la liste ne repose pas sur l'état de composants enfants ou sur l'état temporaire du **DOM** (par exemple sur la valeur de champs que l'utilisateur peut manipuler).  

Dans ces cas là, il faut utiliser l'attribut `key` pour donner un identifiant invariant à chaque élément afin que **Vue.js** puisse correctement suivre et mettre à jour les bons éléments sur le **DOM** :  

```html
<div v-for="elem in elements" :key="elem.id">
</div>
```

Le plus souvent on utilise un identifiant unique provenant d'une base de données.  

Mais cela peut être toute autre propriété, il faut simplement qu'elle soit unique :  

```html
<template v-for="todo in todos" :key="todo.name">
 <li>{{ todo.name }}</li>
</template>
```

Il est recommandé d'utiliser l'attribut key dès que vous avez une propriété unique pour différencier vos éléments. Les performances seront meilleures pour le rendu et les mises à jour des listes sur le **DOM**.  

Pour comprendre, remarquez dans cet exemple comment les bons éléments sont supprimés du **DOM** sans avoir à réafficher tous les autres éléments, c'est une très bonne optimisation :  

```html
<template>
    <form @submit.prevent="ajoutTodo">
        <label for="add-todo">Ajouter une todo </label>
        <input v-model="tache" id="add-todo" placeholder="Tâche à effectuer..." />
        <button>Ajouter</button>
    </form>
    <ul>
        <template v-for="(todo, index) in todos" :key="todo.id">
            <li>
                {{ todo.titre }}
                <button @click="suppTodo(index)">Supprimer</button>
            </li>
        </template>
    </ul>
</template>

<script setup lang="ts">
    import { ref } from 'vue';

    const tache = ref('');
    const todos = ref([
        {
            id: 1,
            titre: 'Apprendre HTML',
        },
        {
            id: 2,
            titre: 'Apprendre CSS et Sass',
        },
        {
            id: 3,
            titre: 'Apprendre JavaScript',
        },
        {
            id: 4,
            titre: 'Apprendre TypeScript',
        },
        {
            id: 5,
            titre: 'Apprendre Vue',
        },
    ]);
    let nouvelleTacheId = 6;

    function ajoutTodo() {
        todos.value.push({
            id: nouvelleTacheId++,
            titre: tache.value,
        });
        tache.value = '';
    }

    function suppTodo(index) {
        todos.value.splice(index, 1);
    }
</script>

<style scoped lang="scss"></style>
```

## **La détection des changements des tableaux**

En **JavaScript**, les tableaux et les objets sont passés par référence et non par valeur, il peut de ce fait avoir un problème de détection des changements dans les fonctions et les frameworks **JavaScript**.  

Pour y remédier, **Vue.js** ajoute une surcouche aux principales méthodes de mutation d'un tableau afin qu'elles déclenchent la mise à jour du **template** suite à l'utilisation d'une de ces méthodes sur un tableau.  

Les méthodes pour lesquelles une surcouche est présente sont :  

- `push()`
- `pop()`
- `shift()`
- `unshift()`
- `splice()`
- `sort()`
- `reverse()`

L'exemple précédent fonctionne parfaitement car nous utilisons `splice()` qui déclenche une mise à jour lorsque nous supprimons un élément de la liste.  

Certaines méthodes ne modifient pas les tableaux mais retournent de nouveaux tableaux : ce sont toutes les méthodes de programmation fonctionnelle en JavaScript, par exemple `map()`, `filter()`, `concat()`, `slice()`, etc.  

Dans ce cas, il faut réassigner la valeur du tableau pour que **Vue.js** puisse détecter le changement.  

Dans cet exemple, cela ne fonctionne pas lorsque vous supprimez une tâche car **Vue.js** ne peut pas détecter les changements :  

***Décommentez la ligne dans la fonction `suppTodo()` pour que cela fonctionne.***

```html
<template>
    <form @submit.prevent="ajoutTodo">
        <label for="add-todo">Ajouter une todo </label>
        <input v-model="tache" id="add-todo" placeholder="Tâche à effectuer..." />
        <button>Ajouter</button>
    </form>
    <ul>
        <template v-for="(todo, index) in todos" :key="todo.id">
            <li>
                {{ todo.titre }}
                <button @click="suppTodo(todo.id)">Supprimer</button>
            </li>
        </template>
    </ul>
</template>

<script setup lang="ts">
    import { ref } from 'vue';

    const tache = ref('');
    const todos = ref([
        {
            id: 1,
            titre: 'Apprendre HTML',
        },
        {
            id: 2,
            titre: 'Apprendre CSS et Sass',
        },
        {
            id: 3,
            titre: 'Apprendre JavaScript',
        },
        {
            id: 4,
            titre: 'Apprendre TypeScript',
        },
        {
            id: 5,
            titre: 'Apprendre Vue',
        },
    ]);
    let nouvelleTacheId = 6;

    function ajoutTodo() {
        todos.value.push({
            id: nouvelleTacheId++,
            titre: tache.value,
        });
        tache.value = '';
    }

    function suppTodo(id) {
        // Cela ne fonctionne pas !!
        todos.value.filter((todo) => todo.id !== id);
        // Il faut réassigner le tableau :
        // todos.value = todos.value.filter((todo) => todo.id !== id);
    }
</script>

<style scoped lang="scss"></style>
```

Autre petit exemple :  

```html
<template>
    <ul>
        <template v-for="({ prenom, id }, index) of utilisateurs" :key="id">
            <li v-if="prenom != 'Alain'">
                {{ prenom }}
            </li>
        </template>
    </ul>
</template>

<script setup lang="ts">
    import { reactive } from 'vue';

    const utilisateurs = reactive([
        { prenom: 'Samy', id: 1 },
        { prenom: 'Zerina', id: 2 },
        { prenom: 'Samir', id: 3 },
    ]);

    setTimeout(() => {
        utilisateurs.push({ prenom: 'Alain', age: 51 });
    }, 3000);
</script>

<style scoped lang="scss"></style>
```
