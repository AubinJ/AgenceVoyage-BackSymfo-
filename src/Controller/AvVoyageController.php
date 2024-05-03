<?php

namespace App\Controller;

use App\Entity\AvVoyage;
use App\Form\AvVoyageType;
use App\Repository\AvVoyageRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/voyage', name: "app_voyage_")]
class AvVoyageController extends AbstractController
{
    #[Route('', name: 'index', methods: ['GET'])]
    public function index(AvVoyageRepository $avVoyageRepository): Response
    {
        return $this->render('av_voyage/index.html.twig', [
            'av_voyages' => $avVoyageRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $avVoyage = new AvVoyage();
        $form = $this->createForm(AvVoyageType::class, $avVoyage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($avVoyage);
            $entityManager->flush();

            return $this->redirectToRoute('app_av_voyage_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('av_voyage/new.html.twig', [
            'av_voyage' => $avVoyage,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'show', methods: ['GET'])]
    public function show(AvVoyage $avVoyage): Response
    {
        return $this->render('av_voyage/show.html.twig', [
            'av_voyage' => $avVoyage,
        ]);
    }

    #[Route('/{id}/edit', name: 'edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, AvVoyage $avVoyage, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AvVoyageType::class, $avVoyage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_av_voyage_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('av_voyage/edit.html.twig', [
            'av_voyage' => $avVoyage,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'delete', methods: ['POST'])]
    public function delete(Request $request, AvVoyage $avVoyage, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$avVoyage->getId(), $request->getPayload()->get('_token'))) {
            $entityManager->remove($avVoyage);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_av_voyage_index', [], Response::HTTP_SEE_OTHER);
    }
}
