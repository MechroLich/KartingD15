<?php

namespace App\Controller;

use App\Entity\Laptimes;
use App\Form\LaptimesType;
use App\Repository\LaptimesRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/laptimes")
 */
class LaptimesController extends AbstractController
{
    /**
     * @Route("/", name="laptimes_index", methods={"GET"})
     */
    public function index(LaptimesRepository $laptimesRepository): Response
    {
        return $this->render('laptimes/index.html.twig', [
            'laptimes' => $laptimesRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="laptimes_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $laptime = new Laptimes();
        $form = $this->createForm(LaptimesType::class, $laptime);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($laptime);
            $entityManager->flush();

            return $this->redirectToRoute('laptimes_index');
        }

        return $this->render('laptimes/new.html.twig', [
            'laptime' => $laptime,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="laptimes_show", methods={"GET"})
     */
    public function show(Laptimes $laptime): Response
    {
        return $this->render('laptimes/show.html.twig', [
            'laptime' => $laptime,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="laptimes_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Laptimes $laptime): Response
    {
        $form = $this->createForm(LaptimesType::class, $laptime);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('laptimes_index');
        }

        return $this->render('laptimes/edit.html.twig', [
            'laptime' => $laptime,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="laptimes_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Laptimes $laptime): Response
    {
        if ($this->isCsrfTokenValid('delete'.$laptime->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($laptime);
            $entityManager->flush();
        }

        return $this->redirectToRoute('laptimes_index');
    }
}
