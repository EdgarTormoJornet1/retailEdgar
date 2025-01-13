<?php
namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Psr\Log\LoggerInterface;
use App\Service\ServeiDadesSeccio;

class IniciController extends AbstractController{

    private $logger;
    private $seccions;
    public function __construct(ServeiDadesSeccio $dadesSeccions, LoggerInterface $logger) {
        $this->seccions = $dadesSeccions->get();
        $this->logger = $logger;
    } 

    #[Route('/' ,name:'inici')]
    public function inici() {
        $data_hora = new \DateTime();
        $this->logger->info("Accés el " .$data_hora->format("d/m/y H:i:s"));
        //return new Response("Projecte Gestió Retail de 2n de DAW");




        return $this->render('base.html.twig', ['seccions' => $this->seccions]);
    }
}
?>