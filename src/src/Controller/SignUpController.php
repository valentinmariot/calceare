<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SignUpController extends AbstractController
{    
    #[Route('/sign-up', name: "app_signUp")]
    public function signUp()
    {
        return $this->render("signUp.html.twig", [

        ]);
    }
}
