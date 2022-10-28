<?php

namespace App\Controller;

use App\Entity\Product;
use App\Entity\User;
use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class BasketController extends AbstractController
{
    #[Route('/basket/{id}', name: "app_basket")]
    public function index(ProductRepository $repository, Product $product, User $user): Response
    {
        return $this->render("basket.html.twig", [
            'product' => $product,
            'user' => $user,
        ]);
    }
}