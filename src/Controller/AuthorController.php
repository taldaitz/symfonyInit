<?php

namespace App\Controller;

use App\Entity\Auteur;
use App\Repository\AuteurRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AuthorController extends AbstractController
{
    /**
     * @Route("/author", name="author")
     */
    public function index()
    {
        return $this->render('author/index.html.twig', [
            'controller_name' => 'AuthorController',
        ]);
    }

    /**
     * @Route("/author/{id}", name="authorPage")
     */
    public function show(Auteur $author)
    {
        return $this->render('author/show.html.twig', [
            'author' => $author,
            'title' => $author->getFirstname() . ' ' . $author->getLastname(),
        ]);
    }
}
