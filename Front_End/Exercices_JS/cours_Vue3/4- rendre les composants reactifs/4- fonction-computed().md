---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 26/05/2022  

---
# **La fonction computed()**

## **La fonction `computed()`**

Nous avions vu qu'il était possible de mettre toute expression JavaScript côté **template**, par exemple :  

```html
<p>Est majeur :</p>
<span>{{ personne.age >= 18 ? 'Oui' : 'Non' }}</span>
```

Cependant, dès qu'il y a de la logique incluant des données réactives il est recommandé d'utiliser des propriétés calculées (`computed properties`).  

Voici un exemple de propriété calculée utilisant la fonction `computed()` :  

```html
<script setup lang="ts">
    import { reactive, computed } from 'vue';
        const personne = reactive({
            name: 'Alain TERIEUR',
            age: 51
    })
    const estMajeur = computed(() => personne.age >= 18 ? 'Oui' : 'Non' );
</script>
```

La fonction `computed()` attend en argument une fonction de rappel qui retourne la valeur calculée.  

La fonction retourne une référence calculée (`computed ref`).  

Il est possible, comme pour toutes les refs, d'accéder à la valeur de la propriété en utilisant value. Ici par exemple en faisant `estMajeur.value`.  

Mais comme pour les autres **refs**, l'accès à la propriété `value` est automatique côté template.  
C'est pour cette raison que nous pouvons directement faire :  

```html
<span>{{ estMajeur }}</span>
```

Une propriété calculée suit automatiquement le changement de ses dépendances réactives.  

Cela signifie que Vue.js sait quelles propriétés réactives sont utilisées pour déterminer la valeur de la propriété calculée.  

Lorsque l'une des valeurs des propriétés réactives changent, Vue.js déclenche le calcul de la propriété calculée automatiquement.  

Lorsqu'aucune dépendance change, **Vue.js** retourne la valeur précalculée qui est gardée en cache.  

Ce mécanisme permet de maintenir la réactivité des propriétés calculées tout en optimisant les performances.  

A noter qu'**il ne faut pas effectuer de modification du DOM ou effectuer des actions asynchrones dans une propriété calculée**, elles ne sont pas prévues pour cela !  

Exemple :  

```html
<template>
    <h2>Prix total HT : {{ totalPrixHT }}€</h2>
    <h2>Prix total TTC : {{ totalPrixTTC }}€</h2>
</template>

<script setup lang="ts">
    import { computed, reactive } from 'vue';

    const produit = reactive({
        quantite: 3,
        prix: 10,
        nom: 'livre',
    });

    const totalPrixHT = computed(() => produit.quantite * produit.prix);
    const totalPrixTTC = computed(() => produit.quantite * produit.prix * 1.2);
</script>

<style></style>
```

## **Les propriétés calculées avec accès en écriture**

Par défaut, les propriétés calculées prennent un seul argument : une fonction `getter` qui va calculer la
propriété à retourner.  

Il est cependant possible de créer une propriété calculée avec un accès en écriture.  
Cette fonctionnalité est vraiment avancée et vous pouvez donc sauter cette partie et y revenir plus tard lorsque vous en
aurez besoin.  

Pour créer une telle propriété calculée, il faut lui passer en argument un objet avec une méthode `get()` pour l'accès et une méthode `set()` pour l'écriture :  

```html
<script setup>
    import { ref, computed } from 'vue';
    const prenom = ref('Alex');
    const nom = ref('TERIEUR');
    const nomComplet = computed({
        get() {
            return `${prenom.value} ${nom.value}`;
        },
        set(nouvelleValeur) {
            [prenom.value, nom.value] = nouvelleValeur.split(' ');
        }
    })
    nomComplet.value = 'Alain DELOIN'
</script>
```

Avec cette fonctionnalité vous pouvez ainsi modifier `nomComplet`.  

Encore une fois, vous rencontrerez rarement cette fonctionnalité.
