<?php

namespace AppBundle\Controller;

use AppBundle\Entity\room;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Room controller.
 *
 * @Route("admin/room")
 */
class roomController extends Controller
{
    /**
     * Lists all room entities.
     *
     * @Route("/", name="admin_room_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $rooms = $em->getRepository('AppBundle:room')->findAll();

        return $this->render('admin/room/index.html.twig', array(
            'rooms' => $rooms,
        ));
    }

    /**
     * Creates a new room entity.
     *
     * @Route("/new", name="admin_room_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $room = new Room();
        $form = $this->createForm('AppBundle\Form\roomType', $room);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            // File Upload
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file1 */
            $file1 = $room->getFile1();
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file2 */
            $file2 = $room->getFile2();
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file3 */
            $file3 = $room->getFile3();
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file4 */
            $file4 = $room->getFile4();
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file5 */
            $file5 = $room->getFile5();
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file6 */
            $file6 = $room->getFile6();
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file7 */
            $file7 = $room->getFile7();
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file8 */
            $file8 = $room->getFile8();
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file9 */
            $file9 = $room->getFile9();
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file10 */
            $file10 = $room->getFile10();
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file11 */
            $file11 = $room->getFile11();
            /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file12 */
            $file12 = $room->getFile12();
            //
            if($file1 != null){
                $fileName1 = $this->generateUniqueFileName().'.'.$file1->guessExtension();
                $file1->move($this->getParameter('images_directory'), $fileName1);
                $room->setFile1($fileName1);
            }
            if($file2 != null){
                $fileName2 = $this->generateUniqueFileName().'.'.$file2->guessExtension();
                $file2->move($this->getParameter('images_directory'), $fileName2);
                $room->setFile2($fileName2);
            }
            if($file3 != null){
                $fileName3 = $this->generateUniqueFileName().'.'.$file3->guessExtension();
                $file3->move($this->getParameter('images_directory'), $fileName3);
                $room->setFile3($fileName3);
            }
            if($file4 != null){
                $fileName4 = $this->generateUniqueFileName().'.'.$file4->guessExtension();
                $file4->move($this->getParameter('images_directory'), $fileName4);
                $room->setFile4($fileName4);
            }
            if($file5 != null){
                $fileName5 = $this->generateUniqueFileName().'.'.$file5->guessExtension();
                $file5->move($this->getParameter('images_directory'), $fileName5);
                $room->setFile5($fileName5);
            }
            if($file6 != null){
                $fileName6 = $this->generateUniqueFileName().'.'.$file6->guessExtension();
                $file6->move($this->getParameter('images_directory'), $fileName6);
                $room->setFile6($fileName6);
            }
            if($file7 != null){
                $fileName7 = $this->generateUniqueFileName().'.'.$file7->guessExtension();
                $file7->move($this->getParameter('images_directory'), $fileName7);
                $room->setFile7($fileName7);
            }
            if($file8 != null){
                $fileName8 = $this->generateUniqueFileName().'.'.$file8->guessExtension();
                $file8->move($this->getParameter('images_directory'), $fileName8);
                $room->setFile8($fileName8);
            }
            if($file9 != null){
                $fileName9 = $this->generateUniqueFileName().'.'.$file9->guessExtension();
                $file9->move($this->getParameter('images_directory'), $fileName9);
                $room->setFile9($fileName9);
            }
            if($file10 != null){
                $fileName10 = $this->generateUniqueFileName().'.'.$file10->guessExtension();
                $file10->move($this->getParameter('images_directory'), $fileName10);
                $room->setFile10($fileName10);
            }
            if($file11 != null){
                $fileName11 = $this->generateUniqueFileName().'.'.$file11->guessExtension();
                $file11->move($this->getParameter('images_directory'), $fileName11);
                $room->setFile11($fileName11);
            }
            if($file12 != null){
                $fileName12 = $this->generateUniqueFileName().'.'.$file12->guessExtension();
                $file12->move($this->getParameter('images_directory'), $fileName12);
                $room->setFile12($fileName12);
            }

            $em->persist($room);
            $em->flush();

