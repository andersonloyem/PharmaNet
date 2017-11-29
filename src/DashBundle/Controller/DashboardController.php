<?php

namespace DashBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

class DashboardController extends Controller
{
    /**
     * @Route("/home", name="acceuil")
     */
    public function indexAction(Request $request)
    {
        return $this->render('DashBundle:Dashboard:index.html.twig', array());
    }

}
