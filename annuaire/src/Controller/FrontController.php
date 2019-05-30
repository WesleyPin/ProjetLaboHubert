<?php

namespace App\Controller;

use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

use App\Entity\Personne;

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

        $form_personne = $this->createFormBuilder($user)
            ->add('firstname')
            ->add('lastname')
            ->add('birthdate', DateTimeType::class, [
                'years' => range(date('Y') -100, date('Y') -15)
            ])
            ->add('placebirth')
            ->add('mail')
            ->add('homephone')
            ->add('mobilephone')
            ->add('office')
            ->add('building')
            ->add('tutelle')
            ->add('ingeeps')
            ->add('arrivaldate', DateTimeType::class, [
                'years' => range(date('Y') -20, date('Y'))
            ])
            ->add('departuredate', DateTimeType::class, [
                'years' => range(date('Y') -20, date('Y'))
            ])
            //->add('status')   // ne fonctionne pas (clé étrangère)
            //->add('compte')
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
}
