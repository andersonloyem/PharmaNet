<?php

namespace StockBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use StockBundle\Entity\Rayon;
use StockBundle\Entity\Forme;
use StockBundle\Entity\Magasin;
use StockBundle\Entity\Unite;
use StockBundle\Entity\Ville;
use StockBundle\Entity\CodePostal;
/**
 * @Route("geo")
 */
class GeonetController extends Controller
{
    /**
     * @Route("/", name="geo")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $rayon = $em->getRepository('StockBundle:Rayon')->findAll();
        $forme = $em->getRepository('StockBundle:Forme')->findAll();
        $mag = $em->getRepository('StockBundle:Magasin')->findAll();
        $cp = $em->getRepository('StockBundle:CodePostal')->findAll();
        $unite = $em->getRepository('StockBundle:Unite')->findAll();
        $ville = $em->getRepository('StockBundle:VIlle')->findAll();
        return $this->render('StockBundle:Geonet:index.html.twig', array(
            'forme' => $forme,
            'mag' => $mag,
            'rayon' => $rayon,
            'ville' => $ville,
            'unite' => $unite,
            'cp' => $cp
        ));
    }

   /*Rayon*/ 
   /**
     * @Route("/rayon", name="newRayon")
     */
    public function newRayonAction(Request $request)
    {
    	$rayon = new Rayon;
        if ($request->getMethod() == 'POST') {
        	$rayon->setCode($request->get('codeRayon'));
        	$rayon->setNom($request->get('nomRayon'));
            $em = $this->getDoctrine()->getManager();
            $em->persist($rayon);
            $em->flush();

            return $this->redirectToRoute('geo', array());
        }

        return $this->render('message/new.html.twig', array(
            'rayon' => $rayon,
        ));
    }
    /**
     * @Route("/rayon/del/{id}", name="delRayon")
     */
    public function deleteRayonAction($id)
    {
    	$em = $this->getDoctrine()->getManager();
        $rayon = $em->getRepository('StockBundle:Rayon')->find($id);
        $em->remove($rayon);
        $em->flush();
        $this->addFlash(
                        'notice',
                        'Article Supprimer'
                    );
        return $this->redirectToRoute('geo');
    }
 
/*FORME*/ 
    /**
     * @Route("/forme", name="newForme")
     */
    public function newFormeAction(Request $request)
    {
    	$forme = new Forme;
        if ($request->getMethod() == 'POST') {
        	$forme->setCode($request->get('codeForme'));
        	$forme->setNom($request->get('nomForme'));
            $em = $this->getDoctrine()->getManager();
            $em->persist($forme);
            $em->flush();

            return $this->redirectToRoute('geo', array());
        }

        return $this->render('message/new.html.twig', array(
            'Forme' => $forme,
        ));
    }

    public function getAllFormeAction()
    {
    	$em = $this->getDoctrine()->getManager();
        $forme = $em->getRepository('StockBundle:Forme')->findAll();
        return $this->render('message/index.html.twig', array('forme' => $forme));
    }

    /**
     * @Route("/forme/del/{id}", name="delForme")
     */
	public function deleteFormeAction($id)
    {
    	$em = $this->getDoctrine()->getManager();
        $forme = $em->getRepository('StockBundle:Forme')->find($id);
        $em->remove($forme);
        $em->flush();
        $this->addFlash(
                        'notice',
                        'Article Supprimer'
                    );
        return $this->redirectToRoute('geo');
    }

    /* MAGASIN */
    /**
     * @Route("/mag", name="newMag")
     */
    public function newMagAction(Request $request)
    {
    	$mag = new Magasin;
        if ($request->getMethod() == 'POST') {
        	$mag->setCode($request->get('codeMag'));
        	$mag->setNom($request->get('nomMag'));
            $em = $this->getDoctrine()->getManager();
            $em->persist($mag);
            $em->flush();

            return $this->redirectToRoute('geo', array());
        }

        return $this->render('message/new.html.twig', array(
            'Mag' => $mag,
        ));
    }

    public function getAllMagAction()
    {
    	$em = $this->getDoctrine()->getManager();
        $mag = $em->getRepository('StockBundle:Magasin')->findAll();
        return $this->render('message/index.html.twig', array('mag' => $mag));
    }

