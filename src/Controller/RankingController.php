<?php

namespace App\Controller;

use App\Repository\UsersRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class RankingController extends AbstractController
{
    /**
     * @Route("/classement", name="app_ranking")
     */
    public function index(UsersRepository $usersRepository): Response
    {
        $userExperiences = $usersRepository->createQueryBuilder('u')
        ->select('u.id, u.username, u.look, u.credits')
        ->where('u.rank <= 2')
        ->orderBy('u.credits', 'DESC')
        ->setMaxResults(10)
        ->getQuery()
        ->getResult();

  

        $userPoints = $usersRepository->createQueryBuilder('u')
        ->select('u.id, u.username, u.look, u.credits')
        ->orderBy('u.credits', 'DESC')
        ->setMaxResults(10)
        ->getQuery()
        ->getResult();

       


    return $this->render('ranking/index.html.twig', [
        'userExperiences' => $userExperiences,
        'userPoints' => $userPoints,
        'controller_name' => 'RankingController'
    ]);
}
}
