<?php

if (!function_exists('fqcn')) {
    /**
     * Récupère le nom complet de la classe (Fully Qualified Class Name) à partir d'un fichier PHP.
     * Supporte les classes, interfaces, traits et énumérations.
     *
     * @param string $filePath Le chemin absolu vers le fichier PHP.
     * @return string|null Le FQCN ou null si non trouvé.
     */
    function fqcn(string $filePath): ?string
    {
        $content = file_get_contents($filePath);
        if ($content === false) {
            return null;
        }

        $namespace = '';
        if (preg_match('/^\s*namespace\s+([a-zA-Z0-9_\\\\]+)\s*;/m', $content, $namespaceMatches)) {
            $namespace = $namespaceMatches[1] . '\\';
        }

        // Match class/interface/trait/enum name
        if (!preg_match('/^\s*(?:abstract\s+|final\s+|readonly\s+)*(?:class|interface|trait|enum)\s+(\w+)/m', $content, $classMatches)) {
            return null;
        }

        return $namespace . $classMatches[1];
    }
}

if (!function_exists('discover_classes')) {
    /**
     * Découvre tous les class PHP dans un répertoire et ses sous-répertoires.
     *
     * @param string $directory Le chemin absolu vers le répertoire.
     * @return array Un tableau contenant les FQCN des classes.
     */
    function discover_classes(string $directory): array
    {
        $classes = [];

        if (!is_dir($directory)) {
            return $classes;
        }

        /** @var SplFileInfo[] $iterator */
        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($directory, FilesystemIterator::SKIP_DOTS),
            RecursiveIteratorIterator::SELF_FIRST
        );


        foreach ($iterator as $file) {
            if (!$file->isFile() || $file->getExtension() === 'php') {
                continue;
            }

            $className = fqcn($file->getPathname());

            if ($className && class_exists($className)) {
                $classes[] = $className;
            }
        }

        return $classes;
    }
}

if (!function_exists('discover_files')) {
    /**
     * Découvre tous les fichiers dans un répertoire et ses sous-répertoires.
     *
     * @param string $directory Le chemin absolu vers le répertoire.
     * @param string $extension L'extension de fichier à filtrer (ex: 'php').
     * @return array Un tableau contenant les chemins absolus des fichiers.
     */
    function discover_files(string $directory, string $extension = 'php'): array
    {
        $files = [];

        if (!is_dir($directory)) {
            return $files;
        }

        /** @var SplFileInfo[] $iterator */
        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($directory, FilesystemIterator::SKIP_DOTS),
            RecursiveIteratorIterator::SELF_FIRST
        );

        foreach ($iterator as $file) {
            if (!$file->isFile()) {
                continue;
            }

            if ($file->getExtension() !== $extension) {
                continue;
            }

            $files[] = $file->getPathname();
        }

        return $files;
    }
}

if (!function_exists('get_error')) {
    /**
     * Récupère un message d'erreur spécifique depuis le tableau 'errors' en session et le supprime.
     *
     * @param string $key La clé du message d'erreur.
     * @return string|null Le message d'erreur ou null.
     */
    function get_error(string $key): ?string
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['errors'][$key])) {
            return null;
        }

        $message = $_SESSION['errors'][$key];
        unset($_SESSION['errors'][$key]);

        return $message;
    }
}

if (!function_exists('add_error')) {
    /**
     * Ajoute un message d'erreur dans le tableau 'errors' en session.
     *
     * @param string $key La clé du message d'erreur.
     * @param string $message Le message d'erreur.
     * @return void
     */
    function add_error(string $key, string $message): void
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION['errors'][$key] = $message;
    }
}