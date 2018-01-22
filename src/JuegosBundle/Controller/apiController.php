<?php

namespace JuegosBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class apiController extends Controller
{
    public function createAction($id)
    {
        return new Response("<html><head><body>".$id."</body></head></html>");
    }
    public function readAction($id)
    {
        return new Response("<html><head><body>".$id."</body></head></html>");
    }
    public function updateAction($id)
    {
        return new Response("<html><head><body>".$id."</body></head></html>");
    }
    public function deleteAction($id)
    {
        return new Response("<html><head><body>".$id."</body></head></html>");
    }

}
