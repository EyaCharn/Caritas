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
    public function formationAction()
    {
        return $this->render('@Solidarity/Default/formation.html.twig');
    }
    public function donmaterielAction()
    {
        return $this->render('@Solidarity/Default/donmateriel.html.twig');
    }
    public function contactAction()
    {
        return $this->render('@Solidarity/Default/contact.html.twig');
    }
    public function donAction()
    {
        return $this->render('@Solidarity/Default/don.html.twig');
    }
    public function aboutAction()
    {
        return $this->render('@Solidarity/Default/about.html.twig');
    }

    public function offreemploiAction()
    {
        return $this->render('@Solidarity/Default/offreemploi.html.twig');
    }
    public function galleryAction()
    {
        return $this->render('@Solidarity/Default/gallery.html.twig');
    }
    public function typoAction()
    {
        return $this->render('@Solidarity/Default/typohtml.twig');
    }
    public function hebergementAction()
    {
        return $this->render('@Solidarity/Default/hebergement.html.twig');
    }



}
