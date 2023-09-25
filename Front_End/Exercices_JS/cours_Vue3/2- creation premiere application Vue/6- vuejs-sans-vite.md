---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 26/05/2022  

---
# **Vue.js sans Vite**

## **Utiliser Vue.js sans Vite**

Créez un dossier `projet-vue`.  

Dans ce dossier, créez un fichier `index.html` :  

```html
<!DOCTYPE html>
<html lang="fr">
    <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <script src="https://unpkg.com/vue@3"></script>
    </head>
    <body>
        <div id="app">
            <h1>Bonjour {{ name }}</h1>
        </div>
        <script>
            Vue.createApp({
                setup() {
                    const name = 'Alain';
                    return {
                        name,
                    };
                },
            }).mount('#app');
        </script>
    </body>
</html>
```

Ici, nous n'utilisons ***que*** la librairie **Vue.js** sans **Vite** et sans aucune autre librairie.  

Il n'y a aucune étape de **build**, nous ne pouvons pas utiliser **Sass**, **TypeScript** etc.  

Il n'y a pas de minification du code et pleins d'avantages apportés par **Vite**.  

Cet exemple permet simplement de montrer comment utiliser **Vue.js** seul mais dans tous le cours nous n'utiliserons pas du tout cette méthode car il est impossible d'écrire une application complexe
comme cela.  

Cette manière de faire peut être utile pour par exemple gérer une barre de recherche sur une application
avec **Symfony** côté serveur.
