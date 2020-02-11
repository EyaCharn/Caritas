<?php

namespace OffreemploiBundle\Controller;

use OffreemploiBundle\Entity\offreemploi;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Offreemploi controller.
 *
 * @Route("offreemploi")
 */
class offreemploiController extends Controller
{
    /**
     * Lists all offreemploi entities.
     *
     * @Route("/", name="offreemploi_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $offreemplois = $em->getRepository('OffreemploiBundle:offreemploi')->findAll();

        return $this->render('offreemploi/index.html.twig', array(
            'offreemplois' => $offreemplois,
        ));
    }

    /**
     * Creates a new offreemploi entity.
     *
     * @Route("/new", name="offreemploi_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $offreemploi = new Offreemploi();
        $form = $this->createForm('OffreemploiBundle\Form\offreemploiType', $offreemploi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($offreemploi);
            $em->flush();

            return $this->redirectToRoute('offreemploi_show', array('id' => $offreemploi->getId()));
        }

        return $this->render('offreemploi/new.html.twig', array(
            'offreemploi' => $offreemploi,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a offreemploi entity.
     *
     * @Route("/{id}", name="offreemploi_show")
     * @Method("GET")
     */
    public function showAction(offreemploi $offreemploi)
    {
        $deleteForm = $this->createDeleteForm($offreemploi);

        return $this->render('offreemploi/show.html.twig', array(
            'offreemploi' => $offreemploi,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing offreemploi entity.
     *
     * @Route("/{id}/edit", name="offreemploi_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, offreemploi $offreemploi)
    {
        $deleteForm = $this->createDeleteForm($offreemploi);
        $editForm = $this->createForm('OffreemploiBundle\Form\offreemploiType', $offreemploi);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('offreemploi_edit', array('id' => $offreemploi->getId()));
        }

        return $this->render('offreemploi/edit.html.twig', array(
            'offreemploi' => $offreemploi,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a offreemploi entity.
     *
     * @Route("/{id}", name="offreemploi_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, offreemploi $offreemploi)
    {
        $form = $this->createDeleteForm($offreemploi);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($offreemploi);
            $em->flush();
        }

        return $this->redirectToRoute('offreemploi_index');
    }

    /**
     * Creates a form to delete a offreemploi entity.
     *
     * @param offreemploi $offreemploi The offreemploi entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(offreemploi $offreemploi)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('offreemploi_delete', array('id' => $offreemploi->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
