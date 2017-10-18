<?php

namespace BlogBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use BlogBundle\Entity\empleados;
use BlogBundle\Form\empleadosType;

/**
 * empleados controller.
 *
 */
class empleadosController extends Controller
{
    /**
     * Lists all empleados entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $empleados = $em->getRepository('BlogBundle:empleados')->findAll();

        return $this->render('empleados/index.html.twig', array(
            'empleados' => $empleados,
        ));
    }

    /**
     * Creates a new empleados entity.
     *
     */
    public function newAction(Request $request)
    {
        $empleado = new empleados();
        $form = $this->createForm('BlogBundle\Form\empleadosType', $empleado);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($empleado);
            $em->flush();

            return $this->redirectToRoute('empleados_show', array('id' => $empleado->getId()));
        }

        return $this->render('empleados/new.html.twig', array(
            'empleado' => $empleado,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a empleados entity.
     *
     */
    public function showAction(empleados $empleado)
    {
        $deleteForm = $this->createDeleteForm($empleado);

        return $this->render('empleados/show.html.twig', array(
            'empleado' => $empleado,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing empleados entity.
     *
     */
    public function editAction(Request $request, empleados $empleado)
    {
        $deleteForm = $this->createDeleteForm($empleado);
        $editForm = $this->createForm('BlogBundle\Form\empleadosType', $empleado);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($empleado);
            $em->flush();

            return $this->redirectToRoute('empleados_edit', array('id' => $empleado->getId()));
        }

        return $this->render('empleados/edit.html.twig', array(
            'empleado' => $empleado,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a empleados entity.
     *
     */
    public function deleteAction(Request $request, empleados $empleado)
    {
        $form = $this->createDeleteForm($empleado);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($empleado);
            $em->flush();
        }

        return $this->redirectToRoute('empleados_index');
    }

    /**
     * Creates a form to delete a empleados entity.
     *
     * @param empleados $empleado The empleados entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(empleados $empleado)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('empleados_delete', array('id' => $empleado->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
