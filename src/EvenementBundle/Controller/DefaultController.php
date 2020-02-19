<?php

namespace EvenementBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->redirectToRoute('evenement_indexfront');
    }

    public function galleryAction()
    {
        return $this->render('default/gallery.html.twig');
    }

    public function aboutAction()
    {
        return $this->render('default/about.html.twig');
    }


    public function contactAction()
    {
        return $this->render('default/contact.html.twig');
    }
    /**
     * Lists all evenement entities.
     *
     * @Route("/afterRegister", name="register_redirect")
     * @IsGranted("IS_AUTHENTICATED_FULLY")
     */
    public function confirmRegisrationAction(){

        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $hasAccess = in_array('ROLE_ADMIN', $user->getRoles());
        if($hasAccess){
            return $this->redirectToRoute('evenement_index');
        }
        else{
            return $this->redirectToRoute('evenement_indexfront');
        }

    }
}
