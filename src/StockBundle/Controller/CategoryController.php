<?php

namespace StockBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use StockBundle\Entity\Categorie;


/**
 * @Route("/category")
*/
class CategoryController extends Controller
{
    /**
     * @Route("/", name="category")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $cat = $em->getRepository('StockBundle:Categorie')->findAll();
        return $this->render('StockBundle:Category:index.html.twig', array(
            'cats' => $cat, 'produit'=> null
        ));
    }

    /**
     * @Route("/new", name="newCat")
     */
    public function newAction(Request $request)
    {
        $cat = new Categorie;
        if ($request->getMethod() == 'POST') {
        	$cat->setNom($request->get('nomCat'));
        	$cat->setCode($request->get('codeCat'));
            $cat->setParent("0");
            $em = $this->getDoctrine()->getManager();
            $em->persist($cat);
            $em->flush();

            return $this->redirectToRoute('category', array());
        }
        return $this->render('StockBundle:Category:new.html.twig', array(
            // ...
        ));
    }
    
    public function detailAction()
    {
        
    }

}
