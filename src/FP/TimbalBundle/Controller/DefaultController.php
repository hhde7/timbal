<?php

namespace FP\TimbalBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('FPTimbalBundle:Default:index.html.twig');
    }
}
