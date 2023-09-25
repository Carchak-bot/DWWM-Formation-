---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 26/05/2022  

---
# **Notions de base TypeScript**

## **Les types statiques**

**TypeScript** permet de tout typer statiquement : vos variables, vos fonctions (arguments, valeur de retour) et vos
classes.  

Le langage ne vous force pas à typer, ce qui vous laisse totalement libre de le faire ou non et ainsi d'adopter
progressivement le typage statique en fonction de votre apprentissage.  

## **L'inférence de types**

**TypeScript** va détecter automatiquement le type de votre variable en regardant la valeur qui lui est assignée.  
Nous reviendrons en détails sur cette fonctionnalité très pratique, mais elle permet sans aucune ligne supplémentaire d'avoir
ce résultat :  

```ts
const obj = { width: 1, height: 2 };
const aire = obj.width * obj.heigth;
// Property 'heigth' does not exist on type '{ width: number; height: number; }'. Did you mean // 'height'?
```

Ici **TypeScript** a détecté qu'aucune propriété `heigth` n'existait sur `obj` et vous invite à vérifier que vous n'avez pas fait
une erreur.  
Magique, non ?  

## **Les types**

Comme son nom l'indique et comme nous l'avons vu **TypeScript** est avant tout un langage pour **typer**.  

Il est possible de typer absolument tout comme nous le verrons : que ce soit les variables mais aussi les retour de fonction ou des
situations encore plus complexes.  

Typer au début peut sembler fastidieux : il faut ajouter un peu de code à chaque fois.  

Mais les bénéfices se remarquent très vite et dans cet ordre souvent :  

1. **Vous aurez moins de bugs lors de l'exécution car beaucoup auront été signalés lors de la compilation** : typo
dans les noms, erreurs dans les conditions, dans les arguments passés, dans les retours de fonction etc.
2. **VS Code** vous fournira au survol de la souris plein d'informations sur vos fonctions : quels arguments sont
attendus, etc et vous fera gagner un temps fou grâce à l'autocomplétion (car **TypeScript** connaîtra toutes les propriétés de
vos objets, etc).
3. Lorsque vous serez sur un projet à plusieurs, vous pourrez lire et comprendre beaucoup plus vite le code des autres
développeurs car vous verrez facilement ce que prend et ce que retourne chaque fonction, quels sont les types
acceptés par chaque variable etc.  

Une fois les premiers jours où cela semblera être une surcouche embêtante passés, vous ne pourrez plus faire sans !  

### **Les types primitifs**

Nous allons commencer par les types les plus basiques : les **primitifs** !  

Pour spécifier un type en **TypeScript**, nous utilisons la plupart du temps (nous verrons en détails les autres cas) cette
syntaxe :  

```ts
nomVariable: type;
```

Il est possible de simplement typer une variable sans rien assigner ou typer et assigner directement :  

```ts
nomVariable: type;
nomVariable: type = x;
```

### **Les chaînes de caractères : `string`**

Les chaînes de caractères en **TypeScript** comprennent exactement comme en **JavaScript** les guillemets simples ou
doubles et les apostrpohes inversées (backticks) :  

```ts
let prenom: string = "Alain";
prenom = 'Samir';
prenom = `Jérôme`;
```

### **Les nombres : `number`**

Tous les nombres valides en **JavaScript** le sont en **TypeScript** :  

```ts
let decimal: number = 42;
let flottant: number = 42.22;
let hexadecimal: number = 0x2A;
let binaire: number = 0b101010;
let octal: number = 0o52;
```

### **Les booléens : `boolean`**

Le type `boolean` n'accepte que `true` ou `false` :  

```ts
let actif: boolean;
actif = true;
actif = false;
```

### **Le type `any`**

Il est possible de ne pas connaître le type de variables.  

Ces valeurs peuvent provenir d'un contenu dynamique, par exemple de l'utilisateur ou d'une bibliothèque tierce.  

Il est également possible que vous souhaitez typer plus tard votre fonction ou variable ou que vous soyez en train de
convertir un fichier JavaScript en TypeScript et que vous mettiez les types peu à peu.  

Dans ces cas, nous voulons désactiver la vérification de type.  
Pour ce faire, nous les étiquetons avec le type `any`.  

```ts
let pasSur: any = 4;
pasSur = 'en fait une string';
```

Lorsque vous commencerez en TypeScript vous aurez tendance à beaucoup trop utiliser `any`.  
A chaque fois que vous ne saurez pas trop le type vous mettrez `any`.  

Au début ce n'est pas très grave mais il faut vous forcer à faire l'effort de tout bien typer pour garder les bénéfices de
l'usage de TypeScript.  

Nous vous recommandons de ne quasiment jamais utiliser `any` sauf dans les cas vus ci-dessus.  

### **Le type object**

Le type objet permet simplement de représenter le type non primitif : tout ce qui n'est pas `number`, `string`, `boolean`,
`bigint`, `symbol`, `null` ou `undefined`.  

