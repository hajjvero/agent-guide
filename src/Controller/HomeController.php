<?php

namespace App\Controller;

use Core\Controller\AbstractController;
use Core\Route\Attribute\Route;

class HomeController extends AbstractController
{
    #[Route(path: '/', name: 'home')]
    public function index(): void
    {
        $this->render('pages/home');
    }

    #[Route(path: '/shop', name: 'shop')]
    public function shop(): void
    {
        $this->render('pages/shop');
    }
}