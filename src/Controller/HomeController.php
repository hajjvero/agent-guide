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

    #[Route(path: '/logment', name: 'logment')]
    public function logment(): void
    {
        $this->render('pages/logment');
    }

    #[Route(path: '/restaurants', name: 'restaurants')]
    public function restaurants(): void
    {
        $this->render('pages/restaurants');
    }

    #[Route(path: '/transport', name: 'transport')]
    public function transport(): void
    {
        $this->render('pages/chauffeur');
    }

    #[Route(path: '/events', name: 'events')]
    public function events(): void
    {
        $this->render('pages/events');
    }
}