<?php

namespace AppBundle\Controller;

use AppBundle\Entity\reviews;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("{_locale}/home", name="homepage")
     * defaults={"_locale"="en"}, requirements={"_locale"="(es|en|de)"}
     * @Method({"GET", "POST"})
     */
    public function indexAction(Request $request, $_locale)
    {
        $em = $this->getDoctrine()->getManager();
        $services = $em->getRepository('AppBundle:services')->findAll();
        $config = $em->getRepository('AppBundle:config')->findAll();
        //$banner = $em->getRepository('AppBundle:banner')->findAll();
        $query = $em->createQuery('SELECT p FROM AppBundle:banner p ORDER BY p.orden');
        $banner = $query->getResult();
        //$gallery = $em->getRepository('AppBundle:gallery')->findAll();
        $query = $em->createQuery('SELECT p FROM AppBundle:gallery p ORDER BY p.orden');
        $gallery = $query->getResult();
        $about = $em->getRepository('AppBundle:about')->findAll();
        $com = $em->getRepository('AppBundle:reviews')->findAll();
        if($request->request->count()>0){
            if($request->request->get('reviews-name')){
                $name = $request->request->get('reviews-name');
                $text = $request->request->get('reviews-text');
                //
                $review = new reviews();
                $review->setName($name);
                $review->setText($text);
                $review->setActive(0);
                $em->persist($review);
                $em->flush();
            }
            // Reservas
            if($request->request->get('s_name')){
                $name = $request->request->get('s_name');
                $email = $request->request->get('s_email');
                $phone = $request->request->get('s_phone');
                $date = $request->request->get('s_date');
                $hours = $request->request->get('s_hours');
                $text = $request->request->get('s_text');
                $servicio=$request->request->get('h_serv');
                //
                $cabeceras = 'MIME-Version: 1.0' . "\r\n";
                $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                $cabeceras .= 'From:'.$email. "\r\n";
                $to=$config[0]->getCorreo();
                $title = "Reserva para el Servicio: ".$servicio;
                $msg ="EL cliente: ".$name." , Telefono: ".$phone." , ha reservado este servicio para el dia: ".$date." , a la hora:".$hours."\r\n";
                $msg =$msg."Comentarios: ".$text;
                //
                mail($to,$title,$msg,$cabeceras);
            }
            // Contacto
            if($request->request->get('c_name')){
                $name = $request->request->get('c_name');
                $email = $request->request->get('c_email');
                $phone = $request->request->get('c_phone');
                $text = $request->request->get('c_text');
                //
                $cabeceras = 'MIME-Version: 1.0' . "\r\n";
                $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                $cabeceras .= 'From:'.$email. "\r\n";
                $to=$config[0]->getCorreo();
                $title = "Mensaje del Contactenos de la Web";
                $msg="EL cliente: ".$name." , Telefono: ".$phone." , ha enviado el mensaje siguiente: "."\r\n";
                $msg =$msg.$text;
                //
                mail($to,$title,$msg,$cabeceras);
            }
        }
        return $this->render('default/index.html.twig', array(
            'services' => $services,
            'banner' => $banner,
            'gallery' => $gallery,
            'about' => $about[0],
            'comments' => $com,
            'config' => $config[0],
            'locale' => $_locale
        ));
    }
    /**
     * @Route("/login", name="login")
     * defaults={"_locale"="en"}, requirements={"_locale"="(es|en|de)"}
     */
    public function loginAction(Request $request)
    {
        $authenticationUtils = $this->get('security.authentication_utils');
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();

        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render(
            'default/login.html.twig',
            array(
                'last_username' => $lastUsername,
                'error' => $error,
            )
        );
    }
    /**
     * @Route("/logout", name="logout")
     * defaults={"_locale"="en"}, requirements={"_locale"="(es|en|de)"}
     */
    public function logoutAction(Request $request)
    {
    }

    /**
     * @Route("/admin", name="admin")
     * defaults={"_locale"="en"}, requirements={"_locale"="(es|en|de)"}
     */
    public function adminAction()
    {
        $em = $this->getDoctrine()->getManager();

        $banners = $em->getRepository('AppBundle:banner')->findAll();

        return $this->render('admin/banner/index.html.twig', array(
            'banners' => $banners,
        ));
    }
    /**
     * @Route("{_locale}/rooms", name="rooms")
     * defaults={"_locale"="en"}, requirements={"_locale"="(es|en|de)"}
     */
    public function roomAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $config = $em->getRepository('AppBundle:config')->findAll();
        $rooms = $em->getRepository('AppBundle:room')->findAll();
        $banner = $em->getRepository('AppBundle:banner')->findAll();
        $com = $em->getRepository('AppBundle:reviews')->findAll();
        if($request->request->count()>0){
            if($request->request->get('reviews-name')){
                $name = $request->request->get('reviews-name');
                $text = $request->request->get('reviews-text');
                //
                $review = new reviews();
                $review->setName($name);
                $review->setText($text);
                $review->setActive(0);
                $em->persist($review);
                $em->flush();
            }
            // Contacto
            if($request->request->get('c_name')){
                $name = $request->request->get('c_name');
                $email = $request->request->get('c_email');
                $phone = $request->request->get('c_phone');
                $text = $request->request->get('c_text');
                //
                $cabeceras = 'MIME-Version: 1.0' . "\r\n";
                $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                $cabeceras .= 'From:'.$email. "\r\n";
                $to=$config[0]->getCorreo();
                $title = "Mensaje del Contactenos de la Web";
                $msg="EL cliente: ".$name." , Telefono: ".$phone." , ha enviado el mensaje siguiente: "."\r\n";
                $msg =$msg.$text;
                //
                mail($to,$title,$msg,$cabeceras);
            }
        }
        return $this->render('default/rooms.html.twig', array(
            'rooms' => $rooms,
            'banner' => $banner,
            'comments' => $com,
            'config' => $config[0]
        ));
    }

}
