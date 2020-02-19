<?php

namespace EvenementBundle\Controller;

use EvenementBundle\Entity\evenement;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

/**
 * Evenement controller.
 *
 * @Route("evenement")
 */
class evenementController extends Controller
{
    /**
     * Lists all evenement entities.
     *
     * @Route("/", name="evenement_index")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $evenements = $em->getRepository('EvenementBundle:evenement')->findAll();

        return $this->render('evenement/index.html.twig', array(
            'evenements' => $evenements,
        ));
    }

    /**
     * Lists all evenement entities.
     *
     * @Route("/calendar", name="evenement_calender")
     * @IsGranted("IS_AUTHENTICATED_FULLY")
     */
    public function indexCalenderAction()
    {
        return $this->render('evenement/showMine.html.twig', array(
        ));
    }


    /**
     * Lists all evenement entities.
     *
     * @Route("/calendarAjax", name="evenement_calenderAjax")
     * @IsGranted("IS_AUTHENTICATED_FULLY")
     */
    public function loadCalendarDataAction(){
        $em = $this->getDoctrine()->getManager();
        $user = $this->container->get('security.token_storage')->getToken()->getUser();
        $participations = $em->getRepository('EvenementBundle:participation')->findBy(array('idUtilisateur'=>$user->getId()));
        $listsfJson = array();
        foreach ($participations as $r){
            $listsfJson[] = array(
                'title' => $r->getIdEvent()->getNomEvenement(),
                'start' => "" . ($r->getIdEvent()->getDate()->format('Y-m-d')) . "",
                'end' => "" . ($r->getIdEvent()->getDate()->format('Y-m-d')) . "",
                'id' => "" . ($r->getIdEvent()->getId(). ""));
        }
        return new JsonResponse(array('events' => $listsfJson));
    }



    /**
     * Lists all evenement entities.
     *
     * @Route("/Front", name="evenement_indexfront")
     */
    public function indexFrontAction(Request $request)
    {

        $em = $this->getDoctrine()->getManager();
        if($request->isXmlHttpRequest()){


            $nom = $request->get('nom');
            $themes = $request ->get('themes');
            $events = $em->getRepository('EvenementBundle:evenement')
                ->filterEvenement($nom,$themes);

            $serializer = new Serializer(array(new ObjectNormalizer()));
            $paginator = $this->get('knp_paginator');
            $pagination = $paginator->paginate(
                $events,
                $request->query->getInt('page', 1),
                4
            );
            $data = $serializer->normalize($pagination);
            return new JsonResponse($data);
        }
        else {
            $em = $this->getDoctrine()->getManager();
            $themes = $em->getRepository('EvenementBundle:Theme')->findAll();
          //  $evenements = $em->getRepository('EvenementBundle:evenement')->findAll();
            $dql = "SELECT p FROM EvenementBundle:evenement p";
            $query = $em->createQuery($dql);
            $paginator = $this->get('knp_paginator');
            $pagination = $paginator->paginate(
                $query,
                $request->query->getInt('page', 1),
                4
            );

            return $this->render('evenement/indexFront.html.twig', array(
                'pagination' => $pagination,'themes' => $themes

            ));

            //return $this->render('evenement/indexFront.html.twig', array(
             //   'evenements' => $evenements,
            //    'themes' => $themes
          //  ));
        }
    }

    /**
     * Creates a new evenement entity.
     *
     * @Route("/new", name="evenement_new")
     */
    public function newAction(Request $request)
    {
        $evenement = new Evenement();
        $form = $this->createForm('EvenementBundle\Form\evenementType', $evenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em = $this->getDoctrine()->getManager();
            $file=$evenement->getImage();
            $fileName=md5(uniqid()).'.'.$file->guessExtension();
            $file->move(
                $this->getParameter('evenement_images'),$fileName
            );
            $evenement->setImage($fileName);
            $evenement->setNbDeParticipants(0);
            $em->persist($evenement);
            $em->flush();

            return $this->redirectToRoute('evenement_index');
        }

        return $this->render('evenement/new.html.twig', array(
            'evenement' => $evenement,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a evenement entity.
     *
     * @Route("/{id}", name="evenement_show")
     */
    public function showAction(evenement $evenement)
    {
        $deleteForm = $this->createDeleteForm($evenement);

        return $this->render('evenement/show.html.twig', array(
            'evenement' => $evenement,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing evenement entity.
     *
     * @Route("/{id}/edit", name="evenement_edit")
     */
    public function editAction(Request $request, evenement $evenement)
    {
        $deleteForm = $this->createDeleteForm($evenement);
        $editForm = $this->createForm('EvenementBundle\Form\evenementEditType', $evenement);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('evenement_index');
        }

        return $this->render('evenement/edit.html.twig', array(
            'evenement' => $evenement,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a evenement entity.
     *
     * @Route("/delete/{id}", name="evenement_delete")
     */
    public function deleteAction(Request $request, evenement $evenement)
    {
        $form = $this->createDeleteForm($evenement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($evenement);
            $em->flush();
        }

        return $this->redirectToRoute('evenement_index');
    }


    private function createDeleteForm(evenement $evenement)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('evenement_delete', array('id' => $evenement->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
