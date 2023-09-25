---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 26/05/2022  

---
# **Les modificateurs d'événements**

## **Les modificateurs d'événements (`event modifiers`)**

Les modificateurs d'événements permettent de modifier des événements avant qu'ils soient gérés dans les gestionnaires d'événements.  

Ils sont très pratiques pour deux raisons : premièrement, ils permettent aux gestionnaires de ne s'occuper que de la logique et deuxièmement, de raccourcir et simplifier la syntaxe.  

Vue.js propose huit modificateurs d'évènements :  

- `stop` : pour `event.stopPropagation()`
- `prevent` pour `event.preventDefault()`
- `self` pour ne déclencher l'événement **que s'il est envoyé de cet élément**
- `once` pour ne déclencher l'événement qu'**une seule fois**
- `passive` pour ajouter le **mode passif**
- `capture` pour ajouter l'écouteur d'événement en **mode capture**

Il s'utilise de cette manière :  

```html
<button type="submit" @click.prevent="calculer">Calculer</button>
```

## **Touches de contrôle (`key modifiers`)**

**Vue.js** facilite grandement la gestion des évènements claviers et souris, il fournit ainsi de nombreuses méthodes afin de réagir à ces évènements.  

Par exemple pour réagir à la touche `entrée` :  

```html
<input @keyup.13="submit"> // en utilisant le code de la touche
<input @keyup.enter="submit"> // en utilisant l’alias proposé par Vue
```

La liste des alias proposés par **Vue** pour le clavier est la suivante :  

- `.enter`
- `.tab`
- `.delete`
- `.esc`
- `.space`
- `.up`
- `.down`
- `.left`
- `.right`
- `.ctrl`
- `.alt`
- `.shift`
- `.meta` (équivaut à cmd ou touche windows)

Pour la souris :  

- `.left`
- `.right`
- `.middle`

```html
<template>
    <h1 @click.left.once="userClick">Hello le monde !</h1>

    <form @submit.prevent="formSubmit">
        <button>Envoyer</button>
    </form>

    <input type="text" @keyup.enter="handleEnter()" />
</template>

<script setup lang="ts">
    function userClick(event: MouseEvent) {
        console.log(event);
    }
    function formSubmit() {
        console.log('Envoyé');
    }
    function handleEnter() {
        console.log('Entrée');
    }
</script>

<style></style>
```
