<?php

namespace App\Controller;

use App\Entity\ImageSlide;
use App\Form\ImageSlideType;
use App\Repository\ImageSlideRepository;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @Route("admin/image/slides")
 */
class ImageSlideController extends Controller
{
    /**
     * @Route("/", name="image_slide_index", methods="GET")
     */
    public function index(ImageSlideRepository $imageSlideRepository): Response
    {
        return $this->render('image_slide/index.html.twig', ['image_slides' => $imageSlideRepository->findAll()]);
    }

    /**
     * @Route("/new", name="image_slide_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {


        $kernel = $this->container->get('kernel');
        $rootdir = $kernel->getRootDir();
        $imageSlide = new ImageSlide();
        $form = $this->createForm(ImageSlideType::class, $imageSlide);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $imageSlide->getImageUrl();
$path = $rootdir. '/../public/slides';

            $fileName = $file->getClientOriginalName();
            $file->move(
                $path,
                $fileName
            );

            $imageSlide->setImageUrl($fileName);
            $em = $this->getDoctrine()->getManager();
            $em->persist($imageSlide);
            $em->flush();

            return $this->redirectToRoute('image_slide_index');
        }

        return $this->render('image_slide/new.html.twig', [
            'image_slide' => $imageSlide,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="image_slide_show", methods="GET")
     */
    public function show(ImageSlide $imageSlide): Response
    {
        return $this->render('image_slide/show.html.twig', ['image_slide' => $imageSlide]);
    }

    /**
     * @Route("/{id}/edit", name="image_slide_edit", methods="GET|POST")
     */
    public function edit(Request $request, ImageSlide $imageSlide): Response
    {

        $image = $imageSlide->getImageUrl();
        $showimage = $image;
        $form = $this->createForm(ImageSlideType::class, $imageSlide);
        $form->handleRequest($request);

        $kernel = $this->container->get('kernel');
        $rootdir = $kernel->getRootDir();
        $path = $rootdir. '/../public/slides';

        if(is_null($imageSlide->getImageUrl()) and !is_null($image)){
            $imageSlide->setImageUrl($image);
        }

        if ($form->isSubmitted() && $form->isValid()) {
            $file = $imageSlide->getImageUrl();


            if($file != $image){
                // Generate a unique name for the file before saving it
                $fileName = $file->getClientOriginalName();

                // Move the file to the directory where brochures are stored
                $file->move(
                    $path,
                    $fileName

                );
                // Update the 'brochure' property to store the PDF file name
                // instead of its contents
                $imageSlide->setImageUrl($fileName);


                $fs = new Filesystem();

                $kernel = $this->container->get('kernel');
                $rootDir = $kernel->getRootDir();

                $pathImage = $rootDir . '/../public/slides/'.$image;
                if ($fs->exists($pathImage)) {
                    $fs->remove($pathImage);
                }
            }
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('image_slide_index');
        }

        return $this->render('image_slide/edit.html.twig', [
            'image_slide' => $imageSlide,
            'form' => $form->createView(),
            'last_image'=>$showimage
        ]);
    }

    /**
     * @Route("/{id}", name="image_slide_delete", methods="DELETE")
     */
    public function delete(Request $request, ImageSlide $imageSlide): Response
    {
        if ($this->isCsrfTokenValid('delete'.$imageSlide->getId(), $request->request->get('_token'))) {

            $image = $imageSlide->getImageUrl();
            $kernel = $this->container->get('kernel');
            $rootdir = $kernel->getRootDir();

            $path = $rootdir.'/../public/slides';
            $fs = new Filesystem();

            if($fs->exists($path.'/'.$image)){
                $fs->remove($path.'/'.$image);
            }

            $em = $this->getDoctrine()->getManager();
            $em->remove($imageSlide);
            $em->flush();
        }

        return $this->redirectToRoute('image_slide_index');
    }
}
