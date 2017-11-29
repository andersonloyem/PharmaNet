<?php

namespace StockBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use StockBundle\Entity\Fournisseur;
use StockBundle\Entity\Fabriquant;
use StockBundle\Entity\CodePostal;

    /**
     * @Route("/four")
     */
class FourController extends Controller
{
    /**
     * @Route("/", name="four")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $four = $em->getRepository('StockBundle:Fournisseur')->findAll();
        $fab = $em->getRepository('StockBundle:Fabriquant')->findAll();
        $code = $em->getRepository('StockBundle:CodePostal')->findAll();
        return $this->render('StockBundle:Four:index.html.twig', array(
            'four' => $four,
            'fab' => $fab,
            'code' => $code
        ));
    }

    /**
     * @Route("/new", name="newFour")
     */
    public function newFourAction(Request $request)
    {
        $four = new Fournisseur;
        if ($request->getMethod() == 'POST') {
            $four->setCode($request->get('code'));
            $four->setNom($request->get('nom'));
            $four->setAdresse($request->get('adr'));
            $four->setType($request->get('type'));
            $four->setEmail($request->get('mail'));
            $four->setTelephone($request->get('tel'));
            $cp = $this->getDoctrine()->getRepository(CodePostal::class)
                                            ->find($request->get('cp'));
            $four->setCodePostal($cp);
            $em = $this->getDoctrine()->getManager();
            $em->persist($four);
            $em->flush();
            return $this->redirectToRoute('four', array());
        }
        return $this->redirectToRoute('four', array());
    }

    /**
     * @Route("/newfb", name="newFab")
     */
    public function newFabAction(Request $request)
    {
        $four = new Fabriquant;
        if ($request->getMethod() == 'POST') {
            $four->setCode($request->get('code'));
            $four->setNom($request->get('nom'));
            $four->setAdresse($request->get('adr'));
            $four->setEmail($request->get('mail'));
            $four->setTelephone($request->get('tel'));
            $cp = $this->getDoctrine()->getRepository(CodePostal::class)
                                            ->find($request->get('cp'));
            $four->setCodePostal($cp);
            $em = $this->getDoctrine()->getManager();
            $em->persist($four);
            $em->flush();
            return $this->redirectToRoute('four', array());
        }
        return $this->redirectToRoute('four', array());
    }

    /**
     * @Route("/delfr/{id}", name="delFour")
     */
    public function deleteFourAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $rayon = $em->getRepository('StockBundle:Fournisseur')->find($id);
        $em->remove($rayon);
        $em->flush();
        $this->addFlash(
                        'notice',
                        'Article Supprimer'
                    );
        return $this->redirectToRoute('four');
    }

    /**
     * @Route("/delfb/{id}", name="delFab")
     */
    public function deleteFabAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $rayon = $em->getRepository('StockBundle:Fabriquant')->find($id);
        $em->remove($rayon);
        $em->flush();
        $this->addFlash(
                        'notice',
                        'Article Supprimer'
                    );
        return $this->redirectToRoute('four');
    }

}
