<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class LlascerController extends AbstractController{
    #[Route('/llascer', name: 'app_llascer')]
    public function index(): Response
    {
        return $this->render('llascer/index.html.twig', [
            'controller_name' => 'LlascerController',
        ]);
    }
}
