<?php

namespace App\Controller\Backoffice;

use App\Entity\CmsActualites;
use App\Form\CmsActualites1Type;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\CmsActualitesRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/backoffice/news')]
class NewsController extends AbstractController
{
    #[Route('/', name: 'app_backoffice_news_index', methods: ['GET'])]
    public function index(CmsActualitesRepository $cmsActualitesRepository): Response
    {
        return $this->render('backoffice/news/index.html.twig', [
            'cms_actualites' => $cmsActualitesRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_backoffice_news_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $cmsActualite = new CmsActualites();
        $form = $this->createForm(CmsActualites1Type::class, $cmsActualite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($cmsActualite);
            $entityManager->flush();

            return $this->redirectToRoute('app_backoffice_news_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('backoffice/news/new.html.twig', [
            'cms_actualite' => $cmsActualite,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_backoffice_news_show', methods: ['GET'])]
    public function show(CmsActualites $cmsActualite): Response
    {
        return $this->render('backoffice/news/show.html.twig', [
            'cms_actualite' => $cmsActualite,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_backoffice_news_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, CmsActualites $cmsActualite, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CmsActualites1Type::class, $cmsActualite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_backoffice_news_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('backoffice/news/edit.html.twig', [
            'cms_actualite' => $cmsActualite,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_backoffice_news_delete', methods: ['POST'])]
    public function delete(Request $request, CmsActualites $cmsActualite, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cmsActualite->getId(), $request->request->get('_token'))) {
            $entityManager->remove($cmsActualite);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_backoffice_news_index', [], Response::HTTP_SEE_OTHER);
    }
}
