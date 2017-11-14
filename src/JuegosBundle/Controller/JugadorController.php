<?php

namespace JuegosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use JuegosBundle\Entity\Jugador;
use JuegosBundle\Form\JugadorType;
use Symfony\Component\HttpFoundation\Request;
use JuegosBundle\Entity\Equipo;


class JugadorController extends Controller
{
    public function todosLosJugadoresAction()
    {
        $repository = $this->getDoctrine()->getRepository('JuegosBundle:Jugador');
        $mostrar = $repository->findAll();
        return $this->render('JuegosBundle:Carpeta_Jugador:mostrarJugadores.html.twig',array('TablaJugadores' => $mostrar ));
    }
    public function crearJugadorAction(Request $request)
    {
        $jugador = new Jugador();
        $form= $this->createForm(JugadorType::class,$jugador,array('boton_enviar'=> "Insertar"));

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // $form->getData() holds the submitted values
            // but, the original `$task` variable has also been updated
            $jugador = $form->getData();

            // ... perform some action, such as saving the task to the database
            // for example, if Task is a Doctrine entity, save it!
             $DB = $this->getDoctrine()->getManager();
             $DB->persist($jugador);
             $DB->flush();

            return $this->redirectToRoute('Jugador_todosLosJugadores');
        }
        return $this->render('JuegosBundle:Carpeta_Jugador:crearJugador.html.twig',array('form' => $form->createView() ));
    }

}
