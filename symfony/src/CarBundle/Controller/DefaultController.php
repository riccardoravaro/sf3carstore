<?php

namespace CarBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class DefaultController extends Controller
{
    /**
     * @Route("/our-cars", name="offer")
     */
    public function indexAction(Request $request)
    {

        $carRepository = $this->getDoctrine()->getRepository('CarBundle:Car');
        $cars = $carRepository->findCarsWithDetails();

        $form = $this->createFormBuilder()
        ->add('search', TextType::class, [
            'constraints' => [
                    new NotBlank(),
                    new Length(['min' => 2])
                ]
            ])
       // ->add('submit', SubmitType::class)
        ->setMethod('GET')
        ->getForm();

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
            die('form submitted');
        }



        return $this->render('CarBundle:Default:index.html.twig', [
            'cars' => $cars,
            'form' => $form->createView()
            ]);
    }

    /**
     * @param $id
     * @Route("/car/{id}", name="show_car")
     *
     */
    public function showAction($id)
    {

        $carRepository = $this->getDoctrine()->getRepository('CarBundle:Car');
        $car = $carRepository->findCarsWithDetailsById($id);
        return $this->render('CarBundle:Default:show.html.twig', ['car' => $car]);

    }
}
