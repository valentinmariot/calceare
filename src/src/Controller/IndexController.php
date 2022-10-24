<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    #[Route('/', name: "app_index")]
    public function index()
    {
        return $this->render("index.html.twig", [

        ]);
    }

    #[Route('/shop', name: "app_shop")]
    public function shop()
    {
        return $this->render("shop.html.twig", [

        ]);
    }
}
