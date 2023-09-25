---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 26/05/2022  

---
# **La fonction `watch()`**

## **Les Watchers**

Lorsque nous avons besoin d'effectuer des actions asynchrones ou des effets de bord (`side effects`) lorsque des propriétés réactives changent, il n'est pas possible d'utiliser des propriétés calculées.  

Par exemple, lorsque nous avons besoin d'effectuer une requête **HTTP** pour récupérer des données supplémentaires, ou encore lorsque nous avons besoin de modifier le **DOM**.  

La fonction `watch()` permet de déclencher l'exécution d'une fonction si une ou plusieurs propriétés réactives enregistrées comme dépendances sont modifiées.  

## **Les sources ou dépendances de la fonction `watch()`**

Le premier argument est le ou les dépendances à enregistrer, elles sont appelées les sources de la fonction `watch()` :  

Cela peut être une seule propriété réactive, enregistrée en dépendance :

```js
watch(prop, (nouvelleVal) => {
    console.log(`prop vaut ${nouvelleVal}`);
})
```

Cela peut être une fonction `getter` comme pour une propriété calculée :  

```js
watch(
    () => prop1.value + prop2.value,
    (somme) => {
        console.log(`La somme de x + y est ${somme}`);
    }
)
```

Ou encore un tableau de plusieurs propriétés réactives :  

```js
watch([prop1, () => prop2.value], ([nouvelleValProp1, nouvelleValProp2]) => {
    console.log(`prop1 vaut ${nouvelleValProp1} et prop2 vaut ${nouvelleValProp2}`);
})
```

**Attention à bien passer une propriété réactive et non une primitive !** Pour les mêmes raisons qu'évoquées dans les leçons précédentes, il faut veiller à passer une référence et non une valeur !  

Par exemple, cela ne fonctionnera pas car nous passons la valeur `0` en source :  

```js
const obj = reactive({ compteur: 0 });

watch(obj.compteur, (compteur) => {
    console.log(`Le compteur vaut: ${compteur}`);
})
```

Dans ce cas utilisez un `getter` car les fonctions sont passées par référence et ce sera la fonction `getter` qui sera enregistrée en source et non plus la valeur primitive `0` :  

```js
watch(
    () => obj.compteur,
    (compteur) => {
        console.log(`Le compteur vaut: ${compteur}`);
    }
)
```

## **La fonction de rappel de la fonction `watch()`**

La fonction de rappel (`callback function`) est la fonction passée en deuxième argument.  

Elle reçoit la nouvelle valeur de la source en argument.  

Si un tableau de sources est passé en premier argument, alors la fonction de rappel recevra un tableau de nouvelles valeurs dans le même ordre :  

```js
watch([prop1, prop2], ([nouvelleValProp1, nouvelleValProp2]) => {
    console.log(`prop1 vaut ${nouvelleValProp1} et prop2 vaut ${nouvelleValProp2}`);
})
```

**Passons maintenant aux exemples.**

```html
<template>
    <div>
        <label for="quantity">Nombre de livres : </label>
        <input id="quantity" type="number" v-model="produit.quantite" />
    </div>

    <div>
        <label for="prix">Prix : </label>
        <input id="prix" type="number" v-model="produit.prix" />
    </div>
    <h2>Prix total HT : {{ totalPrixHT }}€</h2>
    <h2>Prix total TTC : {{ totalPrixTTC }}€</h2>
    <h3>Modifications : {{ produit.nbrModifs }}</h3>
</template>

<script setup lang="ts">
    import { computed, reactive, watch } from 'vue';

    const produit = reactive({
        quantite: 3,
        prix: 10,
        nom: 'livre',
        nbrModifs: 0,
    });

    const totalPrixHT = computed(() => produit.quantite * produit.prix);
    const totalPrixTTC = computed(() => produit.quantite * produit.prix * 1.2);

    watch(
    () => [produit.quantite, produit.prix],
    (nouvelleVal, ancienneVal) => {
        console.log(nouvelleVal, ancienneVal);
        produit.nbrModifs++;
    }
    );
</script>

<style></style>
```

**Deuxième exemple.**

Prenons un second exemple avec une requête **HTTP**.  

**Commençons par la partie `template`**
Ici nous utilisons une double liaison de données avec la directive `v-model` pour récupérer la question posée par l'utilisateur dans le champ.  

Nous affichons la réponse avec la notation raccourcie de la directive `v-text` et avec la directive `v-bind` liée à la propriété `src` d'une image.  

**Pour la partie `script`**

Dans la partie `script` nous avons simplement une variable réactive contenant la question posée et qui va être utilisée comme source de la fonction `watch()`.  

Ainsi, dès que la valeur de la variable `question` changera, la fonction de rappel de `watch()` sera exécutée.  

Nous avons également un objet réactif contenant le texte de la réponse (`yes` ou `no`) et l'**image GIF** correspondante.  

Analysons la fonction `watch()` :  

```js
watch(question, async (newQuestion, oldQuestion) => {
    if (newQuestion.includes('?')) {
        reponse.res = 'Requête en cours...';
        try {
            const res = await fetch('https://yesno.wtf/api');
            const resJSON = await res.json();
            reponse.res = resJSON.answer;
            reponse.image = resJSON.image;
        } catch (error) {
            reponse.res = `Erreur : ${error}`;
        }
    }
});
```

La source de la fonction `watch` est la variable réactive `question`.  

La fonction de rappel reçoit la nouvelle valeur de la propriété et l'ancienne.  

Si la nouvelle valeur de `question` contient un point d'interrogation, nous considérons que la question posée par l'utilisateur est complète et nous envoyons une requête **HTTP** à une **API**.  

L'**API** retourne aléatoirement `yes` ou `no` avec une image GIF amusante.  

Nous assignons le retour de l'**API** à notre objet réactif `reponse`.  

Dès que l'une des propriétés de reponse change, alors **Vue** met à jour le **template** automatiquement et affiche la réponse et l'image s'il n'y a pas d'erreur.  

S'il y a une erreur, il affichera simplement la valeur de l'erreur.  

```html
<template>
    <p>
    Posez une question (réponse oui / non):
    <input v-model="question" />
    </p>
    <p>Réponse : {{ reponse.res }}</p>
    <img :src="reponse.image" />
</template>

<script setup lang="ts">
    import { ref, watch, reactive } from 'vue';

    const question = ref('');
    const reponse = reactive({
        res: 'En attente de votre question...',
        image: '',
    });

    watch(question, async (newQuestion, oldQuestion) => {
        if (newQuestion.includes('?')) {
            reponse.res = 'Requête en cours...';
            try {
                const res = await fetch('https://yesno.wtf/api');
                const resJSON = await res.json();
                reponse.res = resJSON.answer;
                reponse.image = resJSON.image;
            } catch (error) {
                reponse.res = `Erreur : ${error}`;
            }
        }
    });
</script>

<style></style>
```
