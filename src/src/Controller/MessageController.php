<?php

namespace App\Controller;

use App\Entity\Message;
use App\Repository\MessageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MessageController extends AbstractController
{
    #[Route('/message', name: 'app_message')]
    public function index(MessageRepository $repository): Response
    {
        return $this->render('message/index.html.twig', [
            'messages' => $repository->findAll(),
        ]);
    }

    #[Route('/message/{id}', name: 'message_show')]
    public function showOne(Message $message): Response {
        return $this->render('message/show.html.twig', [
            'message' => $message,
        ]);
    }
}
