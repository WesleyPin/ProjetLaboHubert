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
        $workon = $this->getDoctrine()->getRepository('App:Workon')->findBy(['activite'=>$id]);
        $users = [];
        if (!empty($children))
            $html = $this->container->get('twig')->render('front/item.html.twig',['children'=>$children,'cpt'=>$cpt]);
        elseif (!empty($workon)){
            foreach ($workon as $i){
                array_push($users,$i->getPersonne());
            }
            $html= $this->container->get('twig')->render('front/item_search.html.twig',['users'=>$users,'function'=>'display','cpt'=>$cpt]);
        }
        else
            $html = "<div class='container' id='item".$cpt."'><p class='no_result'>Aucun résultat</p></div>";


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
        $html = $this->container->get('twig')->render('front/item_search.html.twig',['users'=>$users,'function'=>'display_someone']);
        return new JsonResponse(json_encode(
            $html
        ), 200);
    }

    /**
     * @Route("/display_someone", name="display_someone")
     * @param Request $request
     * @return JsonResponse
     */
    public function display_someone(Request $request)
    {
        $id =  $request->request->get('id');
        $user = $this->getDoctrine()->getRepository('App:Personne')->find($id);

        $html = $this->container->get('twig')->render('front/item_display_someone.html.twig',['user'=>$user]);

        return new JsonResponse(json_encode(
            $html
        ), 200);
    }
}
