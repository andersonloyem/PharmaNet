<?php

namespace AppBundle\Controller;

use AppBundle\Entity\User;
use AppBundle\Entity\UserSec;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @Route("user")
 */
class UserController extends Controller
{
    /**
     * @Route("/", name ="user") 
     */
    public function indexAction()
    {
         $user = $this->getDoctrine()
                ->getRepository('AppBundle:User')
                ->findAll();

        if (!$user) {
            throw $this->createNotFoundException('user inexistant.');
        }

        return $this->render('AppBundle:User:index.html.twig', array(
            'user' => $user
             ));
    }

    /**
     * @Route("/new", name="newUser")
     */
    public function createAction(Request $request)
    {   
        $user = new User;
        //$request = $this->get('request');
            if($request->getMethod()=='POST'){
                $user->setName($_POST['name']);
                $user->setSurname($_POST['surname']);
                $user->setEmail($_POST['email']);
                $user->setTelephone($_POST['phone']);
                $user->setEtat($_POST['etat']);
                $user->setType($_POST['type']);
                $user->setPassword($_POST['passwd']);

                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();
            }
        return $this->redirectToRoute('user');
    }

    /**
     * @Route("/update/{id}", name="updateUser")
     */
    public function updateAction($id, Request $request)
    {
        return $this->render('AppBundle:User:update.html.twig', array(
            // ...
        ));
    }
    /**
     * @Route("/delete/{id}", name="deleteUser")
     */
    public function deleteAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AppBundle:User')->find($id);

        $em->remove($user);
        $em->flush();
        $this->addFlash(
                        'notice',
                        'Article Supprimer'
                    );
        return $this->redirectToRoute('user');
    }
    /**
     * @Route("/active/{id}", name="activeUser")
     */
    public function activeAction($id, Request $request)
    {   
        $user = new User;
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('AppBundle:User')->find($id);

        if($user->getEtat() == 'ACTIF'){
            $user->setEtat("INACTIF");
            $em= $this->getDoctrine()->getManager();
            $em->flush();
        }else{
             $user->setEtat("ACTIF");
            $em= $this->getDoctrine()->getManager();
            $em->flush();
        }
        return $this->redirectToRoute('user');
    }
}
