<?php

namespace Gibz\NewsBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('GibzNewsBundle:Default:index.html.twig');
    }
}
