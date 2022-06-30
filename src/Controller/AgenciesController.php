<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AgenciesController extends AbstractController
{
    #[Route('/agencies', name: 'agencies')]
    public function index(): Response
    {
        return $this->render('agencies/index.html.twig', [
            'controller_name' => 'AgenciesController',
        ]);
    }
}
