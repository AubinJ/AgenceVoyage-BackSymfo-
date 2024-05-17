<?php

namespace App\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ImageController extends AbstractController
{
    #[Route('/api/image', name: 'app_api_image')]
    public function index(): Response
    {
        return $this->render('api/image/index.html.twig', [
            'controller_name' => 'ImageController',
        ]);
    }
}
