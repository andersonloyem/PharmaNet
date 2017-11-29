<?php

namespace VenteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use VenteBundle\Entity\Malade;
use VenteBundle\Entity\Assureur;
use StockBundle\Entity\CodePostal;
use Symfony\Component\HttpFoundation\Request;

    /**
     * @Route("/client")
     */
class ClientController extends Controller
{
    /**
     * @Route("/", name="client")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $client = $em->getRepository('VenteBundle:Malade')->findAll();
        $assureur = $em->getRepository('VenteBundle:Assureur')->findAll();
        $code = $em->getRepository('StockBundle:CodePostal')->findAll();
        return $this->render('VenteBundle:Client:index.html.twig', array(
            'client' => $client,
            'assureur' => $assureur,
            'code' => $code
        ));
    }
    
    /**
     * @Route("/new", name="newClient")
     */
    public function newCliAction(Request $request)
    {
        $four = new Malade;
        if ($request->getMethod() == 'POST') {
            $four->setNom($request->get('nom'));
            $four->setTelephone($request->get('tel'));
            $four->setModeReglement($request->get('regl'));
            $four->setPoid($request->get('poid'));
            $four->setTaille($request->get('taille'));
            $cp = $this->getDoctrine()->getRepository(CodePostal::class)
                                            ->find($request->get('cp'));
            $four->setCodePostal($cp);
            $ass = $this->getDoctrine()->getRepository(Assureur::class)
                                            ->find($request->get('ass'));
            $four->setAssureur($ass);
            $em = $this->getDoctrine()->getManager();
            $em->persist($four);
            $em->flush();
            return $this->redirectToRoute('client', array());
        }
        return $this->redirectToRoute('client', array());
    }
    
    /**
     * @Route("/Ass/new", name="newAss")
     */
    public function newAssAction(Request $request)
    {
        $four = new Assureur;
        if ($request->getMethod() == 'POST') {
            $four->setNom($request->get('nom'));
            $four->setTelephone($request->get('tel'));
            $four->setTaux($request->get('taux'));
            $cp = $this->getDoctrine()->getRepository(CodePostal::class)
                                            ->find($request->get('cp'));
            $four->setCodePostal($cp);
            $em = $this->getDoctrine()->getManager();
            $em->persist($four);
            $em->flush();
            return $this->redirectToRoute('client', array());
        }
        return $this->redirectToRoute('client', array());
    }
    
    /**
     * @Route("/delete/{id}", name="delClient")
     */
    public function deleteCliAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $rayon = $em->getRepository('VenteBundle:Malade')->find($id);
        $em->remove($rayon);
        $em->flush();
        return $this->redirectToRoute('client');
    }
    /**
     * @Route("/delAss/{id}", name="delAss")
     */
    public function deleteAssAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $rayon = $em->getRepository('VenteBundle:Assureur')->find($id);
        $em->remove($rayon);
        $em->flush();
        return $this->redirectToRoute('client');
    }
}
