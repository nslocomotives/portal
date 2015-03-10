<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\templates;
use AppBundle\Form\templatesType;

/**
 * templates controller.
 *
 * @Route("/newsletter/templates")
 */
class templatesController extends Controller
{

    /**
     * Lists all templates entities.
     *
     * @Route("/", name="newsletter_templates")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:templates')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new templates entity.
     *
     * @Route("/", name="newsletter_templates_create")
     * @Method("POST")
     * @Template("AppBundle:templates:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new templates();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('newsletter_templates_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a templates entity.
     *
     * @param templates $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(templates $entity)
    {
        $form = $this->createForm(new templatesType(), $entity, array(
            'action' => $this->generateUrl('newsletter_templates_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new templates entity.
     *
     * @Route("/new", name="newsletter_templates_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new templates();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a templates entity.
     *
     * @Route("/{id}", name="newsletter_templates_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:templates')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find templates entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing templates entity.
     *
     * @Route("/{id}/edit", name="newsletter_templates_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:templates')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find templates entity.');
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
    * Creates a form to edit a templates entity.
    *
    * @param templates $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(templates $entity)
    {
        $form = $this->createForm(new templatesType(), $entity, array(
            'action' => $this->generateUrl('newsletter_templates_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing templates entity.
     *
     * @Route("/{id}", name="newsletter_templates_update")
     * @Method("PUT")
     * @Template("AppBundle:templates:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:templates')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find templates entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('newsletter_templates_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a templates entity.
     *
     * @Route("/{id}", name="newsletter_templates_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:templates')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find templates entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('newsletter_templates'));
    }

    /**
     * Creates a form to delete a templates entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('newsletter_templates_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
