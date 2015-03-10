<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\schedualdays;
use AppBundle\Form\schedualdaysType;

/**
 * schedualdays controller.
 *
 * @Route("/schedualdays")
 */
class schedualdaysController extends Controller
{

    /**
     * Lists all schedualdays entities.
     *
     * @Route("/", name="schedualdays")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:schedualdays')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new schedualdays entity.
     *
     * @Route("/", name="schedualdays_create")
     * @Method("POST")
     * @Template("AppBundle:schedualdays:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new schedualdays();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('schedualdays_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a schedualdays entity.
     *
     * @param schedualdays $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(schedualdays $entity)
    {
        $form = $this->createForm(new schedualdaysType(), $entity, array(
            'action' => $this->generateUrl('schedualdays_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new schedualdays entity.
     *
     * @Route("/new", name="schedualdays_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new schedualdays();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a schedualdays entity.
     *
     * @Route("/{id}", name="schedualdays_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:schedualdays')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find schedualdays entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing schedualdays entity.
     *
     * @Route("/{id}/edit", name="schedualdays_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:schedualdays')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find schedualdays entity.');
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
    * Creates a form to edit a schedualdays entity.
    *
    * @param schedualdays $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(schedualdays $entity)
    {
        $form = $this->createForm(new schedualdaysType(), $entity, array(
            'action' => $this->generateUrl('schedualdays_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing schedualdays entity.
     *
     * @Route("/{id}", name="schedualdays_update")
     * @Method("PUT")
     * @Template("AppBundle:schedualdays:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:schedualdays')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find schedualdays entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('schedualdays_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a schedualdays entity.
     *
     * @Route("/{id}", name="schedualdays_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:schedualdays')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find schedualdays entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('schedualdays'));
    }

    /**
     * Creates a form to delete a schedualdays entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('schedualdays_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
