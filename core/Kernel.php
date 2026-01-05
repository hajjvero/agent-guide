<?php

declare(strict_types=1);

namespace Core;

use Core\Route\Router;

/**
 * Le Kernel est le cœur de l'application.
 * Il gère le cycle de vie d'une requête, de son arrivée à la réponse.
 */
class Kernel
{
    /**
     * @var Router
     */
    private Router $router;

    /**
     * @var string Chemin racine du projet.
     */
    private string $rootDir;

    public function __construct(string $rootDir)
    {
        $this->rootDir = rtrim($rootDir, DIRECTORY_SEPARATOR);
        $this->router = new Router();
    }

    /**
     * Initialise l'application et charge les routes.
     *
     * @return self
     */
    public function boot(): self
    {
        // Découverte automatique des contrôleurs dans src/Controller
        $controllerDir = $this->rootDir . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . 'Controller';

        if (is_dir($controllerDir)) {
            $this->router->loadFromDirectory($controllerDir);
        }

        return $this;
    }

    /**
     * Gère la requête entrante et renvoie une réponse.
     *
     * @return void
     */
    public function handle(): void
    {
        $this->router->run();
    }

    /**
     * Récupère l'instance du routeur.
     *
     * @return Router
     */
    public function getRouter(): Router
    {
        return $this->router;
    }
}
