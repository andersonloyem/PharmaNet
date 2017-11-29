<?php

namespace StockBundle\Controller;
use StockBundle\Entity\Produit;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use StockBundle\Entity\Rayon;
use StockBundle\Entity\Forme;
use StockBundle\Entity\Magasin;
use StockBundle\Entity\Unite;
use StockBundle\Entity\Categorie;
use StockBundle\Entity\Fabriquant;
use StockBundle\Entity\History;
use \Datetime;
use Doctrine\ORM\Exception;
/**
     * @Route("/produit")
     */
class ProduitController extends Controller
{
    /**
     * @Route("/", name ="produit")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $produit = $em->getRepository('StockBundle:Produit')->findAll();
        return $this->render('StockBundle:Produit:index.html.twig', array('produit' => $produit));
    }

    /**
     * @Route("/new", name="newProduit")
     */
    public function newAction()
    {
        $em = $this->getDoctrine()->getManager();
        $fabriquant = $em->getRepository('StockBundle:Fabriquant')->findAll();
        $forme = $em->getRepository('StockBundle:Forme')->findAll();
        $mag = $em->getRepository('StockBundle:Magasin')->findAll();
        $rayon = $em->getRepository('StockBundle:Rayon')->findAll();
        $categorie = $em->getRepository('StockBundle:Categorie')->findAll();
        $unite = $em->getRepository('StockBundle:unite')->findAll();
        return $this->render('StockBundle:Produit:new.html.twig', array(
            'fabriquant' => $fabriquant,
            'forme' => $forme,
            'mag' => $mag,
            'rayon' => $rayon,
            'categorie' => $categorie,
            'unite' => $unite
        ));
    }

    /**
     * @Route("/save", name="saveProduit")
     */
    public function saveAction(Request $request)
    {
        
        if ($request->getMethod() == 'POST') {
        try {
            $produit = new Produit;
             $categorie = $this->getDoctrine()->getRepository(Categorie::class)
                                            ->find($request->get('cat'));
            $fab = $this->getDoctrine()->getRepository(Fabriquant::class)
                                            ->find($request->get('fab'));
            $forme = $this->getDoctrine()->getRepository(Forme::class)
                                            ->find($request->get('forme'));
            $mag = $this->getDoctrine()->getRepository(Magasin::class)
                                            ->find($request->get('mag'));
            $ray = $this->getDoctrine()->getRepository(Rayon::class)
                                            ->find($request->get('ray'));
            $unit = $this->getDoctrine()->getRepository(Unite::class)
                                            ->find($request->get('unite'));

            $produit->setNom($request->get('nom')); $produit->setEan13($request->get('ean13'));
            $produit->setDescription($request->get('description'));
            //$produit->setNoLot($request->get('nolot')); $produit->setContenance($request->get('contenance'));
            $produit->setUnite($unit); $produit->setStock($request->get('stock'));
            $produit->setStockmax($request->get('stockmax')); $produit->setStockmin($request->get('stockmin'));
            
            $produit->setDatePeremption(\DateTime::createFromFormat('d-m-Y',$request->get('datPeremp')));
            $produit->setDateCmd(\DateTime::createFromFormat('d-m-Y',$request->get('datCmd')));
            
            $produit->setGenerique($request->get('generique')); $produit->setPrixPublic($request->get('pp'));
            $produit->setPrixAchat($request->get('pa')); $produit->setTva($request->get('tva'));
            $produit->setCategorie($categorie); $produit->setRayon($ray);
            $produit->setMagasin($mag); $produit->setForme($forme);
            $produit->setFabriquant($fab);

            $em = $this->getDoctrine()->getManager();
            $em->persist($produit);
            $em->flush();
        } catch (Exception $e) {
                return $this->render('StockBundle:Produit:new.html.twig', array(
                'err' => $e
                ));
        }
            return $this->redirectToRoute('produit', array());
        }
        return $this->redirectToRoute('produit', array());
    }
    /**
     * @Route("/update/{id}", name="updateProduit")
     */
    public function updateAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $fabriquant = $em->getRepository('StockBundle:Fabriquant')->findAll();
        $forme = $em->getRepository('StockBundle:Forme')->findAll();
        $mag = $em->getRepository('StockBundle:Magasin')->findAll();
        $rayon = $em->getRepository('StockBundle:Rayon')->findAll();
        $categorie = $em->getRepository('StockBundle:Categorie')->findAll();
        $unite = $em->getRepository('StockBundle:Unite')->findAll();
        
