<?php

declare(strict_types=1);

namespace App\Controller;

use App\Entity\Status;
use App\Form\StatusType;
use App\Repository\StatusRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/status')]
class StatusController extends AbstractController
{
    #[Route('/', name: 'status_index', methods: ['GET'])]
    public function index(StatusRepository $statusRepository): Response
    {
        return $this->render('status/index.html.twig', [
            'statuses' => $statusRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'status_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $status = new Status();
        $form = $this->createForm(StatusType::class, $status);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($status);
            $entityManager->flush();

            return $this->redirectToRoute('status_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('status/new.html.twig', [
            'status' => $status,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'status_show', methods: ['GET'])]
    public function show(Status $status): Response
    {
        return $this->render('status/show.html.twig', [
            'status' => $status,
        ]);
    }

    #[Route('/{id}/edit', name: 'status_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Status $status): Response
    {
        $form = $this->createForm(StatusType::class, $status);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('status_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('status/edit.html.twig', [
            'status' => $status,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'status_delete', methods: ['POST'])]
    public function delete(Request $request, Status $status): Response
    {
        if ($this->isCsrfTokenValid('delete'.$status->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($status);
            $entityManager->flush();
        }

        return $this->redirectToRoute('status_index', [], Response::HTTP_SEE_OTHER);
    }
}
