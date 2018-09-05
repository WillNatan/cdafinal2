<?php

namespace App\Controller;

use App\Entity\Slider;
use App\Form\SliderType;
use App\Repository\SliderRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/slider")
 */
class SliderController extends AbstractController
{
    /**
     * @Route("/", name="slider_index", methods="GET")
     */
    public function index(SliderRepository $sliderRepository): Response
    {
        return $this->render('slider/index.html.twig', ['sliders' => $sliderRepository->findAll()]);
    }

    /**
     * @Route("/new", name="slider_new", methods="GET|POST")
     */
    public function new(Request $request): Response
    {
        $slider = new Slider();
        $form = $this->createForm(SliderType::class, $slider);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $file= $slider->getSlideUrl();

            $fileName= $file->getClientOriginalName();
            $file->move(
                $this->getParameter('image_dir'),
                $fileName

            );

            $slider->setSlideImage($fileName);
            $slider->setSlideUrl($fileName);
            $em = $this->getDoctrine()->getManager();
            $em->persist($slider);
            $em->flush();

            return $this->redirectToRoute('slider_index');
        }

        return $this->render('slider/new.html.twig', [
            'slider' => $slider,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="slider_show", methods="GET")
     */
    public function show(Slider $slider): Response
    {
        return $this->render('slider/show.html.twig', ['slider' => $slider]);
    }

    /**
     * @Route("/{id}/edit", name="slider_edit", methods="GET|POST")
     */
    public function edit(Request $request, Slider $slider): Response
    {
        $form = $this->createForm(SliderType::class, $slider);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('slider_edit', ['id' => $slider->getId()]);
        }

        return $this->render('slider/edit.html.twig', [
            'slider' => $slider,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="slider_delete", methods="DELETE")
     */
    public function delete(Request $request, Slider $slider): Response
    {
        if ($this->isCsrfTokenValid('delete'.$slider->getId(), $request->request->get('_token'))) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($slider);
            $em->flush();
        }

        return $this->redirectToRoute('slider_index');
    }
}
