<?php

namespace App\Controller;

use App\Entity\Product;
use App\Entity\User;
use App\Form\UserType;
use App\Form\UserEditType;
use App\Repository\UserRepository;
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

        $salesOfUser = $user->getSales()->toArray();
        $productUser = \array_map(function ($sales) { return $sales->getProduct();}, $salesOfUser);
        $productUser = array_reverse($productUser);

        $oneProductOfUser = array_slice($productUser, 0, 1);

        if($user === $this->getUser()) {
            $canEdit = false;
        }

        return $this->render("user.html.twig", [
            'products' => $oneProductOfUser,
            'user' => $user,
            'canEdit' => $canEdit,
            'sales' => $salesOfUser,
            'productsUser' => $productUser,
        ]);
    }

    // #[Route('/user/{id}/edit_user', name: "app_edit_user_form", methods: ["GET", "POST"])]
    // public function editUser(UserRepository $repository, User $user, Request $request, EntityManagerInterface $manager): Response
    // {
    //     $user = $repository->find($user->getId());
    //     $form = $this->createForm(UserType::class, $user);

    //     return $this->render("edit_user.html.twig", [
    //         'form' => $form->createView(),
    //         'user' => $user
    //     ]);



    //     // if($form->isSubmitted() && $form->isValid()) {
    //     //     $manager->persist($user);
    //     //     $manager->flush();

    //     //     return $this->redirectToRoute("app_user", [
    //     //         'id' => $user->getId()
    //     //     ]);
    //     // }

    //     // $user = (new User())
    //     //     ->setUsername($request->request->get("name_user"))
    //     //     ->setPassword($request->request->get("password_user"))
    //     //     ->setEmail($request->request->get("mail_user"))
    //     //     ->setDescription($request->request->get("description_user"))
    //     //     ->setProfilePicture('https://images.unsplash.com/photo-1666644611406-b67537c5ead9?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1740&q=80');

    //     // // $entityManager->persist($user);

    //     // $id = $user;

    //     return $this->redirectToRoute("app_index");
    // }
    
    // public function editUser(EntityManagerInterface $entityManager, Request $request, User $user): Response
    // {
    //     dd(getParam('id', $request->request->get("id")));
    //     $user = (new User())
    //         ->setUsername($request->request->get("name_user"))
    //         ->setPassword($request->request->get("password_user"))
    //         ->setEmail($request->request->get("mail_user"))
    //         ->setDescription($request->request->get("description_user"))
    //         ->setProfilePicture('https://images.unsplash.com/photo-1666644611406-b67537c5ead9?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1740&q=80');


    //     $entityManager->persist($user);

    //     $id = $user;

    //     dd($id);
    //     return $this->redirectToRoute("app_user", [$id]);
    // }


    #[Route('/sign-up', name: "app_sign-up", methods: ["GET", "POST"])]
    public function new(Request $request, EntityManagerInterface $manager) : Response
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
          $user = $form->getData();
          $manager->persist($user);
          $manager->flush();
    
          return $this->redirectToRoute("app_login");
        }

        return $this->render("sign-up.html.twig", [
            'form' => $form->createView(),
            // dd($form),
        ]);
    }

    #[Route('/user/{id}/edit_user', name: "app_user-edit", methods: ["GET", "POST"])]
    public function edit(Request $request, EntityManagerInterface $manager, User $user) : Response
    {
        $canEdit = true;
        if($user === $this->getUser()) {
            $canEdit = false;
        }

        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()) {
          $user = $form->getData();
          $manager->persist($user);
          $manager->flush();
    
          return $this->redirectToRoute("app_user", [
              'id' => $user->getId()
          ]);
        }

        return $this->render("user-edit.html.twig", [
            'form' => $form->createView(),
            'user' => $user,
            'canEdit' => $canEdit
        ]);
    }
}