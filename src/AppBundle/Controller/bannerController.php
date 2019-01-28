<?php

namespace AppBundle\Controller;

use AppBundle\Entity\banner;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Banner controller.
 *
 * @Route("admin/banner")
 */
class bannerController extends Controller
{
    /**
     * Lists all banner entities.
     *
     * @Route("/", name="admin_banner_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $query = $em->createQuery('SELECT p FROM AppBundle:banner p ORDER BY p.orden');
        $banners = $query->getResult();
        return $this->render('admin/banner/index.html.twig', array(
            'banners' => $banners,
        ));
    }

    /**
     * Creates a new banner entity.
     *
     * @Route("/new", name="admin_banner_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $banner = new Banner();
        $form = $this->createForm('AppBundle\Form\bannerType', $banner);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            // File Upload
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
            $file = $banner->getFile();
            $fileName = $this->generateUniqueFileName() . '.' . $file->guessExtension();
            $file->move(
                $this->getParameter('images_directory'),
                $fileName
            );
            $banner->setFile($fileName);
            $em->persist($banner);
            $em->flush();

            return $this->redirectToRoute('admin_banner_index');
        }

        return $this->render('admin/banner/new.html.twig', array(
            'banner' => $banner,
            'form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing banner entity.
     *
     * @Route("/{id}/edit", name="admin_banner_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, banner $banner)
    {
        $em = $this->getDoctrine()->getManager();
        $myfile=$banner->getFile();
        //
        $deleteForm = $this->createDeleteForm($banner);
        $editForm = $this->createForm('AppBundle\Form\bannerType', $banner);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            if ($banner->getFile()) {
                /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
                $file = $banner->getFile();
                $fileName = $this->generateUniqueFileName() . '.' . $file->guessExtension();
                $file->move(
                    $this->getParameter('images_directory'),
                    $fileName
                );
                $banner->setFile($fileName);
            } else{$banner->setFile($myfile);}
            $em->persist($banner);
            $em->flush();
            return $this->redirectToRoute('admin_banner_index');
        }

        return $this->render('admin/banner/edit.html.twig', array(
            'banner' => $banner,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a banner entity.
     *
     * @Route("/{id}", name="admin_banner_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, banner $banner)
    {
        $form = $this->createDeleteForm($banner);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($banner);
            $em->flush();
        }

        return $this->redirectToRoute('admin_banner_index');
    }

    /**
     * Creates a form to delete a banner entity.
     *
     * @param banner $banner The banner entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(banner $banner)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_banner_delete', array('id' => $banner->getId())))
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
