<?php

namespace AppBundle\Controller;

use AppBundle\Entity\config;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Config controller.
 *
 * @Route("admin/config")
 */
class configController extends Controller
{
    /**
     * Lists all config entities.
     *
     * @Route("/", name="config_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $configs = $em->getRepository('AppBundle:config')->findAll();

        return $this->render('admin/config/index.html.twig', array(
            'configs' => $configs,
        ));
    }

    /**
     * Displays a form to edit an existing config entity.
     *
     * @Route("/{id}/edit", name="config_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, config $config)
    {
        $deleteForm = $this->createDeleteForm($config);
        $editForm = $this->createForm('AppBundle\Form\configType', $config);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('config_edit', array('id' => $config->getId()));
        }

        return $this->render('admin/config/edit.html.twig', array(
            'config' => $config,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a config entity.
     *
     * @Route("/{id}", name="config_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, config $config)
    {
        $form = $this->createDeleteForm($config);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($config);
            $em->flush();
        }

        return $this->redirectToRoute('config_index');
    }

    /**
     * Creates a form to delete a config entity.
     *
     * @param config $config The config entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(config $config)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('config_delete', array('id' => $config->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
