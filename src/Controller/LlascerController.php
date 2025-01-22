<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Dompdf\Dompdf;
use Dompdf\Options;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;

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

    // Page "Inscription"
    #[Route('/llascer/inscription', name: 'app_inscription')]
    public function inscription(): Response
    {
        return $this->render('llascer/inscription.html.twig', [
            'title' => "Formulaire d'inscription"
        ]);
    }

    // Générer le CV en PDF ou DOCX
    #[Route('/llascer/generate-cv', name: 'generate_cv', methods: ['POST'])]
    public function generateCv(Request $request): Response
    {
        
        $cvData = [
            'nom' => $request->request->get('nom'),
            'prenom' => $request->request->get('prenom'),
            'email' => $request->request->get('email'),
        ];

        $format = $request->request->get('format');

        if ($format === 'pdf') {
            
            $pdfOptions = new Options();
            $pdfOptions->set('defaultFont', 'Arial');
            $dompdf = new Dompdf($pdfOptions);

            
            $html = $this->renderView('cv/pdf_template.html.twig', $cvData);
            $dompdf->loadHtml($html);
            $dompdf->setPaper('A4', 'portrait');
            $dompdf->render();

            
            return new Response($dompdf->stream("cv.pdf", ["Attachment" => true]), 200, [
                'Content-Type' => 'application/pdf',
            ]);
        } elseif ($format === 'docx') {
            
            return new Response("DOCX export not implemented yet.", 200);
        }

        
        $this->addFlash('error', 'Format invalide.');
        return $this->redirectToRoute('app_inscription');
    }

}

