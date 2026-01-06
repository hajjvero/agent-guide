<?php

namespace App\Controller\Admin;

use Core\Controller\AbstractController;
use Core\Route\Attribute\Route;

#[Route(path: '/dashboard', name: 'dashboard.')]
class DashboardController extends AbstractController
{
    #[Route(path: '/', name: 'index')]
    public function index(): void
    {
        $this->render('admin/index');
    }
}