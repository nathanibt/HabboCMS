<?php

namespace App\Controller;

use App\Entity\Users;
use App\Entity\CmsEvenement;
use App\Entity\CmsNews;
use App\Security\UsersAuthenticator;
use App\Repository\CmsNewsRepository;
use App\Repository\UsersRepository;
use App\Repository\CmsEvenementRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MeController extends AbstractController
{
    /**
     * @Route("/me", name="app_me")
     */
    public function index(EntityManagerInterface $entityManager, CmsEvenementRepository $CmsEvenementRepository, CmsNewsRepository $CmsNewsRepository): Response
    {
        $allEventFromBDD = $CmsEvenementRepository->findAll();
 
        $allNewsFromBDD = $CmsNewsRepository->findAll();

        return $this->render('me/index.html.twig', [
            'allEvents' => $allEventFromBDD,
            'allNews' => $allNewsFromBDD,
        ]);
    }
}
