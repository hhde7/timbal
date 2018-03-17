<?php

// src/LFP/TimbalBunble/Controller/CourseController.php

namespace LFP\TimbalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

class CourseController extends Controller
{
     /**
      * Matches / exactly
      *
      * @Route("/ ", name="lfp_timbal_home")
      */
    public function indexAction()
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
    /**
      * Matches /what exactly
      *
      * @Route("/what", name="lfp_timbal_what")
      */
    public function whatAction()
    {
        $content = $this
          ->get('templating')
          ->render('LFPTimbalBundle:Course:what.html.twig', array('text' => 'What',
                                                                     'caption' => 'Teacher & Course'))
        ;

        return new Response($content);
    }
    /**
      * Matches /when exactly
      *
      * @Route("/when", name="lfp_timbal_when")
      */
    public function whenAction()
    {
        $content = $this
          ->get('templating')
          ->render('LFPTimbalBundle:Course:when.html.twig', array('text' => 'When',
                                                                     'caption' => 'Day & Time'))
        ;

        return new Response($content);
    }
    /**
      * Matches /where exactly
      *
      * @Route("/where", name="lfp_timbal_where")
      */
    public function whereAction()
    {
        $content = $this
          ->get('templating')
          ->render('LFPTimbalBundle:Course:where.html.twig', array('text' => 'Where',
                                                                     'caption' => 'Room\'s Coordinates'))
        ;

        return new Response($content);
    }
    /**
      * Matches /course/* exactly
      *
      * @Route("/course/{id}", name="lfp_timbal_wiew")
      */
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
        $listCourses = array(
            array('id' => 2, 'title' => 'Geography'),
            array('id' => 5, 'title' => 'History'),
            array('id' => 9, 'title' => 'Arithmetics')
        );

        return $this->render('LFPTimbalBundle:Course:menu.html.twig', array(
            // Tout l'intérêt est ici : le contrôleur passe
            // les variables nécessaires au template !
            'listCourses' => $listCourses
        ));
    }

    public function viewSlugAction($_locale, $slug, $year, $_format)
    {
        return new Response(
              "On pourrait afficher l'annonce correspondant au
              slug '" .$slug."', créée en ".$year." et au format ".$_format. "."
        );
    }
    /**
     * Matches /see-course/* exactly
     *
     * @Route("/see-course/{id} ", name="lfp_timbal_see-course")
     */
    public function seeAction($id)
    {
        $content = $this
          ->get('templating')
          ->render('LFPTimbalBundle:Course:see.html.twig', array('text' => 'Voilà your course :' . $id,
                                                                   'caption' => 'Timbal Team'))
      ;

        return new Response($content);
    }
}
