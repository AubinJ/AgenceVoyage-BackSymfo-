<?php

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class VoyageController extends AbstractController
{
    #[Route('/api/voyage', name: 'app_api_voyage')]
    public function index(): Response
    {
        return $this->render('api/voyage/index.html.twig', [
            'controller_name' => 'VoyageController',
        ]);
    }
}
