<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\locos;
use AppBundle\Form\locosType;

/**
 * locos controller.
 *
 * @Route("/locos")
 */
class locosController extends Controller
{

    /**
     * Lists all locos entities.
     *
     * @Route("/", name="locos")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:locos')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new locos entity.
     *
     * @Route("/", name="locos_create")
     * @Method("POST")
     * @Template("AppBundle:locos:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new locos();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('locos_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a locos entity.
     *
     * @param locos $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(locos $entity)
    {
        $form = $this->createForm(new locosType(), $entity, array(
            'action' => $this->generateUrl('locos_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new locos entity.
     *
     * @Route("/new", name="locos_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new locos();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a locos entity.
     *
     * @Route("/{id}", name="locos_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:locos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find locos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing locos entity.
     *
     * @Route("/{id}/edit", name="locos_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:locos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find locos entity.');
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
    * Creates a form to edit a locos entity.
    *
    * @param locos $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(locos $entity)
    {
        $form = $this->createForm(new locosType(), $entity, array(
            'action' => $this->generateUrl('locos_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing locos entity.
     *
     * @Route("/{id}", name="locos_update")
     * @Method("PUT")
     * @Template("AppBundle:locos:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:locos')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find locos entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('locos_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a locos entity.
     *
     * @Route("/{id}", name="locos_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:locos')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find locos entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('locos'));
    }

    /**
     * Creates a form to delete a locos entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('locos_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
