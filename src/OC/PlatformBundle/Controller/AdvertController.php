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
  // On r�cup�re tous les param�tres en arguments de la m�thode
    public function viewSlugAction($slug, $year, $_format)
    {
        return new Response(
            "On pourrait afficher l'annonce correspondant au
            slug '".$slug."', cr��e en ".$year." et au format ".$_format."."
        );
    }

  public function viewAction($id)
  {
    // $id vaut 5 si l'on a appel� l'URL /platform/advert/5

    // Ici, on r�cup�rera depuis la base de donn�es
    // l'annonce correspondant � l'id $id.
    // Puis on passera l'annonce � la vue pour
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
	//$url = $this->get('router')->generate('oc_platform_home');	//G�n�rer url
    //Rediriger
    //return $this->redirect($url);
  ///////////////////////////////////////////////////
    // Ici, on r�cup�rera l'annonce correspondante � l'id $id

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
    //    array('id' => 5), // 2e argument : les valeurs des param�tres
	//	UrlGeneratorInterface::ABSOLUTE_URL
    //);
    // $url vaut � /platform/advert/5 �
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
    // Mais on sait qu'une page doit �tre sup�rieure ou �gale � 1
    if ($page < 1) {
      // On d�clenche une exception NotFoundHttpException, cela va afficher
      // une page d'erreur 404 (qu'on pourra personnaliser plus tard d'ailleurs)
      throw new NotFoundHttpException('Page "'.$page.'" inexistante.');
    }

    // Ici, on r�cup�rera la liste des annonces, puis on la passera au template

    // Mais pour l'instant, on ne fait qu'appeler le template
    return $this->render('OCPlatformBundle:Advert:index.html.twig', array('nom' => 'Muamba', 'prenom' => 'Russel' , 'page' => $page));
	
  }
  public function addAction(Request $request)
  {
	//Retour direct
	//return new Response("Ajout de l'Annonce ");

  //  $session = $request->getSession();
    
    // Bien s�r, cette m�thode devra r�ellement ajouter l'annonce
    
    // Mais faisons comme si c'�tait le cas
    //$session->getFlashBag()->add('info', 'Annonce bien enregistr�e');

    // Le � flashBag � est ce qui contient les messages flash dans la session
    // Il peut bien s�r contenir plusieurs messages :
    //$session->getFlashBag()->add('info', 'Oui oui, elle est bien enregistr�e !');

    // Puis on redirige vers la page de visualisation de cette annonce
  //  return $this->redirectToRoute('oc_platform_view', array('id' => 5));
  ////////////////////////////////////////////////////////////
    // La gestion d'un formulaire est particuli�re, mais l'id�e est la suivante :

    // Si la requ�te est en POST, c'est que le visiteur a soumis le formulaire
    if ($request->isMethod('POST')) {
      // Ici, on s'occupera de la cr�ation et de la gestion du formulaire

      $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistr�e.');

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

    // Ici, on r�cup�rera l'annonce correspondante � $id

    // M�me m�canisme que pour l'ajout
    if ($request->isMethod('POST')) {
      $request->getSession()->getFlashBag()->add('notice', 'Annonce bien modifi�e.');

      return $this->redirectToRoute('oc_platform_view', array('id' => 5));
    }

    return $this->render('OCPlatformBundle:Advert:edit.html.twig', array('id' => $id));
  }
  public function deleteAction($id)
  {
	//Retour direct
	//return new Response("Suppression de l'Annonce dont l'Id est: ".$id);

    // Ici, on r�cup�rera l'annonce correspondant � $id

    // Ici, on g�rera la suppression de l'annonce en question

    return $this->render('OCPlatformBundle:Advert:delete.html.twig',array('id' => $id));
  }
  
}