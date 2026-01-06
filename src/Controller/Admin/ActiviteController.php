<?php

namespace App\Controller\Admin;

use Core\Controller\AbstractController;
use Core\Route\Attribute\Route;

#[Route(path: '/activite', name: 'activite.')]
class ActiviteController extends AbstractController
{
    #[Route(path: '/', name: 'index')]
    public function index(): void
    {
        $this->render('admin/activite/index');
    }

    #[Route(path: '/create', name: 'index')]
    public function create(): void
    {
        $this->render('admin/activite/create');
    }
    #[Route(path: '/store', name: 'index', methods: "POST")]
    public function store(): void
    {
        // $this->render('admin/activite');
    }

    #[Route(path: '/{id}/edit', name: 'index', methods: "GET")]
    public function edit(int $id): void
    {
        $this->render('admin/activite/edit');
    }
    #[Route(path: '/{id}/update', name: 'index', methods: "POST")]
    public function update(int $id): void
    {
        // $this->render('admin/activite');
    }

    #[Route(path: '/{id}/delete', name: 'index', methods: "POST")]
    public function delete(int $id): void
    {
        // $this->render('admin/activite');
    }
}
