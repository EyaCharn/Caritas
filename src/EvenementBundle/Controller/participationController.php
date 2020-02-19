<?php

namespace EvenementBundle\Controller;

use EvenementBundle\Entity\evenement;
use EvenementBundle\Entity\participation;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
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
     * @Route("/new/{id}", name="participation_new")
     * @IsGranted("IS_AUTHENTICATED_FULLY")
     */
    public function newAction(evenement $evenement)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.token_storage')->getToken()->getUser();

        $par = $em->getRepository('EvenementBundle:participation')->findOneBy(array('idUtilisateur'=>$user->getId(),'idEvent'=>$evenement->getId()));
        if(!$par){
            $participation = new Participation();
            $evenement->setNbDeParticipants($evenement->getNbDeParticipants()+1);
            $participation->setIdEvent($evenement);
            $participation->setIdUtilisateur($user);
            $em->persist($participation);
            $em->persist($evenement);
            $em->flush();
            $this->addFlash('success', 'You Participate to the Event : '.$evenement->getNomEvenement());

        }else{
            $this->addFlash('warning', 'You Already Participated to the Event : '.$evenement->getNomEvenement());
        }
        return $this->redirectToRoute('evenement_calender');
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
