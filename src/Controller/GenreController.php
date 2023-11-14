<?php

namespace App\Controller;

use App\Entity\Produits;
use App\Repository\ProduitsRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GenreController extends AbstractController
{

    #[Route('/action', name: 'genre_action')]
    public function Action(ProduitsRepository $produitsRepository): Response
    {
        $actionProducts = $produitsRepository->findBy(['genre' => 'action']);

        return $this->render('genre/action.html.twig', [
            'products' => $actionProducts,
        ]);
    }

    #[Route('/aventure', name: 'genre_aventure')]
    public function Aventure(ProduitsRepository $produitsRepository): Response
    {
        $aventureProducts = $produitsRepository->findBy(['genre' => 'Aventure']);

        return $this->render('genre/aventure.html.twig', [
            'products' => $aventureProducts,
        ]);
    }

    #[Route('/Comedie', name: 'genre_comedie')]
    public function Comedie(ProduitsRepository $produitsRepository): Response
    {
        $comedieProducts = $produitsRepository->findBy(['genre' => 'Comédie']);

        return $this->render('genre/comedie.html.twig', [
            'products' => $comedieProducts,
        ]);
    }

    #[Route('/Drame', name: 'genre_drame')]
    public function Drame(ProduitsRepository $produitsRepository): Response
    {
        $drameProducts = $produitsRepository->findBy(['genre' => 'Drame']);

        return $this->render('genre/drame.html.twig', [
            'products' => $drameProducts,
        ]);
    }

    #[Route('/Fantasy', name: 'genre_fantasy')]
    public function Fantasy(ProduitsRepository $produitsRepository): Response
    {
        $fantasyProducts = $produitsRepository->findBy(['genre' => 'Fantasy']);

        return $this->render('genre/fantasy.html.twig', [
            'products' => $fantasyProducts,
        ]);
    }

    #[Route('/Science-Fiction', name: 'genre_Science-Fiction')]
    public function Science_Fiction(ProduitsRepository $produitsRepository): Response
    {
        $ScienceFictionProducts = $produitsRepository->findBy(['genre' => 'Science-Fiction']);

        return $this->render('genre/Science_Fiction.html.twig', [
            'products' => $ScienceFictionProducts,
        ]);
    }

    #[Route('/Horreur', name: 'genre_Horreur')]
    public function Horreur(ProduitsRepository $produitsRepository): Response
    {
        $HorreurProducts = $produitsRepository->findBy(['genre' => 'Horreur']);

        return $this->render('genre/Horreur.html.twig', [
            'products' => $HorreurProducts,
        ]);
    }

    #[Route('/TrancheDeVie', name: 'genre_TrancheDeVie')]
    public function TrancheDeVie(ProduitsRepository $produitsRepository): Response
    {
        $TrancheDeVieProducts = $produitsRepository->findBy(['genre' => 'Tranche De Vie']);

        return $this->render('genre/TrancheDeVie.html.twig', [
            'products' => $TrancheDeVieProducts,
        ]);
    }

    #[Route('/Romance', name: 'genre_Romance')]
    public function Romance(ProduitsRepository $produitsRepository): Response
    {
        $RomanceProducts = $produitsRepository->findBy(['genre' => 'Romance']);

        return $this->render('genre/Romance.html.twig', [
            'products' => $RomanceProducts,
        ]);
    }

    #[Route('/Mystere', name: 'genre_Mystere')]
    public function Mystere(ProduitsRepository $produitsRepository): Response
    {
        $MystereProducts = $produitsRepository->findBy(['genre' => 'Mystère']);

        return $this->render('genre/Mystere.html.twig', [
            'products' => $MystereProducts,
        ]);
    }

    #[Route('/Surnaturel', name: 'genre_Surnaturel')]
    public function Surnaturel(ProduitsRepository $produitsRepository): Response
    {
        $SurnaturelProducts = $produitsRepository->findBy(['genre' => 'Surnaturel']);

        return $this->render('genre/Surnaturel.html.twig', [
            'products' => $SurnaturelProducts,
        ]);
    }

    #[Route('/Psychologique', name: 'genre_Psychologique')]
    public function Psychologique(ProduitsRepository $produitsRepository): Response
    {
        $PsychologiqueProducts = $produitsRepository->findBy(['genre' => 'Psychologique']);

        return $this->render('genre/Psychologique.html.twig', [
            'products' => $PsychologiqueProducts,
        ]);
    }

    #[Route('/Sport', name: 'genre_Sport')]
    public function Sport(ProduitsRepository $produitsRepository): Response
    {
        $SportProducts = $produitsRepository->findBy(['genre' => 'Sport']);

        return $this->render('genre/Sport.html.twig', [
            'products' => $SportProducts,
        ]);
    }

    #[Route('/Ecole', name: 'genre_Ecole')]
    public function Ecole(ProduitsRepository $produitsRepository): Response
    {
        $EcoleProducts = $produitsRepository->findBy(['genre' => 'École']);

        return $this->render('genre/Ecole.html.twig', [
            'products' => $EcoleProducts,
        ]);
    }

    #[Route('/SuperPouvoirs', name: 'genre_SuperPouvoirs')]
    public function SuperPouvoirs(ProduitsRepository $produitsRepository): Response
    {
        $SuperPouvoirsProducts = $produitsRepository->findBy(['genre' => 'Super Pouvoirs']);

        return $this->render('genre/SuperPouvoirs.html.twig', [
            'products' => $SuperPouvoirsProducts,
        ]);
    }
}
