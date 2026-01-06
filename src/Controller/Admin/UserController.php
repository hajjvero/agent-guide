<?php

namespace App\Controller\Admin;

// use App\Repository\UserRepository;
use Core\Controller\AbstractController;
use Core\Route\Attribute\Route;

#[Route(path: 'admin/user', name: 'user.')]
class UserController extends AbstractController
{
    public function __construct(
        private  $repo
    ) {
    }

    #[Route(path: '/', name: 'index')]
    public function index(): void
    {
        $this->render('admin/user/index', [
            'users' => $this->repo->findAllAsObjects()
        ]);
    }

    #[Route(path: '/create', name: 'create')]
    public function create(): void
    {
        $this->render('admin/user/create');
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
            'username' => 'required',
            'password' => 'required',
            'email' => 'required',
            'role' => 'required',
            'image' => 'required',
        ];

        if (!$this->validate($data, $rules)) {
            $this->render('admin/user/create', [
                'old' => $data,
            ]);
            return;
        }

        $user = $this->repo->mapToObject($data);



        $this->repo->save($user);

        redirect('/admin/user');
    }

    #[Route(path: '/{id}/edit', name: 'edit')]
    public function edit(int $id): void
    {
        $this->render('admin/user/edit', [
            'user' => $this->repo->findAsObject($id)
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
            'username' => 'required',
            'email' => 'required',
            'role' => 'required',
            'image' => 'required',
        ];

        if (!$this->validate($data, $rules)) {
            $this->render('admin/user/edit', [
                'old'  => $data,
                'user' => $this->repo->findAsObject($id),
            ]);
            return;
        }

        $user = $this->repo->mapToObject($data);
        $user->setId($id);

     
        $this->repo->save($user);

        redirect('/admin/user');
    }

    #[Route(path: '/{id}/delete', name: 'delete', methods: 'POST')]
    public function delete(int $id): void
    {
        $this->repo->delete($id);
        redirect('/admin/user');
    }
}
