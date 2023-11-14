<?php

namespace App\Controller;

use App\Repository\ProduitsRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(ProduitsRepository $produitsRepository, PaginatorInterface $paginator, Request $request,TranslatorInterface $translator): Response
    {
        $query = $produitsRepository->createQueryBuilder('e')
            ->getQuery();

        $pagination = $paginator->paginate(
            $query,
            $request->query->getInt('page', 1), // Get the page parameter from the request
            5 // Number of items per page
        );

        $request->setLocale('fr');

        $translatedLabel = $translator->trans('label_previous');

        $product = $produitsRepository->findAll();
        $user = $this->getUser();
        return $this->render('home/index.html.twig', [
            'produits' => $product,
            'user' => $user,
            'pagination' => $pagination,
        ]);
    }
}
