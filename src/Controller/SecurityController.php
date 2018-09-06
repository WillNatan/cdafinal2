<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Form\User1Type;

class SecurityController extends AbstractController
{
    /**
     * @Route("/membres", name="espace_membre")
     */
    public function registration()
    {
        $user = new User();

        $form = $this->createForm(User1Type::class, $user);

        return $this->render('security/espace-membre.html.twig', [
            "registrationForm" => $form->createView()
        ]);
    }
}
