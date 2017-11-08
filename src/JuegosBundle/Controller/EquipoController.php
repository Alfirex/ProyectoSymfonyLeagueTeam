<?php

namespace JuegosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class EquipoController extends Controller
{
    public function todosLosEquiposAction()
    {
        $repository = $this->getDoctrine()->getRepository('JuegosBundle:Equipo');
        // find *all* equipos
        $equipos = $repository->findAll();
        return $this->render('JuegosBundle:Carpeta_Equipo:equipo.html.twig',array('TablaEquipos' => $equipos ));
    }
    public function infoequipoAction($id)
    {
        $repository = $this->getDoctrine()->getRepository('JuegosBundle:Equipo');
        // find *all* infoequipos
        $infoequipos = $repository->find($id);
        return $this->render('JuegosBundle:Carpeta_Equipo:infoEquipo.html.twig',array('TablainfoEquipos' => $infoequipos ));
    }
}
