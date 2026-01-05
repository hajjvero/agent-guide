<?php

declare(strict_types=1);

namespace Core\Route;

use Core\Route\Attribute\Route;
use ReflectionClass;
use ReflectionMethod;
use RuntimeException;

/**
 * Système de routage simple basé sur les attributs.
 */
class Router
{
    /**
     * @var Route[] Liste des routes enregistrées.
     */
    private array $routes = [];

    /**
     * @var array Liste des paramètres extraits de la dernière route matchée.
     */
    private array $params = [];

    /**
     * Ajoute une route manuellement.
     *
     * @param Route $route
     * @return self
     */
    public function addRoute(Route $route): self
    {
        $this->routes[] = $route;
        return $this;
    }

    /**
     * Enregistre les routes à partir des attributs d'un contrôleur.
     *
     * @param string $controller class-string
     * @return void
     */
    public function registerController(string $controller): void
    {
        $reflection = new ReflectionClass($controller);

        // On récupère le préfixe de route sur la classe si présent
        $classAttributes = $reflection->getAttributes(Route::class);
        $prefix = '';
        if (!empty($classAttributes)) {
            /** @var Route $classRoute */
            $classRoute = $classAttributes[0]->newInstance();
            $prefix = $classRoute->getPath();
        }

        foreach ($reflection->getMethods(ReflectionMethod::IS_PUBLIC) as $method) {
            $attributes = $method->getAttributes(Route::class);
            foreach ($attributes as $attribute) {
                /** @var Route $route */
                $route = $attribute->newInstance();

                // On fusionne le préfixe et le path de la méthode
                $methodPath = $route->getPath();
                if ($prefix !== '/' && $prefix !== '') {
                    $fullPath = rtrim($prefix, '/') . '/' . ltrim($methodPath, '/');
                    $route->setPath($fullPath);
                }

                $route->setAction([$controller, $method->getName()]);
                $this->addRoute($route);
            }
        }
    }

    /**
     * Charge tous les contrôleurs d'un répertoire.
     *
     * @param string $directory Chemin vers le dossier des contrôleurs.
     * @return void
     */
    public function loadFromDirectory(string $directory): void
    {
        if (!is_dir($directory)) {
            return;
        }

        $files = discover_files($directory);
        foreach ($files as $file) {
            $className = fqcn($file);
            if ($className && class_exists($className)) {
                $this->registerController($className);
            }
        }
    }

    /**
     * Résout une URI et une méthode HTTP en une action.
     *
     * @param string $path   L'URI demandée (ex: /produits/5).
     * @param string $method La méthode HTTP (ex: GET).
     * @return array|null L'action [Controller, Method] ou null.
     */
    public function resolve(string $path, string $method): ?array
    {
        $path = '/' . trim($path, '/');
        $method = strtoupper($method);

        foreach ($this->routes as $route) {
            if (!in_array($method, $route->getMethods(), true)) {
                continue;
            }

            if (preg_match($route->getRegex(), $path, $matches)) {
                // On extrait les paramètres nommés
                $this->params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);
                return $route->getAction();
            }
        }

        return null;
    }

    /**
     * Retourne les paramètres extraits de l'URL.
     *
     * @return array
     */
    public function getParams(): array
    {
        return $this->params;
    }

    /**
     * Lance le routage basé sur les variables Superglobales.
     */
    public function run(): void
    {
        $uri = request_path();
        $method = request_method();

        $action = $this->resolve($uri, $method);

        if ($action === null) {
            abort(404, 'Route not found');
            return;
        }

        [$controllerName, $methodName] = $action;

        if (!class_exists($controllerName)) {
            throw new RuntimeException("Controller class $controllerName not found");
        }

        $controller = new $controllerName();

        // On pourrait passer les paramètres ici via reflection ou simplement les rendre dispo
        call_user_func_array([$controller, $methodName], $this->params);
    }
}
