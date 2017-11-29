<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class ConfigController extends Controller
{
    /**
     * @Route("/config", name="config")
     */
    public function indexAction()
    {
        $id = 1;
        $em = $this->getDoctrine()->getManager();
        $phar = $em->getRepository('AppBundle:Pharmacy')->find($id);
        return $this->render('AppBundle:Config:index.html.twig', array(
            'phar' => $phar
        ));
    }
    /**
     * @Route("/setconfig", name="setconfig")
     */
    public function setAction(Request $request)
    {
        if ($request->getMethod() == 'POST') {
            $id = 1;
            $phar = $this->getDoctrine()->getRepository('AppBundle:Pharmacy')->find($id);
            $phar->setNom($request->get('nom'));
            $phar->setTelephone($request->get('tel'));
            $phar->setAdresse($request->get('adr'));
            $phar->setSlogan($request->get('slog'));
            $phar->setNumero($request->get('no'));
            $em = $this->getDoctrine()->getManager();
            $em->flush();
            return $this->redirectToRoute('config');
        }
        return $this->redirectToRoute('config');
    }

}
