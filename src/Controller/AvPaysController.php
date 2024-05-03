<?php

namespace App\Controller;

use App\Entity\AvPays;
use App\Form\AvPaysType;
use App\Repository\AvPaysRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/av/pays')]
class AvPaysController extends AbstractController
{
    #[Route('/', name: 'app_av_pays_index', methods: ['GET'])]
    public function index(AvPaysRepository $avPaysRepository): Response
    {
        return $this->render('av_pays/index.html.twig', [
            'av_pays' => $avPaysRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_av_pays_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $avPay = new AvPays();
        $form = $this->createForm(AvPaysType::class, $avPay);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($avPay);
            $entityManager->flush();

            return $this->redirectToRoute('app_av_pays_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('av_pays/new.html.twig', [
            'av_pay' => $avPay,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_av_pays_show', methods: ['GET'])]
    public function show(AvPays $avPay): Response
    {
        return $this->render('av_pays/show.html.twig', [
            'av_pay' => $avPay,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_av_pays_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, AvPays $avPay, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(AvPaysType::class, $avPay);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_av_pays_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('av_pays/edit.html.twig', [
            'av_pay' => $avPay,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_av_pays_delete', methods: ['POST'])]
    public function delete(Request $request, AvPays $avPay, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$avPay->getId(), $request->getPayload()->get('_token'))) {
            $entityManager->remove($avPay);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_av_pays_index', [], Response::HTTP_SEE_OTHER);
    }
}
