<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    #[Route('/', name: "app_index")]
    public function index(ProductRepository $repository)
    {
        return $this->render("index.html.twig", [
            'products' => $repository->findAll()
        ]);
    }
}