        $produit = $this->getDoctrine()->getRepository(Produit::class)
                                            ->find($id);
        $history = $this->getDoctrine()->getRepository(History::class)
                        ->findOneBy(array('produit' =>$id));

        return $this->render('StockBundle:Produit:update.html.twig', array(
            'produit' => $produit,
            'fabriquant' => $fabriquant,
            'forme' => $forme,
            'mag' => $mag,
            'rayon' => $rayon,
            'categorie' => $categorie,
            'unite' => $unite,
            'history' => $history
            ));
    }
    /**
     * @Route("/update/set/{id}", name="setUpdateProduit")
     */
    public function setUpdateAction($id, Request $request)
    {
        if ($request->getMethod() == 'POST') {
        try {
            $produit = $this->getDoctrine()->getRepository(Produit::class)
                                            ->find($id);
            $categorie = $this->getDoctrine()->getRepository(Categorie::class)
                                            ->find($request->get('cat'));
            $fab = $this->getDoctrine()->getRepository(Fabriquant::class)
                                            ->find($request->get('fab'));
            $forme = $this->getDoctrine()->getRepository(Forme::class)
                                            ->find($request->get('forme'));
            $mag = $this->getDoctrine()->getRepository(Magasin::class)
                                            ->find($request->get('mag'));
            $ray = $this->getDoctrine()->getRepository(Rayon::class)
                                            ->find($request->get('ray'));
            $unit = $this->getDoctrine()->getRepository(Unite::class)
                                            ->find($request->get('unite'));

            $produit->setNom($request->get('nom')); $produit->setEan13($request->get('ean13'));
            $produit->setDescription($request->get('description'));
            $produit->setNoLot($request->get('nolot')); $produit->setContenance($request->get('contenance'));
            $produit->setUnite($unit); $produit->setStock($request->get('stock'));
            $produit->setStockmax($request->get('stockmax')); $produit->setStockmin($request->get('stockmin'));
            
            $produit->setDatePeremption(\DateTime::createFromFormat('d-m-Y',$request->get('datPeremp')));
            $produit->setDateCmd(\DateTime::createFromFormat('d-m-Y',$request->get('datCmd')));
            
            $produit->setGenerique($request->get('generique')); $produit->setPrixPublic($request->get('pp'));
            $produit->setPrixAchat($request->get('pa')); $produit->setTva($request->get('tva'));
            $produit->setCategorie($categorie); $produit->setRayon($ray);
            $produit->setMagasin($mag); $produit->setForme($forme);
            $produit->setFabriquant($fab);
            
            $em = $this->getDoctrine()->getManager();
            $em->flush();
        } catch (Exception $e) {
                return $this->render('StockBundle:Produit:new.html.twig', array(
                'err' => $e
                ));
        }
            return $this->redirectToRoute('updateProduit', array('id' => $produit->getId()));
        }
        return $this->redirectToRoute('updateProduit', array());
    }
    /**
     * @Route("/duplicate/{id}", name="duplicateProduit")
     */
    public function duplicateAction($id){
        $produit = $this->getDoctrine()->getRepository(Produit::class)
                                            ->find($id);
        $produit->setId(null);
        $em = $this->getDoctrine()->getManager();
        $em->persist($produit);
        $em->flush();
        return $this->redirectToRoute('updateProduit', array('id' => $produit->getId()));
    }
}
