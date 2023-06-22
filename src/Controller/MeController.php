<?php

namespace App\Controller;

use App\Entity\Users;
use App\Entity\CmsEvenement;
use App\Entity\CmsActualites;
use App\Security\UsersAuthenticator;
use App\Repository\UsersRepository;
use App\Repository\CmsEvenementRepository;
use App\Repository\CmsActualitesRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MeController extends AbstractController
{
    /**
     * @Route("/me", name="app_me")
     */
    public function index(EntityManagerInterface $entityManager, CmsEvenementRepository $CmsEvenementRepository,  CmsActualitesRepository $CmsActualitesRepository): Response
    {
        $allEventFromBDD = $CmsEvenementRepository->findAll();
 
        $allNewsFromBDD = $CmsActualitesRepository->findBy([], ['createdAt' => 'DESC'], 3);

        return $this->render('me/index.html.twig', [
            'allEvents' => $allEventFromBDD,
            'allNews' => $allNewsFromBDD,
        ]);
    }

    /**
     * @Route("/news{id}", name="me_news")
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
