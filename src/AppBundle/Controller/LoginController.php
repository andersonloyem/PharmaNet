<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\User;


class LoginController extends Controller
{
    /**
     * @Route("/login", name ="login")
     */
    public function loginAction(Request $request)
    {
        if($request->getMethod() == 'POST'){
            $email = $request->get('email');
            $password = $request->get('password');
            $etat = "ACTIF";
            $repository = $this->getDoctrine()->getRepository('AppBundle:User');
            $user = $repository->findOneBy(array('email' =>$email, 'password'=>$password, 'etat'=>$etat));
            if($user){
                //$this->container->get('request')->getUser()->set('username', $user->getNom());
                $request->getSession()->set('username', $user->getName());
                return $this->redirectToRoute('acceuil');
            }else{
                return $this->render('default/index.html.twig', array('error'=>true));
            }      
        }
         return $this->render('default/index.html.twig', array('error'=>false));
    }

    /**
     * @Route("/", name ="logout")
     */
    public function logoutAction()
    {
        return $this->render('default/index.html.twig', array('error'=>false));
    }

}
