<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{

    //Manera de hacer rutas 1, sin necesidad de routes.yaml pero el código es más sucio
    #[Route('/home', name: 'home')]
    public function index(): Response
    {
        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'hello' => 'Hola Mundo con Symfony',
        ]);
    }

    //Manera de hcer rutas usando routes.yaml(si indica en yaml la ruta en vez de aqui)
    public function animales($nombre, $apellidos)
    {

        $title = 'Bienvenido a la página de animales';
        $animales = array('perro', 'gato', 'paloma', 'rata');
        $aves = array(
            'tipo' => 'loro',
            'color' => 'gris',
            'edad' => 4,
            'raza' => 'colillano'
        );
        # render tiene dos parámetros, el path de twig un array con el contenido
        return $this->render('home/animales.html.twig', [
            'title' => $title,
            'nombre' => $nombre,
            'apellidos' => $apellidos,
            'animales' => $animales,
            'aves' => $aves
        ]);
    }
    #redirige a al primer parámetro, hay que implementar las rutas tambien
    public function redirigir()
    {
        return $this->redirectToRoute('animales', [
            'nombre' => 'Javier Andres',
            'apellidos' => 'Giron'
        ]);
    }
}
