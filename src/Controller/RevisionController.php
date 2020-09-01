<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class RevisionController extends AbstractController
{
    /**
     * @Route("/revision", name="revision")
     */
    public function index()
    {
        return $this->render('revision/index.html.twig', [
            'controller_name' => 'RevisionController',
        ]);
    }

    /**
     * @Route("/revision01", name="revision01")
     */
    public function revision01()
    {
        return new Response("1ère révision");
    }


    /**
     * @Route("/revParam/{variable}", name="revParam")
     */
    public function revParam($variable)
    {
        return new Response("la variable saisie est $variable");
    }

    /**
     * @Route("/revMardi/", name="revMardi")
     */
    public function revMardi()
    {
        return $this->render('revision/mardi.html.twig', [
            'title' => 'Révision du Mardi'
        ]);
    }
}
