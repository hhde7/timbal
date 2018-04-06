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
use LFP\UserBundle\Entity\User;
use LFP\TimbalBundle\Form\CourseType;
use LFP\UserBundle\Form\UserType;

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
          ->render('LFPTimbalBundle:Course:index.html.twig', [
            'text' => 'Timbal',
            'caption' => 'Your TimeTable Maker'
        ]);
        // NOTE: important
        // return $this->render('LFPTimbalBundle:Course:index.html.twig', [
        //
        //   ] );
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


        $course->setUser($this->getUser());

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $chosenDay = $form->getData()->getDay();
            // Set a number to each day for sorting
            switch ($chosenDay) {
                case 'Monday':
                    $course->setDayRank(1);
                    break;
                case 'Tuesday':
                    $course->setDayRank(2);
                    break;
                case 'Wednesday':
                    $course->setDayRank(3);
                    break;
                case 'Thursday':
                    $course->setDayRank(4);
                    break;
                case 'Friday':
                    $course->setDayRank(5);
                    break;
                case 'Saturday':
                    $course->setDayRank(6);
                    break;
                case 'Sunday':
                    $course->setDayRank(7);
                    break;
            }
            $em = $this->getDoctrine()->getManager();
            $em->persist($course);
            $em->flush();



            $request->getSession()->getFlashBag()->add('notice', 'Course added !');

            return $this->redirectToRoute('lfp_timbal_new');
        }

        $content = $this
      ->get('templating')
      ->render('LFPTimbalBundle:Course:new.html.twig', array(
        'form' => $form->createView(),'action1' => 'Day & Time', 'action2' => 'Teacher',
         'action3' => 'Course', 'action4' => 'Building', 'action5' => 'Room'))
      ;

        return new Response($content);
    }

    public function menuAction()
    {
        $repository = $this
          ->getDoctrine()
          ->getManager()
          ->getRepository('LFPTimbalBundle:Course')
      ;

        $currentUser = $this->getUser();

        if (isset($currentUser)) {
            // Gets current user courses
            // according his id
            $userCourses = $repository->findBy(
            array('user' => $currentUser->getId())
          );
            // Gets the number linked to the course's day
            // This number will help to order the days chronologically
            $em = $this->getDoctrine()->getManager();
            $query = $em->createQuery('SELECT DISTINCT c.dayRank FROM LFPTimbalBundle:Course c WHERE c.user = :user');
            $query->setParameter('user', $currentUser->getId());
            $dayRanks = $query->getResult();
        } else {
            $userCourses = 'User not logged';
            $dayRanks = [];
        }


        $content = $this
      ->get('templating')
      ->render(
          'LFPTimbalBundle:Course:menu.html.twig',
                array('userCourses' => $userCourses,
                      'dayRanks' => $dayRanks)
      );

        return new Response($content);
    }
}
