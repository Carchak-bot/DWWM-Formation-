<?php
    class Utilisateur {
        //$user_name et $user_age sont des propriétés
        protected $user_name;
        protected $user_age;
        /* $__construct() est une méthode constructeur. Elle va être appelée
        dès qu'on va instancier la classe, c'est-à-dire créer un nouvel
        objet à partir de la classe. Ici, notre constructeur se charge
        d'initialiser les propriétés $user_name et $user_age de l'objet crée
        */
        public function __construct ($nom, $age) {
            $this->user_name = $nom;
            $this->user_age = $age;
        }

        /* Ceci est une autre méthode de la classe qui retourne la valeur de
        la propriété $user_name de l'objet qui l'appelle
        */
        public function getNom () {
            return $this->user_name;
        }
    }

    /* On instancie notre classe avec le mot-clé "new", ce qui crée
    automatiquement un objet qu'on stocke dans la variable $alain.
    Lorsqu'on instancie notre classe, le constructeur est appelé avec les
    valeurs passées ci-dessous en arguments
    */
    $alain = new Utilisateur('Alain', 50);

    // On crée de nouveaux objets à partir de notre classe
    $alex = new Utilisateur('Alex', 28);
    $jean = new Utilisateur('Jean', 74);
    print_r($alain);
    print_r($alex);
    print_r($jean);

?>