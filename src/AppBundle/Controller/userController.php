<?php

namespace AppBundle\Controller;

use AppBundle\Entity\user;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * User controller.
 *
 * @Route("admin/user")
 */
class userController extends Controller
{
    /**
     * Lists all user entities.
     *
     * @Route("/", name="admin_user_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $users = $em->getRepository('AppBundle:user')->findAll();

        return $this->render('admin/user/index.html.twig', array(
            'users' => $users,
        ));
    }

    /**
     * Creates a new user entity.
     *
     * @Route("/new", name="admin_user_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm('AppBundle\Form\userType', $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $p = $user->getPassword();
            $factory = $this->get('security.encoder_factory');
            $encoder = $factory->getEncoder($user);
            $password = $encoder->encodePassword($p, $user->getSalt());
            $user->setPassword($password);
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('admin_user_index');
        }

        return $this->render('admin/user/new.html.twig', array(
            'user' => $user,
            'form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing user entity.
     *
     * @Route("/{id}/edit", name="admin_user_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, user $user)
    {
        $deleteForm = $this->createDeleteForm($user);
        $editForm = $this->createForm('AppBundle\Form\userType', $user);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $p = $user->getPassword();
            $factory = $this->get('security.encoder_factory');
            $encoder = $factory->getEncoder($user);
            $password = $encoder->encodePassword($p, $user->getSalt());
            $user->setPassword($password);
            $em->persist($user);
            $em->flush();

            return $this->redirectToRoute('admin_user_index');
        }

        return $this->render('admin/user/edit.html.twig', array(
            'user' => $user,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a user entity.
     *
     * @Route("/{id}", name="admin_user_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, user $user)
    {
        $form = $this->createDeleteForm($user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($user);
            $em->flush();
        }

        return $this->redirectToRoute('admin_user_index');
    }

    /**
     * Creates a form to delete a user entity.
     *
     * @param user $user The user entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(user $user)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_user_delete', array('id' => $user->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
