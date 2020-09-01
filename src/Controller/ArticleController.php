<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
    public function list()
    {
        $articles = [
             ['articleTitle'=> 'Titre 1',
                'articleDate' => '01/09/2020',
                'articleContent' => 'Cillum qui culpa ad est deserunt quis ad. Minim irure proident eiusmod tempor ut consectetur dolore aliquip tempor nostrud magna incididunt. Commodo est culpa nisi excepteur tempor deserunt velit incididunt eiusmod. Sunt est ad sit sit ut cupidatat sunt voluptate pariatur nisi. Officia eiusmod voluptate est eiusmod consectetur in cillum do commodo exercitation occaecat cillum.
Dolore officia amet cillum veniam elit irure deserunt occaecat nostrud eiusmod aliqua velit consequat. Sint dolore ea aliqua sit velit eiusmod ullamco exercitation nulla. Magna labore veniam mollit non duis. Et duis est officia anim deserunt elit laborum esse est tempor. Ex reprehenderit incididunt dolor esse fugiat voluptate do laboris id cupidatat. Commodo sint dolor fugiat adipisicing est. Culpa quis esse laboris esse anim eiusmod.
Est amet ipsum magna ea in laboris consectetur nostrud sint ullamco sit Lorem sit amet. Ullamco veniam occaecat magna fugiat aute in eu in ullamco. Ut laborum esse et id aliquip in magna laboris. Ullamco excepteur veniam quis adipisicing elit occaecat ipsum aliquip eu magna ex ex. Non Lorem nisi nostrud in exercitation. Id excepteur voluptate excepteur do culpa sunt consectetur aute.
Mollit dolor irure duis sunt magna sunt veniam labore ea mollit minim. Minim voluptate voluptate dolore tempor nisi reprehenderit cupidatat. Magna eiusmod commodo amet ipsum dolor. Proident officia aliqua ex eiusmod. Cillum ex pariatur velit nulla. Ea quis ut labore est consequat veniam aliqua aliquip ad.
                                                '
            ],

            ['articleTitle'=> 'Titre 2',
                'articleDate' => '12/08/2020',
                'articleContent' => 'Ex anim laborum veniam ea cupidatat mollit laboris ad elit magna ex et est. Officia in incididunt sit Lorem fugiat et proident ad. Nisi velit laboris amet excepteur in Lorem quis cupidatat duis cillum velit ea. Consectetur laboris Lorem et elit non exercitation eu sint nisi. Velit exercitation nulla incididunt cupidatat tempor ad. Adipisicing nostrud eiusmod velit eiusmod qui sunt incididunt et culpa et laboris.

Eu incididunt culpa fugiat non laborum voluptate commodo enim fugiat magna amet. Pariatur nostrud reprehenderit commodo qui in consequat aute sit enim. Laborum voluptate id amet minim sit sunt enim. Qui excepteur sunt dolore cillum. Reprehenderit nostrud adipisicing duis enim. Quis excepteur nisi nulla fugiat minim.

Mollit id incididunt ad esse laboris duis sunt veniam ea laborum eu. Nulla sit pariatur ipsum dolor voluptate elit ullamco cillum cupidatat voluptate. Ipsum ad nulla aliqua enim deserunt. Culpa enim non ea Lorem laborum tempor excepteur consequat aliqua tempor do.'
            ],

            ['articleTitle'=> 'Titre 3',
                'articleDate' => '14/07/2020',
                'articleContent' => 'Laborum occaecat labore consequat do proident adipisicing ut eiusmod ea ad in. Dolor dolor magna laboris anim irure Lorem eiusmod. Quis irure consectetur quis esse irure fugiat est duis adipisicing nisi adipisicing nisi. Ipsum pariatur quis ullamco ut voluptate Lorem anim officia reprehenderit cillum ex nisi dolor sint. Cupidatat anim exercitation quis ullamco excepteur fugiat exercitation cupidatat ea.

Minim eu in ea excepteur consequat nisi labore enim sint quis occaecat. Culpa esse ullamco officia consequat dolor laborum commodo Lorem minim sint proident. Veniam laborum nulla cillum incididunt velit pariatur. Duis quis dolore nulla veniam qui labore minim aute. Deserunt veniam est officia sint mollit Lorem ea excepteur ut sunt ad. Reprehenderit id laborum laboris incididunt quis proident ullamco ea velit cupidatat dolor. Exercitation laborum veniam ad ipsum Lorem cupidatat id aliquip aute ex excepteur labore ipsum labore.

Esse commodo pariatur nisi velit eiusmod quis ipsum deserunt proident enim aliquip ipsum. Culpa officia Lorem pariatur anim elit. Ullamco ex quis commodo deserunt irure dolor ullamco cillum. Ullamco officia proident aliquip pariatur aliqua occaecat nostrud dolor aliqua eu sunt anim. Magna sint Lorem deserunt do officia ut cillum id ipsum amet.

Non magna et sint velit veniam anim mollit ut culpa excepteur officia do est. Do velit sit eiusmod qui. Cupidatat dolore aliqua eiusmod sint aliqua incididunt dolore sit laboris commodo occaecat dolor laborum qui. Consectetur esse in adipisicing eu aliquip qui do ea non culpa. Ullamco ullamco cupidatat ullamco irure dolore proident commodo est. Quis do commodo ea sunt non in incididunt.'
            ],
        ];
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
}
