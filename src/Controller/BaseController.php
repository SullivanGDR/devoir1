<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class BaseController extends AbstractController
{
    #[Route('/index', name: 'index')]
    public function index(): Response
    {
        return $this->render('base/index.html.twig', [
        ]);
    }
    #[Route('/admin/station', name: 'station')]
    public function station(): Response
    {
        return $this->render('base/station.html.twig', [
        ]);
    }
}