            return $this->redirectToRoute('admin_room_index');
        }

        return $this->render('admin/room/new.html.twig', array(
            'room' => $room,
            'form' => $form->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing room entity.
     *
     * @Route("/{id}/edit", name="admin_room_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, room $room)
    {
        $em = $this->getDoctrine()->getManager();
        $myfile1=$room->getFile1();
        $myfile2=$room->getFile2();
        $myfile3=$room->getFile3();
        $myfile4=$room->getFile4();
        $myfile5=$room->getFile5();
        $myfile6=$room->getFile6();
        $myfile7=$room->getFile7();
        $myfile8=$room->getFile8();
        $myfile9=$room->getFile9();
        $myfile10=$room->getFile10();
        $myfile11=$room->getFile11();
        $myfile12=$room->getFile12();

        $deleteForm = $this->createDeleteForm($room);
        $editForm = $this->createForm('AppBundle\Form\roomType', $room);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {

            if($room->getFile1()!= null){

                /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file1 */
                $file1 = $room->getFile1();
                $fileName1 = $this->generateUniqueFileName().'.'.$file1->guessExtension();
                $file1->move($this->getParameter('images_directory'), $fileName1);
                $room->setFile1($fileName1);
            } else{$room->setFile1($myfile1);}
            if($room->getFile2()){
                /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file2 */
                $file2 = $room->getFile2();
                $fileName2 = $this->generateUniqueFileName().'.'.$file2->guessExtension();
                $file2->move($this->getParameter('images_directory'), $fileName2);
                $room->setFile2($fileName2);
            } else{$room->setFile2($myfile2);}
            if($room->getFile3()){
                /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file3 */
                $file3 = $room->getFile3();
                $fileName3 = $this->generateUniqueFileName().'.'.$file3->guessExtension();
                $file3->move($this->getParameter('images_directory'), $fileName3);
                $room->setFile3($fileName3);
            } else{$room->setFile3($myfile3);}
            if($room->getFile4()){
                /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file4 */
                $file4 = $room->getFile4();
                $fileName4 = $this->generateUniqueFileName().'.'.$file4->guessExtension();
                $file4->move($this->getParameter('images_directory'), $fileName4);
                $room->setFile4($fileName4);
            } else{$room->setFile4($myfile4);}
            if($room->getFile5()){
                /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file5 */
                $file5 = $room->getFile5();
                $fileName5 = $this->generateUniqueFileName().'.'.$file5->guessExtension();
                $file5->move($this->getParameter('images_directory'), $fileName5);
                $room->setFile5($fileName5);
            } else{$room->setFile5($myfile5);}
            if($room->getFile6()){
                /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file6 */
                $file6 = $room->getFile6();
                $fileName6 = $this->generateUniqueFileName().'.'.$file6->guessExtension();
                $file6->move($this->getParameter('images_directory'), $fileName6);
                $room->setFile6($fileName6);
            } else{$room->setFile6($myfile6);}
            if($room->getFile7()){
                /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file7 */
                $file7 = $room->getFile7();
                $fileName7 = $this->generateUniqueFileName().'.'.$file7->guessExtension();
                $file7->move($this->getParameter('images_directory'), $fileName7);
                $room->setFile7($fileName7);
            } else{$room->setFile7($myfile7);}
            if($room->getFile8()){
                /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file8 */
                $file8 = $room->getFile8();
                $fileName8 = $this->generateUniqueFileName().'.'.$file8->guessExtension();
                $file8->move($this->getParameter('images_directory'), $fileName8);
                $room->setFile8($fileName8);
            } else{$room->setFile8($myfile8);}
            if($room->getFile9()){
                /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file9 */
                $file9 = $room->getFile9();
                $fileName9 = $this->generateUniqueFileName().'.'.$file9->guessExtension();
                $file9->move($this->getParameter('images_directory'), $fileName9);
                $room->setFile9($fileName9);
            } else{$room->setFile9($myfile9);}
            if($room->getFile10()){
                /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file10 */
                $file10 = $room->getFile10();
                $fileName10 = $this->generateUniqueFileName().'.'.$file10->guessExtension();
                $file10->move($this->getParameter('images_directory'), $fileName10);
                $room->setFile10($fileName10);
            } else{$room->setFile10($myfile10);}
            if($room->getFile11()){
                /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file11 */
                $file11 = $room->getFile11();
                $fileName11 = $this->generateUniqueFileName().'.'.$file11->guessExtension();
                $file11->move($this->getParameter('images_directory'), $fileName11);
                $room->setFile11($fileName11);
            } else{$room->setFile11($myfile11);}
            if($room->getFile12()){
                /** @var Symfony\Component\HttpFoundation\File\UploadedFile $file12 */
                $file12 = $room->getFile12();
                $fileName12 = $this->generateUniqueFileName().'.'.$file12->guessExtension();
                $file12->move($this->getParameter('images_directory'), $fileName12);
                $room->setFile12($fileName12);
            } else{$room->setFile12($myfile12);}
            //
            $em->persist($room);
            $em->flush();
            return $this->redirectToRoute('admin_room_index');
        }

        return $this->render('admin/room/edit.html.twig', array(
            'service' => $room,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a room entity.
     *
     * @Route("/{id}", name="admin_room_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, room $room)
    {
        $form = $this->createDeleteForm($room);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($room);
            $em->flush();
        }

        return $this->redirectToRoute('admin_room_index');
    }

    /**
     * Creates a form to delete a room entity.
     *
     * @param room $room The room entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(room $room)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('admin_room_delete', array('id' => $room->getId())))
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
