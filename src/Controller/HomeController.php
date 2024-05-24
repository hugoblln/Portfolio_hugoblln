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
    public function index(Request $request, MailerInterface $mailer): Response
    {

        $contact = new Contact;

        $form = $this->createForm(ContactType::class, $contact);

        $form->handleRequest($request);

        try {
            if ($form->isSubmitted() && $form->isValid()) {

                // $this->em->persist($contact);
                // $this->em->flush();

                $data = $form->getData();

                $name = $contact->getName();
                $adress = $contact->getEmail();
                $phone = $contact->getNumber();
                $message = $contact->getMessage();

                $email = (new Email)
                    ->from($adress)
                    ->to('hugobellin@yahoo.com')
                    ->subject('Nouveau message de contact')
                    ->text("Nom: $name\nEmail: $adress\nTéléphone: $phone\nMessage: $message");

                $mailer->send($email);
                $this->addFlash('success', 'L\'email a bien été envoyé.');

                return $this->redirectToRoute('app.index');
            }
        } catch (TransportExceptionInterface $e) {
            $this->addFlash('error', 'Une erreur s\'est produite lors de l\'envoi de l\'email.');
        }



        return $this->render('Frontend/index.html.twig', [
            'form' => $form
        ]);
    }
}
