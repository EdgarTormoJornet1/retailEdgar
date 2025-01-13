<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Service\ServeiDadesSeccio;

class SeccioController extends AbstractController {

    private $seccions;
    public function __construct(ServeiDadesSeccio $dadesSeccions) {
        $this->seccions = $dadesSeccions->get();
    }
    

    #[Route('/seccio/{codi}', name:'dades_seccio')]
    public function seccio($codi) {

        $resultat = array_filter($this->seccions, function ($seccio) use ($codi) {
            return $seccio["codi"] == $codi;
        });

        if (!empty($resultat)) {
            $seccio = array_values($resultat)[0];
            
            return $this->render('seccio/dades_seccio.html.twig', [
                'seccio' => $seccio
            ]);
          /*  
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
        "; */

        }

        return $this->render('seccio/error_seccio.html.twig', [
            'codi' => $codi
        ]);
    }
}
?>