<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Cds;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Cd controller.
 *
 * @Route("cds")
 */
class CdsController extends Controller
{
    /**
     * Lists all cd entities.
     *
     * @Route("/", name="cds_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cds = $em->getRepository('AppBundle:Cds')->findAll();

        return $this->render('cds/index.html.twig', array(
            'cds' => $cds,
        ));
    }

    /**
     * Creates a new cd entity.
     *
     * @Route("/new", name="cds_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $cd = new Cd();
        $form = $this->createForm('AppBundle\Form\CdsType', $cd);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cd);
            $em->flush($cd);

            return $this->redirectToRoute('cds_show', array('id' => $cd->getId()));
        }

        return $this->render('cds/new.html.twig', array(
            'cd' => $cd,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a cd entity.
     *
     * @Route("/{id}", name="cds_show")
     * @Method("GET")
     */
    public function showAction(Cds $cd)
    {
        $deleteForm = $this->createDeleteForm($cd);

        return $this->render('cds/show.html.twig', array(
            'cd' => $cd,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing cd entity.
     *
     * @Route("/{id}/edit", name="cds_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Cds $cd)
    {
        $deleteForm = $this->createDeleteForm($cd);
        $editForm = $this->createForm('AppBundle\Form\CdsType', $cd);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cds_edit', array('id' => $cd->getId()));
        }

        return $this->render('cds/edit.html.twig', array(
            'cd' => $cd,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a cd entity.
     *
     * @Route("/{id}", name="cds_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Cds $cd)
    {
        $form = $this->createDeleteForm($cd);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cd);
            $em->flush($cd);
        }

        return $this->redirectToRoute('cds_index');
    }

    /**
     * Creates a form to delete a cd entity.
     *
     * @param Cds $cd The cd entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Cds $cd)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cds_delete', array('id' => $cd->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
