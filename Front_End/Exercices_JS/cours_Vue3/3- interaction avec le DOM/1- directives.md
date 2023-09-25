---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 26/05/2022  

---
# **Introduction aux directives**

## **Les directives**

Les directives sont des attributs spéciaux avec le préfixe `v-`.  

L'objectif d'une directive est d'appliquer de manière réactive des effets au DOM lorsque la valeur de
son expression change.  

Les directives natives sont les suivantes :  

- `v-text` (qui équivaut à `{{ }}`)
- `v-bind`
- `v-html`
- `v-once`
- `v-show`
- `v-if`
- `v-else`
- `v-else-if`
- `v-for`
- `v-on`
- `v-model`
- `v-pre`
- `v-cloak`
- `v-slot`
- `v-memo`

Il est également possible, comme nous l'étudierons, de ***créer ses propres directives Vue***.  

Commençons par la directive la plus simple `v-text`.  

## **La directive v-text et l'interpolation de texte**

La directive `v-text` permet de mettre à jour le contenu de la propriété `textContent` de l'élément HTML.  

La directive prend en argument la propriété déclarée sur le composant dont la valeur doit être
utilisée.  
On appelle cela ***l'interpolation de texte***.  

Par exemple, s'il existe une propriété `message` sur le composant dans la partie ***script***, alors nous pouvons
utiliser la directive de cette manière côté ***template*** :  

```html
<span v-text="message"></span>
```

La propriété `textContent` de l'élément `span` sera alors remplacée par la valeur de la propriété `message`.  

Comme lier une propriété est extrêmement courant, il existe une forme raccourcie appelée ***la notation
moustache*** (de part sa forme), utilisant deux paires d'accolades :  

```html
<span>{{message}}</span>
```

Est du ***sucre syntaxique*** pour :  

```html
<span v-text="message"></span>
```

***Note :*** en programmation, on appelle ***sucre syntaxique*** une syntaxe *plus concise* ou *plus élégante* qui est remplacée automatiquement par le code complet et donne le même résultat qu'une expression plus longue.  

## **Utilisation d'expression JavaScript**

Avec **Vue.js** il est possible d'utiliser toute expression JavaScript valide comme argument d'une directive.  

Voici un exemple avec un ternaire :  

```ts
{{ condition ? 'Oui' : 'Non' }}
```

Autre exemple :  

```ts
{{ message.reverse().toUpperCase() }}
```

Encore un autre :  

```html
<h1>Bonjour {{ `${prenom.toLowerCase()} ${nom.toUpperCase()}`}}</h1>
```

Nous verrons encore énormément d'exemples tout au long du cours.
