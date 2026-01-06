<?php

namespace App\Controller\Admin;

use App\Repository\LogementRepository;
use App\Repository\VilleRepository;
use Core\Controller\AbstractController;
use Core\Route\Attribute\Route;

#[Route(path: 'admin/logement', name: 'logement.')]
class LogementController extends AbstractController
{
    public function __construct(
        private LogementRepository $repo,
        private VilleRepository $villeRepo
    ) {
    }

    #[Route(path: '/', name: 'index')]
    public function index(): void
    {
        $this->render('admin/logement/index', [
            'logements' => $this->repo->findAllAsObjects()
        ]);
    }

    #[Route(path: '/create', name: 'create')]
    public function create(): void
    {
        $this->render('admin/logement/create', [
            'villes' => $this->villeRepo->findAllAsObjects()
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
            'price_per_night' => 'required',
            'image' => 'required',
            'rating' => 'required',
            'whatsapp_number' => 'required',
            'type' => 'required',
            'ville_id' => 'required',
        ];

        if (!$this->validate($data, $rules)) {
            $this->render('admin/logement/create', [
                'old'    => $data,
                'villes' => $this->villeRepo->findAllAsObjects()
            ]);
            return;
        }

        $logement = $this->repo->mapToObject($data);
        $this->repo->save($logement);

        redirect('/admin/logement');
    }

    #[Route(path: '/{id}/edit', name: 'edit')]
    public function edit(int $id): void
    {
        $this->render('admin/logement/edit', [
            'logement' => $this->repo->findAsObject($id),
            'villes'   => $this->villeRepo->findAllAsObjects()
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
            'price_per_night' => 'required',
            'image' => 'required',
            'rating' => 'required',
            'whatsapp_number' => 'required',
            'type' => 'required',
            'ville_id' => 'required',
        ];

        if (!$this->validate($data, $rules)) {
            $this->render('admin/logement/edit', [
                'old'      => $data,
                'logement' => $this->repo->findAsObject($id),
                'villes'   => $this->villeRepo->findAllAsObjects()
            ]);
            return;
        }

        $logement = $this->repo->mapToObject($data);
        $logement->setId($id);

        $this->repo->save($logement);

        redirect('/admin/logement');
    }

    #[Route(path: '/{id}/delete', name: 'delete', methods: 'POST')]
    public function delete(int $id): void
    {
        $this->repo->delete($id);
        redirect('/admin/logement');
    }
}
