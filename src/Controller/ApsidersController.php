<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApsidersController extends AbstractController
{
    #[Route('/apsiders', name: 'apsiders')]
    public function index(): Response
    {
        return $this->render('apsiders/index.html.twig', [
            'controller_name' => 'ApsidersController',
        ]);
    }
}
