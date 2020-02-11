<?php

namespace EvenementBundle\Controller;

use EvenementBundle\Entity\participation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Participation controller.
 *
 * @Route("participation")
 */
class participationController extends Controller
{
    /**
     * Lists all participation entities.
     *
     * @Route("/", name="participation_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $participations = $em->getRepository('EvenementBundle:participation')->findAll();

        return $this->render('participation/index.html.twig', array(
            'participations' => $participations,
        ));
    }

    /**
     * Creates a new participation entity.
     *
     * @Route("/new", name="participation_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $participation = new Participation();
        $form = $this->createForm('EvenementBundle\Form\participationType', $participation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($participation);
            $em->flush();

            return $this->redirectToRoute('participation_show', array('id' => $participation->getId()));
        }

        return $this->render('participation/new.html.twig', array(
            'participation' => $participation,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a participation entity.
     *
     * @Route("/{id}", name="participation_show")
     * @Method("GET")
     */
    public function showAction(participation $participation)
    {
        $deleteForm = $this->createDeleteForm($participation);

        return $this->render('participation/show.html.twig', array(
            'participation' => $participation,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing participation entity.
     *
     * @Route("/{id}/edit", name="participation_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, participation $participation)
    {
        $deleteForm = $this->createDeleteForm($participation);
        $editForm = $this->createForm('EvenementBundle\Form\participationType', $participation);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('participation_edit', array('id' => $participation->getId()));
        }

        return $this->render('participation/edit.html.twig', array(
            'participation' => $participation,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a participation entity.
     *
     * @Route("/{id}", name="participation_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, participation $participation)
    {
        $form = $this->createDeleteForm($participation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($participation);
            $em->flush();
        }

        return $this->redirectToRoute('participation_index');
    }

    /**
     * Creates a form to delete a participation entity.
     *
     * @param participation $participation The participation entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(participation $participation)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('participation_delete', array('id' => $participation->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}