<?php

namespace ServiceBundle\Controller;

use ServiceBundle\Entity\hebergement;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Hebergement controller.
 *
 * @Route("hebergement")
 */
class hebergementController extends Controller
{
    /**
     * Lists all hebergement entities.
     *
     * @Route("/", name="hebergement_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $hebergements = $em->getRepository('ServiceBundle:hebergement')->findAll();

        return $this->render('hebergement/index.html.twig', array(
            'hebergements' => $hebergements,
        ));
    }

    /**
     * Creates a new hebergement entity.
     *
     * @Route("/new", name="hebergement_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $hebergement = new Hebergement();
        $form = $this->createForm('ServiceBundle\Form\hebergementType', $hebergement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($hebergement);
            $em->flush();

            return $this->redirectToRoute('hebergement_show', array('id' => $hebergement->getId()));
        }

        return $this->render('hebergement/new.html.twig', array(
            'hebergement' => $hebergement,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a hebergement entity.
     *
     * @Route("/{id}", name="hebergement_show")
     * @Method("GET")
     */
    public function showAction(hebergement $hebergement)
    {
        $deleteForm = $this->createDeleteForm($hebergement);

        return $this->render('hebergement/show.html.twig', array(
            'hebergement' => $hebergement,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing hebergement entity.
     *
     * @Route("/{id}/edit", name="hebergement_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, hebergement $hebergement)
    {
        $deleteForm = $this->createDeleteForm($hebergement);
        $editForm = $this->createForm('ServiceBundle\Form\hebergementType', $hebergement);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('hebergement_edit', array('id' => $hebergement->getId()));
        }

        return $this->render('hebergement/edit.html.twig', array(
            'hebergement' => $hebergement,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a hebergement entity.
     *
     * @Route("/{id}", name="hebergement_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, hebergement $hebergement)
    {
        $form = $this->createDeleteForm($hebergement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($hebergement);
            $em->flush();
        }

        return $this->redirectToRoute('hebergement_index');
    }

    /**
     * Creates a form to delete a hebergement entity.
     *
     * @param hebergement $hebergement The hebergement entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(hebergement $hebergement)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('hebergement_delete', array('id' => $hebergement->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
