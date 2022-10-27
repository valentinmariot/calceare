<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AboutController extends AbstractController
{
    #[Route('/about/', name: "app_about")]
    public function index()
    {
        return $this->render("about.html.twig");
    }

}