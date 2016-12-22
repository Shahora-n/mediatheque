<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Comics;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Comic controller.
 *
 * @Route("comics")
 */
class ComicsController extends Controller
{
    /**
     * Lists all comic entities.
     *
     * @Route("/", name="comics_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $comics = $em->getRepository('AppBundle:Comics')->findAll();

        return $this->render('comics/index.html.twig', array(
            'comics' => $comics,
        ));
    }

    /**
     * Creates a new comic entity.
     *
     * @Route("/new", name="comics_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $comic = new Comic();
        $form = $this->createForm('AppBundle\Form\ComicsType', $comic);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($comic);
            $em->flush($comic);

            return $this->redirectToRoute('comics_show', array('id' => $comic->getId()));
        }

        return $this->render('comics/new.html.twig', array(
            'comic' => $comic,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a comic entity.
     *
     * @Route("/{id}", name="comics_show")
     * @Method("GET")
     */
    public function showAction(Comics $comic)
    {
        $deleteForm = $this->createDeleteForm($comic);

        return $this->render('comics/show.html.twig', array(
            'comic' => $comic,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing comic entity.
     *
     * @Route("/{id}/edit", name="comics_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Comics $comic)
    {
        $deleteForm = $this->createDeleteForm($comic);
        $editForm = $this->createForm('AppBundle\Form\ComicsType', $comic);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('comics_edit', array('id' => $comic->getId()));
        }

        return $this->render('comics/edit.html.twig', array(
            'comic' => $comic,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a comic entity.
     *
     * @Route("/{id}", name="comics_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Comics $comic)
    {
        $form = $this->createDeleteForm($comic);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($comic);
            $em->flush($comic);
        }

        return $this->redirectToRoute('comics_index');
    }

    /**
     * Creates a form to delete a comic entity.
     *
     * @param Comics $comic The comic entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Comics $comic)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('comics_delete', array('id' => $comic->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
