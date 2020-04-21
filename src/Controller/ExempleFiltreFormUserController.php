<?php

namespace App\Controller;

use App\Entity\Inscription;
use App\Form\InscriptionFiltreType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ExempleFiltreFormUserController extends AbstractController
{
    /**
     * @Route("/exemple/filtre/form/user", name="exemple_filtre_form_user")
     */
    public function exempleFiltreFormUser(Request $request)
    {
        // On utilise l'array options pour envoyer l'User       
        $inscription = new Inscription(); 
        // La date est créé dans le constructeur de l'entité

        $form = $this->createForm(InscriptionFiltreType::class, $inscription, ['user'=>$this->getUser()]);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {            
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($inscription);
            $entityManager->flush();
            return $this->render('exemple_filtre_form_user/enregistrement_succes.html.twig');
        }
        return $this->render('exemple_filtre_form_user/affichage.html.twig',['form'=> $form->createView()]);
    }
}
