<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\Criteria;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ShopController extends AbstractController
{    
    #[Route('/shop/', name: "app_shop")]
    public function index(ProductRepository $repository)
    {
        return $this->render("shop.html.twig", [
            'products' => $repository->findAll()
        ]);
    }

    #[Route('/shop/search/', name: "app_shop_search", methods: ["POST"])]
    public function searchProduct(ProductRepository $repository, Request $request): Response
    {
        $criteria = Criteria::create();

        if ($request->request->get('selectBrand') !== 'ALL') {
            $criteria->andWhere(Criteria::expr()->eq('brand', $request->request->get('selectBrand')));
        }

        if ($request->request->get('selectCondition') !== 'ALL') {
            $criteria->andWhere(Criteria::expr()->eq('state', $request->request->get('selectCondition')));
        }

        if ($request->request->get('selectMinSize') !== '') {
            $criteria->andWhere(Criteria::expr()->gte('size', $request->request->get('selectMinSize')));
        }

        if ($request->request->get('selectMaxSize') !== '') {
            $criteria->andWhere(Criteria::expr()->lte('size', $request->request->get('selectMaxSize')));
        }

        if ($request->request->get('selectMinPrice') !== '') {
            $criteria->andWhere(Criteria::expr()->gte('price', $request->request->get('selectMinPrice')));
        }

        if ($request->request->get('selectMaxPrice') !== '') {
            $criteria->andWhere(Criteria::expr()->lte('price', $request->request->get('selectMaxPrice')));
        }

        return $this->render("shop.html.twig", [
            'products' => $repository->matching($criteria)
        ]);
    }

    #[Route('/shop/search-specific/', name: "app_shop_search_specific", methods: ["POST"])]
    public function searchSpecificProduct(ProductRepository $repository, Request $request): Response
    {
        $criteria = Criteria::create();

        if ($request->request->get('searchInput') !== '') {
            $criteria->orWhere(Criteria::expr()->contains('title', $request->request->get('searchInput')));
            $criteria->orWhere(Criteria::expr()->contains('description', $request->request->get('searchInput')));
        }

        return $this->render("shop.html.twig", [
            'products' => $repository->matching($criteria)
        ]);
    }
}
