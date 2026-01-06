<?php

declare(strict_types=1);

namespace Core;

use Core\Connection\Connection;
use Core\Container\Container;
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
    private Container $container;
    private Connection $connection;

    /**
     * @var string Chemin racine du projet.
     */
    private string $rootDir;

    public function __construct(string $rootDir)
    {
        $this->rootDir = rtrim($rootDir, DIRECTORY_SEPARATOR);
        $this->container = new Container();
        $this->router = new Router($this->container);
        $this->connection = new Connection();

        $this->container->set(Container::class, $this->container);
        $this->container->set(__CLASS__, $this);
        $this->container->set(Connection::class, $this->connection);
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
}
