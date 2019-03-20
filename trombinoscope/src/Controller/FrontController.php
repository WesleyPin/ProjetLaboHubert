<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

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
     * @param Request $request
     * @return JsonResponse
     */
    public function load_other_section(Request $request)
    {
        $id= $request->request->get('id');

        $children = $this->getDoctrine()->getRepository('App:Activite')->findby(['parent'=>$id]);

        $html = $this->container->get('twig')->render('front/item.html.twig',['children'=>$children]);
        return new JsonResponse(json_encode(
            $html
        ), 200);

    }

}
