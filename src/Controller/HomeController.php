<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/home", name="home")
     */
    public function index()
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
        ]);
    }

    /**
     * @Route("/toto", name="toto")
     */
    public function toto()
    {
        return new Response("Toto");
    }

    /**
     * @Route("/bonjour/{prenom?Default}", name="bonjour")
     */
    public function bonjour($prenom)
    {
        return new Response("Bonjour $prenom !");
    }

    /**
     * @Route("/carre/{chiffre<\d+>}", name="carre")
     */
    public function carre($chiffre)
    {
        return new Response("carre est égal à " . $chiffre * $chiffre);
    }

    /**
     * @Route("/test", name="test")
     */
    public function test(Request $request)
    {
        return new Response();
    }
}
