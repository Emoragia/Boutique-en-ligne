<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\ProfilType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/profil', name: 'app_')]
class ProfilController extends AbstractController
{
    #[Route('/modifier', name: 'profil_modifier', methods: ['GET','POST'])]
    public function modifierProfil(Request $request,
                                   EntityManagerInterface $entityManager,
                                   UserPasswordHasherInterface $hasher): Response
    {
        /** @var User $user */
        $user = $this->getUser();
        //Créer un autre utilisateur ou

        $profilForm = $this->createForm(ProfilType::class, $user);
        $profilForm->handleRequest($request);
        if($profilForm->isSubmitted() && $profilForm->isValid()){

            $motPasseClair = $profilForm['motPasseClair']->getData();
            //SI l'utilsateur.ice a saisi un nouveau de mot de passe, on le vérifie et on modifie l'attribut mot de passe s'il est valide.
            if(!is_null($motPasseClair) && !empty(trim($motPasseClair)))
            {
                $user->setMotPasse(
                    $hasher->hashPassword($user, $motPasseClair)
                );
            }
            if(!is_null($motPasseClair) && empty($motPasseClair)){
                $this->addFlash('warning', 'Le mot de passe ne peut être une chaîne vide !');
                return $this->redirectToRoute('app_profil_modifier');
            }

            $entityManager->persist($user);
            $entityManager->flush();

            $this->addFlash('success', 'Modifications enregistrées avec succès !');
            return $this->redirectToRoute('app_main');
        }
        $entityManager->refresh($user);
        return $this->render('profil/modifier.html.twig', [
            'profilForm'=>$profilForm->createView()
        ]);
    }


    #[Route('/MonProfil/details/{id}', name: 'profil', requirements: ['id'=>'\d+'], methods: "GET")]
    public function index(UserRepository $userRepository, int $id): Response
    {
        $profilConsulte = $userRepository->find($id);


        return $this->render('profil/index.html.twig', [
            'profilConsulte' => $profilConsulte
        ]);
    }
}
