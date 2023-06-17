<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SettingsController extends AbstractController
{
    /**
     * @Route("/settings", name="app_settings")
     */
    public function index(): Response
    {
        return $this->render('settings/general.html.twig', [
            'controller_name' => 'SettingsController',
        ]);
    }

        /**
     * @Route("/settings-password", name="app_settings_password")
     */
    public function indexPassword(): Response
    {
        return $this->render('settings/password.html.twig', [
            'controller_name' => 'SettingsController',
        ]);
    }
}
