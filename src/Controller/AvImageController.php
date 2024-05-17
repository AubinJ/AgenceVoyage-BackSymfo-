<?php

namespace App\Controller;

use App\Entity\AvImage;
use App\Form\AvImageType;
use App\Repository\AvImageRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_USER', statusCode: 423, message: "Vous n'avez pas les droits pour accéder à cette page, veuillez vous connecter via l'onglet login.")]
#[Route('/av/image')]
class AvImageController extends AbstractController
{
    #[Route('/', name: 'app_av_image_index', methods: ['GET'])]
    public function index(AvImageRepository $avImageRepository): Response
    {
        return $this->render('av_image/index.html.twig', [
            'av_images' => $avImageRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_av_image_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $avImage = new AvImage();
        $form = $this->createForm(AvImageType::class, $avImage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($avImage);
            $entityManager->flush();

            $this->addFlash('success', 'Votre image a bien été ajoutée !');

            return $this->redirectToRoute('app_av_image_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('av_image/new.html.twig', [
            'av_image' => $avImage,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_av_image_show', methods: ['GET'])]
    public function show(AvImage $avImage): Response
    {
        return $this->render('av_image/show.html.twig', [
            'av_image' => $avImage,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_av_image_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, AvImage $avImage, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AvImageType::class, $avImage);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            $this->addFlash('success', 'Votre image a bien été modifiée !');
            return $this->redirectToRoute('app_av_image_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('av_image/edit.html.twig', [
            'av_image' => $avImage,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_av_image_delete', methods: ['POST'])]
    public function delete(Request $request, AvImage $avImage, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$avImage->getId(), $request->getPayload()->get('_token'))) {
            $entityManager->remove($avImage);
            $entityManager->flush();
        }
        $this->addFlash('success', 'Votre image a bien été supprimée !');
        return $this->redirectToRoute('app_av_image_index', [], Response::HTTP_SEE_OTHER);
    }
}
