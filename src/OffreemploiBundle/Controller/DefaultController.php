<?php

namespace OffreemploiBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('OffreemploiBundle:Default:index.html.twig');
    }
}
