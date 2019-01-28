<?php

namespace AppBundle\Controller;

use AppBundle\Entity\gallery;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Gallery controller.
 *
 * @Route("admin/gallery")
 */
class galleryController extends Controller
{
    /**
     * Lists all gallery entities.
     *
     * @Route("/", name="admin_gallery_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        //$galleries = $em->getRepository('AppBundle:gallery')->findAll();
        $query = $em->createQuery('SELECT p FROM AppBundle:gallery p ORDER BY p.orden');
        $galleries = $query->getResult();

        return $this->render('admin/gallery/index.html.twig', array(
            'galleries' => $galleries,
        ));
    }

    /**
     * Creates a new gallery entity.
     *
     * @Route("/new", name="admin_gallery_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $gallery = new Gallery();
        $form = $this->createForm('AppBundle\Form\galleryType', $gallery);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            // File Upload
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
            $file = $gallery->getFile();
            $fileName = $this->generateUniqueFileName() . '.' . $file->guessExtension();
            $file->move(
                $this->getParameter('gallery_directory'),
                $fileName
            );
            $gallery->setFile($fileName);
            $em->persist($gallery);
            $em->flush();

            return $this->redirectToRoute('admin_gallery_index');
        }

        return $this->render('admin/gallery/new.html.twig', array(
            'gallery' => $gallery,
            'form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing gallery entity.
     *
     * @Route("/{id}/edit", name="admin_gallery_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, gallery $gallery)
    {
        $em = $this->getDoctrine()->getManager();
        $myfile=$gallery->getFile();
        //
        $deleteForm = $this->createDeleteForm($gallery);
        $editForm = $this->createForm('AppBundle\Form\galleryType', $gallery);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            if ($gallery->getFile()) {
                /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
                $file = $gallery->getFile();
                $fileName = $this->generateUniqueFileName() . '.' . $file->guessExtension();
                $file->move(
                    $this->getParameter('gallery_directory'),
                    $fileName
                );
                $gallery->setFile($fileName);
            } else{$gallery->setFile($myfile);}
            $em->persist($gallery);
            $em->flush();
            return $this->redirectToRoute('admin_gallery_index');
        }

        return $this->render('admin/gallery/edit.html.twig', array(
            'gallery' => $gallery,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a gallery entity.
     *
     * @Route("/{id}", name="admin_gallery_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, gallery $gallery)
    {
        $form = $this->createDeleteForm($gallery);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($gallery);
            $em->flush();
        }

        return $this->redirectToRoute('admin_gallery_index');
    }

    /**
     * Creates a form to delete a gallery entity.
     *
     * @param gallery $gallery The gallery entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(gallery $gallery)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_gallery_delete', array('id' => $gallery->getId())))
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
