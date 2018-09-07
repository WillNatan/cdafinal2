<?php

namespace App\Controller;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Form\User1Type;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends AbstractController
{
    /**
     * @Route("/membres", name="espace_membre")
     * @param Request $request
     * @param ObjectManager $manager
     * @param $passwordEncoder
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function registration(Request $request, ObjectManager $manager, UserPasswordEncoderInterface $passwordEncoder)
    {
        $user = new User();
        $form = $this->createForm(User1Type::class, $user);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $password = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);

            $manager->persist($user);
            $manager->flush();

            return $this->redirectToRoute('homepage');
        }

        return $this->render('security/espace-membre.html.twig', [
            "registrationForm" => $form->createView()
        ]);
    }

    /**
     * @Route("/membres1", name="login1")
     * @param Request $request
     * @param ObjectManager $manager
     * @param $passwordEncoder
     * @return \Symfony\Component\HttpFoundation\Response
     */

    public function login(){

        return $this->render('security/espace-membre.html.twig', [
            ""
        ]);
    }
}
