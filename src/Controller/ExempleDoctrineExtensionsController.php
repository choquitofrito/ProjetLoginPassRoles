<?php

namespace App\Controller;

use App\Entity\Concours;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ExempleDoctrineExtensionsController extends AbstractController
{
    /**
     * @Route("/exemple/doctrine/extensions", name="exemple_doctrine_extensions")
     */
    public function index()
    {

        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery("SELECT MONTH(c.dateConcours) AS mois, YEAR(c.dateConcours) AS annee FROM App\Entity\Concours c");

        $listeCouncours = $query->getResult();
        return new Response(
            "Voici le mois et l'année d'une date obtenue en DQL : " 
                .$listeCouncours[0]['mois'] . "/" . $listeCouncours[0]['annee']);
        
    }
}
