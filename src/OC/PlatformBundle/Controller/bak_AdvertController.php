<?php

// src/OC/PlatformBundle/Controller/AdvertController.php

namespace OC\PlatformBundle\Controller;

// N'oubliez pas ce use :
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class AdvertController extends Controller
{
  public function indexAction()
  {
	//return new Response("Notre propre Hello World !"); //Premier test retour direct sans template
    //$content = $this->get('templating')->render('OCPlatformBundle:Advert:index.html.twig'); //Retour avec template mais sans variable
	
	//Retour avec variable
	$content = $this
    ->get('templating')
    ->render('OCPlatformBundle:Advert:index.html.twig', array('nom' => 'Russel','postnom' => 'musasa'))
	;
	
    return new Response($content);
  }
  
  public function byebyeAction()
  {
	//return new Response("BYE !");
	//Retour avec variable
	$contentbye = $this
    ->get('templating')
    ->render('OCPlatformBundle:Advert:byebye.html.twig', array('nom' => 'Russel','postnom' => 'musasa'))
	;
	
    return new Response($contentbye);
  }
}