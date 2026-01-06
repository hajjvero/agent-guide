<?php

namespace App\Controller\Admin;

use Core\Controller\AbstractController;
use Core\Route\Attribute\Route;

#[Route(path: '/ville', name: 'ville.')]
class VilleController extends AbstractController
{
    #[Route(path: '/', name: 'index')]
    public function index(): void
    {
        $this->render('admin/ville/index');
    }

    #[Route(path: '/create', name: 'create')]
    public function create(): void
    {
        $this->render('admin/ville/create');
    }

    #[Route(path: '/store', name: 'store', methods: 'POST')]
    public function store(): void
    {
    }

    #[Route(path: '/{id}/edit', name: 'edit')]
    public function edit(int $id): void
    {
        $this->render('admin/ville/edit');
    }

    #[Route(path: '/{id}/update', name: 'update', methods: 'POST')]
    public function update(int $id): void
    {
    }

    #[Route(path: '/{id}/delete', name: 'delete', methods: 'POST')]
    public function delete(int $id): void
    {
    }
}
