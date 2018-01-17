<?php

namespace UsuariosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use UsuariosBundle\Entity\usuarios;
use UsuariosBundle\Form\usuariosType;

class usuariosController extends Controller
{
    /**
     * @Route("/admin", name="user_admin")
     */
    public function indexAction()
    {
        return $this->render('UsuariosBundle:Default:index.html.twig');
    }

    /**
     * @Route("/", name="user")
     */
    public function usuariosAction()
    {
        return $this->render('tapasBundle:Carpeta_Tapas:index.html.twig');
    }

    /**
     * @Route("/login", name="user_login")
     */
    public function loginAction(Request $request)
    {
      $authenticationUtils = $this->get('security.authentication_utils');

      // obtener mensaje de error en el Login
      $error = $authenticationUtils->getLastAuthenticationError();

      // Coger el ultimo usuario que hemos insertado
      $lastUsername = $authenticationUtils->getLastUsername();

      return $this->render('UsuariosBundle:Carpeta_User:login.html.twig', array(
          'last_username' => $lastUsername,
          'error'         => $error,
      ));
    }

    /**
     * @Route("/register", name="user_registration")
     */
     public function registerAction(Request $request)
       {
           // 1) build the form
           $usuario = new usuarios();
           $form = $this->createForm(usuariosType::class, $usuario);

           // 2) handle the submit (will only happen on POST)
           $form->handleRequest($request);
           if ($form->isSubmitted() && $form->isValid()) {

               // 3) Encode the password (you could also do this via Doctrine listener)
               $password = $this->get('security.password_encoder')->encodePassword($usuario, $usuario->getPlainPassword());
               $usuario->setPassword($password);

               // 4) save the User!
               $DB = $this->getDoctrine()->getManager();
               $DB->persist($usuario);
               $DB->flush();

               // ... do any other work - like sending them an email, etc
               // maybe set a "flash" success message for the user

               return $this->redirectToRoute('juegos_homepage');
           }

        return $this->render('UsuariosBundle:Carpeta_User:register.html.twig',array('form' => $form->createView()));
    }

}
