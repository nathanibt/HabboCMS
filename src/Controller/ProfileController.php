<?php

namespace App\Controller;

use App\Entity\Rooms;
use App\Entity\MessengerFriendships;
use App\Repository\RoomsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProfileController extends AbstractController
{
    /**
     * @Route("/profile", name="app_profile")
     */
    public function index(EntityManagerInterface $entityManager, RoomsRepository $RoomsRepository): Response
    {
        $owner = $this->getUser();

        $roomsUsers = $entityManager->getRepository(Rooms::class)->findBy([
            'owner' => $owner
        ]); 

        $friendUsers = $entityManager->getRepository(MessengerFriendships::class)->findBy([
            'useroneid' => $owner,
        ]); 
        
        // dd($roomsUsers);
        
        
        return $this->render('profile/index.html.twig', [
            'controller_name' => 'ProfileController',
            'roomsUsers' => $roomsUsers,
            'friendUsers' => $friendUsers
        ]);
    }
}
