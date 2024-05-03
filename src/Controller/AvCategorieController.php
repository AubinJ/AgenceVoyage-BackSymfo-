<?php

namespace App\Controller;

use App\Entity\AvCategorie;
use App\Form\AvCategorieType;
use App\Repository\AvCategorieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/categorie')]
class AvCategorieController extends AbstractController
{
    #[Route('/', name: 'app_av_categorie_index', methods: ['GET'])]
    public function index(AvCategorieRepository $avCategorieRepository): Response
    {
        return $this->render('av_categorie/index.html.twig', [
            'av_categories' => $avCategorieRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_av_categorie_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $avCategorie = new AvCategorie();
        $form = $this->createForm(AvCategorieType::class, $avCategorie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($avCategorie);
            $entityManager->flush();

            return $this->redirectToRoute('app_av_categorie_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('av_categorie/new.html.twig', [
            'av_categorie' => $avCategorie,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_av_categorie_show', methods: ['GET'])]
    public function show(AvCategorie $avCategorie): Response
    {
        return $this->render('av_categorie/show.html.twig', [
            'av_categorie' => $avCategorie,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_av_categorie_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, AvCategorie $avCategorie, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AvCategorieType::class, $avCategorie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_av_categorie_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('av_categorie/edit.html.twig', [
            'av_categorie' => $avCategorie,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_av_categorie_delete', methods: ['POST'])]
    public function delete(Request $request, AvCategorie $avCategorie, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$avCategorie->getId(), $request->getPayload()->get('_token'))) {
            $entityManager->remove($avCategorie);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_av_categorie_index', [], Response::HTTP_SEE_OTHER);
    }
}
