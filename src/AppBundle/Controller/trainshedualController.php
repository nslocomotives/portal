<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\trainshedual;
use AppBundle\Form\trainshedualType;

/**
 * trainshedual controller.
 *
 * @Route("/trainshedual")
 */
class trainshedualController extends Controller
{

    /**
     * Lists all trainshedual entities.
     *
     * @Route("/", name="trainshedual")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:trainshedual')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new trainshedual entity.
     *
     * @Route("/", name="trainshedual_create")
     * @Method("POST")
     * @Template("AppBundle:trainshedual:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new trainshedual();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('trainshedual_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a trainshedual entity.
     *
     * @param trainshedual $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(trainshedual $entity)
    {
        $form = $this->createForm(new trainshedualType(), $entity, array(
            'action' => $this->generateUrl('trainshedual_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new trainshedual entity.
     *
     * @Route("/new", name="trainshedual_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new trainshedual();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a trainshedual entity.
     *
     * @Route("/{id}", name="trainshedual_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:trainshedual')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find trainshedual entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing trainshedual entity.
     *
     * @Route("/{id}/edit", name="trainshedual_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:trainshedual')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find trainshedual entity.');
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
    * Creates a form to edit a trainshedual entity.
    *
    * @param trainshedual $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(trainshedual $entity)
    {
        $form = $this->createForm(new trainshedualType(), $entity, array(
            'action' => $this->generateUrl('trainshedual_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing trainshedual entity.
     *
     * @Route("/{id}", name="trainshedual_update")
     * @Method("PUT")
     * @Template("AppBundle:trainshedual:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:trainshedual')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find trainshedual entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('trainshedual_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a trainshedual entity.
     *
     * @Route("/{id}", name="trainshedual_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:trainshedual')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find trainshedual entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('trainshedual'));
    }

    /**
     * Creates a form to delete a trainshedual entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('trainshedual_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
