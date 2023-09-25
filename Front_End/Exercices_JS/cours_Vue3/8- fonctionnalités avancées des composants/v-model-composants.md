---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 13/10/2022 

---
# **Utilisation de la directive `v-model` sur des composants**

## **Fonctionnement de `v-model` avec un composant**

Lorsque vous utilisez `v-model` sur un composant enfant :  

```html
<Enfant v-model="uneProp" />
```

Cela revient en fait exactement à :  

```html
<Enfant
    :modelValue="uneProp"
    @update:modelValue="val => uneProp = val"
/>
```

Cela signifie que dans le composant enfant il faut émettre un événement `update:modelValue` et déclarer une `prop modelValue` :  

```html
<script setup>
    defineProps<{
        modelValue: string;
    }>();
    defineEmits<{
        (e: 'update:modelValue', value: string);
    }>();
</script>

<template>
    <input
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
    />
</template>
```

## **Changer le nom de la `prop` et de l'événement**

Comme nous venons de le voir, par défaut, la `prop` reçue par le composant enfant est `modelValue` et l'événement qu'il doit émettre est `update:modelValue`.

Il est possible de modifier le nom en passant un argument à -`v-model` :  

```html
<Enfant v-model:unNom="uneProp" />
```

Vous pouvez ensuite utiliser ce nom dans le composant enfant :  

```html
<script setup>
    defineProps<{
        unNom: string;
    }>();
    defineEmits<{
        (e: 'update:unNom', value: string);
    }>();
</script>

<template>
    <input
        type="text"
        :value="unNom"
        @input="$emit('update:unNom', $event.target.value)"
    />
</template>
```

## **Utiliser plusieurs directives `v-model`**

Vous pouvez sans problème utiliser plusieurs directives `v-model` sur un composant :  

```html
<Enfant v-model:une-prop="uneProp" v-model:une-autre-prop="uneAUtreProp" />
```

Par exemple :  

```html
<Modal v-model:prenom="prenom" v-model:nom="nom" />
```

Et nous aurions dans le composant enfant :  

```html
<template>
    <input
        type="text"
        :value="prenom"
        @input="$emit('update:prenom', $event.target.value)"
    />
    <input
        type="text"
        :value="nom"
        @input="$emit('update:nom', $event.target.value)"
    />
</template>

<script setup lang="ts">
    defineProps<{
        prenom: string;
        nom: string;
    }>();

    defineEmits<{
        (e: 'update:prenom', value: string);
        (e: 'update:nom', value: string);
    }>();
</script>

<style scoped lang="scss"></style>
```

### **Exemple complet**

`App.vue` :  

```html
<template>
    <h1>{{ prenom }} {{ nom }}</h1>
    <Modal v-model:prenom="prenom" v-model:nom.capitalize="trim" />
</template>

<script setup lang="ts">
    import { ref } from 'vue';
    import Modal from './Modal.vue';

    const prenom = ref('');
    const nom = ref('');
</script>

<style scoped lang="scss"></style>
```

`Modal.vue` :  

```html
<template>
    <input
        type="text"
        :value="prenom"
        @input="$emit('update:prenom', $event.target.value)"
    />
    <input
        type="text"
        :value="nom"
        @input="$emit('update:nom', $event.target.value)"
    />
</template>

<script setup lang="ts">
    defineProps<{
        prenom: string;
        nom: string;
    }>();

    defineEmits<{
        (e: 'update:prenom', value: string);
        (e: 'update:nom', value: string);
    }>();
</script>

<style scoped lang="scss"></style>
```

## **Utiliser des modificateurs**

Vous pouvez utiliser des modificateurs personnalisés ou définis par **Vue.js**, comme par exemple `trim`, `number`, etc.

Par exemple, pour enlever les espaces éventuels avant ou après :  

```html
<Modal v-model:prenom.trim="prenom" v-model:nom.trim="nom" />
```

Pour utiliser un modificateur personnalisé, il faut utiliser côté parent :  

```html
<Modal v-model:prenom="prenom" v-model:nom.exemple="nom" />
```

Et côté enfant :  

```html
<template>
    <input
        type="text"
        :value="prenom"
        @input="$emit('update:prenom', $event.target.value)"
    />
    <input
        type="text"
        :value="nom"
        @input="emitName"
    />
</template>

<script setup lang="ts">
    defineProps<{
        prenom: string;
        nom: string;
        nameModifiers?: { [s: string]: boolean };
    }>();

    defineEmits<{
        (e: 'update:prenom', value: string);
        (e: 'update:nom', value: string);
    }>();

    function emitName(event) {
        let value = (event.target as HTMLInputElement).value;
        if (props.modelModifiers.exemple) {
            // Modifier la valeur comme on souhaite si le modificateur est présent :
            value = value.toUpperCase();
        }
        emit('update:modelValue', value);
    }
</script>

<style scoped lang="scss"></style>
```
