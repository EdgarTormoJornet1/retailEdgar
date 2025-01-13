<?php

namespace App\Service;

class ServeiDadesSeccio{

    private array $seccions = [
        [
            "codi" => "1",
            "nom" => "Roba",
            "cicle" => "Comerç i Màrqueting",
            "curs" => "2n DAW",
            "nomImg" => "ropa.jpg",
            "membres" => ["Anna", "Marc", "Laura", "Joan"]
        ],
        [
            "codi" => "2",
            "nom" => "Joguines",
            "cicle" => "Disseny i Producció",
            "curs" => "1r DAM",
            "nomImg" => "juegos.jpg",
            "membres" => ["Carla", "Pere", "Maria", "Jordi"]
        ],
        [
            "codi" => "3",
            "nom" => "Esports",
            "cicle" => "Activitats Físiques i Esportives",
            "curs" => "1r DAW",
            "nomImg" => "esports.avif",
            "membres" => ["Sara", "David", "Clara", "Toni"]
        ],
        [
            "codi" => "4",
            "nom" => "Bellesa",
            "cicle" => "Imatge Personal",
            "curs" => "2n DAM",
            "nomImg" => "bellesa.avif",
            "membres" => ["Marta", "Àlex", "Júlia", "Víctor"]
        ]
    ];

    public function get() {
        return $this->seccions;
    }

}