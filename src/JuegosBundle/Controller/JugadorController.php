<?php

namespace JuegosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class JugadorController extends Controller
{
    public function indexAction()
    {
        return $this->render('JuegosBundle:Carpeta_Jugador:index.html.twig');
    }
    public function ListarEquiposAction()
    {
        return $this->render('JuegosBundle:Default:Lista_de_equipos.html.twig');
    }

}
