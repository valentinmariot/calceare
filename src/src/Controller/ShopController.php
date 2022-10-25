<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ShopController extends AbstractController
{    
    #[Route('/shop/', name: "app_shop")]
    public function index(ProductRepository $repository)
    {
        return $this->render("shop.html.twig", [
            'products' => $repository->findAll()
        ]);
    }
}
