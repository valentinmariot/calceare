<?php

namespace App\Controller;

use App\Entity\Message;
use App\Entity\User;
use App\Repository\MessageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\HttpFoundation\Request;
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

    #[Route('/message/add', name: 'message_add', priority: 2)]
    public function add(Request $request, MessageRepository $messages): Response
    {
        $this->denyAccessUnlessGranted(
            'IS_AUTHENTICATED_FULLY'
        );

        $message = new Message();
        $form = $this->createFormBuilder($message)
            ->add('messageDesc')
            ->add('submit', SubmitType::class, ['label' => 'submit'])
            ->getForm();


        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid())
        {
            $message = $form->getData();
            $message->setAuthor($this->getUser());
            $messages->save($message, true);

            // Add a flash

            // Redirect
         }

        return $this->renderForm('message/add.html.twig',
        [
            'form' => $form
        ]);
    }
}
