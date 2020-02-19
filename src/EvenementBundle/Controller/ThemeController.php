<?php

namespace EvenementBundle\Controller;

use EvenementBundle\Entity\Theme;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Theme controller.
 *
 * @Route("theme")
 */
class ThemeController extends Controller
{
    /**
     * Lists all theme entities.
     *
     * @Route("/", name="theme_index")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $themes = $em->getRepository('EvenementBundle:Theme')->findAll();

        return $this->render('theme/index.html.twig', array(
            'themes' => $themes,
        ));
    }

    /**
     * Creates a new theme entity.
     *
     * @Route("/new", name="theme_new")
     */
    public function newAction(Request $request)
    {
        $theme = new Theme();
        $form = $this->createForm('EvenementBundle\Form\ThemeType', $theme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($theme);
            $em->flush();

            return $this->redirectToRoute('theme_index');
        }

        return $this->render('theme/new.html.twig', array(
            'theme' => $theme,
            'form' => $form->createView(),
        ));
    }


    /**
     * Displays a form to edit an existing theme entity.
     *
     * @Route("/{id}/edit", name="theme_edit")
     */
    public function editAction(Request $request, Theme $theme)
    {
        $deleteForm = $this->createDeleteForm($theme);
        $editForm = $this->createForm('EvenementBundle\Form\ThemeType', $theme);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('theme_index');
        }

        return $this->render('theme/edit.html.twig', array(
            'theme' => $theme,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a theme entity.
     *
     * @Route("/{id}", name="theme_delete")
     */
    public function deleteAction(Request $request, Theme $theme)
    {
        $form = $this->createDeleteForm($theme);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $events = $em->getRepository('EvenementBundle:evenement')->findBy(array("id_theme"=>$theme->getId()));
            if($events){
                $this->addFlash('warning', 'this has already more than 1 event');
            }else{
                $this->addFlash('success', 'this has already more than 1 event');
                $em->remove($theme);
                $em->flush();
            }

        }

        return $this->redirectToRoute('theme_index');
    }


    private function createDeleteForm(Theme $theme)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('theme_delete', array('id' => $theme->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
