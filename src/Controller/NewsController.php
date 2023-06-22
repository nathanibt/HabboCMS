<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use App\Entity\CmsActualites;
use App\Repository\CmsActualitesRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class NewsController extends AbstractController
{
    /**
     * @Route("/news", name="app_news")
     */
    public function index(EntityManagerInterface $entityManager,  CmsActualitesRepository $CmsActualitesRepository): Response
    {
 
        $allNewsFromBDD = $CmsActualitesRepository->findAll();

        return $this->render('news/index.html.twig', [
            'allNews' => $allNewsFromBDD,
        ]);
    }
     /**
     * @Route("/news{id}", name="show_news")
     */
    public function showNews($id)
{
    $CmsActualitesRepository = $this->getDoctrine()->getRepository(CmsActualites::class);
    $news = $CmsActualitesRepository->find($id);
    

    if (!$news) {
        throw $this->createNotFoundException('News not found');
    }

    return $this->render('news/show.html.twig', [
        'news' => $news,
    ]);
}
}
