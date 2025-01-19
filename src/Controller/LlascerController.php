<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class LlascerController extends AbstractController
{
    // Page d'accueil
    #[Route('/llascer', name: 'app_llascer')]
    public function index(): Response
    {
        return $this->render('llascer/index.html.twig', [
            'controller_name' => 'LlascerController',
        ]);
    }

    // Page "Home" (page principale)
    #[Route('/llascer/home', name: 'app_home')]
    public function home(): Response
    {
        return $this->render('llascer/home.html.twig', [ 
            'title' => "Bienvenue", 
            'age' => 31 
        ]);
    }

    // Page "Loisirs"
    #[Route('/llascer/loisirs', name: 'app_loisirs')]
    public function loisirs(): Response
    {
        return $this->render('llascer/loisir.html.twig', [
            'title' => "Mes Loisirs"
        ]);
    }

    // Page "CV"
    #[Route('/llascer/cv', name: 'app_cv')]
    public function cv(): Response
    {
        return $this->render('llascer/cv.html.twig', [
            'title' => "Mon CV"
        ]);
    }

    // Page "E-Portfolio"
    #[Route('/llascer/portfolio', name: 'app_portfolio')]
    public function portfolio(): Response
    {
        return $this->render('llascer/portfolio.html.twig', [
            'title' => "Mon Portfolio"
        ]);
    }
    //Page "Experiences"
    #[Route('/llascer/experiences', name: 'app_experiences')]
public function experiences(): Response
{
    return $this->render('llascer/experiences.html.twig', [
        'title' => 'Mes Expériences'
    ]);
}

}
