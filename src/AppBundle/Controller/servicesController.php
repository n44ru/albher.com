<?php

namespace AppBundle\Controller;

use AppBundle\Entity\services;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Service controller.
 *
 * @Route("admin/services")
 */
class servicesController extends Controller
{
    /**
     * Lists all service entities.
     *
     * @Route("/", name="admin_services_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $services = $em->getRepository('AppBundle:services')->findAll();

        return $this->render('admin/services/index.html.twig', array(
            'services' => $services,
        ));
    }

    /**
     * Creates a new service entity.
     *
     * @Route("/new", name="admin_services_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $service = new services();
        $form = $this->createForm('AppBundle\Form\servicesType', $service);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            // File Upload
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file */
            $file1 = $service->getFile1();
            $file2 = $service->getFile2();
            $file3 = $service->getFile3();
            $file4 = $service->getFile4();
            $reserva=$service->getReserva();
            if($reserva == null || count($reserva)<1){
                $reserva="no";
            }
            $reserva = strtolower($reserva);
            //

            if($file1!= null){
                $fileName1 = $this->generateUniqueFileName().'.'.$file1->guessExtension();
                $file1->move($this->getParameter('images_directory'), $fileName1);
                $service->setFile1($fileName1);
            }
            if($file2!= null){
                $fileName2 = $this->generateUniqueFileName().'.'.$file2->guessExtension();
                $file2->move($this->getParameter('images_directory'), $fileName2);
                $service->setFile2($fileName2);
            }
            if($file3!= null){
                $fileName3 = $this->generateUniqueFileName().'.'.$file3->guessExtension();
                $file3->move($this->getParameter('images_directory'), $fileName3);
                $service->setFile3($fileName3);
            }
            if($file4!= null){
                $fileName4 = $this->generateUniqueFileName().'.'.$file4->guessExtension();
                $file4->move($this->getParameter('images_directory'), $fileName4);
                $service->setFile4($fileName4);
            }
            $service->setReserva($reserva);
            $em->persist($service);
            $em->flush();
            return $this->redirectToRoute('admin_services_index');
        }

        return $this->render('admin/services/new.html.twig', array(
            'service' => $service,
            'form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing service entity.
     *
     * @Route("/{id}/edit", name="admin_services_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, services $service)
    {
        $em = $this->getDoctrine()->getManager();

        $myfile1 = $service->getFile1();
        $myfile2 = $service->getFile2();
        $myfile3 = $service->getFile3();
        $myfile4 = $service->getFile4();

        $deleteForm = $this->createDeleteForm($service);
        $editForm = $this->createForm('AppBundle\Form\servicesType', $service);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file1 */
            $file1 = $service->getFile1();
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file2 */
            $file2 = $service->getFile2();
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file3 */
            $file3 = $service->getFile3();
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file4 */
            $file4 = $service->getFile4();
            //
            $reserva=$service->getReserva();
            if($reserva == null || strlen($reserva)<1){
                $reserva="no";
            }
            $reserva = strtolower($reserva);
            //
            if($file1!=null){
                $fileName1 = $this->generateUniqueFileName().'.'.$file1->guessExtension();
                $file1->move($this->getParameter('images_directory'), $fileName1);
                $service->setFile1($fileName1);
            }
            else{
                $service->setFile1($myfile1);
            }
            if($file2!=null){
                $fileName2 = $this->generateUniqueFileName().'.'.$file2->guessExtension();
                $file2->move($this->getParameter('images_directory'), $fileName2);
                $service->setFile2($fileName2);
            }
            else{
                $service->setFile2($myfile2);
            }
            if($file3!=null){
                $fileName3 = $this->generateUniqueFileName().'.'.$file3->guessExtension();
                $file3->move($this->getParameter('images_directory'), $fileName3);
                $service->setFile3($fileName3);
            }
            else{
                $service->setFile3($myfile3);
            }
            if($file4!=null){
                $fileName4 = $this->generateUniqueFileName().'.'.$file4->guessExtension();
                $file4->move($this->getParameter('images_directory'), $fileName4);
                $service->setFile4($fileName4);
            }
            else{
                $service->setFile4($myfile4);
            }
            $service->setReserva($reserva);
            $em->persist($service);
            $em->flush();
            return $this->redirectToRoute('admin_services_index');
        }

        return $this->render('admin/services/edit.html.twig', array(
            'service' => $service,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a service entity.
     *
     * @Route("/{id}", name="admin_services_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, services $service)
    {
        $form = $this->createDeleteForm($service);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($service);
            $em->flush();
        }

        return $this->redirectToRoute('admin_services_index');
    }

    /**
     * Creates a form to delete a service entity.
     *
     * @param services $service The service entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(services $service)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_services_delete', array('id' => $service->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }

    /**
     * @return string
     */
    private function generateUniqueFileName()
    {
        return md5(uniqid());
    }
}
