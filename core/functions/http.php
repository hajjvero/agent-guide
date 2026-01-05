<?php

if (!function_exists('redirect')) {
    /**
     * Redirige vers une URL donnée.
     *
     * @param string $url L'URL de destination.
     * @return void
     */
    function redirect(string $url): void
    {
        header("Location: $url");
        exit;
    }
}

if (!function_exists('back')) {
    /**
     * Redirige vers la page précédente.
     *
     * @return void
     */
    function back(): void
    {
        $referer = $_SERVER['HTTP_REFERER'] ?? '/';
        redirect($referer);
    }
}

if (!function_exists('json')) {
    /**
     * Envoie une réponse JSON.
     *
     * @param mixed $data Les données à envoyer.
     * @param int $status Le code de statut HTTP.
     * @return void
     */
    function json(mixed $data, int $status = 200): void
    {
        header('Content-Type: application/json');
        http_response_code($status);
        echo json_encode($data);
        exit;
    }
}

if (!function_exists('abort')) {
    /**
     * Interrompt la requête avec un code d'erreur HTTP.
     *
     * @param int $code Le code de statut HTTP.
     * @param string $message Un message d'erreur optionnel.
     * @return void
     */
    function abort(int $code, string $message = ''): void
    {
        http_response_code($code);
        if ($message) {
            echo $message;
        }
        exit;
    }
}

if (!function_exists('request_method')) {
    /**
     * Retourne la méthode de la requête HTTP.
     *
     * @return string
     */
    function request_method(): string
    {
        return strtoupper($_SERVER['REQUEST_METHOD'] ?? 'GET');
    }
}

if (!function_exists('request_path')) {
    /**
     * Retourne le chemin de la requête actuelle.
     *
     * @return string
     */
    function request_path(): string
    {
        $uri = $_SERVER['REQUEST_URI'] ?? '/';
        return parse_url($uri, PHP_URL_PATH) ?: '/';
    }
}

if (!function_exists('is_method')) {
    /**
     * Vérifie si la méthode de la requête correspond à celle donnée.
     *
     * @param string $method
     * @return bool
     */
    function is_method(string $method): bool
    {
        return request_method() === strtoupper($method);
    }
}

if (!function_exists('is_post')) {
    /**
     * Vérifie si la requête est de type POST.
     *
     * @return bool
     */
    function is_post(): bool
    {
        return is_method('POST');
    }
}

if (!function_exists('is_get')) {
    /**
     * Vérifie si la requête est de type GET.
     *
     * @return bool
     */
    function is_get(): bool
    {
        return is_method('GET');
    }
}

if (!function_exists('input')) {
    /**
     * Récupère une donnée d'entrée de la requête (GET, POST ou JSON).
     *
     * @param string|null $key La clé de la donnée.
     * @param mixed $default Valeur par défaut si la clé n'existe pas.
     * @return mixed
     */
    function input(?string $key = null, mixed $default = null): mixed
    {
        static $inputData = null;

        if ($inputData === null) {
            $inputData = array_merge($_GET, $_POST);

            $contentType = $_SERVER['CONTENT_TYPE'] ?? '';
            if (str_contains($contentType, 'application/json')) {
                $json = json_decode(file_get_contents('php://input'), true);
                if (is_array($json)) {
                    $inputData = array_merge($inputData, $json);
                }
            }
        }

        if ($key === null) {
            return $inputData;
        }

        return $inputData[$key] ?? $default;
    }
}
