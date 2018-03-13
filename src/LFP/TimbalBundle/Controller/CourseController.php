<?php

// src//LFP/TimbalBunble/Controller/CourseController.phpinfo

namespace LFP\TimbalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class CourseController extends Controller
{
    public function indexAction($page)
    {

      // Remplace $page by $progress -> 0 = animation
        //                             -> 1 = first crossroads (what do you want to do ?)
        /*
          if ($page < 1) {
              // On déclenche une exception NotFoundHttpException, cela va afficher
              // une page d'erreur 404 (qu'on pourra personnaliser plus tard d'ailleurs)
              throw new NotFoundHttpException('Page "'.$page.'" inexistante.');
          }
*/
        $content = $this
          ->get('templating')
          ->render('LFPTimbalBundle:Course:index.html.twig', array('text' => 'Timbal',
                                                                   'caption' => 'Your TimeTable Maker'))
      ;

        return new Response($content);
    }

    public function whatAction()
    {
        $content = $this
          ->get('templating')
          ->render('LFPTimbalBundle:Course:what.html.twig', array('text' => 'What',
                                                                     'caption' => 'Teacher & Course'))
        ;

        return new Response($content);
    }

    public function whenAction()
    {
        $content = $this
          ->get('templating')
          ->render('LFPTimbalBundle:Course:when.html.twig', array('text' => 'When',
                                                                     'caption' => 'Day & Time'))
        ;

        return new Response($content);
    }

    public function whereAction()
    {
        $content = $this
          ->get('templating')
          ->render('LFPTimbalBundle:Course:where.html.twig', array('text' => 'Where',
                                                                     'caption' => 'Room\'s Coordinates'))
        ;

        return new Response($content);
    }

    public function viewAction($id)
    {
        return $this->render('LFPTimbalBundle:Course:view.html.twig', array('id' => $id));
    }

    public function addAction(Request $request)
    {
        // La gestion d'un formulaire est particulière, mais l'idée est la suivante :

        // Si la requête est en POST, c'est que le visiteur a soumis le formulaire
        if ($request->isMethod('POST')) {
            // Ici, on s'occupera de la création et de la gestion du formulaire

            $request->getSession()->getFlashBag()->add('notice', 'Annonce bien enregistrée.');

            // Puis on redirige vers la page de visualisation de cettte annonce
            return $this->redirectToRoute('lfp_timbal_view', array('id' => 5));
        }

        // Si on n'est pas en POST, alors on affiche le formulaire
        return $this->render('LFPTimbalBundle:Course:add.html.twig');
    }

    public function editAction($id, Request $request)
    {
        // Ici, on récupérera l'annonce correspondante à $id

        // Même mécanisme que pour l'ajout
        if ($request->isMethod('POST')) {
            $request->getSession()->getFlashBag()->add('notice', 'Annonce bien modifiée.');

            return $this->redirectToRoute('lfp_timbal_view', array('id' => 5));
        }

        return $this->render('LFPTimbalBundle:Collect:edit.html.twig');
    }

    public function deleteAction($id)
    {
        // Ici, on récupérera l'annonce correspondant à $id

        // Ici, on gérera la suppression de l'annonce en question

        return $this->render('LFPTimbalBundle:Collect:delete.html.twig');
    }

    public function menuAction()
    {
        // On fixe en dur une liste ici, bien entendu par la suite
        // on la récupérera depuis la BDD !
        $listAdverts = array(
            array('id' => 2, 'title' => 'Recherche développeur Symfony'),
            array('id' => 5, 'title' => 'Mission de webmaster'),
            array('id' => 9, 'title' => 'Offre de stage webdesigner')
        );

        return $this->render('LFPTimbalBundle:Course:menu.html.twig', array(
            // Tout l'intérêt est ici : le contrôleur passe
            // les variables nécessaires au template !
            'listAdverts' => $listAdverts
        ));
    }

    public function viewSlugAction($_locale, $slug, $year, $_format)
    {
        return new Response(
              "On pourrait afficher l'annonce correspondant au
              slug '" .$slug."', créée en ".$year." et au format ".$_format. "."
        );
    }

    public function closeAction()
    {
        $content = $this
          ->get('templating')
          ->render('LFPTimbalBundle:Course:close.html.twig', array('text' => 'See Ya\' !',
                                                                   'caption' => 'Timbal Team'))
      ;

        return new Response($content);
    }
}
