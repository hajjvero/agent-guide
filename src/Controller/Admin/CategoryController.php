<?php

namespace App\Controller\Admin;

use App\Repository\CategoryRepository;
use Core\Controller\AbstractController;
use Core\Route\Attribute\Route;

#[Route(path: 'admin/category', name: 'category.')]
class CategoryController extends AbstractController
{
    public function __construct(private CategoryRepository $repo)
    {
    }

    #[Route(path: '/', name: 'index')]
    public function index(): void
    {
        $this->render('admin/category/index', [
            'categories' => $this->repo->findAllAsObjects()
        ]);
    }

    #[Route(path: '/create', name: 'create')]
    public function create(): void
    {
        $this->render('admin/category/create');
    }

    #[Route(path: '/store', name: 'store', methods: 'POST')]
    public function store(): void
    {
        $data = input();

        $rules = [
            'title_ar' => 'required',
            'title_fr' => 'required',
            'title_en' => 'required',
            'title_es' => 'required',
            'title_pt' => 'required',
            'description_ar' => 'required',
            'description_fr' => 'required',
            'description_en' => 'required',
            'description_es' => 'required',
            'description_pt' => 'required',
        ];

        if (!$this->validate($data, $rules)) {
            $this->render('admin/category/create', [
                'old' => $data,
            ]);
            return;
        }

        $category = $this->repo->mapToObject($data);
        $this->repo->save($category);

        redirect('/admin/category');
    }

    #[Route(path: '/{id}/edit', name: 'edit')]
    public function edit(int $id): void
    {
        $this->render('admin/category/edit', [
            'category' => $this->repo->findAsObject($id)
        ]);
    }

    #[Route(path: '/{id}/update', name: 'update', methods: 'POST')]
    public function update(int $id): void
    {
        $data = input();

        $rules = [
            'title_ar' => 'required',
            'title_fr' => 'required',
            'title_en' => 'required',
            'title_es' => 'required',
            'title_pt' => 'required',
            'description_ar' => 'required',
            'description_fr' => 'required',
            'description_en' => 'required',
            'description_es' => 'required',
            'description_pt' => 'required',
        ];

        if (!$this->validate($data, $rules)) {
            $this->render('admin/category/edit', [
                'old' => $data,
                'category' => $this->repo->findAsObject($id),
            ]);
            return;
        }

        $category = $this->repo->mapToObject($data);
        $category->setId($id);

        $this->repo->save($category);

        redirect('/admin/category');
    }

    #[Route(path: '/{id}/delete', name: 'delete', methods: 'POST')]
    public function delete(int $id): void
    {
        $this->repo->delete($id);
        redirect('/admin/category');
    }
}
