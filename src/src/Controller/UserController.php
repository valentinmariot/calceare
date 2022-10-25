<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class UserController extends AbstractController
{
    #[Route('/user/', name: "app_user")]
    public function user(ProductRepository $repository)
    {
        return $this->render("user.html.twig", [
            'products' => $repository->findAll()
        ]);
    }
}