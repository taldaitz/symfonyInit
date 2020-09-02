<?php

namespace App\Controller;

use App\Entity\Article;
use App\Entity\Auteur;
use App\Repository\ArticleRepository;
use DateTime;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArticleController extends AbstractController
{
    /**
     * @Route("/accueil", name="accueil")
     */
    public function accueil()
    {
        return $this->render('article/accueil.html.twig');
    }

    /**
     * @Route("/articles", name="articles")
     */
    public function list(ArticleRepository $articleRepository)
    {
        $articles = $articleRepository->findAllPublished();

        return $this->render('article/articles.html.twig', [
            'title' => 'les Articles',
            'articles' => $articles
        ]);
    }

    /**
     * @Route("/inscription/{nom}/{prenom}/{ville}/{age}", name="inscription")
     */
    public function inscription($nom, $prenom, $ville, $age)
    {
        return $this->render('article/inscription.html.twig', [
            'title' => 'Inscription',
            'nom' => $nom,
            'prenom' => $prenom,
            'ville' => $ville,
            'age' => $age,
        ]);
    }

    /**
     * @Route("/Article/populate", name="ArticlePopulate")
     */
    public function populate()
    {
        $author1 = new Auteur();
        $author2 = new Auteur();

        $author1->setLastname("Aldaitz")->setFirstname("Thomas");
        $author2->setLastname("Test")->setFirstname("Jean");


        $article1 = new Article();
        $article1->setTitle("Les chats")
            ->setDate(new DateTime('2020-04-01'))
            ->setStatus('publié')
            ->setWriter($author1)
            ->setContent("Le Chat domestique (Felis silvestris catus) est la sous-espèce issue de la domestication du Chat sauvage, mammifère carnivore de la famille des Félidés.
                 Il est l’un des principaux animaux de compagnie et compte aujourd’hui une cinquantaine de races différentes reconnues par les instances de certification. Dans de très nombreux pays, le chat entre dans le cadre de la législation sur les carnivores domestiques à l’instar du chien et du furet. Essentiellement territorial, le chat est un prédateur de petites proies comme les rongeurs ou les oiseaux. Les chats ont diverses vocalisations dont les ronronnements, les miaulements, les feulements ou les grognements, bien qu’ils communiquent principalement par des positions faciales et corporelles et des phéromones."
                );

        $article2 = new Article();
        $article2->setTitle("Les chiens")
            ->setDate(new DateTime('2020-02-12'))
            ->setStatus('publié')
            ->setWriter($author2)
            ->setContent("
            Le Chien (Canis lupus familiaris) est la sous-espèce domestique de Canis lupus, un mammifère de la famille des Canidés (Canidae), laquelle comprend également le Loup gris et le dingo, chien domestique retourné à l'état sauvage.
            Le Loup est la première espèce animale à avoir été domestiquée par l'Homme pour l'usage de la chasse dans une société humaine paléolithique qui ne maîtrise alors ni l'agriculture ni l'élevage. La lignée du chien s'est différenciée génétiquement de celle du Loup gris il y a environ 100 000 ans1, et les plus anciens restes confirmés de canidé différencié de la lignée du Loup sont vieux, selon les sources, de 33 000 ans2,3 ou de 12 000 ans4 ; le boeuf5 (voir Domestication de Bos taurus) et la chèvre seront domestiquées vers −10 000. Depuis la Préhistoire, le chien a accompagné l'être humain durant toute sa phase de sédentarisation, marquée par l'apparition des premières civilisations agricoles. C'est à ce moment qu'il a acquis la capacité de digérer l'amidon6, et que ses fonctions d'auxiliaire d'Homo sapiens se sont étendues. Ces nouvelles fonctions ont entraîné une différenciation accrue de la sous-espèce et l'apparition progressive de races canines identifiables. Le chien est aujourd'hui utilisé à la fois comme animal de travail et comme animal de compagnie. Son instinct de meute, sa domestication précoce et les caractéristiques comportementales qui en découlent lui valent familièrement le surnom de « meilleur ami de l'Homme »7.
                    ");

        $article3 = new Article();
        $article3->setTitle("Les araignées")
            ->setStatus('en cours de rédaction')
            ->setDate(new DateTime('2020-01-17'))
            ->setWriter($author1)
            ->setContent("
            Les araignées ou Aranéides (ordre des Araneae de la classe des Arachnides, à laquelle il a donné son nom) sont des prédateurs invertébrés arthropodes. Comme tous les chélicérates, leur corps est divisé en deux tagmes, le prosome ou céphalothorax (partie antérieure dépourvue de mandibules et d'antennes, dotée de huit pattes) et l’opisthosome ou abdomen qui porte à l'arrière des filières. Elles sécrètent par ces appendices de la soie qui sert à produire le fil qui leur permet de se déplacer, de tisser leur toile ou des cocons emprisonnant leurs proies ou protégeant leurs œufs ou petits, voire de faire une réserve provisoire de sperme ou un dôme leur permettant de stocker de l’air sous l’eau douce. Contrairement aux insectes, elles ne disposent ni d'ailes ni d'antennes ni de pièces masticatrices dans la bouche. Elles possèdent en général six à huit yeux qui peuvent être simples ou multiples. 
            ");

        
        $em = $this->getDoctrine()->getManager();
        $em->persist($author1);
        $em->persist($author2);
        $em->persist($article1);
        $em->persist($article2);
        $em->persist($article3);

        $em->flush();

        return new Response("Données créées.");
    }
}
