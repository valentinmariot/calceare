<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
    #[Route('/contact/', name: "app_contact")]
    public function index()
    {
        return $this->render("contact.html.twig");
    }

}