<?php

namespace App\Controller;

use App\Entity\Users;
use App\Entity\CmsMusique;
use App\Entity\CmsEvenement;
use App\Entity\CmsActualites;
use App\Repository\RoomsRepository;
use App\Repository\UsersRepository;
use App\Security\UsersAuthenticator;
use App\Repository\CmsMusiqueRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\CmsEvenementRepository;
use App\Repository\CmsActualitesRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class MeController extends AbstractController
{
    /**
     * @Route("/me", name="app_me")
     */
    public function index(EntityManagerInterface $entityManager, CmsEvenementRepository $CmsEvenementRepository,  CmsActualitesRepository $CmsActualitesRepository, CmsMusiqueRepository $CmsMusiqueRepository, UsersRepository $UsersRepository): Response
    {
        $user = $this->getUser();

        $users = $UsersRepository->getUsersInfo();

        $allEventFromBDD = $CmsEvenementRepository->findAll();

        $allMusiqueFromBDD = $CmsMusiqueRepository->findAll();
 
        $allNewsFromBDD = $CmsActualitesRepository->findBy([], ['id' => 'ASC'], 1);


       
        return $this->render('me/index.html.twig', [
            'allEvents' => $allEventFromBDD,
            'allMusique' => $allMusiqueFromBDD,
            'allNews' => $allNewsFromBDD,
            'users' => $users,
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
