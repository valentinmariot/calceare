<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IndexController extends AbstractController
{
    #[Route('/', name: "app_index")]
    public function index(ProductRepository $productRepository, UserRepository $userRepository)
    {
        $list = $productRepository->findAll();
        $filter6 = array_reverse($list);
        $filter6reverse = array_slice($filter6, 0, 6);

        return $this->render("index.html.twig", [
            'products' => $filter6reverse,
            'users' => $userRepository->findAll(),
        ]);
    }
}
