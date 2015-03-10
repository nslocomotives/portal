<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\newsletters;
use AppBundle\Form\newslettersType;

/**
 * newsletters controller.
 *
 * @Route("/newsletter/newsletters")
 */
class newslettersController extends Controller
{

    /**
     * Lists all newsletters entities.
     *
     * @Route("/", name="newsletter_newsletters")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:newsletters')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new newsletters entity.
     *
     * @Route("/", name="newsletter_newsletters_create")
     * @Method("POST")
     * @Template("AppBundle:newsletters:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new newsletters();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('newsletter_newsletters_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a newsletters entity.
     *
     * @param newsletters $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(newsletters $entity)
    {
        $form = $this->createForm(new newslettersType(), $entity, array(
            'action' => $this->generateUrl('newsletter_newsletters_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new newsletters entity.
     *
     * @Route("/new", name="newsletter_newsletters_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new newsletters();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a newsletters entity.
     *
     * @Route("/{id}", name="newsletter_newsletters_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:newsletters')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find newsletters entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing newsletters entity.
     *
     * @Route("/{id}/edit", name="newsletter_newsletters_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:newsletters')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find newsletters entity.');
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
    * Creates a form to edit a newsletters entity.
    *
    * @param newsletters $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(newsletters $entity)
    {
        $form = $this->createForm(new newslettersType(), $entity, array(
            'action' => $this->generateUrl('newsletter_newsletters_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing newsletters entity.
     *
     * @Route("/{id}", name="newsletter_newsletters_update")
     * @Method("PUT")
     * @Template("AppBundle:newsletters:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:newsletters')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find newsletters entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('newsletter_newsletters_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a newsletters entity.
     *
     * @Route("/{id}", name="newsletter_newsletters_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:newsletters')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find newsletters entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('newsletter_newsletters'));
    }

    /**
     * Creates a form to delete a newsletters entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('newsletter_newsletters_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
