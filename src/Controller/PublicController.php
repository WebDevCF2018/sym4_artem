<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Thepage;
use App\Entity\Thesection;

class PublicController extends AbstractController
{
    /**
     *
     * Matches / exactly to view homepage
     *
     * @Route("/", name="accueil")
     */
    public function index()
    {
        // get Doctrine Manager for all entities
        $entityManager = $this->getDoctrine()->getManager();

        // get all sections in db for menu
        $rub = $entityManager->getRepository(Thesection::class)->findAll();

        // get all articles from db ORDER BY idarticles DESC
        $page = $entityManager->getRepository(Thepage::class)->findBy([],["idthepage"=>"DESC"]);

        return $this->render('public/index.html.twig', [
            'section' => $rub,
             'page' => $page,
        ]);
    }
    /**
     *
     * Matches /article/{id},
     * {id} is a requirement digit: "\d+" for more security
     * to view an article's detail
     *
     * @Route("/page/{id}", name="detail_page", requirements={"id"="\d+"})
     */
    public function onePage($id){
        // get Doctrine Manager for all entities
        $entityManager = $this->getDoctrine()->getManager();

        // get all sections in db for menu
        $rub = $entityManager->getRepository(Thesection::class)->findAll();

        // get one article by its "id" from db
        $page = $entityManager->getRepository(Thepage::class)->find($id);

        // return the Twig's view with 2 arguments
        return $this->render('public/one_article.html.twig', [
            'section' => $rub,
            'page' => $page,
        ]);
    }
    /**
     *
     * Matches /section/{id},
     * {id} is a requirement digit: "\d+" for more security
     * to view an section's detail
     *
     * @Route("/section/{id}", name="detail_section", requirements={"id"="\d+"})
     */
    public function oneSection($id){
        // get Doctrine Manager for all entities
        $entityManager = $this->getDoctrine()->getManager();

        // get all sections in db for menu
        $rub = $entityManager->getRepository(Thesection::class)->findAll();

        // get one section by its "id" from db
        $section = $entityManager->getRepository(Thesection::class)->find($id);

        // get all articles by one section, it's the easy way, you can use ORDER BY into sections.php entity, views annotation before private $articlesarticles;
        $page = $section->getThepagethepage();



        // return the Twig's view with 2 arguments
        return $this->render('public/one_section.html.twig', [
            'sections' => $rub,
            'section' => $section,
            'page' => $page,
        ]);
    }

}
