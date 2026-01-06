<?php

namespace App\Controller\Admin;

use App\Repository\ActiviteRepository;
use App\Repository\VilleRepository;
use Core\Controller\AbstractController;
use Core\Route\Attribute\Route;

#[Route(path: 'admin/activite', name: 'activite.')]
class ActiviteController extends AbstractController
{
    public function __construct(
        private ActiviteRepository $repo,
        private VilleRepository $villeRepo
    ) {
    }

    #[Route(path: '/', name: 'index')]
    public function index(): void
    {
        $this->render('admin/activite/index', [
            'activites' => $this->repo->findAllAsObjects()
        ]);
    }

    #[Route(path: '/create', name: 'create')]
    public function create(): void
    {
        $this->render('admin/activite/create', [
            'villes' => $this->villeRepo->findAllAsObjects()
        ]);
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
            'image' => 'required',
            'price' => 'required',
            'duration' => 'required',
            'rating' => 'required',
            'ville_id' => 'required',
        ];

        if (!$this->validate($data, $rules)) {
            $this->render('admin/activite/create', [
                'old'    => $data,
                'villes' => $this->villeRepo->findAllAsObjects()
            ]);
            return;
        }

        $activite = $this->repo->mapToObject($data);
        $this->repo->save($activite);

        redirect('/admin/activite');
    }

    #[Route(path: '/{id}/edit', name: 'edit')]
    public function edit(int $id): void
    {
        $this->render('admin/activite/edit', [
            'activite' => $this->repo->findAsObject($id),
            'villes'   => $this->villeRepo->findAllAsObjects()
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
            'image' => 'required',
            'price' => 'required',
            'duration' => 'required',
            'rating' => 'required',
            'ville_id' => 'required',
        ];

        if (!$this->validate($data, $rules)) {
            $this->render('admin/activite/edit', [
                'old'      => $data,
                'activite' => $this->repo->findAsObject($id),
                'villes'   => $this->villeRepo->findAllAsObjects()
            ]);
            return;
        }

        $activite = $this->repo->mapToObject($data);
        $activite->setId($id);

        $this->repo->save($activite);

        redirect('/admin/activite');
    }

    #[Route(path: '/{id}/delete', name: 'delete', methods: 'POST')]
    public function delete(int $id): void
    {
        $this->repo->delete($id);
        redirect('/admin/activite');
    }
}
