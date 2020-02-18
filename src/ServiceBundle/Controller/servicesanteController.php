<?php

namespace ServiceBundle\Controller;

use ServiceBundle\Entity\servicesante;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Servicesante controller.
 *
 * @Route("servicesante")
 */
class servicesanteController extends Controller
{
    /**
     * Lists all servicesante entities.
     *
     * @Route("/", name="servicesante_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $servicesantes = $em->getRepository('ServiceBundle:servicesante')->findAll();

        return $this->render('servicesante/index.html.twig', array(
            'servicesantes' => $servicesantes,
        ));
    }

    /**
     * Creates a new servicesante entity.
     *
     * @Route("/new", name="servicesante_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $servicesante = new Servicesante();
        $form = $this->createForm('ServiceBundle\Form\servicesanteType', $servicesante);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($servicesante);
            $em->flush();

            return $this->redirectToRoute('servicesante_show', array('id' => $servicesante->getId()));
        }

        return $this->render('servicesante/new.html.twig', array(
            'servicesante' => $servicesante,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a servicesante entity.
     *
     * @Route("/{id}", name="servicesante_show")
     * @Method("GET")
     */
    public function showAction(servicesante $servicesante)
    {
        $deleteForm = $this->createDeleteForm($servicesante);

        return $this->render('servicesante/show.html.twig', array(
            'servicesante' => $servicesante,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing servicesante entity.
     *
     * @Route("/{id}/edit", name="servicesante_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, servicesante $servicesante)
    {
        $deleteForm = $this->createDeleteForm($servicesante);
        $editForm = $this->createForm('ServiceBundle\Form\servicesanteType', $servicesante);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('servicesante_edit', array('id' => $servicesante->getId()));
        }

        return $this->render('servicesante/edit.html.twig', array(
            'servicesante' => $servicesante,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a servicesante entity.
     *
     * @Route("/{id}", name="servicesante_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, servicesante $servicesante)
    {
        $form = $this->createDeleteForm($servicesante);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($servicesante);
            $em->flush();
        }

        return $this->redirectToRoute('servicesante_index');
    }

    /**
     * Creates a form to delete a servicesante entity.
     *
     * @param servicesante $servicesante The servicesante entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(servicesante $servicesante)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('servicesante_delete', array('id' => $servicesante->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
