---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 01/10/2022

---
# **Composants locaux et globaux**

## **Enregistrement des composants**

Tous les composants **Vue.js** ont besoin d'être enregistrés pour que **Vue** puisse savoir où les chercher lorsque vous les utilisez.  

Il est possible d'enregistrer les composants soit localement, soit globalement.  

## **Enregistrement global**

Pour enregistrer des composants globalement, il faut modifier le fichier `main.ts` et utiliser la méthode `component()` sur l'instance retournée par `createApp()` :  

```js
import { createApp } from 'vue';
import App from './App.vue';
import ComponentA from './'ComponentA'.vue';
import ComponentB from './'ComponentB'.vue';
import ComponentC from './'ComponentC'.vue';


const app = createApp(App);

app
  .component('ComponentA', ComponentA)
  .component('ComponentB', ComponentB)
  .component('ComponentC', ComponentC)

app.mount('#app');
```

Le premier argument est le nom à donner au composant dans l'application et le deuxième argument est le composant lui-même qui est importé depuis le fichier où il est situé.  

Ces composants peuvent être utilisés par n'importe quel composant de votre application, d'où le nom d'enregistrement global.  

Il existe cependant deux problèmes à l'enregistrement global :  

1. **Le `tree-shaking` n'est pas possible**.  
Le `tree-shaking` permet d'enlever automatiquement du **build** les composants qui ne sont pas utilisés.
2. **La relation entre les composants devient difficilement maintenable**.  
Le fait de déclarer tous les composants au même endroit rend difficile le fait de retrouver un composant enfant utilisé dans un composant.  
Nous n'avons en effet pas accès au chemin dans la partie script du composant parent. Il faut regarder pour chaque composant dans le fichier `main.ts` où il est déclaré. Pour les grandes applications, cela devient rapidement illisible.  

## **Enregistrement local**

**Les composants enregistrés localement sont disponibles uniquement dans le composant qui les importe.**  

Il est donc nécessaire d'importer le même composant enfant dans tous les composants parents qui l'utilisent. Mais c'est beaucoup plus clair de cette manière : **vous savez en un coup d'œil quels composants enfants sont utilisés par un composant en regardant ses imports**.  

Avant l'apparition de la syntaxe `script setup` dans la version `3.2`, les composants enregistrés localement devaient être enregistrés comme ceci :  

```js
import ComponentA from './ComponentA.vue'

export default {
    components: {
        ComponentA
    },
    setup() {
        // ...
    }
}
```

Aujourd'hui c'est beaucoup plus simple :  

```html
<script setup>
import ComponentA from './ComponentA.vue'
</script>
```

Le composant est automatiquement enregistré localement !
