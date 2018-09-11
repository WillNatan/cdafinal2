<?php

namespace App\Controller;

use App\Entity\LivreOr;
use App\Form\BackLivreOrType;
use App\Form\FrontLivreOrType;
use App\Repository\LivreOrRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("admin/livre-or")
 */
class LivreOrController extends AbstractController
{
    /**
     * @Route("/", name="livre_or_index", methods="GET")
     */
    public function index(LivreOrRepository $livreOrRepository): Response
    {
        return $this->render('livre_or/index.html.twig', ['livre_ors' => $livreOrRepository->findAll()]);
    }




    /**
     * @Route("/{id}", name="livre_or_show", methods="GET")
     */
    public function show(LivreOr $livreOr): Response
    {
        return $this->render('livre_or/show.html.twig', ['livre_or' => $livreOr]);
    }

    /**
     * @Route("/{id}/edit", name="livre_or_edit", methods="GET|POST")
     */
    public function edit(Request $request, LivreOr $livreOr): Response
    {
        $form = $this->createForm(BackLivreOrType::class, $livreOr);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('livre_or_edit', ['id' => $livreOr->getId()]);
        }

        return $this->render('livre_or/edit.html.twig', [
            'livre_or' => $livreOr,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="livre_or_delete", methods="DELETE")
     */
    public function delete(Request $request, LivreOr $livreOr): Response
    {
        if ($this->isCsrfTokenValid('delete'.$livreOr->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($livreOr);
            $em->flush();
        }

        return $this->redirectToRoute('livre_or_index');
    }
}
