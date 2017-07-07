<?php

// src/OC/PlatformBundle/Controller/AdvertController.php

namespace OC\PlatformBundle\Controller;

// N'oubliez pas ce use :
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class AdvertController extends Controller
{
  // On récupère tous les paramètres en arguments de la méthode
    public function viewSlugAction($slug, $year, $_format)
    {
        return new Response(
            "On pourrait afficher l'annonce correspondant au
            slug '".$slug."', créée en ".$year." et au format ".$_format."."
        );
    }

  public function viewAction($id)
  {
    // $id vaut 5 si l'on a appelé l'URL /platform/advert/5

    // Ici, on récupèrera depuis la base de données
    // l'annonce correspondant à l'id $id.
    // Puis on passera l'annonce à la vue pour
    // qu'elle puisse l'afficher

    //return new Response("Affichage de l'annonce d'id : ".$id);
	//Retour avec variable
	//$content = $this
    //->get('templating')
    //->render('OCPlatformBundle:Advert:urltest.html.twig', array('advert_id' =>$id, 'prenom' => 'Russel'))
	//;
	//return new Response($content);
	
	//Retour direct
	return new Response("Affichage de l'annonce dont l'id est: ".$id);
	
  }
  public function indexAction($page)
  {
	//return new Response("Notre propre Hello World !"); //Premier test retour direct sans template
    //$content = $this->get('templating')->render('OCPlatformBundle:Advert:index.html.twig'); //Retour avec template mais sans variable
	
	//Retour avec variable
	//$content = $this
    //->get('templating')
    //->render('OCPlatformBundle:Advert:index.html.twig', array('nom' => 'Russel','postnom' => 'musasa'))
	//;
	
    //return new Response($content);
	
	// On veut avoir l'URL de l'annonce d'id 5. "Generation de route"
    //$url = $this->get('router')->generate('oc_platform_view', // 1er argument : le nom de la route
    //    array('id' => 5), // 2e argument : les valeurs des paramètres
	//	UrlGeneratorInterface::ABSOLUTE_URL
    //);
    // $url vaut « /platform/advert/5 »
	//Autre url page index:
	//$url = $this->get('router')->generate('oc_platform_home', array(), UrlGeneratorInterface::ABSOLUTE_URL);
	//return new Response($url);
	
	///////////////////////////////
	//Retour avec variable
	$content = $this
    ->get('templating')
    ->render('OCPlatformBundle:Advert:index.html.twig', array('nom' => 'Muamba', 'prenom' => 'Russel' , 'page' => $page))
	;
	return new Response($content);
	
  }
  public function addAction()
  {
	//Retour direct
	return new Response("Ajout de l'Annonce ");
  }
  public function editAction($id)
  {
	//Retour direct
	return new Response("Edition de l'Annonce dont l'Id est: ".$id);
  }
  public function deleteAction($id)
  {
	//Retour direct
	return new Response("Suppression de l'Annonce dont l'Id est: ".$id);
  }
  
}