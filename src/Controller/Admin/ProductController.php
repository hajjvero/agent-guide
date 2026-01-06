<?php

namespace App\Controller\Admin;

use App\Repository\ProductRepository;
use App\Repository\CategoryRepository;
use Core\Controller\AbstractController;
use Core\Route\Attribute\Route;

#[Route(path: 'admin/product', name: 'product.')]
class ProductController extends AbstractController
{
    public function __construct(
        private ProductRepository $repo,
        private CategoryRepository $categoryRepo
    ) {
    }

    #[Route(path: '/', name: 'index')]
    public function index(): void
    {
        $this->render('admin/product/index', [
            'products' => $this->repo->findAllAsObjects()
        ]);
    }

    #[Route(path: '/create', name: 'create')]
    public function create(): void
    {
        $this->render('admin/product/create', [
            'categories' => $this->categoryRepo->findAllAsObjects()
        ]);
    }

    #[Route(path: '/store', name: 'store', methods: 'POST')]
    public function store(): void
    {
        $data = input();

        $rules = [
            'name_ar' => 'required',
            'name_fr' => 'required',
            'name_en' => 'required',
            'name_es' => 'required',
            'name_pt' => 'required',
            'description_ar' => 'required',
            'description_fr' => 'required',
            'description_en' => 'required',
            'description_es' => 'required',
            'description_pt' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'image' => 'required',
            'category_id' => 'required',
        ];

        if (!$this->validate($data, $rules)) {
            $this->render('admin/product/create', [
                'old'        => $data,
                'categories' => $this->categoryRepo->findAllAsObjects()
            ]);
            return;
        }

        $product = $this->repo->mapToObject($data);
        $this->repo->save($product);

        redirect('/admin/product');
    }

    #[Route(path: '/{id}/edit', name: 'edit')]
    public function edit(int $id): void
    {
        $this->render('admin/product/edit', [
            'product'    => $this->repo->findAsObject($id),
            'categories' => $this->categoryRepo->findAllAsObjects()
        ]);
    }

    #[Route(path: '/{id}/update', name: 'update', methods: 'POST')]
    public function update(int $id): void
    {
        $data = input();

        $rules = [
            'name_ar' => 'required',
            'name_fr' => 'required',
            'name_en' => 'required',
            'name_es' => 'required',
            'name_pt' => 'required',
            'description_ar' => 'required',
            'description_fr' => 'required',
            'description_en' => 'required',
            'description_es' => 'required',
            'description_pt' => 'required',
            'price' => 'required',
            'stock' => 'required',
            'image' => 'required',
            'category_id' => 'required',
        ];

        if (!$this->validate($data, $rules)) {
            $this->render('admin/product/edit', [
                'old'        => $data,
                'product'    => $this->repo->findAsObject($id),
                'categories' => $this->categoryRepo->findAllAsObjects()
            ]);
            return;
        }

        $product = $this->repo->mapToObject($data);
        $product->setId($id);

        $this->repo->save($product);

        redirect('/admin/product');
    }

    #[Route(path: '/{id}/delete', name: 'delete', methods: 'POST')]
    public function delete(int $id): void
    {
        $this->repo->delete($id);
        redirect('/admin/product');
    }
}
