<?php

namespace App\Controller;


use App\Repository\UsersRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class StaffController extends AbstractController
{
    /**
     * @Route("/staff", name="app_staff")
     */
    public function index(UsersRepository $UsersRepository): Response
    {

        $users = $UsersRepository->getUsersInfo();
        
        return $this->render('staff/index.html.twig', [
            'users' => $users,
        ]);
    }
}
