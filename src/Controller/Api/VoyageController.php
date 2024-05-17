<?php

namespace App\Controller\Api;

use App\Repository\AvVoyageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class VoyageController extends AbstractController
{
    #[Route('/api/voyage', name: 'app_api_voyage', methods:["GET"])]
    public function allVoyage(AvVoyageRepository $avVoyageRepository): Response
    {

        $voyage = $avVoyageRepository->findAll();

        return $this->json(['voyage' => $voyage], 200, context: ['groups' => 'api_trips_show']);
    }
}
