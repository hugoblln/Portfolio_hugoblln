<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class ExperiencesController extends AbstractController
{
    #[Route('/experiences', name: 'app.experiences')]
    public function index(): Response
    {
        return $this->render('Frontend/experiences.html.twig');
    }
}
