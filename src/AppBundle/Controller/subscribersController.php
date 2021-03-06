<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\subscribers;
use AppBundle\Form\subscribersType;

/**
 * subscribers controller.
 *
 * @Route("/newsletter/subscribers")
 */
class subscribersController extends Controller
{

    /**
     * Lists all subscribers entities.
     *
     * @Route("/", name="newsletter_subscribers")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        
        
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:subscribers')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new subscribers entity.
     *
     * @Route("/", name="newsletter_subscribers_create")
     * @Method("POST")
     * @Template("AppBundle:subscribers:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new subscribers();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('newsletter_subscribers_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a subscribers entity.
     *
     * @param subscribers $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(subscribers $entity)
    {
        $form = $this->createForm(new subscribersType(), $entity, array(
            'action' => $this->generateUrl('newsletter_subscribers_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new subscribers entity.
     *
     * @Route("/new", name="newsletter_subscribers_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new subscribers();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a subscribers entity.
     *
     * @Route("/{id}", name="newsletter_subscribers_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:subscribers')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find subscribers entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing subscribers entity.
     *
     * @Route("/{id}/edit", name="newsletter_subscribers_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:subscribers')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find subscribers entity.');
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
    * Creates a form to edit a subscribers entity.
    *
    * @param subscribers $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(subscribers $entity)
    {
        $form = $this->createForm(new subscribersType(), $entity, array(
            'action' => $this->generateUrl('newsletter_subscribers_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing subscribers entity.
     *
     * @Route("/{id}", name="newsletter_subscribers_update")
     * @Method("PUT")
     * @Template("AppBundle:subscribers:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:subscribers')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find subscribers entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('newsletter_subscribers_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a subscribers entity.
     *
     * @Route("/{id}", name="newsletter_subscribers_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:subscribers')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find subscribers entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('newsletter_subscribers'));
    }

    /**
     * Creates a form to delete a subscribers entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('newsletter_subscribers_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
