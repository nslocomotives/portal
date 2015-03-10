<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\schedulestations;
use AppBundle\Form\schedulestationsType;

/**
 * schedulestations controller.
 *
 * @Route("/timetable/schedulestations")
 */
class schedulestationsController extends Controller
{

    /**
     * Lists all schedulestations entities.
     *
     * @Route("/", name="timetable_schedulestations")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:schedulestations')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new schedulestations entity.
     *
     * @Route("/", name="timetable_schedulestations_create")
     * @Method("POST")
     * @Template("AppBundle:schedulestations:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new schedulestations();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('timetable_schedulestations_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a schedulestations entity.
     *
     * @param schedulestations $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(schedulestations $entity)
    {
        $form = $this->createForm(new schedulestationsType(), $entity, array(
            'action' => $this->generateUrl('timetable_schedulestations_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new schedulestations entity.
     *
     * @Route("/new", name="timetable_schedulestations_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new schedulestations();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a schedulestations entity.
     *
     * @Route("/{id}", name="timetable_schedulestations_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:schedulestations')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find schedulestations entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing schedulestations entity.
     *
     * @Route("/{id}/edit", name="timetable_schedulestations_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:schedulestations')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find schedulestations entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
    * Creates a form to edit a schedulestations entity.
    *
    * @param schedulestations $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(schedulestations $entity)
    {
        $form = $this->createForm(new schedulestationsType(), $entity, array(
            'action' => $this->generateUrl('timetable_schedulestations_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing schedulestations entity.
     *
     * @Route("/{id}", name="timetable_schedulestations_update")
     * @Method("PUT")
     * @Template("AppBundle:schedulestations:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:schedulestations')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find schedulestations entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('timetable_schedulestations_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a schedulestations entity.
     *
     * @Route("/{id}", name="timetable_schedulestations_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:schedulestations')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find schedulestations entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('timetable_schedulestations'));
    }

    /**
     * Creates a form to delete a schedulestations entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('timetable_schedulestations_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
