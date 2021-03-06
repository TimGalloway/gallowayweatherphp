<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Entity;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use AppBundle\Form;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $repository = $this->getDoctrine()->getRepository(Entity\WeatherHistory::class);
        
        $WeatherHistories = $repository->findAll();
        
        $form = $this->createForm(Form\DefaultForm::class);
        
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
            'WeatherHistories'=> $WeatherHistories,
            'form' => $form->createView()
        ]);
    }
}
