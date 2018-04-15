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
     * @Route("/ ", name="lfp_timbal_home")
     */
    public function indexAction()
    {
        return $this->render('LFPTimbalBundle:Course:index.html.twig', ['text' => 'Timbal', 'caption' => 'Your TimeTable Maker', ]);
    }

    /**
     * @Route("/new", name="lfp_timbal_new")
     */
    public function newAction(Request $request)
    {
        $course = new Course();
        $form = $this->get('form.factory')->create(CourseType::class, $course);

        $course->setUser($this->getUser());
        $em = $this->getDoctrine()->getManager();
        $currentUser = $this->getUser();
        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {

            // Checks number of courses for the chosen day

            $chosenDay = $course->getDay();
            $coursesByDay = $this->getDoctrine()->getManager()->getRepository('LFPTimbalBundle:Course')->checkCoursesLimit($em, $currentUser, $chosenDay);
            foreach ($coursesByDay as $value) {
                if ($value[1] > 5) {
                    $request->getSession()->getFlashBag()->add('notice', 'Maximum courses for ' . $course->getDay() . ' reached !');
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
            $request->getSession()->getFlashBag()->add('notice', $course->getCourse() . ' added !');
            $errors = array();
            return $this->redirectToRoute('lfp_timbal_new');
        } else {
            $errors = array();
            foreach ($form as $fieldName => $formField) {

                // each field has an array of errors

                $errors[$fieldName] = $formField->getErrors();
            }
        }

        $content = $this->get('templating')->render('LFPTimbalBundle:Course:new.html.twig', array(
            'form' => $form->createView() ,
            'action1' => 'Day & Time',
            'action2' => 'Teacher',
            'action3' => 'Course',
            'action4' => 'Building',
            'action5' => 'Room',
            'errors' => $errors
        ));
        return new Response($content);
    }

    public function menuAction(Request $request)
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('LFPTimbalBundle:Course');
        $currentUser = $this->getUser();
        if (isset($currentUser)) {

            // Gets current user courses according his id

            $userCourses = $repository->findBy(array(
                'user' => $currentUser->getId()
            ));
            $em = $this->getDoctrine()->getManager();
            $dayRanks = $repository->getDayRank($em, $currentUser);
        } else {
            $userCourses = 'User not logged';
            $dayRanks = [];
        }

        // NOTE: simplifier le render

        $content = $this->get('templating')->render('LFPTimbalBundle:Course:menu.html.twig', array(
            'userCourses' => $userCourses,
            'dayRanks' => $dayRanks,
        ));
        return new Response($content);
    }

    /**
     * @Route("/delete/{id}", name="lfp_timbal_delete")
     */
    public function deleteAction(Request $request, $id)
    {
        if ($request->isXmlHttpRequest()) {
            $em = $this->getDoctrine()->getManager();
            $course = $em->getRepository('LFPTimbalBundle:Course')->find($id);
            $em->remove($course);
            $em->flush();
            return new Response($id);
        } else {
            return $this->redirectToRoute('lfp_timbal_home');
        }
    }

    /**
     * @Route("/deleteAll", name="lfp_timbal_deleteAll")
     */
    public function deleteAllAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $currentUser = $this->getUser();
        $repository = $this->getDoctrine()->getManager()->getRepository('LFPTimbalBundle:Course');
        $userCourses = $repository->findBy(array(
            'user' => $currentUser->getId()
        ));
        foreach ($userCourses as $userCourse) {
            $em->remove($userCourse);
        }

        $em->flush();
        return new Response($request);
    }

    /**
     * @route("/pdf", name="lfp_timbal_pdf")
     */
    public function pdfAction()
    {
        $repository = $this->getDoctrine()->getManager()->getRepository('LFPTimbalBundle:Course');
        $currentUser = $this->getUser();
        if (isset($currentUser)) {

            // Gets current user courses according his id

            $userCourses = $repository->findBy(array(
                'user' => $currentUser->getId()
            ));
            $em = $this->getDoctrine()->getManager();
            $dayRanks = $repository->getDayRank($em, $currentUser);
        } else {
            $userCourses = 'User not logged';
            $dayRanks = [];
        }

        // -----------------------------------------------------------------------

        $snappyStyles = true;
        $snappy = $this->get("knp_snappy.pdf");
        $snappy->setOption("encoding", "UTF-8");

        // ------check numbers of column to resize them properly in pdf view----//

        $numberOfColumns = $this->getDoctrine()->getManager()->getRepository('LFPTimbalBundle:Course')->countDays($em, $currentUser);

        // ---------------------------------------------------------------------//

        $html = $this->renderView("LFPTimbalBundle:Course:menu.html.twig", array(
            "dayRanks" => $dayRanks,
            "userCourses" => $userCourses,
            "snappyStyles" => $snappyStyles,
            "numberOfColumns" => $numberOfColumns
        ));
        $filename = ucfirst($currentUser->getUsername()) . "'s Timbal";
        return new Response($snappy->getOutputFromHtml($html, array(
            'orientation' => 'Landscape',
            'default-header' => false,
            'enable-javascript' => true,
            'no-stop-slow-scripts' => true,
            'javascript-delay' => 1000,
            'margin-top' => 0,
            'margin-right' => 5,
            'margin-bottom' => 7,
            'margin-left' => 5,
        )), 200, array(
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $filename . '.pdf"'
        ));
    }
}
