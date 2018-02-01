<?php

namespace UsuariosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use UsuariosBundle\Entity\usuarios;
use UsuariosBundle\Form\usuariosType;

class usuarios2Controller extends Controller
{
    /**
     * @Route("/CUD/mostrarUsuarios", name="mostrarUsuarios")
     */
    public function mostrarUsuariosAction()
    {
      $repository = $this->getDoctrine()->getRepository('UsuariosBundle:usuarios');
      // find *all* alumnos
      $alumnos = $repository->findAll();
       return $this->render("UsuariosBundle:Carpeta_User:mostrar.html.twig", array('Tablausuarios'=>$alumnos  ));
    }

    /**
     * @Route("/CUD/updateUsuarios/{id}", name="actualizar_Usuarios")
     */
    public function updateUsuarioAction(Request $request,$id)
     {
         $entity = $this->getDoctrine()->getRepository('UsuariosBundle:usuarios')->find($id);

         if(!$entity){return $this->redirectToRoute('mostrar_tabla');}
         $form = $this->createForm(\UsuariosBundle\Form\usuariosType::class, $entity);
         $form->handleRequest($request);

         if ($form->isSubmitted() && $form->isValid())
         {
             $DB = $this->getDoctrine()->getManager();
             $DB->persist($entity);
             $DB->flush();
             return $this->redirectToRoute('actualizar_Usuarios', ["id" => $id]);
         }
         return $this->render("UsuariosBundle:Carpeta_User:actualizar.html.twig", array('form'=>$form->createView(),"id"=>$id ));
     }

       /**
      * @Route("/CUD/deleteUsuarios/{id}", name="eliminar_Usuario")
      */
     public function deleteUsuariosAction($id)
     {
             $DB = $this->getDoctrine()->getManager();
             $eliminar = $DB->getRepository('UsuariosBundle:usuarios')->find($id);

             if (!$eliminar) {
                 throw $this->createNotFoundException(
                     'No se ha encontrado el id: '.$id
                 );
             }

             $DB->remove($eliminar);
             $DB->flush();

         return $this->render("UsuariosBundle:Carpeta_User:eliminar.html.twig", array('TablaEntity'=>$eliminar));
     }
     /**
      * @Route("/CUD/rolesUsuarios/{id}", name="role_user")
      */
     public function rolesUsuarioAction($id)
     {
          $BD = $this->getDoctrine()->getManager();
          $update =  $BD->getRepository('UsuariosBundle:usuarios')->find($id);
          $roles = ["ROLE_USERNORMALSS"];
          $update->setRoles($roles);
          $BD->flush();

        return $this->redirectToRoute('actualizar_Usuarios', ["id" => $id]);
     }

}
