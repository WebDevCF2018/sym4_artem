<?php

namespace App\Controller;

use App\Entity\Thepage;
use App\Form\ThepageType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/thepage")
 */
class ThepageController extends AbstractController
{
    /**
     * @Route("/", name="thepage_index", methods="GET")
     */
    public function index(): Response
    {
        $thepages = $this->getDoctrine()
            ->getRepository(Thepage::class)
            ->findAll();

        return $this->render('thepage/index.html.twig', ['thepages' => $thepages]);
    }

    /**
     * @Route("/new", name="thepage_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $thepage = new Thepage();
        $form = $this->createForm(ThepageType::class, $thepage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($thepage);
            $em->flush();

            return $this->redirectToRoute('thepage_index');
        }

        return $this->render('thepage/new.html.twig', [
            'thepage' => $thepage,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idthepage}", name="thepage_show", methods="GET")
     */
    public function show(Thepage $thepage): Response
    {
        return $this->render('thepage/show.html.twig', ['thepage' => $thepage]);
    }

    /**
     * @Route("/{idthepage}/edit", name="thepage_edit", methods="GET|POST")
     */
    public function edit(Request $request, Thepage $thepage): Response
    {
        $form = $this->createForm(ThepageType::class, $thepage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('thepage_edit', ['idthepage' => $thepage->getIdthepage()]);
        }

        return $this->render('thepage/edit.html.twig', [
            'thepage' => $thepage,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{idthepage}", name="thepage_delete", methods="DELETE")
     */
    public function delete(Request $request, Thepage $thepage): Response
    {
        if ($this->isCsrfTokenValid('delete'.$thepage->getIdthepage(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($thepage);
            $em->flush();
        }

        return $this->redirectToRoute('thepage_index');
    }
}
