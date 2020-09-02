<?php

namespace App\Controller;

use App\Entity\Book;
use App\Entity\Genre;
use App\Form\BookType;
use App\Form\GenreType;
use App\Repository\BookRepository;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    /**
     * @Route("/book/new", name="newBook", methods={"GET"})
     */
    public function create()
    {
        $form = $this->createForm(BookType::class);

        return $this->render('book/create.html.twig', [
            'title' => "Création d'un livre",
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/book/new", name="newBookCallBack", methods={"POST"})
     */
    public function createCallBack(Request $request)
    {
        $book = new Book();
        $form = $this->createForm(BookType::class, $book);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $book = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($book);
            $em->flush();

            return $this->redirectToRoute('books');
        }


        return $this->render('book/create.html.twig', [
            'form' => $form->createView()
        ]);
    }


    /**
     * @Route("/book/{id}/edit", name="editBook", methods={"GET"})
     */
    public function edit(Book $book)
    {
        $form = $this->createForm(BookType::class, $book);

        return $this->render('book/create.html.twig', [
            'title' => "Modification d'un livre",
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/book/{id}/edit", name="editBookCallBack", methods={"POST"})
     */
    public function editCallBack(Request $request, Book $book)
    {
        $form = $this->createForm(BookType::class, $book);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $book = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($book);
            $em->flush();

            return $this->redirectToRoute('books');
        }


        return $this->render('book/create.html.twig', [
            'title' => "Modification d'un livre",
            'form' => $form->createView()
        ]);
    }


    /**
     * @Route("/genre/new", name="newGenre", methods={"GET"})
     */
    public function createGenre()
    {
        $form = $this->createForm(GenreType::class);

        return $this->render('book/createGenre.html.twig', [
            'form' => $form->createView()
        ]);
    }

    /**
     * @Route("/genre/new", name="newGenreCallBack", methods={"POST"})
     */
    public function createGenreCallBack(Request $request)
    {
        $genre = new Genre();
        $form = $this->createForm(GenreType::class, $genre);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $book = $form->getData();

            $em = $this->getDoctrine()->getManager();
            $em->persist($genre);
            $em->flush();

            return $this->redirectToRoute('books');
        }


        return $this->render('book/createGenre.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
