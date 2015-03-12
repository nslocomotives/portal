<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\LocoRoster;
use AppBundle\Form\LocoRosterType;

/**
 * LocoRoster controller.
 *
 * @Route("/locoroster")
 */
class LocoRosterController extends Controller
{

    /**
     * Lists all LocoRoster entities.
     *
     * @Route("/", name="locoroster")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:LocoRoster')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new LocoRoster entity.
     *
     * @Route("/", name="locoroster_create")
     * @Method("POST")
     * @Template("AppBundle:LocoRoster:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new LocoRoster();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('locoroster_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a LocoRoster entity.
     *
     * @param LocoRoster $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(LocoRoster $entity)
    {
        $form = $this->createForm(new LocoRosterType(), $entity, array(
            'action' => $this->generateUrl('locoroster_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new LocoRoster entity.
     *
     * @Route("/new", name="locoroster_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new LocoRoster();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a LocoRoster entity.
     *
     * @Route("/{id}", name="locoroster_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:LocoRoster')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find LocoRoster entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing LocoRoster entity.
     *
     * @Route("/{id}/edit", name="locoroster_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:LocoRoster')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find LocoRoster entity.');
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
    * Creates a form to edit a LocoRoster entity.
    *
    * @param LocoRoster $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(LocoRoster $entity)
    {
        $form = $this->createForm(new LocoRosterType(), $entity, array(
            'action' => $this->generateUrl('locoroster_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing LocoRoster entity.
     *
     * @Route("/{id}", name="locoroster_update")
     * @Method("PUT")
     * @Template("AppBundle:LocoRoster:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:LocoRoster')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find LocoRoster entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('locoroster_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a LocoRoster entity.
     *
     * @Route("/{id}", name="locoroster_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:LocoRoster')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find LocoRoster entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('locoroster'));
    }

    /**
     * Creates a form to delete a LocoRoster entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('locoroster_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
