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
        $cpt = $request->request->get('cpt');

        $children = $this->getDoctrine()->getRepository('App:Activite')->findby(['parent'=>$id]);
        if (!empty($children))
            $html = $this->container->get('twig')->render('front/item.html.twig',['children'=>$children,'cpt'=>$cpt]);
        else
            $html = "none";

        return new JsonResponse(json_encode(
            $html
        ), 200);
    }

    /**
     * @Route("/search_someone", name="search_someone")
     * @param Request $request
     * @return JsonResponse
     */
    public function search_someone(Request $request)
    {
        $name =  $request->request->get('name');
        $users = $this->getDoctrine()->getRepository('App:Personne')->search($name);
        $html = $this->container->get('twig')->render('front/item_search.html.twig',['users'=>$users]);
        return new JsonResponse(json_encode(
            $html
        ), 200);
    }
}
