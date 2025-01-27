<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class TechnosController extends AbstractController
{
    #[Route('/technos', name: 'app.technos')]
    public function index(): Response
    {
        return $this->render('Frontend/technos.html.twig');
    }
}
