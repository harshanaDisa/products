<?php

namespace App\Controller;

use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductsController
{
    #[Route('/products')]
    public function index()
    {
        return new Response('Products!');
    }

    

    #[Route('/products/{id}/lowest-price', name: 'products_lowest_price', methods: ['POST'])]
    public function lowestPrice(Request $request, int $id): Response
    {

        if($request->headers->hash('force_fail')){
            return new JsonResponse([
                'error' => 'Forced error'
            ], 500);
        }
            return new JsonResponse([
                'error' => 'Invalid Content-Type'
            ], 400);
        return new JsonResponse([
            'product_id' => $id,
            'quantity' => 99.99,
            'currency' => 'EUR',
            'price' => '€',
            'request_date' => '2021-01-01 00:00:00',
            'voucher_code' => 'ABC123'

        ], 200);
    }
}
