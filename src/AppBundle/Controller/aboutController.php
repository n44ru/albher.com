<?php

namespace AppBundle\Controller;

use AppBundle\Entity\about;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * About controller.
 *
 * @Route("admin/about")
 */
class aboutController extends Controller
{
    /**
     * Lists all about entities.
     *
     * @Route("/", name="admin_about_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $abouts = $em->getRepository('AppBundle:about')->findAll();

        return $this->render('admin/about/index.html.twig', array(
            'abouts' => $abouts,
        ));
    }

    /**
     * Creates a new about entity.
     *
     * @Route("/new", name="admin_about_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $about = new About();
        $form = $this->createForm('AppBundle\Form\aboutType', $about);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            // File Upload
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
            $file = $about->getFile();
            $fileName = $this->generateUniqueFileName() . '.' . $file->guessExtension();
            $file->move(
                $this->getParameter('images_directory'),
                $fileName
            );
            $about->setFile($fileName);
            $em->persist($about);
            $em->flush();

            return $this->redirectToRoute('admin_about_index');
        }

        return $this->render('admin/about/new.html.twig', array(
            'about' => $about,
            'form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing about entity.
     *
     * @Route("/{id}/edit", name="admin_about_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, about $about)
    {
        $em = $this->getDoctrine()->getManager();
        $myfile=$about->getFile();

        $deleteForm = $this->createDeleteForm($about);
        $editForm = $this->createForm('AppBundle\Form\aboutType', $about);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            if ($about->getFile()) {
                /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
                $file = $about->getFile();
                $fileName = $this->generateUniqueFileName() . '.' . $file->guessExtension();
                $file->move(
                    $this->getParameter('images_directory'),
                    $fileName
                );
                $about->setFile($fileName);
            } else{$about->setFile($myfile);}
            $em->persist($about);
            $em->flush();

            return $this->redirectToRoute('admin_about_index');
        }

        return $this->render('admin/about/edit.html.twig', array(
            'about' => $about,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a about entity.
     *
     * @Route("/{id}", name="admin_about_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, about $about)
    {
        $form = $this->createDeleteForm($about);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($about);
            $em->flush();
        }

        return $this->redirectToRoute('admin_about_index');
    }

    /**
     * Creates a form to delete a about entity.
     *
     * @param about $about The about entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(about $about)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_about_delete', array('id' => $about->getId())))
            ->setMethod('DELETE')
            ->getForm();
    }

    /**
     * @return string
     */
    private function generateUniqueFileName()
    {
        return md5(uniqid());
    }
}
