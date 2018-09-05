<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

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
     * @Route("/livre-d-or", name="livre-d-or", methods="GET")
     */
    public function livreOr(): Response
    {
        return $this->render('frontend/livre-d-or.html.twig');
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
