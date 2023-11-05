<?php

namespace App\Controller;

use App\Entity\Produits;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ProductController extends AbstractController
{
    private $entityManager; // Déclarez une propriété privée pour stocker l'EntityManager

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager; // Injectez l'EntityManager dans le constructeur
    }
    public function search(Request $request): Response
    {
        $searchTerm = $request->query->get('q');

        if (empty($searchTerm)) {
            // Si le champ de recherche est vide, récupérez tous les produits
            $products = $this->entityManager->getRepository(Produits::class)->findAll();
        } else {
            // Si un terme de recherche est spécifié, effectuez une recherche partielle
            $products = $this->entityManager->getRepository(Produits::class)->createQueryBuilder('p')
                ->where('p.name LIKE :searchTerm')
                ->setParameter('searchTerm', '%'.$searchTerm.'%')
                ->getQuery()
                ->getResult();
        }

        return $this->render('product/search.html.twig', [
            'produits' => $products,
        ]);
    }
}
