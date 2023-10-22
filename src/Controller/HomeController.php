<?php

namespace App\Controller;

use App\Repository\ProduitsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(ProduitsRepository $produitsRepository): Response
    {
        $product = $produitsRepository->findAll();
        return $this->render('home/index.html.twig', [
            'produits' => $product,
        ]);
    }
}
