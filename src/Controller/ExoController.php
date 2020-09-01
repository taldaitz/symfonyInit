<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ExoController extends AbstractController
{
    /**
     * @Route("/exo", name="exo")
     */
    public function index()
    {
        return $this->render('exo/index.html.twig', [
            'controller_name' => 'ExoController',
        ]);
    }

    /**
     * @Route("/exo1", name="exo1")
     */
    public function exo1()
    {
        return new Response("1er exercice terminé");
    }

    /**
     * @Route("/exo2/{year<\d+>}", name="exo2", requirements={"year": "1980|1985|1988"})
     */
    public function exo2($year)
    {
        return new Response('Vous avez ' . (2020 - $year) . ' ans');
    }

    /**
     * @Route("/compose/{number1<\d+>}/{number2<\d+>}", name="composeNumbers")
     */
    public function composeNumbers($number1, $number2)
    {
        return new Response($number1 + $number2);
    }

    /**
     * @Route("/compose/{word1}/{word2}", name="composeWords")
     */
    public function composeWords($word1, $word2)
    {
        return new Response("$word1 et $word2");
    }

    /**
     * @Route("/Bernard-Bianca", name="BandB")
     */
    public function BandB()
    {
        return $this->redirectToRoute('composeWords', [
                                    "word1" => "Bernard",
                                    "word2" => "Bianca"
                                ]);
    }

    /**
     * @Route("/message/bidon", name="bidon")
     */
    public function bidon()
    {
        throw $this->createNotFoundException("Pas de page bidon ici!");
    }


    /**
     * @Route("/recupParam", name="recupParam")
     */
    public function recupParam(Request $request) : Response
    {
        //$nom = $request->query->get('nom');
        $nom = $request->get('nom');
        return new Response("J'ai récupéré le nom $nom.");
    }

    

}
