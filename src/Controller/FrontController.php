<?php

namespace App\Controller;

use App\Entity\LivreOr;
use App\Entity\User;
use App\Form\AdminUserType;
use App\Form\User1Type;
use App\Form\FrontLivreOrType;
use App\Repository\ImageSlideRepository;
use App\Repository\LivreOrRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Http\Logout\LogoutHandlerInterface;
use App\Entity\MsgDuJour;
use App\Repository\MsgDuJourRepository;

class FrontController extends AbstractController
{

    /**
     * @Route("/", name="homepage", methods="GET|POST")
     */
    public function index(MsgDuJourRepository $messageDuJour, ImageSlideRepository $imageSlideRepository, Request $request): Response
    {




        $errorMessage ='';
       if($user = $this->getUser()){
           if($user->getStatut()== false){
               $this->get('security.token_storage')->setToken(null);
               $errorMessage .= "Votre compte n'est pas encore activé!";
           }
       }


        return $this->render('frontend/index.html.twig',
            ['image_slides' => $imageSlideRepository->findAll(),
                'message_Du_Jour' => $messageDuJour->findAll(),
                'messageError'=>$errorMessage]);
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
     * @Route("/livre-d-or", name="livre_or", methods="GET|POST")
     */
    public function livreOr(Request $request, TokenStorageInterface $tokenStorage, LivreOrRepository $livreOrRepository): Response
    {

        $livreOr = new LivreOr();
        $form = $this->createForm(FrontLivreOrType::class, $livreOr);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $user=$tokenStorage->getToken()->getUser();
            $message = $livreOr->getMessage();
            $livreOr->setMessage($message);
            $livreOr->setDate(new \datetime());
            $livreOr->setStatut(false);
            $livreOr->setUsername($user->getUsername());
            $em = $this->getDoctrine()->getManager();
            $em->persist($livreOr);
            $em->flush();

            return $this->redirectToRoute('livre_or');
        }
        $repository = $this->getDoctrine()->getRepository(LivreOr::class);
        $messages = $repository->findBy(
            ['statut' => true]

        );

        return $this->render('frontend/livre-d-or.html.twig' , ['LivreOrs' => $messages,
            'livre_or' => $livreOr,
            'form' => $form->createView(),]);
    }

    /**
     * @Route("/contact", name="contact", methods="GET")
     */
    public function contact(): Response
    {
        return $this->render('frontend/contact.html.twig');
    }


    /**
     * @Route("/membres", name="membres_route", methods="GET|POST")
     */
    public function espaceMembre( Request $request,UserPasswordEncoderInterface $passwordEncoder, LivreOrRepository $livreOrRepository): Response
    {


        $user = new User();
        $form = $this->createForm(User1Type::class, $user);
        $form->handleRequest($request);



        if ($form->isSubmitted() && $form->isValid()) {
            $password = $passwordEncoder->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);

            $user->setStatut(false);



            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('membres_route');
        }

        return $this->render('frontend/espace-membre.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
            'LivreOrs' => $livreOrRepository->findBy(array('Username' => $user->getName()))
        ]);




    }
    /**
     * @Route("/membres/{id}{", name="membres_edit", methods="GET|POST")
     */
    public function edit(Request $request, User $user): Response
    {
        $form = $this->createForm(User1Type::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('user_edit', ['id' => $user->getId()]);
        }

        return $this->render('user/edit.html.twig', [
            'user' => $user,
            'form' => $form->createView(),
        ]);
    }

}
