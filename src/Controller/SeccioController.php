<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
class SeccioController {


    private array $seccions = [
        [
            "codi" => "1",
            "nom" => "Roba",
            "cicle" => "Comerç i Màrqueting",
            "curs" => "2n DAW",
            "membres" => ["Anna", "Marc", "Laura", "Joan"]
        ],
        [
            "codi" => "2",
            "nom" => "Joguines",
            "cicle" => "Disseny i Producció",
            "curs" => "1r DAM",
            "membres" => ["Carla", "Pere", "Maria", "Jordi"]
        ],
        [
            "codi" => "3",
            "nom" => "Esports",
            "cicle" => "Activitats Físiques i Esportives",
            "curs" => "1r DAW",
            "membres" => ["Sara", "David", "Clara", "Toni"]
        ],
        [
            "codi" => "4",
            "nom" => "Bellesa",
            "cicle" => "Imatge Personal",
            "curs" => "2n DAM",
            "membres" => ["Marta", "Àlex", "Júlia", "Víctor"]
        ]
    ];    


    #[Route('/seccio/{codi}', name:'dades_seccio')]
    public function seccio($codi) {

        $resultat = array_filter($this->seccions, function ($seccio) use ($codi) {
            return $seccio["codi"] == $codi;
        });

        if (!empty($resultat)) {
            $seccio = array_values($resultat)[0];
            
            $dadesSeccio = "
            <h1>Dades de la Secció</h1>
            <ul>
                <li><strong>Codi:</strong> {$seccio['codi']}</li>
                <li><strong>Nom:</strong> {$seccio['nom']}</li>
                <li><strong>Cicle:</strong> {$seccio['cicle']}</li>
                <li><strong>Curs:</strong> {$seccio['curs']}</li>
                <li><strong>Membres:</strong>
                    <ul>
                        " . implode("", array_map(fn($membre) => "<li>$membre</li>", $seccio['membres'])) . "
                    </ul>
                </li>
            </ul>
        ";

            return new Response($dadesSeccio);
        }

        return new Response("No s’ha trobat la secció: $codi");
    }
}
?>