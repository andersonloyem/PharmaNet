<?php

namespace VenteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
*@Route("/vente")
*/
class VenteController extends Controller
{
    /**
     * @Route("/", name="vente")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $client = $em->getRepository('VenteBundle:Malade')->findAll();
        return $this->render('VenteBundle:Vente:index.html.twig', array(
            'client' => $client
        ));
    }
    /**
     * @Route("/facture/{id}", name="facture")
     */
    public function factureAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $vente = $em->getRepository('VenteBundle:Vente')->find($id);
        $phar = $em->getRepository('AppBundle:Pharmacy')->find(1);
        return $this->render('VenteBundle:Vente:facture.html.twig', array(
            'vente' => $vente, 'phar' => $phar
        ));
    }

}
