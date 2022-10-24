<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    #[Route('/product/', name: "app_product")]
    public function index()
    {
        return $this->render("product.html.twig", [

        ]);
    }
}