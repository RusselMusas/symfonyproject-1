<?php

// src/OC/PlatformBundle/Controller/AdvertController.php

namespace OC\PlatformBundle\Controller;

// N'oubliez pas ce use :
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request; // USE pour l'objet Request
use Symfony\Component\HttpFoundation\RedirectResponse; // USE for Redirect
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
	
	//Recuperer le Parametre Request
	//$tag = $request->query->get('tag');
	
	//Retour direct
	//return new Response("Affichage de l'annonce dont l'id est: ".$id. " Et le tag vaut: ".$tag);
	
	//Retour avec template 
	//return $this->render('OCPlatformBundle:Advert:view.html.twig', array(
  //    'id'  => $id,
  //    'tag' => $tag,
  //  ));
	
	//Test redirection
	//$url = $this->get('router')->generate('oc_platform_home');	//Générer url
    //Rediriger
    //return $this->redirect($url);
  ///////////////////////////////////////////////////
    // Ici, on récupérera l'annonce correspondante à l'id $id

    return $this->render('OCPlatformBundle:Advert:view.html.twig', array(
      'id' => $id
    ));

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
	//$content = $this
  //  ->get('templating')
  //  ->render('OCPlatformBundle:Advert:index.html.twig', array('nom' => 'Muamba', 'prenom' => 'Russel' , 'page' => $page))
	//;
	//return new Response($content);

  ////////////////////////////////////////////////////////////////////////////////
    // On ne sait pas combien de pages il y a
    // Mais on sait qu'une page doit être supérieure ou égale à 1
    if ($page < 1) {
      // On déclenche une exception NotFoundHttpException, cela va afficher
      // une page d'erreur 404 (qu'on pourra personnaliser plus tard d'ailleurs)
      throw new NotFoundHttpException('Page "'.$page.'" inexistante.');
    }

    // Ici, on récupérera la liste des annonces, puis on la passera au template

    // Mais pour l'instant, on ne fait qu'appeler le template
    return $this->render('OCPlatformBundle:Advert:index.html.twig', array('nom' => 'Muamba', 'prenom' => 'Russel' , 'page' => $page));
	
  }
  public function addAction(Request $request)
  {
	//Retour direct
	//return new Response("Ajout de l'Annonce ");

  //  $session = $request->getSession();
    
    // Bien sûr, cette méthode devra réellement ajouter l'annonce
    
    // Mais faisons comme si c'était le cas
    //$session->getFlashBag()->add('info', 'Annonce bien enregistrée');

    // Le « flashBag » est ce qui contient les messages flash dans la session
    // Il peut bien sûr contenir plusieurs messages :
    //$session->getFlashBag()->add('info', 'Oui oui, elle est bien enregistrée !');

    // Puis on redirige vers la page de visualisation de cette annonce
  //  return $this->redirectToRoute('oc_platform_view', array('id' => 5));
  ////////////////////////////////////////////////////////////
    // La gestion d'un formulaire est particulière, mais l'idée est la suivante :

    // Si la requête est en POST, c'est que le visiteur a soumis le formulaire
    if ($request->isMethod('POST')) {
      // Ici, on s'occupera de la création et de la gestion du formulaire

      $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');

      // Puis on redirige vers la page de visualisation de cettte annonce
      return $this->redirectToRoute('oc_platform_view', array('id' => 5));
    }

    // Si on n'est pas en POST, alors on affiche le formulaire
    return $this->render('OCPlatformBundle:Advert:add.html.twig');
  }
  public function editAction($id, Request $request)
  {
	//Retour direct
	//return new Response("Edition de l'Annonce dont l'Id est: ".$id);

    // Ici, on récupérera l'annonce correspondante à $id

    // Même mécanisme que pour l'ajout
    if ($request->isMethod('POST')) {
      $request->getSession()->getFlashBag()->add('notice', 'Annonce bien modifiée.');

      return $this->redirectToRoute('oc_platform_view', array('id' => 5));
    }

    return $this->render('OCPlatformBundle:Advert:edit.html.twig', array('id' => $id));
  }
  public function deleteAction($id)
  {
	//Retour direct
	//return new Response("Suppression de l'Annonce dont l'Id est: ".$id);

    // Ici, on récupérera l'annonce correspondant à $id

    // Ici, on gérera la suppression de l'annonce en question

    return $this->render('OCPlatformBundle:Advert:delete.html.twig',array('id' => $id));
  }
  
}