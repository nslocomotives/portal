<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\train;
use AppBundle\Form\trainType;

/**
 * train controller.
 *
 * @Route("/train")
 */
class trainController extends Controller
{

    /**
     * Lists all train entities.
     *
     * @Route("/", name="train")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:train')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new train entity.
     *
     * @Route("/", name="train_create")
     * @Method("POST")
     * @Template("AppBundle:train:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new train();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('train_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a train entity.
     *
     * @param train $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(train $entity)
    {
        $form = $this->createForm(new trainType(), $entity, array(
            'action' => $this->generateUrl('train_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new train entity.
     *
     * @Route("/new", name="train_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new train();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a train entity.
     *
     * @Route("/{id}", name="train_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:train')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find train entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing train entity.
     *
     * @Route("/{id}/edit", name="train_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:train')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find train entity.');
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
    * Creates a form to edit a train entity.
    *
    * @param train $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(train $entity)
    {
        $form = $this->createForm(new trainType(), $entity, array(
            'action' => $this->generateUrl('train_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing train entity.
     *
     * @Route("/{id}", name="train_update")
     * @Method("PUT")
     * @Template("AppBundle:train:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:train')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find train entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('train_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a train entity.
     *
     * @Route("/{id}", name="train_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:train')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find train entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('train'));
    }

    /**
     * Creates a form to delete a train entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('train_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
