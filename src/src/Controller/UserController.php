<?php

namespace App\Controller;

use App\Entity\Product;
use App\Entity\Sales;
use App\Entity\User;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends AbstractController
{

    #[Route('/user/{id}', name: "app_user")]
    public function user(ProductRepository $repository, User $user): Response
    {
        $canEdit = true;

        $userSale = $user->getSales()->toArray();
        $productUser = \array_map(function ($sales) { return $sales->getProduct();}, $userSale);
        $productUser = array_reverse($productUser);
        $lastProductOfUser = array_slice($productUser, 0, 1);

        if($user === $this->getUser()) {
            $canEdit = false;
        }

        return $this->render("user.html.twig", [
            'products' => $lastProductOfUser,
            'user' => $user,
            'canEdit' => $canEdit,
            'sales' => $userSale,
            'productsUser' => $productUser,
        ]);
    }

    #[Route('/user/edit_user', name: "app_edit_user_form", methods: ["POST"])]
    public function editUser(EntityManagerInterface $entityManager, Request $request): Response
    {
        $user = (new User())
            ->setUsername($request->request->get("name_user"))
            ->setEmail($request->request->get("mail_user"))
            ->setDescription($request->request->get("description_user"));

        $entityManager->persist($user);
        $entityManager->flush();

        return $this->redirectToRoute('app_index');
    }
}