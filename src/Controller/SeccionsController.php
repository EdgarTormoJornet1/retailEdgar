<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Psr\Log\LoggerInterface;
use App\Service\ServeiDadesSeccio;

class SeccionsController extends AbstractController{

    private $logger;
    private $seccions;
    public function __construct(ServeiDadesSeccio $dadesSeccions) {
        $this->seccions = $dadesSeccions->get();
    } 

    #[Route('/seccions' ,name:'seccions')]
    public function seccions() {
        return $this->render('seccions.html.twig', ['seccions' => $this->seccions]);
    }
}
?>