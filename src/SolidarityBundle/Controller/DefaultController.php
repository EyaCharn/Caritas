<?php

namespace SolidarityBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexBackAction()
    {
        return $this->render('@Solidarity/Default/index.html.twig');
    }
    public function indexfrontAction()
    {
        return $this->render('@Solidarity/Default/indexfront.html.twig');
    }
    public function inscriptionAction()
    {
        return $this->render('@Solidarity/Default/inscription.html.twig');
    }
}
