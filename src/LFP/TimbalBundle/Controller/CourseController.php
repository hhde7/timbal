<?php

// src/LFP/TimbalBunble/Controller/CourseController.php

namespace LFP\TimbalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use LFP\TimbalBundle\Entity\Course;
use LFP\TimbalBundle\Form\CourseType;
use LFP\UserBundle\Entity\User;
use LFP\UserBundle\Form\UserType;

class CourseController extends Controller
{
    /**
     * Matches / exactly.
     *
     * @Route("/ ", name="lfp_timbal_home")
     */
    public function indexAction()
    {
        $content = $this
            ->get('templating')
            ->render('LFPTimbalBundle:Course:index.html.twig', [
                'text' => 'Timbal',
                'caption' => 'Your TimeTable Maker',
            ]);
        // NOTE: important
        // return $this->render('LFPTimbalBundle:Course:index.html.twig', [

        //   ] );
        return new Response($content);
    }


    /**
     * Matches /new exactly.
     *
     * @Route("/new", name="lfp_timbal_new")
     */
    public function newAction(Request $request)
    {
        $course = new Course();
        $form = $this
            ->get('form.factory')
            ->create(CourseType::class, $course)
            ;

        $course->setUser($this->getUser());

        $em = $this
            ->getDoctrine()
            ->getManager()
        ;

        $currentUser = $this->getUser();

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {

            // Checks number of courses for the chosen day
            $chosenDay = $course->getDay();
            $coursesByDay = $this
                ->getDoctrine()
                ->getManager()
                ->getRepository('LFPTimbalBundle:Course')
                ->checkCoursesLimit($em, $currentUser, $chosenDay)
            ;
            foreach ($coursesByDay as $value) {
              if ($value[1] > 5) {
                $request->getSession()->getFlashBag()->add('notice', 'Maximum courses for ' . $course->getDay() . ' reached !' );
                return $this->redirectToRoute('lfp_timbal_new');
              }
            };




            $chosenDay = $form->getData()->getDay();
            $form->getData()->setDayRank($chosenDay);

            $hour = $form->getData()->getChosenHour();
            $minute = $form->getData()->getChosenMinute();
            $form->getData()->setCourseTime($hour, $minute);

            $em->persist($course);
            $em->flush();

            $request->getSession()->getFlashBag()->add('notice', $course->getCourse() . ' added !' );

            return $this->redirectToRoute('lfp_timbal_new');
        }


        $content = $this
            ->get('templating')
            ->render('LFPTimbalBundle:Course:new.html.twig', array(
                'form' => $form->createView(), 'action1' => 'Day & Time', 'action2' => 'Teacher',
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
            // Gets current user courses according his id
            $userCourses = $repository->findBy(array('user' => $currentUser->getId()));
            $em = $this
                ->getDoctrine()
                ->getManager()
                ;
            $dayRanks = $repository->getDayRank($em, $currentUser);
        } else {
            $userCourses = 'User not logged';
            $dayRanks = [];
        }

        // NOTE: simplifier le render
        $content = $this
            ->get('templating')
            ->render(
                'LFPTimbalBundle:Course:menu.html.twig',
                array('userCourses' => $userCourses,
                      'dayRanks' => $dayRanks, )
            );

        return new Response($content);
    }

    /**
     * @Route("/delete/{id}", name="lfp_timbal_delete")
     *
     */
   public function deleteAction(Request $request, $id)
   {

     $em = $this
       ->getDoctrine()
       ->getManager()
     ;

     $course = $em->getRepository('LFPTimbalBundle:Course')->find($id);

     $em->remove($course);
     $em->flush();


     //   // $content = $this
     //   //     ->get('templating')
     //   //     ->render('LFPTimbalBundle:Course:index.html.twig', [
     //   //         'text' => 'Timbal',
     //   //         'caption' => 'Your TimeTable Maker',
     //   //     ]);
     //   // // NOTE: important
     //   // // return $this->render('LFPTimbalBundle:Course:index.html.twig', [
     //   //
     //   // //   ] );
       return new Response($id);
     }
}
