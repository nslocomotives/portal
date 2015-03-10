<?php

namespace AppBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use AppBundle\Entity\stations;
use AppBundle\Form\stationsType;

/**
 * stations controller.
 *
 * @Route("/timetable/stations")
 */
class stationsController extends Controller
{

    /**
     * Lists all stations entities.
     *
     * @Route("/", name="timetable_stations")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppBundle:stations')->findAll();

        return array(
            'entities' => $entities,
        );
    }
    /**
     * Creates a new stations entity.
     *
     * @Route("/", name="timetable_stations_create")
     * @Method("POST")
     * @Template("AppBundle:stations:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new stations();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('timetable_stations_show', array('id' => $entity->getId())));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a stations entity.
     *
     * @param stations $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(stations $entity)
    {
        $form = $this->createForm(new stationsType(), $entity, array(
            'action' => $this->generateUrl('timetable_stations_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new stations entity.
     *
     * @Route("/new", name="timetable_stations_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new stations();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Finds and displays a stations entity.
     *
     * @Route("/{id}", name="timetable_stations_show")
     * @Method("GET")
     * @Template()
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:stations')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find stations entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        );
    }

    /**
     * Displays a form to edit an existing stations entity.
     *
     * @Route("/{id}/edit", name="timetable_stations_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:stations')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find stations entity.');
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
    * Creates a form to edit a stations entity.
    *
    * @param stations $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(stations $entity)
    {
        $form = $this->createForm(new stationsType(), $entity, array(
            'action' => $this->generateUrl('timetable_stations_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing stations entity.
     *
     * @Route("/{id}", name="timetable_stations_update")
     * @Method("PUT")
     * @Template("AppBundle:stations:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppBundle:stations')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find stations entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('timetable_stations_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        );
    }
    /**
     * Deletes a stations entity.
     *
     * @Route("/{id}", name="timetable_stations_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppBundle:stations')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find stations entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('timetable_stations'));
    }

    /**
     * Creates a form to delete a stations entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('timetable_stations_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}
