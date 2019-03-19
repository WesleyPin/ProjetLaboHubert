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
        return $this->render('front/index.html.twig');
    }
}
