<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AgencyController extends AbstractController
{
    #[Route('/agency', name: 'app_agency_form')]
    public function searchForm(UserRepository $userRepository): Response
    {
        $user = new User();
        $users = $userRepository->findAll();
        $form = $this->createForm(UserType::class, $user);
             
        return $this->renderForm('agency/index.html.twig', [
            'form' => $form,
            'users' => $users,
        ]);
   }
}
