---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 26/05/2022  

---
# **Introduction à la réactivité**

## **La réactivité avec Vue.js**

Avec **Vue.js** les composants sont réactifs. Cela signifie que lorsque vous modifiez des objets JavaScript utilisés dans le **template**, **Vue.js** va automatiquement mettre à jour la vue.  

**Vue.js** met à disposition une **API** permettant de créer des objets réactifs et de mettre à jour automatiquement le **DOM** lorsqu'ils sont modifiés.  
C'est ce que nous allons étudier dans cette partie.  

## **Fonctionnement de la réactivité avec Vue.js**

Il n'est pas possible de directement suivre l'accès et l'écriture des variables en JavaScript.  

Ce qu'il est possible de faire est d'intercepter l'accès et l'écriture ***à des objets JavaScript***.  

A partir de la *version 3* de **Vue.js**, des *proxies JavaScript* sont utilisés pour réagir à l'accès et à l'écriture d'objets en utilisant des **getters** et des **setters**.  

Le **Proxy** est un **objet JavaScript** qui réagit à différents événements, comme par exemple le changement de valeur d'une propriété.

Vous n'aurez pas à utiliser vous-même directement des proxies.  

```html
<template></template>

<script setup lang="ts">
    const obj = { prenom: 'Alain', age: 51 };

    function render() {
        console.log('Mise à jour du template par Vue.js');
    }

    const proxy = new Proxy(obj, {
        get(obj, prop) {
            render();
            return obj[prop];
        },
        set(obj, prop, value) {
            obj[prop] = value;
            render();
            return true;
        },
    });
    console.log(proxy.prenom);
</script>

<style></style>
```
