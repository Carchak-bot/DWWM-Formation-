---

Author: Alain ORLUK / ID-Formation  
Formation : Développeur Web & Web mobile  
Lieu: Strasbourg
Date : 22/04/2022  

---
# **Les constantes en JavaScript**

>**Navigation**  
>
> - [Suivant](../structures-de-controle/structures-controle-conditions-et-operateurs-comparaison.md#structures-de-controle-conditions-et-operateurs-de-comparaison-javascript)  
> - [Précédent](concatenation-litteraux.md#la-concatenation-et-les-litteraux-de-gabarits-en-javascript)
> - [Menu principal](../menu.md#1-introduction-au-javascript)

Le JavaScript supporte depuis quelques années l’utilisation des constantes.  
Nous allons voir ce que sont ces éléments de langage dans cette leçon.  

## **Définition et utilité des constantes en JavaScript**

Une constante est similaire à une variable au sens où c’est également un conteneur pour une valeur.  
Cependant, à la différence des variables, on ne va pas pouvoir modifier la valeur d’une constante.  

En effet, une fois qu’une valeur est attribuée à une constante, celle-ci est attribuée de façon définitive et ne va pas pouvoir être modifiée. C’est d’ailleurs de là que les constantes portent leur nom : car leur valeur est constante.  

Les constantes vont être très utiles dans le cadre d’un script qui va réutiliser souvent la même valeur mais qui doit toujours utiliser cette valeur exactement.  
Dans ce cas-là, plutôt que de réécrire la valeur à chaque fois, nous allons stocker la valeur dans une constante et utiliser la constante.  

Dans ce cas-là, utiliser une constante va rendre notre script plus clair car on pourra rapidement identifier la valeur utilisée et également plus facilement maintenable car dans le cas où l’on doive modifier le script et cette valeur en particulier un jour, on n’aura alors qu’à modifier la constante plutôt que de modifier toutes les occurrences de la valeur dans le script.  

## **Déclarer une constante en JavaScript**

Pour créer ou déclarer une constante en JavaScript, nous allons utiliser le mot-clé `const`.  

On va pouvoir déclarer une constante exactement de la même façon qu’une variable à la différence qu’on va utiliser `const` à la place de `let`.  

Notez qu’il faut obligatoirement initialiser une constante lors de sa déclaration, c’est-à-dire lui passer une valeur immédiatement faute de quoi une erreur sera retournée.  

```js
const prenom = "Alain";
const age = 50;
```

>**Navigation**  
>
> - [Suivant](../structures-de-controle/structures-controle-conditions-et-operateurs-comparaison.md#structures-de-controle-conditions-et-operateurs-de-comparaison-javascript)  
> - [Précédent](concatenation-litteraux.md#la-concatenation-et-les-litteraux-de-gabarits-en-javascript)
> - [Menu principal](../menu.md#1-introduction-au-javascript)
