<?php 

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController 
{
    #[Route('/','app.index', methods: ['GET','POST'])]
    public function index() : Response 
    {
        return $this->render('Frontend/index.html.twig');
    }
    
}