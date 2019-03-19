<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;

class FrontController extends Controller
{
    /**
     * @Route("/", name="front")
     */
    public function index()
    {
        $activities = $this->getDoctrine()->getRepository('App:Activite')->findby(['parent'=>null]);

        return $this->render('front/index.html.twig',['activities'=>$activities]);
    }

    /**
     * @Route("/load_other_section", name="load_other_section")
     */
    public function load_other_section()
    {
        return $this->render('front/index.html.twig');
    }

}
