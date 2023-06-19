<?php

namespace App\Controller;

use App\Repository\UsersRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SecondaryStaffController extends AbstractController
{
    /**
     * @Route("/staff2", name="app_secondary_staff")
     */
    public function index(UsersRepository $UsersRepository): Response
    {

        $users = $UsersRepository->getUsersInfo();
        
        return $this->render('secondary_staff/index.html.twig', [
            'users' => $users,
        ]);
    }
}
