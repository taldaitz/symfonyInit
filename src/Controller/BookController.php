<?php

namespace App\Controller;

use App\Entity\Book;
use App\Repository\BookRepository;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BookController extends AbstractController
{
    /**
     * @Route("/book", name="book")
     */
    public function index()
    {
        return $this->render('book/index.html.twig', [
            'controller_name' => 'BookController',
        ]);
    }

    /**
     * @Route("/library/books", name="books")
     */
    public function books(BookRepository $bookRepository)
    {
        $books = $bookRepository->findAll();

        return $this->render('book/index.html.twig', [
            'books' => $books
        ]);
    }

    /**
     * @Route("/library/populate", name="booksPopulate")
     */
    public function populate(BookRepository $bookRepository)
    {
        $em = $this->getDoctrine()->getManager();

        $books = $bookRepository->findAll();
        foreach($books as $book) {
            $em->remove($book);
        }
        $em->flush();


        $book1 = new Book();
        $book2 = new Book();
        $book3 = new Book();

        $book1->setTitle("Jungle book")->setPublicationDate(new DateTime('1990-01-01'))->setPageNb(300)->setEditor('Folio');
        $book2->setTitle("Les Misérables")->setPublicationDate(new DateTime('1992-04-01'))->setPageNb(800)->setEditor('Flammarion');
        $book3->setTitle("Le seigneur des anneaux")->setPublicationDate(new DateTime('1970-08-07'))->setPageNb(600)->setEditor('Hachette');

        
        $em->persist($book1);
        $em->persist($book2);
        $em->persist($book3);

        $em->flush();

        return $this->redirectToRoute('books');
    }
}
