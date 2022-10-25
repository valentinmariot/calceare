<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ShopController extends AbstractController
{    
    #[Route('/shop', name: "app_shop")]
    public function shop()
    {
        return $this->render("shop.html.twig", [

        ]);
    }
}
