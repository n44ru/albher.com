<?php

namespace AppBundle\Controller;

use AppBundle\Entity\reviews;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Review controller.
 *
 * @Route("admin/reviews")
 */
class reviewsController extends Controller
{
    /**
     * Lists all review entities.
     *
     * @Route("/", name="admin_reviews_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $reviews = $em->getRepository('AppBundle:reviews')->findAll();

        return $this->render('admin/reviews/index.html.twig', array(
            'reviews' => $reviews,
        ));
    }

    /**
     * Displays a form to edit an existing review entity.
     *
     * @Route("/{id}/edit", name="admin_reviews_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, reviews $review)
    {
        $deleteForm = $this->createDeleteForm($review);
        $editForm = $this->createForm('AppBundle\Form\reviewsType', $review);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('admin_reviews_index');
        }

        return $this->render('admin/reviews/edit.html.twig', array(
            'review' => $review,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a review entity.
     *
     * @Route("/{id}", name="admin_reviews_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, reviews $review)
    {
        $form = $this->createDeleteForm($review);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($review);
            $em->flush();
        }

        return $this->redirectToRoute('admin_reviews_index');
    }

    /**
     * Creates a form to delete a review entity.
     *
     * @param reviews $review The review entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(reviews $review)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_reviews_delete', array('id' => $review->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
