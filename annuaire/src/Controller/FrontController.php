<?php

namespace App\Controller;

use App\Entity\Compte;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;

use App\Entity\Personne;
use App\Entity\Contrat;

/**
 * @isGranted("ROLE_USER")
 */
class FrontController extends AbstractController
{
    /**
     * @Route("/annuaire", name="annuaire")
     */
    public function index()
    {
      $users = $this->getDoctrine()->getRepository('App:Personne')->findall(); //->findOneBy(['lastname'=>'Dupont'])
        return $this->render('front/index.html.twig', ['users'=>$users]);
    }

    /**
     * @Route("/display_personne/{id}", name="display_personne")
     * @param $id
     * @return mixed
     */
    public function seeUser($id)
    {
        $user = $this->getDoctrine()->getRepository('App:Personne')->findOneBy(['id' => $id]);
        $contrat = $this->getDoctrine()->getRepository('App:Contrat')->findOneBy(['personne' => $id]);
        
        return $this->render('front/display_personne.html.twig', ['user' => $user, 'contrat' => $contrat]);
    }

    /**
     * @Route("/delete/{id}", name="delete")
     */
    public function delUser($id)
    {
      $em = $this->getDoctrine()->getEntityManager();
      $personne = $em->getRepository('App:Personne')->find($id);
      $workon = $em->getRepository('App:Workon')->findBy(array('personne' => $id));
      foreach ($workon as $work) {
        $em->remove($work);
      }
      $em->remove($personne);
      $em->flush();

      return new RedirectResponse($this->generateUrl('annuaire'));
    }

    /**
     * @Route("/form_personne/{id}", name="form_personne")
     * @param Request $request
     * @param ObjectManager $om
     * @param $id
     * @return mixed
     */
    public function formUser(Request $request, ObjectManager $om, $id)
    {
        if($id == -1)   // Ajout
        {
            $user = new Personne();
        }
        elseif($id != -1)   // modif
        {
            $user = $this->getDoctrine()->getRepository('App:Personne')->findOneBy(['id' => $id]);
        }

        // Création du formulaire
        $form_personne = $this->createFormBuilder($user)
            ->add('firstname')
            ->add('lastname')
            ->add('birthdate', DateType::class, [
                'years' => range(date('Y') -90, date('Y') -15)
            ])
            ->add('placebirth')
            ->add('mail')
            ->add('homephone')
            ->add('mobilephone')
            ->add('office')
            ->add('building')
            ->add('tutelle')
            ->add('ingeeps')
            ->add('arrivaldate', DateType::class, [
                'years' => range(date('Y') -20, date('Y'))
            ])
            ->add('departuredate', DateType::class, [
                'years' => range(date('Y') +0, date('Y')),
            ])
            ->getForm();

        $form_personne->handleRequest($request);

        if($form_personne->isSubmitted() && $form_personne->isValid())
        {
            $om->persist($user);
            $om->flush();

            return $this->redirectToRoute('annuaire');
        }

        return $this->render('front/form_user.html.twig', ['form_personne' => $form_personne->createView()]);
    }

    /**
     * @Route("/form_contrat/{id}/{id_contrat}", name="form_contrat")
     * @param Request $request
     * @param ObjectManager $om
     * @param $id
     * @param $id_contrat
     * @return mixed
     */
    public function formContrat(Request $request, ObjectManager $om, $id, $id_contrat)
    {
        if($id_contrat == -1)   // Ajout
        {
            $contrat = new Contrat();
        }
        elseif($id_contrat != -1)   // modif
        {
            $contrat = $this->getDoctrine()->getRepository('App:Contrat')->findOneBy(['id' => $id_contrat]);
        }

        $user = $this->getDoctrine()->getRepository('App:Personne')->find($id);

        // Création du formulaire
        $form_contrat = $this->createFormBuilder($contrat)
            ->add('personne', HiddenType::class, [
                'data' => $id
            ])
            ->add('subject')
            ->add('funding')
            ->add('director')
            ->add('administrator')
            ->add('homeorganization')
            ->add('salary')
            ->add('securite_social')
            ->add('startdate', DateType::class, [
                'years' => range(date('Y') -20, date('Y'))
            ])
            ->add('enddate', DateType::class, [
                'years' => range(date('Y') +20, date('Y')),
            ])
            ->add('type')
            ->getForm();

        $form_contrat->handleRequest($request);

        if($form_contrat->isSubmitted() && $form_contrat->isValid())
        {
            // echo '<pre>';
            // print_r($contrat);
            // echo '</pre>';
            // die();
            $contrat->setPersonne($user);
            $om->persist($contrat);
            $om->flush();

            return $this->redirectToRoute('display_personne', ['id' => $id]);
        }

        return $this->render('front/form_contrat.html.twig', ['form_contrat' => $form_contrat->createView(), 'user' => $user]);
    }

    /**
     * @Route("/delete_contrat/{id_contrat}/{id}", name="delete_contrat")
     * @param Request $request
     * @param ObjectManager $om
     * @param $id_contrat
     * @param $id
     * @return mixed
     */
     public function delContrat(Request $request, ObjectManager $om, $id_contrat, $id)
     {
        $em = $this->getDoctrine()->getEntityManager();
        $contrat = $em->getRepository('App:Contrat')->find($id_contrat);
        $em->remove($contrat);
        $em->flush();
        return $this->redirectToRoute('display_personne', ['id' => $id]);
     }

     * @Route("/import-csv", name="import")
     */
    public function import(Request $request)
    {
        $n=0;
        $em = $this->getDoctrine()->getManager();
        if ($request->isMethod('post')) {
           foreach ($request->files as $filename){
               $path = $filename->getPathName();
                $file = fopen("$path", "r");

                while (($column = fgetcsv($file, 1024, ";")) !== FALSE) {

                    if ($n > 0)
                    {
                        $compte = new Compte();
                        $compte->setPassword('azerty');
                        $em->persist($compte);
                        $em->flush();
                        $personne = new Personne();
                        $dateBirth = new \DateTime($column[3]);
                        $dateArriv = new \DateTime($column[12]);
                        $dateDepart = new \DateTime($column[13]);
                        $personne->setFirstname($column[1])->setLastname($column[2])->setBirthdate($dateBirth)->setPlacebirth($column[4])->setHomephone($column[5])->setMobilephone($column[6])->setMail($column[7])->setOffice($column[8])->setBuilding($column[9])->setTutelle($column[10])->setIngeeps($column[11])->setArrivaldate($dateArriv)->setDeparturedate($dateDepart)->setCompte($compte);
                        $em->persist($personne);
                        $em->flush();
                    }
                    $n+=1;

                }

            }
        }

        return $this->render('front/import.html.twig');
    }

}
