<?php

namespace BlogBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use BlogBundle\Entity\empleador;
use BlogBundle\Form\empleadorType;

/**
 * empleador controller.
 *
 */
class empleadorController extends Controller
{
    /**
     * Lists all empleador entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $empleadors = $em->getRepository('BlogBundle:empleador')->findAll();

        return $this->render('empleador/index.html.twig', array(
            'empleadors' => $empleadors,
        ));
    }

    /**
     * Creates a new empleador entity.
     *
     */
    public function newAction(Request $request)
    {
        $empleador = new empleador();
        $form = $this->createForm('BlogBundle\Form\empleadorType', $empleador);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($empleador);
            $em->flush();

            return $this->redirectToRoute('empleador_show', array('id' => $empleador->getId()));
        }

        return $this->render('empleador/new.html.twig', array(
            'empleador' => $empleador,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a empleador entity.
     *
     */
    public function showAction(empleador $empleador)
    {
        $deleteForm = $this->createDeleteForm($empleador);

        return $this->render('empleador/show.html.twig', array(
            'empleador' => $empleador,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing empleador entity.
     *
     */
    public function editAction(Request $request, empleador $empleador)
    {
        $deleteForm = $this->createDeleteForm($empleador);
        $editForm = $this->createForm('BlogBundle\Form\empleadorType', $empleador);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($empleador);
            $em->flush();

            return $this->redirectToRoute('empleador_edit', array('id' => $empleador->getId()));
        }

        return $this->render('empleador/edit.html.twig', array(
            'empleador' => $empleador,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a empleador entity.
     *
     */
    public function deleteAction(Request $request, empleador $empleador)
    {
        $form = $this->createDeleteForm($empleador);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($empleador);
            $em->flush();
        }

        return $this->redirectToRoute('empleador_index');
    }

    /**
     * Creates a form to delete a empleador entity.
     *
     * @param empleador $empleador The empleador entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(empleador $empleador)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('empleador_delete', array('id' => $empleador->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
