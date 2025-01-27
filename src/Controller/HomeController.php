<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use Symfony\Component\Mime\Email;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;

class HomeController extends AbstractController
{

    public function __construct(
        private EntityManagerInterface $em,
    ) {
    }

    #[Route('/', 'app.index', methods: ['GET', 'POST'])]
    public function index(): Response
    {
        return $this->render('Frontend/home.html.twig', [
        ]);
    }
}
