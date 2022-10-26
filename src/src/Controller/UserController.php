<?php

namespace App\Controller;

use App\Entity\Product;
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
        $list = $repository->findAll();
        $filter3 = array_reverse($list);
        $filter3reverse = array_slice($filter3, 0, 3);

        $filter1 = array_reverse($list);
        $lastProductOfUser = array_slice($filter1, 0, 1);

        return $this->render("user.html.twig", [
            'products' => $filter3reverse,
            'productsUser' => $lastProductOfUser,
            'user' => $user
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