---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 26/05/2022  

---
# **Création d'un composant**

## **Passer en mode `Take Over`**

L'extension **Volar** est plus performante pour gérer l'utilisation de TypeScript avec Vue.js.  

Aussi, il faut configurer l'éditeur VS Code pour lui dire que nous utilisons **Volar**.  

Pour ce faire, aller sur l'onglet Extensions de VS Code.  

Recherchez `@builtin typescript`.  

Cliquez sur `TypeScript and JavaScript Language Features`.  

Cliquez sur `Disable(workspace)`. Cela désactivera uniquement pour ce projet.  

Cliquez ensuite sur `Reload required`.  

## **Utilisation du mode strict de TypeScript**

Pour activer l'option `strict` du compilateur **TypeScript** modifiez le fichier `tsconfig.json` :  

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
 "path": "./tsconfig.vite-config.json"
 }
 ]
}
```

Cette option permet d'activer de nombreuses configurations plus strictes pour le contrôle des types par le
compilateur.  
Cela permet d'améliorer sa capacité à détecter des erreurs.  

## **Création du premier composant**

Commençons par supprimer les composants mis en place automatiquement par create-vue pour la page de présentation lors du lancement de l'application.  

Supprimez tous les fichiers et les dossiers dans `src/components/`.  

Supprimez le contenu, mais pas le fichier de `src/App.vue`.  

Comme nous l'avons vu, un composant monofichier (SFC, pour Single-file component) est un fichier `.vue` dont le nom est par convention en `PascalCase`.  

Un composant monofichier a donc un ***template*** qui comporte le HTML, une partie ***script*** qui comporte le
JavaScript et une partie ***style*** qui comporte le CSS.  

Voici un exemple minimaliste :  

```html
<template>
    <h1>Bonjour {{name}}</h1>
</template>
<script setup lang="ts">
    const name = 'Alain';
</script>
<style></style>
```
