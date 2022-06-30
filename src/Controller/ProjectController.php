<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProjectController extends AbstractController
{
    // #[Route('/project', name: 'app_project')]
    // public function index(): Response
    // {
    //     return $this->render('project/index.html.twig', [
    //         'controller_name' => 'ProjectController',
    //     ]);
    // }

    #[Route('/project', name: 'app_project_form')]
    public function searchForm(UserRepository $userRepository): Response
    {
        $user = new User();
        $users = $userRepository->findAll();
        $form = $this->createForm(UserType::class, $user);
             
        return $this->renderForm('project/index.html.twig', [
            'form' => $form,
            'users' => $users,
        ]);

        
    }

   
}