    /**
     * @Route("/mag/del/{id}", name="delMag")
     */
	public function deleteMagAction($id)
    {
    	$em = $this->getDoctrine()->getManager();
        $mag = $em->getRepository('StockBundle:Magasin')->find($id);
        $em->remove($mag);
        $em->flush();
        $this->addFlash(
                        'notice',
                        'Article Supprimer'
                    );
        return $this->redirectToRoute('geo');
    }

    /* UNITE */
    /**
     * @Route("/unite", name="newUnite")
     */
    public function newUniteAction(Request $request)
    {
    	$unite = new Unite;
        if ($request->getMethod() == 'POST') {
        	$unite->setNom($request->get('nomUnite'));
            $unite->setLibelle($request->get('libUnite'));
            $em = $this->getDoctrine()->getManager();
            $em->persist($unite);
            $em->flush();

            return $this->redirectToRoute('geo', array());
        }

        return $this->render('message/new.html.twig', array(
            'Unite' => $unite,
        ));
    }

    public function getAllUniteAction()
    {
    	$em = $this->getDoctrine()->getManager();
        $unite = $em->getRepository('StockBundle:Unite')->findAll();
        return $this->render('message/index.html.twig', array('unite' => $unite));
    }
	 /**
     * @Route("/unite/del/{id}", name="delUnite")
     */
    public function deleteUniteAction($id)
    {
    	$em = $this->getDoctrine()->getManager();
        $unite = $em->getRepository('StockBundle:Unite')->find($id);
        $em->remove($unite);
        $em->flush();
        $this->addFlash(
                        'notice',
                        'Article Supprimer'
                    );
        return $this->redirectToRoute('geo');
    }

    /* VILLE */
    /**
     * @Route("/ville", name="newVille")
     */
    public function newVilleAction(Request $request)
    {
    	$ville = new Ville;
        if ($request->getMethod() == 'POST') {
        	$ville->setNom($request->get('nomVille'));
        	$ville->setCode($request->get('codeVille'));
            $em = $this->getDoctrine()->getManager();
            $em->persist($ville);
            $em->flush();

            return $this->redirectToRoute('geo', array());
        }

        return $this->render('message/new.html.twig', array(
            'Ville' => $ville,
        ));
    }

    public function getAllVilleAction()
    {
    	$em = $this->getDoctrine()->getManager();
        $ville = $em->getRepository('StockBundle:VIlle')->findAll();
        return $this->render('message/index.html.twig', array('ville' => $ville));
    }
	/**
     * @Route("/ville/del/{id}", name="delVille")
     */
    public function deleteVilleAction($id)
    {
    	$em = $this->getDoctrine()->getManager();
        $ville = $em->getRepository('StockBundle:Ville')->find($id);
        $em->remove($ville);
        $em->flush();
        $this->addFlash(
                        'notice',
                        'Article Supprimer'
                    );
        return $this->redirectToRoute('geo');
    }

    /* code postal */
    /**
     * @Route("/cp", name="newCP")
     */
    public function newCPAction(Request $request)
    {
    	$cp = new CodePostal;
        if ($request->getMethod() == 'POST') {
        	$cp->setNom($request->get('cp'));
        	$cp->setCode($request->get('code'));
            $ville = $this->getDoctrine()->getRepository(Ville::class)
                                            ->find($request->get('ville'));
        	$cp->setVille($ville);
            $em = $this->getDoctrine()->getManager();
            $em->persist($cp);
            $em->flush();

            return $this->redirectToRoute('geo', array());
        }

        return $this->render('message/new.html.twig', array(
            'cp' => $cp,
        ));
    }

    public function getAllCPAction()
    {
    	$em = $this->getDoctrine()->getManager();
        $cp = $em->getRepository('StockBundle:CodePostal')->findAll();
        return $this->render('message/index.html.twig', array('cp' => $cp));
    }
	/**
     * @Route("/cp/del/{id}", name="delCP")
     */
    public function deleteCPAction($id)
    {
    	$em = $this->getDoctrine()->getManager();
        $cp = $em->getRepository('StockBundle:CodePostal')->find($id);
        $em->remove($cp);
        $em->flush();
        $this->addFlash(
                        'notice',
                        'Article Supprimer'
                    );
        return $this->redirectToRoute('geo');
    }
}
