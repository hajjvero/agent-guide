<?php

namespace App\Controller\Admin;

use App\Repository\RestaurantRepository;
use App\Repository\VilleRepository;
use Core\Controller\AbstractController;
use Core\Route\Attribute\Route;

#[Route(path: 'admin/restaurant', name: 'restaurant.')]
class RestaurantController extends AbstractController
{
    public function __construct(
        private RestaurantRepository $repo,
        private VilleRepository $villeRepo
    ) {
    }

    #[Route(path: '/', name: 'index')]
    public function index(): void
    {
        $this->render('admin/restaurant/index', [
            'restaurants' => $this->repo->findAllAsObjects()
        ]);
    }

    #[Route(path: '/create', name: 'create')]
    public function create(): void
    {
        $this->render('admin/restaurant/create', [
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
            'cuisine_type' => 'required',
            'price_range' => 'required',
            'stock' => 'required',
            'image' => 'required',
            'ville_id' => 'required',
        ];

        if (!$this->validate($data, $rules)) {
            $this->render('admin/restaurant/create', [
                'old'    => $data,
                'villes' => $this->villeRepo->findAllAsObjects()
            ]);
            return;
        }

        $restaurant = $this->repo->mapToObject($data);
        $this->repo->save($restaurant);

        redirect('/admin/restaurant');
    }

    #[Route(path: '/{id}/edit', name: 'edit')]
    public function edit(int $id): void
    {
        $this->render('admin/restaurant/edit', [
            'restaurant' => $this->repo->findAsObject($id),
            'villes'     => $this->villeRepo->findAllAsObjects()
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
            'cuisine_type' => 'required',
            'price_range' => 'required',
            'stock' => 'required',
            'image' => 'required',
            'ville_id' => 'required',
        ];

        if (!$this->validate($data, $rules)) {
            $this->render('admin/restaurant/edit', [
                'old'       => $data,
                'restaurant'=> $this->repo->findAsObject($id),
                'villes'    => $this->villeRepo->findAllAsObjects()
            ]);
            return;
        }

        $restaurant = $this->repo->mapToObject($data);
        $restaurant->setId($id);

        $this->repo->save($restaurant);

        redirect('/admin/restaurant');
    }

    #[Route(path: '/{id}/delete', name: 'delete', methods: 'POST')]
    public function delete(int $id): void
    {
        $this->repo->delete($id);
        redirect('/admin/restaurant');
    }
}
