<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\LivreOr;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class FrontController extends AbstractController
{

    /**
     * @Route("/", name="index", methods="GET")
     */
    public function index(): Response
    {
        return $this->render('frontend/index.html.twig');
    }


    /**
     * @Route("/animations", name="animations", methods="GET")
     */
    public function animations(): Response
    {
        return $this->render('frontend/animations.html.twig');
    }

    /**
     * @Route("/historique", name="historique", methods="GET")
     */
    public function historique(): Response
    {
        return $this->render('frontend/historique.html.twig');
    }

    /**
     * @Route("/bibliographie", name="bibliographie", methods="GET")
     */
    public function bibliographie(): Response
    {
        return $this->render('frontend/bibliographie.html.twig');
    }

    /**
     * @Route("/telechargement", name="telechargement", methods="GET")
     */
    public function telechargement(): Response
    {
        return $this->render('frontend/telechargement.html.twig');
    }

    /**
     * @Route("/liens-utiles", name="liens-utiles", methods="GET")
     */
    public function liensUtiles(): Response
    {
        return $this->render('frontend/liens-utiles.html.twig');
    }

    /**
     * @Route("/livre-d-or", name="livre-d-or", methods="GET|POST")
     */
    public function livreOr(Request $request): Response
    {
        $submit = $request->request->get('submited');
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $user = $this->getUser();
        // if sublited we treate
        if ($submit) {
            $message = $request->request->get('msg');
            if (strlen($message) > 1)
            {
                $entityManager = $this->getDoctrine()->getManager();
                $product = new LivreOr();
                $product->setMessage($message);
                $entityManager->persist($product);
                $entityManager->flush();
            }
        }


        $LivreOrs = $this->getDoctrine()
            ->getRepository(LivreOr::class)
            ->findAll();
        return $this->render('frontend/livre-d-or.html.twig' , ['LivreOrs' => $LivreOrs]);
    }

    /**
     * @Route("/contact", name="contact", methods="GET")
     */
    public function contact(): Response
    {
        return $this->render('frontend/contact.html.twig');
    }

    /**
     * @Route("/espace-membre", name="espace-membre", methods="GET")
     */
    public function espaceMembre(): Response
    {
        return $this->render('frontend/espace-membre.html.twig');
    }

}
