<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends AbstractController
{
    #[Route('/product/{id}', name: "app_product")]
    public function index(ProductRepository $repository , Product $product): Response
    {
        return $this->render("product.html.twig", [
            'product' => $product,
            'products' => $repository->findAll()
        ]);
    }

    #[Route('/user/add_product', name: "app_add_product_form", methods: ["POST"])]
    public function addProduct(EntityManagerInterface $entityManager, Request $request): Response
    {
            $product = (new Product())
                ->setTitle($request->request->get("title"))
                ->setIsSold('0')
                ->setState($request->request->get("state"))
                ->setBrand($request->request->get("brand"))
                ->setDescription($request->request->get("description"))
                /*->setImage($request->request->get(base64_encode("image")))*/
                ->setImage($request->request->get("image"))
                ->setPrice($request->request->get("price"))
                ->setSize($request->request->get("size"))
                ->setDate(new \DateTime());

        $entityManager->persist($product);
        $entityManager->flush();

        return $this->redirectToRoute('app_index');
    }
}