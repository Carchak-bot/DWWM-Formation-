---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 01/10/2022

---
# **Initialisation du projet**

Placez-vous où vous voulez pour créer le nouveau projet en ouvrant un terminal.  

Créez un nouveau projet **Vue.js** :  

```bash
npm init vue@latest
```

Par défaut, le nom est prérempli avec `vue-project` mais vous pouvez bien sûr le changer par exemple par `boutique`.  

La deuxième question est sur l'utilisation de **TypeScript** :  

```bash
✔ Add TypeScript? … No / Yes
```

Comme nous l'avons vu, choisissez `oui`.  

Ensuite répondez `non` pour **JSX**.  

Nous n'utiliserons pas **JSX** qui est un langage de **template React**.  

Répondez `non` pour **Vue Router**, **Pinia**, **Vitest** et **Cypress** car nous les verrons plus tard dans le cours.  

Répondez `oui` à **ESLint**, qui permet de contrôler la qualité du code et répondez `oui` à **Prettier** pour le formatage du code.  

Vous devez en être là :  

```bash
C:\Users\IDFORMATION\Documents\FORMATIONS\_DWWM\SUPPORTS DE COURS\CCP1\VUEJS>npm init vue@latest

Vue.js - The Progressive JavaScript Framework

√ Project name: ... boutique
√ Add TypeScript? ... No / Yes
√ Add JSX Support? ... No / Yes
√ Add Vue Router for Single Page Application development? ... No / Yes
√ Add Pinia for state management? ... No / Yes
√ Add Vitest for Unit Testing? ... No / Yes
√ Add Cypress for both Unit and End-to-End testing? ... No / Yes
√ Add ESLint for code quality? ... No / Yes
√ Add Prettier for code formatting? ... No / Yes

Scaffolding project in C:\Users\IDFORMATION\Documents\FORMATIONS\_DWWM\SUPPORTS DE COURS\CCP1\VUEJS\boutique...

Done. Now run:

  cd boutique
  npm install
  npm run lint
  npm run dev


C:\Users\IDFORMATION\Documents\FORMATIONS\_DWWM\SUPPORTS DE COURS\CCP1\VUEJS>
```

Allez dans le dossier du projet :  

```bash
cd boutique
```

Installez les dépendances :  

```bash
npm install
```

Ouvrez VS Code et chargez le projet :  

```bash
code .
```

## **Modification du fichier `tsconfig.node.json`**

Dans le fichier `tsconfig.node.json` retirez `vitest.config.*` et `cypress.config.*` du tableau de la propriété `include` car nous ne les utiliserons pas pour le moment :  

```json
{
    "extends": "@vue/tsconfig/tsconfig.json",
    "include": ["vite.config.*"],
    "compilerOptions": {
        "composite": true,
        "types": ["node"]
    }
}
```

## **Modification du fichier `tsconfig.json`**

Ajoutez le mode strict pour **TypeScript** :  

```json
{
    "extends": "@vue/tsconfig/tsconfig.web.json",
    "include": ["env.d.ts", "src/**/*", "src/**/*.vue"],
    "compilerOptions": {
        "strict": true,
        "baseUrl": ".",
        "paths": {
            "@/*": ["./src/*"]
        }
    },
    "references": [
        {
            "path": "./tsconfig.config.json"
        }
    ]
}
```

## **Inclusion d'une police**

Nous modifions `index.html` pour charger une police depuis **Google API** :  

```html
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <link rel="icon" href="/favicon.ico" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Vite App</title>
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link
            href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap"
            rel="stylesheet"
        />
    </head>
    <body>
        <div id="app"></div>
        <script type="module" src="/src/main.ts" defer></script>
    </body>
</html>
```

## **Modification de `App.vue`**

Nous enlevons tout le code par défaut et ajoutons l'utilisation de `scss` :  

```html
<script setup lang="ts"></script>

<template>
    <h1>Bonjour le monde !</h1>
</template>

<style lang="scss">
    @import '@/assets/base.scss';
</style>
```

## **Installation de Sass**

Installez **Sass** en dépendance de développement :  

```bash
npm i -D sass
```

## **Modification de `assets/base.css`**

Renommez le fichier `base.css` en `base.scss` car nous utilisons **Sass** et mettez pour le moment :  

```css
:root {
    --font-family: 'Roboto', sans-serif;
}

body {
    font-family: var(--font-family);
}
```

## **Installation de l'extension pour navigateur Vue**

Installez l'extension **Chrome** pour **Vue.js** ou l'extension **Firefox** suivant votre navigateur.  

Le nom de l'extension est `Vue.js devtools`.  

## **Extensions pour Visual Studio Code**

Vérifiez dans extensions sur VS Code que vous avez bien installé **Volar** et **Volar TypeScript**.  

Vérifiez que l'extension `@builtin typescript` est bien désactivée pour le workspace.  