Cela peut donc être un tableau, un objet littéral etc.  

```ts
let monObj: object;
monObj = {};
```

Notez que `object` et `{}` sont deux manières de typer un objet, nous pouvons écrire :  

```ts
let monObj: {};
monObj = {};
```

### **Le type array**

Il y a deux syntaxes en **TypeScript** pour typer les tableaux.  

En **TypeScript** un tableau est un tableau JavaScript contenant un nombre indéfini d'éléments.  

C'est la différence avec les tuples, voir plus bas.  

Première possibilité :  

```ts
type[];
```

Où `type` est le type des éléments contenus dans un tableau.  
Il est possible d'accepter par exemple que les nombres :  

```ts
let liste: number[] = [1, 2, 3];
```

Tous les types :  

```ts
let liste: any[] = [1, true, {}];
```

## **Qu'est-ce qu'une interface ?**

Une interface est un contrat qui définit la forme que doit prendre un objet JavaScript (objets littéraux, classes
et fonctions).  

Il est important de noter qu'une interface n'est pas compilée : aucun code JavaScript ne sera créé à partir de
l'interface.  

Elle sert uniquement pour l'IDE, c'est-à-dire pour VS Code, (auto-complétions et erreurs de types) et lors de la
compilation.  

### **Notre première interface**

Prenons un premier exemple avec un objet :  

```ts
interface User {
    prenom: string;
}
```

Ici, notre objet User doit obligatoirement avoir une propriété prenom contenant une chaîne de caractères.  

Ensuite nous pouvons utiliser l'interface pour typer par exemple un paramètre d'une fonction :  

```ts
function printUser(user: User) {
    console.log(user.prenom);
}
```

Ici, la fonction `printUser()` doit recevoir en argument un objet respectant l'interface `User`.  

Par exemple :  

```ts
let alain = {
    prenom: 'Alain'
};
printUser(alain);
```

Attention ! Lorsque vous typez le paramètre de cette manière `user: User`, cela revient à dire que le paramètre doit
au moins avoir le ou les propriétés de l'interface `User` et donc avoir une propriété `prenom`.  

En revanche, lorsque vous typez un objet avec une interface, il faut que l'objet respecte exactement l'interface.  

C'est-à-dire qu'il doit avoir exactement les propriétés définies, ni plus ni moins.  

Voici un exemple pour bien comprendre :  

```ts
interface User {
    prenom: string;
}
function printUser(user: User) {
    console.log(user.prenom);
}
const alain = {
    prenom: 'Alain',
    nom: 'DELOIN'
};
printUser(alain); // Cela fonctionne car alain a au moins une propriété nom
const alex: User = {
    prenom: 'Alex',
    nom: 'TERRIEUR'
}; // Erreur
```

Dans le cas de l'objet `alex`, TypeScript nous signale l'erreur suivante :  

```bash
Type '{ prenom: string; nom: string; }' is
not assignable to type 'User'. Object literal may only specify known properties, and 'nom' does not exist
in type 'User'.  
```

Autrement dit, il se plaint car `alex` a une propriété `nom` qui ne respecte pas le contrat imposé par l'interface `User`.  

## **Les propriétés optionnelles avec `?`**

Il est possible de définir des propriétés optionnelles comme nous l'avons vu pour les arguments de fonction en
utilisant `?`.  

Ces propriétés sont utilisables également dans les interfaces.  

```ts
interface User {
    prenom: string;
    nom?: string;
}
```

Ici, nous établissons comme contrat que les objets qui devront respecter l'interface `User` devront avoir **obligatoirement** une propriété `prenom` contenant une chaîne de caractères, et une propriété **optionnelle** `nom`, qui si elle existe, devra également contenir une chaîne de caractères.  

En outre, les propriétés optionnelles permettent l'autocomplétion et l'autocorrection.  

## **Les unions de type**
  
Les unions s'utilisent dans toutes les situations.  

## **Unions de type et variables**

Prenons un premier exemple :  

```ts
let uneVar: string | number;
```

Ici, nous effectuons une **union** entre les types *chaîne de caractères* et *nombre*.  

La variable pourra ainsi recevoir l'un des deux types.  

## **Unions de type et fonctions**

Vous pouvez également typer les paramètres des fonctions en utilisant des unions :  

```ts
function ajouter(a: string | number, b: string | number) {
    return Number(a) + Number(b);
}
```

Ici par exemple notre fonction peut ajouter des nombres et des chaînes de caractères.  
Nous voulons donc utiliser des unions pour les paramètres de la fonction.  

Vous pouvez également typer les retours de fonctions en utilisant des unions :  

```html
<template></template>
<script setup lang="ts">
    interface User {
        name: string;
        age: number | string;
    }

    let user: User | null;

    function createUser(name: string): User | null {
        return {
            name,
            age: 51,
        };
    }

    user = createUser('Alain');
</script>
<style></style>
```
