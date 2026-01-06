<?php

namespace App\Controller\Admin;

use App\Repository\ChauffeurRepository;
use App\Repository\VilleRepository;
use Core\Controller\AbstractController;
use Core\Route\Attribute\Route;

#[Route(path: 'admin/chauffeur', name: 'chauffeur.')]
class ChauffeurController extends AbstractController
{
    public function __construct(
        private ChauffeurRepository $repo,
        private VilleRepository $villeRepo
    ) {
    }

    #[Route(path: '/', name: 'index')]
    public function index(): void
    {
        $this->render('admin/chauffeur/index', [
            'chauffeurs' => $this->repo->findAllAsObjects()
        ]);
    }

    #[Route(path: '/create', name: 'create')]
    public function create(): void
    {
        $this->render('admin/chauffeur/create', [
            'villes' => $this->villeRepo->findAllAsObjects()
        ]);
    }

    #[Route(path: '/store', name: 'store', methods: 'POST')]
    public function store(): void
    {
        $data = input();

        $rules = [
            'full_name_ar' => 'required',
            'full_name_fr' => 'required',
            'full_name_en' => 'required',
            'full_name_es' => 'required',
            'full_name_pt' => 'required',
            'whatsapp_number' => 'required',
            'languages' => 'required',
            'vehicle_type' => 'required',
            'price_per_day' => 'required',
            'rating' => 'required',
            'image' => 'required',
            'ville_id' => 'required',
        ];

        if (!$this->validate($data, $rules)) {
            $this->render('admin/chauffeur/create', [
                'old'    => $data,
                'villes' => $this->villeRepo->findAllAsObjects()
            ]);
            return;
        }

        $chauffeur = $this->repo->mapToObject($data);
        $this->repo->save($chauffeur);

        redirect('/admin/chauffeur');
    }

    #[Route(path: '/{id}/edit', name: 'edit')]
    public function edit(int $id): void
    {
        $this->render('admin/chauffeur/edit', [
            'chauffeur' => $this->repo->findAsObject($id),
            'villes'    => $this->villeRepo->findAllAsObjects()
        ]);
    }

    #[Route(path: '/{id}/update', name: 'update', methods: 'POST')]
    public function update(int $id): void
    {
        $data = input();

        $rules = [
            'full_name_ar' => 'required',
            'full_name_fr' => 'required',
            'full_name_en' => 'required',
            'full_name_es' => 'required',
            'full_name_pt' => 'required',
            'whatsapp_number' => 'required',
            'languages' => 'required',
            'vehicle_type' => 'required',
            'price_per_day' => 'required',
            'rating' => 'required',
            'image' => 'required',
            'ville_id' => 'required',
        ];

        if (!$this->validate($data, $rules)) {
            $this->render('admin/chauffeur/edit', [
                'old'       => $data,
                'chauffeur' => $this->repo->findAsObject($id),
                'villes'    => $this->villeRepo->findAllAsObjects()
            ]);
            return;
        }

        $chauffeur = $this->repo->mapToObject($data);
        $chauffeur->setId($id);

        $this->repo->save($chauffeur);

        redirect('/admin/chauffeur');
    }

    #[Route(path: '/{id}/delete', name: 'delete', methods: 'POST')]
    public function delete(int $id): void
    {
        $this->repo->delete($id);
        redirect('/admin/chauffeur');
    }
}
