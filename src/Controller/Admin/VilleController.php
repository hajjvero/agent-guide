<?php

namespace App\Controller\Admin;

use App\Repository\VilleRepository;
use Core\Controller\AbstractController;
use Core\Route\Attribute\Route;

#[Route(path: 'admin/ville', name: 'ville.')]
class VilleController extends AbstractController
{
    public function __construct(private VilleRepository $repo)
    {
    }

    #[Route(path: '/', name: 'index')]
    public function index(): void
    {
        $this->render('admin/ville/index', [
            'villes' => $this->repo->findAllAsObjects()
        ]);
    }

    #[Route(path: '/create', name: 'create')]
    public function create(): void
    {
        $this->render('admin/ville/create');
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
            'image' => 'required',

        ];
        if (!$this->validate($data, $rules)) {
            $this->render('admin/ville/create', [
                'old' => $data,
            ]);
        }

        $ville = $this->repo->mapToObject($data);
        $this->repo->save($ville);
        redirect('/admin/ville');
    }

    #[Route(path: '/{id}/edit', name: 'edit')]
    public function edit(int $id): void
    {
        $this->render('admin/ville/edit', [
            'ville' => $this->repo->findAsObject($id)
        ]);
    }

    #[Route(path: '/{id}/update', name: 'update', methods: 'POST')]
    public function update(int $id): void {
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
            'image' => 'required',

        ];
        if (!$this->validate($data, $rules)) {
            $this->render('admin/ville/create', [
                'old' => $data,
            ]);
        }
        
        $ville = $this->repo->mapToObject($data);
        $ville->setId($id);
        $this->repo->save($ville);
    }

    #[Route(path: '/{id}/delete', name: 'delete', methods: 'POST')]
    public function delete(int $id): void {
        $this->repo->delete($id);
        redirect('/admin/ville');
    }
}
