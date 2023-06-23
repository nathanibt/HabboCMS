<?php

namespace App\Controller\Backoffice;

use App\Entity\CmsMusique;
use App\Form\CmsMusiqueType;
use App\Repository\CmsMusiqueRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/backoffice/musique")
 */
class musiqueController extends AbstractController
{
    /**
     * @Route("/", name="app_backoffice_musique_index", methods={"GET"})
     */
    public function index(CmsMusiqueRepository $cmsMusiqueRepository): Response
    {
        return $this->render('backoffice/musique/index.html.twig', [
            'cms_musiques' => $cmsMusiqueRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_backoffice_musique_new", methods={"GET", "POST"})
     */
    public function new(Request $request, CmsMusiqueRepository $cmsMusiqueRepository): Response
    {
        $cmsMusique = new CmsMusique();
        $form = $this->createForm(CmsMusiqueType::class, $cmsMusique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $cmsMusiqueRepository->add($cmsMusique, true);

            return $this->redirectToRoute('app_backoffice_musique_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('backoffice/musique/new.html.twig', [
            'cms_musique' => $cmsMusique,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_backoffice_musique_show", methods={"GET"})
     */
    public function show(CmsMusique $cmsMusique): Response
    {
        return $this->render('backoffice/musique/show.html.twig', [
            'cms_musique' => $cmsMusique,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_backoffice_musique_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, CmsMusique $cmsMusique, CmsMusiqueRepository $cmsMusiqueRepository): Response
    {
        $form = $this->createForm(CmsMusiqueType::class, $cmsMusique);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $cmsMusiqueRepository->add($cmsMusique, true);

            return $this->redirectToRoute('app_backoffice_musique_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('backoffice/musique/edit.html.twig', [
            'cms_musique' => $cmsMusique,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_backoffice_musique_delete", methods={"POST"})
     */
    public function delete(Request $request, CmsMusique $cmsMusique, CmsMusiqueRepository $cmsMusiqueRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$cmsMusique->getId(), $request->request->get('_token'))) {
            $cmsMusiqueRepository->remove($cmsMusique, true);
        }

        return $this->redirectToRoute('app_backoffice_musique_index', [], Response::HTTP_SEE_OTHER);
    }
}
