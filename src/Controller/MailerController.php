<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Attribute\Route;

class MailerController extends AbstractController
{
    #[Route('/api/mailer', name: 'app_mailer', methods: ['POST'])]
    public function sendEmail(Request $request, MailerInterface $mailer): Response
    {
        // Vérifier si le contenu de la demande est vide
        if (empty($request->getContent())) {
            return new Response('Empty request content', Response::HTTP_BAD_REQUEST);
        }

        // Décoder les données JSON de la demande
        $requestData = json_decode($request->getContent(), true);

        // // Vérifier si les données JSON ont été correctement décodées
        if ($requestData === null) {
            return new Response('Invalid JSON data', Response::HTTP_BAD_REQUEST);
        }

        // // Vérifier si l'e-mail existe dans les données JSON
        if (!isset($requestData['email'])) {
            return new Response('Email not provided', Response::HTTP_BAD_REQUEST);
        }

        $emailToSend = $requestData['email'];

        $email = (new Email())
            ->from('next-u-@example.com')
            ->to($emailToSend)
            ->subject('Test Partage de document')
            ->text('Votre texte ici.');

        $mailer->send($email);

        return new Response('Email sent successfully', Response::HTTP_OK);
    }
}

// curl -X POST http://localhost:9090/api/mailer -H "Content-Type: application/json" -d '{"email": "testSymfony@hotmail.fr"}'
