<?php

namespace App\Controller;

use App\Entity\Fotw;
use App\Form\FotwType;
use App\Repository\FotwRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FotwController extends AbstractController
{
    /**
     * @Route("/admin/fotw", name="fotw_index", methods={"GET"})
     */
    public function index(FotwRepository $fotwRepository): Response
    {
        return $this->render('fotw/index.html.twig', [
            'fotws' => $fotwRepository->findAll(),
        ]);
    }

    /**
     * @Route("/admin/fotw/new", name="fotw_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $fotw = new Fotw();
        $form = $this->createForm(FotwType::class, $fotw);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($fotw);
            $entityManager->flush();

            return $this->redirectToRoute('fotw_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('fotw/new.html.twig', [
            'fotw' => $fotw,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/fotw/show", name="fotw_show", methods={"GET"})
     */
    public function show(FotwRepository $fotwRepository): Response
    {
        $fotw = $fotwRepository->findLatest();
        $article = $fotw->getArticle();
        $ytUrl = ["", ""];

        if ($article->getVideos()[0]) {
            $url = $article->getVideos()[0]->getUrl();
            $ytUrl = explode('=', $url, 2);
        }

        return $this->render('fotw/show.html.twig', [
            'fotw' => $fotw,
            'ytUrl' => $ytUrl[1],
        ]);
    }

    /**
     * @Route("/admin/fotw/{id}/edit", name="fotw_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Fotw $fotw): Response
    {
        $form = $this->createForm(FotwType::class, $fotw);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('fotw_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('fotw/edit.html.twig', [
            'fotw' => $fotw,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/admin/fotw/{id}", name="fotw_delete", methods={"POST"})
     */
    public function delete(Request $request, Fotw $fotw): Response
    {
        if ($this->isCsrfTokenValid('delete'.$fotw->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($fotw);
            $entityManager->flush();
        }

        return $this->redirectToRoute('fotw_index', [], Response::HTTP_SEE_OTHER);
    }
}
