<?php

namespace App\Controller;

use App\Entity\MsgDuJour;
use App\Form\MsgDuJourType;
use App\Repository\MsgDuJourRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/admin/msg-du-jour")
 */
class MsgDuJourController extends AbstractController
{
    /**
     * @Route("/", name="msg_du_jour_index", methods="GET|POST")
     */
    public function index(MsgDuJourRepository $msgDuJourRepository, Request $request): Response
    {

        if(empty($msgDuJourRepository->findAll())){

            $msgDuJour = new MsgDuJour();
            $form = $this->createForm(MsgDuJourType::class, $msgDuJour);
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $em = $this->getDoctrine()->getManager();
                $em->persist($msgDuJour);
                $em->flush();

                return $this->redirectToRoute('msg_du_jour_index');
            }

            return $this->render('msg_du_jour/index.html.twig', [
                'msg_du_jours' => $msgDuJourRepository->findAll(),
                'msg_du_jour' => $msgDuJour,
                'form' => $form->createView(),
            ]);
        }
        else{
            return $this->render('msg_du_jour/index.html.twig', [
                'msg_du_jours' => $msgDuJourRepository->findAll()
            ]);
        }


    }

    /**
     * @Route("/{id}", name="msg_du_jour_show", methods="GET")
     */
    public function show(MsgDuJour $msgDuJour): Response
    {
        return $this->render('msg_du_jour/show.html.twig', ['msg_du_jour' => $msgDuJour]);
    }

    /**
     * @Route("/{id}/edit", name="msg_du_jour_edit", methods="GET|POST")
     */
    public function edit(Request $request, MsgDuJour $msgDuJour): Response
    {
        $form = $this->createForm(MsgDuJourType::class, $msgDuJour);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('msg_du_jour_edit', ['id' => $msgDuJour->getId()]);
        }

        return $this->render('msg_du_jour/edit.html.twig', [
            'msg_du_jour' => $msgDuJour,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="msg_du_jour_delete", methods="DELETE")
     */
    public function delete(Request $request, MsgDuJour $msgDuJour): Response
    {
        if ($this->isCsrfTokenValid('delete'.$msgDuJour->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($msgDuJour);
            $em->flush();
        }

        return $this->redirectToRoute('msg_du_jour_index');
    }
}
