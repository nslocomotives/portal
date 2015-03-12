<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\Timetable;
use AppBundle\Form\TimetableType;

/**
 * Timetable controller.
 *
 * @Route("/timetable")
 */
class TimetableController extends Controller
{

    /**
     * Lists all Timetable entities.
     *
     * @Route("/", name="timetable")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:Timetable')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new Timetable entity.
     *
     * @Route("/", name="timetable_create")
     * @Method("POST")
     * @Template("AppBundle:Timetable:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Timetable();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('timetable_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a Timetable entity.
     *
     * @param Timetable $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Timetable $entity)
    {
        $form = $this->createForm(new TimetableType(), $entity, array(
            'action' => $this->generateUrl('timetable_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new Timetable entity.
     *
     * @Route("/new", name="timetable_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Timetable();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a Timetable entity.
     *
     * @Route("/{id}", name="timetable_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Timetable')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Timetable entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing Timetable entity.
     *
     * @Route("/{id}/edit", name="timetable_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Timetable')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Timetable entity.');
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
    * Creates a form to edit a Timetable entity.
    *
    * @param Timetable $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Timetable $entity)
    {
        $form = $this->createForm(new TimetableType(), $entity, array(
            'action' => $this->generateUrl('timetable_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing Timetable entity.
     *
     * @Route("/{id}", name="timetable_update")
     * @Method("PUT")
     * @Template("AppBundle:Timetable:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:Timetable')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Timetable entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('timetable_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a Timetable entity.
     *
     * @Route("/{id}", name="timetable_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:Timetable')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find Timetable entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('timetable'));
    }

    /**
     * Creates a form to delete a Timetable entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('timetable_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
