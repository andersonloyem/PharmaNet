<?php
namespace VenteBundle\Twig;

class VenteExtension extends \Twig_Extension{
    
  public function getFunctions()
  {
     return array(
          new \Twig_SimpleFunction('maFonction', array($this,'maFonctionQuiCalcul')),
     );
  }
 
  public function maFonctionQuiCalcul($argument){
    // Traitement ici
    return $argument;
  }
}