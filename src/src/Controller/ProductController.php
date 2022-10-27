<?php

namespace App\Controller;

use App\Entity\Product;
use App\Entity\Sales;
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
    public function index(Product $product): Response
    {
        $productSale = $product->getSales();
        $userSeller = $productSale->getUser();
        $getProductSeller = $productSale->getUser()->getSales()->toArray();
        $allProductSeller = \array_map(function ($sales) { return $sales->getProduct();}, $getProductSeller);

        return $this->render("product.html.twig", [
            'product' => $product,
            'sale' => $productSale,
            'user' => $userSeller,
            'otherProduct' => $allProductSeller
        ]);
    }

    #[Route('/user/{id}/add_product', name: "app_add_product_form", methods: ["POST"])]
    public function addProduct(EntityManagerInterface $entityManager, Request $request): Response
    {
        if (isset($_POST['addProduct'])) {
            if (isset($_FILES['image'])) {
                $img_name = $_FILES['image']['name'];
                $img_type = $_FILES['image']['type'];
                $tmp_name = $_FILES['image']['tmp_name'];
                $img_explode = explode('.', $img_name);
                $img_ext = end($img_explode);
                $extensions = ["jpeg", "png", "jpg"];
                if (in_array($img_ext, $extensions) === true) {
                    $types = ["image/jpeg", "image/jpg", "image/png"];
                    if (in_array($img_type, $types) === true) {
                        $time = time();
                        $new_img_name = $time . $img_name;
                        if (move_uploaded_file($tmp_name, "uploads/" . $new_img_name)) {
                            $product = (new Product())
                                ->setTitle($request->request->get("title"))
                                ->setIsSold('0')
                                ->setState($request->request->get("state"))
                                ->setBrand($request->request->get("brand"))
                                ->setDescription($request->request->get("description"))
                                ->setPrice($request->request->get("price"))
                                ->setImage($new_img_name)
                                ->setSize($request->request->get("size"))
                                ->setDate(new \DateTime());
                            $sale = (new Sales())
                                ->setIsReviewed("0")
                                ->setUser($this->getUser())
                                ->setProduct($product);

                            $entityManager->persist($product);
                            $entityManager->persist($sale);
                            $entityManager->flush();
                        }
                    }
                }
            }
        }

        return $this->redirectToRoute('app_index');
    }
}