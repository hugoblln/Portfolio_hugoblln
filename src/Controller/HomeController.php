<?php 

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class HomeController extends AbstractController 
{
    #[Route('/','app.index', methods: ['GET','POST'])]
    public function index(Request $request) : Response 
    {

        $contact = new Contact;

        $form = $this->createForm(ContactType::class, $contact );

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            var_dump($data);
        }

        return $this->render('Frontend/index.html.twig', [
            'form' => $form
        ]);
    }
    
}