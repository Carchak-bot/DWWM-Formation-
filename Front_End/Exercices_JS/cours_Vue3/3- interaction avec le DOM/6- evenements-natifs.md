---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 26/05/2022  

---
# Les évènements natifs**

## **La gestion des évènements**

L'objectif de la gestion des évènements est de pouvoir réagir à un évènement.  

Les événements HTML sont des événements qui se produisent suite aux interactions de l'utilisateur avec son clavier, sa souris ou alors à la modification d'éléments du DOM :  

- modification de l'objet window : par exemple la page est fini d'être chargée
- modification d'un formulaire : par exemple quand un champ est invalide
- interactions clavier ou souris : par exemple une pression de touche
- évènements relatif à un média (vidéo, audio) : par exemple lorsqu'une vidéo fini
- événements relatifs au drag and drop : par exemple lorsqu'un élément a été drag

Lorsque **Vue.js** est appliqué sur une page HTML il peut réagir à ces évènements.  

## **L'approche de Vue.js**

Dans Vue.js les écouteurs sont déclarés dans le HTML.  
Pourquoi cette approche ?  

1. permet de voir directement dans le HTML où se situent les écouteurs d'événement et à quel élément
ils sont attachés.
2. permet de ne pas à avoir à mettre des sélecteurs et des écouteurs côté JavaScript offrant ainsi la
possibilité de n'avoir que la logique dans le JavaScript et de pouvoir mieux tester.
3. Lorsqu'un composant est détruit, tous les écouteurs sont également enlevés automatiquement.

## **`v-on` : écouter des événements du DOM**

La directive `v-on` permet d'écouter des évènements et d'attacher un gestionnaire d'événement à un
évènement.  
Le type d'évènement est déterminé par le l'argument qui est passé à `v-on`, ainsi par exemple : `v-on:keyup`
permet d'écouter l'événement du relâchement d'une touche du clavier.  

### **Le raccourci @**

`v-on` peut être remplacé par un raccourci : `@`.  

```html
<button @click="direBonjour">Dire bonjour</button>
```

Ici un clic sur le bouton va déclencher la fonction `direBonjour()` du composant. Autrement dit, l'événement click va exécuter le gestionnaire d'événement `direBonjour()`.  

### **L'objet event reçu**

Le gestionnaire d'événement reçoit automatiquement l'événement du DOM en argument.  

Par exemple :  

```html
<template>
    <button @click="direBonjour">Dire bonjour</button>
</template>
<script setup lang="ts">
    function direBonjour(event: MouseEvent) {
        console.log(event);
    }
</script>
```

Notez que nous typons l'événement comme un `MouseEvent` pour pouvoir accéder à toutes les propriétés et
méthodes par autocomplétion.  

### **Passer un argument à un gestionnaire d'événement**

Notez que vous pouvez passer un argument à un gestionnaire d'événement, dans ce cas l'événement sera disponible en deuxième argument.  

Il faut passer `$event` en deuxième argument au gestionnaire d'événement pour pouvoir y accéder dans la
fonction :  

```html
<template>
    <button @click="direBonjour('Salut', $event)">Dire bonjour</button>
</template>
<script setup lang="ts">
    function direBonjour(arg: string, event: MouseEvent) {
        console.log(arg);
        console.log(event);
    }
</script>
```

### **L'assertion TypeScript avec `as`**

Dans certains cas, vous aurez besoin de signaler à **TypeScript** que vous êtes sûr d'un type et qu'il n'a pas à
s'en préoccuper.  

Autrement dit, vous lui désignez un type et vous l'obligez à le respecter, c'est ce qu'on appelle l'**assertion**.  

L'assertion doit être maniée avec prudence car vous perdez le bénéfice du contrôle de type avant l'exécution.  

Pour l'assertion il faut utiliser :  

```ts
as type
```

Par exemple :  

```ts
let maVar: any = "Une chaîne";
let longueur: number = (maVar as string).length;
```

Ici nous forçons TypeScript à reconnaître `maVar` comme étant une chaîne de caractères pour pouvoir utiliser l'autocomplétion et la propriété `length`.  

Le plus souvent nous souhaitons utiliser une interface HTML afin d'obtenir les bonnes propriétés et les bonnes méthodes.  

En effet, **TypeScript** ne peut pas connaître l'élément du DOM HTML et il faut donc le lui préciser.  
Vous verrez donc `as` la plupart du temps dans ce cas.

```html
<template>
    <h1 @click="userClick">Bonjour tout le monde !</h1>
    <input @input="userInput" type="text" />
</template>

<script setup lang="ts">
    function userClick(event: MouseEvent) {
        console.log(event);
    }

    function userInput(event: Event) {
        const target = event.target as HTMLInputElement;
        target.value = 'Bonjour';
        console.log(event);
    }
</script>

<style></style>
```
