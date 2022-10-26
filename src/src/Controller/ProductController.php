<?php

namespace App\Controller;

use App\Entity\Product;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\File\UploadedFile;
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
//        /** @var UploadedFile $newFile */
        /*$newFile = $request->files->get('image');
        $destination = $this->getParameter('kernel.project_dir').'/public/uploads';
        $originalFileName = $newFile->getClientOriginalName();

        $baseFileName = pathinfo($originalFileName, PATHINFO_FILENAME);

        $fileName = Urlizer::urlize($baseFileName) . '-' . uniqid() . '-' . $newFile->guessExtension();

        $newFile->move($destination, $fileName);*/

        $imageEncoded = tempnam(sys_get_temp_dir(), $request->request->get("image"));

        $product = (new Product())
                ->setTitle($request->request->get("title"))
                ->setIsSold('0')
                ->setState($request->request->get("state"))
                ->setBrand($request->request->get("brand"))
                ->setDescription($request->request->get("description"))
                ->setPrice($request->request->get("price"))
                ->setImage($imageEncoded)
                ->setSize($request->request->get("size"))
                ->setDate(new \DateTime());

        $entityManager->persist($product);
        $entityManager->flush();

        return $this->redirectToRoute('app_index');
    }
}