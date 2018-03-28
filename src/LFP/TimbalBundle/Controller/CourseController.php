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
use LFP\TimbalBundle\Entity\Course;
use LFP\TimbalBundle\Entity\User;
use LFP\TimbalBundle\Form\CourseType;
use LFP\TimbalBundle\Form\UserType;

class CourseController extends Controller
{
    /**
     * Matches / exactly
     *
     * @Route("/ ", name="lfp_timbal_home")
     */
    public function indexAction()
    {
        $content = $this
          ->get('templating')
          ->render('LFPTimbalBundle:Course:index.html.twig', array('text' => 'Timbal',
                                                                   'caption' => 'Your TimeTable Maker'
                                                                   ))
      ;

        return new Response($content);
    }
    /**
     * Matches /id exactly
     *
     * @Route("/id ", name="lfp_timbal_id")
     */
    public function idAction(Request $request)
    {
        $user = new User();

        $form = $this->get('form.factory')->create(UserType::class, $user);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($user);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'User added !');

            return $this->redirectToRoute('lfp_timbal_new');
        }


        // À ce stade, le formulaire n'est pas valide car :
        // - Soit la requête est de type GET, donc le visiteur vient d'arriver sur la page et veut voir le formulaire
        // - Soit la requête est de type POST, mais le formulaire contient des valeurs invalides, donc on l'affiche de nouveau
        return $this->render('LFPTimbalBundle:Course:id.html.twig', array(
   'form' => $form->createView()));
    }

    /**
     * Matches /new exactly
     *
     * @Route("/new", name="lfp_timbal_new")
     */
    public function newAction(Request $request)
    {
        $course = new Course();

        $form = $this->get('form.factory')->create(CourseType::class, $course);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($course);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Course added !');

            return $this->redirectToRoute('lfp_timbal_home', array('id' => $course->getId()));
        }


        $content = $this
      ->get('templating')
      ->render('LFPTimbalBundle:Course:new.html.twig', array(
        'form' => $form->createView(),'action1' => 'Day & Time', 'action2' => 'Teacher',
         'action3' => 'Course', 'action4' => 'Building', 'action5' => 'Room'))
      ;


        return new Response($content);
    }

    /**
     * Matches /add
     *
     * @Route("/add", name="lfp_timbal_add")
     */
    public function addAction(Request $request)
    {
        $user = new User();


        $course = new Course();

        $form = $this->get('form.factory')->create(CourseType::class, $course);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($course);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', 'Course added !');

            return $this->redirectToRoute('lfp_timbal_home', array('id' => $course->getId()));
        }


        // À ce stade, le formulaire n'est pas valide car :
        // - Soit la requête est de type GET, donc le visiteur vient d'arriver sur la page et veut voir le formulaire
        // - Soit la requête est de type POST, mais le formulaire contient des valeurs invalides, donc on l'affiche de nouveau
        return $this->render('LFPTimbalBundle:Course:add.html.twig', array(
     'form' => $form->createView()));
    }

    public function menuAction()
    {
        $repository = $this
          ->getDoctrine()
          ->getManager()
          ->getRepository('LFPTimbalBundle:Course')
      ;

        $listCourses = $repository->findBy(
        array('user' => 24)
      );

        $repository = $this
          ->getDoctrine()
          ->getManager()
          ->getRepository('LFPTimbalBundle:User')
      ;

        $user = $repository->find(24);


        $content = $this
      ->get('templating')
      ->render(
          'LFPTimbalBundle:Course:menu.html.twig',
                array('listCourses' => $listCourses )
      );

        return new Response($content);
    }
}
