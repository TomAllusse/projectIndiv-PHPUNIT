<?php

namespace App;

use Exception;

class Fusee {
    private $nom;
    private $niveauCarburant = 0;
    private $equipage = [];
    private $estLancee = false;

    /* Méthode construct */

    public function __construct($nom) {
        $this->nom = $nom;
    }

    /* Méthodes getters */

    public function getNom()
    {
        return $this->nom;
    }    
    
    public function getEquipage()
    {
        return $this->equipage;
    }

    /* Méthodes */

    public function ajouterCarburant($litres) {
        if ($litres < 0) {
            throw new Exception("Pas de siphonage de carburant autorisé !");
        }
        $this->niveauCarburant += $litres;
    }

    public function embarquerAstronaute($nom) {
        if (in_array($nom, $this->equipage)) {
            throw new Exception("L'astronaute $nom est déjà à bord.");
        }
        $this->equipage[] = $nom;
    }

    public function decoller() {
        if ($this->niveauCarburant < 100) {
            throw new Exception("Niveau de carburant insuffisant pour le lancement.");
        }
        if (count($this->equipage) < 1) {
            throw new Exception("Équipage insuffisant pour le lancement.");
        }
        $this->estLancee = true;
    }

    public function calculerPortee($fuel) {
        if ($fuel < 0) {
            throw new Exception("La quantité de carburant ne peut pas être négative.");
        }
        return $fuel * 2.5;
    }

}