<?php

namespace JuegosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('JuegosBundle:Default:index.html.twig');
    }
    public function ListarEquiposAction()
    {
        return $this->render('JuegosBundle:Default:Lista_de_equipos.html.twig');
    }
    public function EquipoAction()
    {
        return $this->render('JuegosBundle:Default:equipo.html.twig');
    }
    public function infoequipoAction()
    {
        return $this->render('JuegosBundle:Default:infoequipo.html.twig');
    }
}
