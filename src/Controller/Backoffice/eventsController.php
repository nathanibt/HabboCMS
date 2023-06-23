<?php

namespace App\Controller\Backoffice;

use App\Entity\CmsEvenement;
use App\Form\CmsEvenementType;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\CmsEvenementRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

#[Route('/backoffice/events')]
class eventsController extends AbstractController
{
    #[Route('/', name: 'app_backoffice_events_index', methods: ['GET'])]
    public function index(CmsEvenementRepository $cmsEvenementRepository): Response
    {
        return $this->render('backoffice/events/index.html.twig', [
            'cms_evenements' => $cmsEvenementRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_backoffice_events_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $cmsEvenement = new CmsEvenement();
        $form = $this->createForm(CmsEvenementType::class, $cmsEvenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($cmsEvenement);
            $entityManager->flush();

            return $this->redirectToRoute('app_backoffice_events_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('backoffice/events/new.html.twig', [
            'cms_evenement' => $cmsEvenement,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_backoffice_events_show', methods: ['GET'])]
    public function show(CmsEvenement $cmsEvenement): Response
    {
        return $this->render('backoffice/events/show.html.twig', [
            'cms_evenement' => $cmsEvenement,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_backoffice_events_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, CmsEvenement $cmsEvenement, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(CmsEvenementType::class, $cmsEvenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_backoffice_events_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('backoffice/events/edit.html.twig', [
            'cms_evenement' => $cmsEvenement,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_backoffice_events_delete', methods: ['POST'])]
    public function delete(Request $request, CmsEvenement $cmsEvenement, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cmsEvenement->getId(), $request->request->get('_token'))) {
            $entityManager->remove($cmsEvenement);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_backoffice_events_index', [], Response::HTTP_SEE_OTHER);
    }
}
