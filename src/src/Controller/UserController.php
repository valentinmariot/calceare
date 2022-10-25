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
        $list = $repository->findAll();
        $filter3 = array_reverse($list);
        $filter3reverse = array_slice($filter3, 0, 3);

        return $this->render("user.html.twig", [
            'products' => $filter3reverse,
        ]);
    }
}