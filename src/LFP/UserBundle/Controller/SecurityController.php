<?php
// src/LFP/UserBundle/Controller/SecurityController.php;

namespace LFP\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use LFP\UserBundle\Entity\User;
use LFP\UserBundle\Form\UserType;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class SecurityController extends Controller
{
    /**
     * @Route("/login", name="lfp_timbal_login")
     */
    public function loginAction(Request $request)
    {
        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return $this->redirectToRoute('lfp_timbal_new');
        }

        $authenticationUtils = $this->get('security.authentication_utils');

        return $this->render('LFPUserBundle:Security:login.html.twig', array(
      'last_username' => $authenticationUtils->getLastUsername(),
      'error'         => $authenticationUtils->getLastAuthenticationError(),
      ));
    }

    /**
     * @Route("/id", name="lfp_timbal_id")
     */
    public function idAction(Request $request)
    {
        if ($this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_USER')) {
            return $this->redirectToRoute('lfp_timbal_new');
        }

        $this->get('security.authorization_checker')->isGranted('IS_AUTHENTICATED_ANONYMOUSLY');
        $user = new User();

        $form = $this
            ->get('form.factory')
            ->create(UserType::class, $user)
        ;

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
            $user->setSalt('');
            $user->setRoles(array('ROLE_USER'));

            $em = $this
                ->getDoctrine()
                ->getManager()
            ;
            $em->persist($user);
            $em->flush();

            $request
                ->getSession()
                ->getFlashBag()
                ->add('notice', 'Hello ' . ucfirst($user->getUsername()) . ' your Timbal is here')
            ;


            return $this->redirectToRoute('lfp_timbal_new');
        }

        return $this->render('LFPUserBundle:Security:id.html.twig', array(
                'form' => $form->createView(), ));
    }

    public function passwordEncription(UserPasswordEncoderInterface $encoder)
    {
        $user = new User();
        $plainPassword = $form->getData()->getPassword();
        $encoded = $encoder->encodePassword($user, $plainPassword);

        $user->setPassword($encoded);
    }
}
