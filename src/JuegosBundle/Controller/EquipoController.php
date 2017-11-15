<?php

namespace JuegosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use JuegosBundle\Entity\Equipo;
use JuegosBundle\Form\EquipoType;
use Symfony\Component\HttpFoundation\Request;

class EquipoController extends Controller
{
    public function todosLosEquiposAction()
    {
        $repository = $this->getDoctrine()->getRepository('JuegosBundle:Equipo');
        $equipos = $repository->findAll();
        return $this->render('JuegosBundle:Carpeta_Equipo:equipo.html.twig',array('TablaEquipos' => $equipos ));
    }
    public function infoequipoAction($id)
    {
        $repository = $this->getDoctrine()->getRepository('JuegosBundle:Equipo');
        $infoequipos = $repository->find($id);
        return $this->render('JuegosBundle:Carpeta_Equipo:infoEquipo.html.twig',array('TablainfoEquipos' => $infoequipos ));
    }
    public function crearEquipoAction(Request $request)
    {
        $equipo = new Equipo();
        $form= $this->createForm(EquipoType::class,$equipo,array('boton_enviar'=> "Insertar"));

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $equipo = $form->getData();

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
             $DB = $this->getDoctrine()->getManager();
             $DB->persist($equipo);
             $DB->flush();

            return $this->redirectToRoute('Equipo_todosLosEquipos');
        }

        return $this->render('JuegosBundle:Carpeta_Equipo:crearEquipo.html.twig',array('form' => $form->createView() ));
    }
    public function actualizarEquipoAction(Request $request,$id)
    {
        $equipo = $this->getDoctrine()->getRepository('JuegosBundle:Equipo')->find($id);

        if(!$equipo){return $this->redirectToRoute('Equipo_todosLosEquipos');}
        $form = $this->createForm(\JuegosBundle\Form\EquipoType::class, $equipo,array('boton_enviar'=> "Actualizar"));
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid())
        {
            $DB = $this->getDoctrine()->getManager();
            $DB->persist($equipo);
            $DB->flush();
            return $this->redirectToRoute('Equipo_Actualizar', ["id" => $id]);
        }
        return $this->render("JuegosBundle:Carpeta_Equipo:modificarEquipo.html.twig", array('form'=>$form->createView() ));
    }
    public function eliminarEquipoAction($id)
    {
            $DB = $this->getDoctrine()->getManager();
            $eliminar = $DB->getRepository('JuegosBundle:Equipo')->find($id);

            if (!$eliminar) {
                throw $this->createNotFoundException(
                    'No se ha encontrado el id: '.$id
                );
            }

            $DB->remove($eliminar);
            $DB->flush();

        return $this->render("JuegosBundle:Carpeta_Equipo:eliminarEquipo.html.twig", array('TablaEquipo'=>$eliminar));
    }
}
