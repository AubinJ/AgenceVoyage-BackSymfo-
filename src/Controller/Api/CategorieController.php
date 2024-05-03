<?php

namespace App\Controller\Api;

use App\Entity\AvCategorie;
use App\Repository\AvCategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Serializer\SerializerInterface;

#[Route('/api/categorie', name: 'api_categorie')]
class CategorieController extends AbstractController
{
    #[Route('s', name: 'index')]
    public function index(AvCategorieRepository $avCategorieRepository): JsonResponse
    {
        $categories = $avCategorieRepository->findAll();
        return $this->json($categories, context: ['groups'=>'api_categorie_index']);
    }

    #[Route('/new', name: "new", methods: ['POST'])]
    public function new(SerializerInterface $serializer, ValidatorInterface $validator, EntityManagerInterface $em, Request $request): JsonResponse
    {
    }


    #[Route('/{nom}', name: "show")]
    public function show(AvCategorie $categorie): JsonResponse
    {
        return $this->json($categorie, context: ['groups' => ['api_categorie_index', 'api_categorie_show']]);
    }

}
