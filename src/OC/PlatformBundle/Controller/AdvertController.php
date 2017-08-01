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
  // On rÃƒÆ’Ã‚Â©cupÃƒÆ’Ã‚Â¨re tous les paramÃƒÆ’Ã‚Â¨tres en arguments de la mÃƒÆ’Ã‚Â©thode
    public function viewSlugAction($slug, $year, $_format)
    {
        return new Response(
            "On pourrait afficher l'annonce correspondant au
            slug '".$slug."', crêª¥ en ".$year." et au format ".$_format."."
        );
    }

  public function viewAction($id)
  {
    // $id vaut 5 si l'on a appelÃƒÆ’Ã‚Â© l'URL /platform/advert/5

    // Ici, on rÃƒÆ’Ã‚Â©cupÃƒÆ’Ã‚Â¨rera depuis la base de donnÃƒÆ’Ã‚Â©es
    // l'annonce correspondant ÃƒÆ’Ã‚Â  l'id $id.
    // Puis on passera l'annonce ÃƒÆ’Ã‚Â  la vue pour
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
	//$url = $this->get('router')->generate('oc_platform_home');	//GÃƒÆ’Ã‚Â©nÃƒÆ’Ã‚Â©rer url
    //Rediriger
    //return $this->redirect($url);
  ///////////////////////////////////////////////////
    // Ici, on rÃƒÆ’Ã‚Â©cupÃƒÆ’Ã‚Â©rera l'annonce correspondante ÃƒÆ’Ã‚Â  l'id $id

    //return $this->render('OCPlatformBundle:Advert:view.html.twig', array(
    //  'id' => $id
    //));
    $advert = null;

    if ($id ==1)
    {
      $advert = array(
      'title'   => 'Recherche développpeur Symfony',
      'id'      => $id,
      'author'  => 'Alexandre',
      'content' => 'Nous recherchons un développeur Symfony débutant sur Lyon. Blabla...',
      'date'    => new \Datetime());
    }else if($id ==2)
    {
      $advert = array(
        'title'   => 'Mission de webmaster',
        'id'      => $id,
        'author'  => 'Hugo',
        'content' => 'Nous recherchons un webmaster capable de maintenir notre site internet. Blabla...',
        'date'    => new \Datetime());

    }else if($id ==3)
    {
      $advert = array(
        'title'   => 'Offre de stage webdesigner',
        'id'      => $id,
        'author'  => 'Mathieu',
        'content' => 'Nous proposons un poste pour webdesigner. Blabla...',
        'date'    => new \Datetime());
    }

    return $this->render('OCPlatformBundle:Advert:view.html.twig', array(
      'advert' => $advert
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
    //    array('id' => 5), // 2e argument : les valeurs des paramÃƒÆ’Ã‚Â¨tres
	//	UrlGeneratorInterface::ABSOLUTE_URL
    //);
    // $url vaut Ãƒâ€šÃ‚Â« /platform/advert/5 Ãƒâ€šÃ‚Â»
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
    // Notre liste d'annonce en dur
    $listAdverts = array(
      array(
        'title'   => 'Recherche développpeur Symfony',
        'id'      => 1,
        'author'  => 'Alexandre',
        'content' => 'Nous recherchons un développeur Symfony dê£µtant sur Lyon. Blabla...',
        'date'    => new \Datetime()),
      array(
        'title'   => 'Mission de webmaster',
        'id'      => 2,
        'author'  => 'Hugo',
        'content' => 'Nous recherchons un webmaster capable de maintenir notre site internet. Blabla...',
        'date'    => new \Datetime()),
      array(
        'title'   => 'Offre de stage webdesigner',
        'id'      => 3,
        'author'  => 'Mathieu',
        'content' => 'Nous proposons un poste pour webdesigner. Blabla...',
        'date'    => new \Datetime())
    );
    
    // On ne sait pas combien de pages il y a
    // Mais on sait qu'une page doit ÃƒÆ’Ã‚Âªtre supÃƒÆ’Ã‚Â©rieure ou ÃƒÆ’Ã‚Â©gale ÃƒÆ’Ã‚Â  1
    if (is_numeric($page) && $page < 1) {
      // On dÃƒÆ’Ã‚Â©clenche une exception NotFoundHttpException, cela va afficher
      // une page d'erreur 404 (qu'on pourra personnaliser plus tard d'ailleurs)
      throw new NotFoundHttpException('Page "'.$page.'" inexistante.');
    } elseif ($page =="") {
      $page = 1;
    }
    // Ici, on rÃƒÆ’Ã‚Â©cupÃƒÆ’Ã‚Â©rera la liste des annonces, puis on la passera au template

    // Mais pour l'instant, on ne fait qu'appeler le template
    //return $this->render('OCPlatformBundle:Advert:index.html.twig', array('nom' => 'Muamba', 'prenom' => 'Russel' , 'page' => $page));

    // Et modifiez le 2nd argument pour injecter notre liste
    return $this->render('OCPlatformBundle:Advert:index.html.twig', array(
      'listAdverts' => $listAdverts
    ));
	
  }
  public function addAction(Request $request)
  {
	//Retour direct
	//return new Response("Ajout de l'Annonce ");

  //  $session = $request->getSession();
    
    // Bien sÃƒÆ’Ã‚Â»r, cette mÃƒÆ’Ã‚Â©thode devra rÃƒÆ’Ã‚Â©ellement ajouter l'annonce
    
    // Mais faisons comme si c'ÃƒÆ’Ã‚Â©tait le cas
    //$session->getFlashBag()->add('info', 'Annonce bien enregistré');

    // Le Ãƒâ€šÃ‚Â« flashBag Ãƒâ€šÃ‚Â» est ce qui contient les messages flash dans la session
    // Il peut bien sÃƒÆ’Ã‚Â»r contenir plusieurs messages :
    //$session->getFlashBag()->add('info', 'Oui oui, elle est bien enregistrÃƒÆ’Ã‚Â©e !');

    // Puis on redirige vers la page de visualisation de cette annonce
  //  return $this->redirectToRoute('oc_platform_view', array('id' => 5));
  ////////////////////////////////////////////////////////////
    // La gestion d'un formulaire est particuliÃƒÆ’Ã‚Â¨re, mais l'idÃƒÆ’Ã‚Â©e est la suivante :

    // Si la requÃƒÆ’Ã‚Âªte est en POST, c'est que le visiteur a soumis le formulaire
    if ($request->isMethod('POST')) {
      // Ici, on s'occupera de la crÃƒÆ’Ã‚Â©ation et de la gestion du formulaire

      $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée');

      // Puis on redirige vers la page de visualisation de cettte annonce
      return $this->redirectToRoute('oc_platform_view', array('id' => 5));
    }

    //test service
    // On récupère le service
    $antispam = $this->container->get('oc_platform.antispam');

    // Je pars du principe que $text contient le texte d'un message quelconque
    $text = 'gsdvsdsvhjsvvd zjdbksdczc bksjjsbc bjscjzsbcj jcbksjkcd cjksjdcbksbskc dbcksdjbksbscbs sdbksjbjczjc jcskdjckdjczjdk bcksdbjkjck';
    if ($antispam->isSpam($text)) {
      throw new \Exception('Votre message a été détecté comme spam !');
    }
    
    // Ici le message n'est pas un spam

    // Si on n'est pas en POST, alors on affiche le formulaire
    return $this->render('OCPlatformBundle:Advert:add.html.twig');
  }
  public function editAction($id, Request $request)
  {
	//Retour direct
	//return new Response("Edition de l'Annonce dont l'Id est: ".$id);

    // Ici, on rÃƒÆ’Ã‚Â©cupÃƒÆ’Ã‚Â©rera l'annonce correspondante ÃƒÆ’Ã‚Â  $id

    // MÃƒÆ’Ã‚Âªme mÃƒÆ’Ã‚Â©canisme que pour l'ajout
    //if ($request->isMethod('POST')) {
    //  $request->getSession()->getFlashBag()->add('notice', 'Annonce bien modifiÃƒÆ’Ã‚Â©e.');

    //  return $this->redirectToRoute('oc_platform_view', array('id' => 5));
    //}

    //return $this->render('OCPlatformBundle:Advert:edit.html.twig', array('id' => $id));

     $advert = array(
      'title'   => 'Recherche développpeur Symfony',
      'id'      => $id,
      'author'  => 'Alexandre',
      'content' => 'Nous recherchons un dê·¥loppeur Symfony dê£µtant sur Lyon. Blabla...',
      'date'    => new \Datetime()
    );

    return $this->render('OCPlatformBundle:Advert:edit.html.twig', array(
      'advert' => $advert
    ));
  }
  public function deleteAction($id)
  {
	//Retour direct
	//return new Response("Suppression de l'Annonce dont l'Id est: ".$id);

    // Ici, on rÃƒÆ’Ã‚Â©cupÃƒÆ’Ã‚Â©rera l'annonce correspondant ÃƒÆ’Ã‚Â  $id

    // Ici, on gÃƒÆ’Ã‚Â©rera la suppression de l'annonce en question

    $advert = null;

    if ($id ==1)
    {
      $advert = array(
      'title'   => 'Recherche développpeur Symfony2',
      'id'      => $id,
      'author'  => 'Alexandre',
      'content' => 'Nous recherchons un développeur Symfony2 dê£µtant sur Lyon. Blabla...',
      'date'    => new \Datetime());
    }else if($id ==2)
    {
      $advert = array(
        'title'   => 'Mission de webmaster',
        'id'      => $id,
        'author'  => 'Hugo',
        'content' => 'Nous recherchons un webmaster capable de maintenir notre site internet. Blabla...',
        'date'    => new \Datetime());

    }else if($id ==3)
    {
      $advert = array(
        'title'   => 'Offre de stage webdesigner',
        'id'      => $id,
        'author'  => 'Mathieu',
        'content' => 'Nous proposons un poste pour webdesigner. Blabla...',
        'date'    => new \Datetime());
    }

    return $this->render('OCPlatformBundle:Advert:delete.html.twig', array(
      'advert' => $advert
    ));
  }

  public function menuAction($limit)
  {
    // On fixe en dur une liste ici, bien entendu par la suite
    // on la rÃƒÆ’Ã‚Â©cupÃƒÆ’Ã‚Â©rera depuis la BDD !
    $listAdverts = array(
      array('id' => 1, 'title' => 'Recherche développeur Symfony'),
      array('id' => 2, 'title' => 'Mission de webmaster'),
      array('id' => 3, 'title' => 'Offre de stage webdesigner')
    );

    return $this->render('OCPlatformBundle:Advert:menu.html.twig', array(
      // Tout l'intÃƒÆ’Ã‚Â©rÃƒÆ’Ã‚Âªt est ici : le contrÃƒÆ’Ã‚Â´leur passe
      // les variables nÃƒÆ’Ã‚Â©cessaires au template !
      'listAdverts' => $listAdverts
    ));
  }
}