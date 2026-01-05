<?php

namespace Core\Controller;


use Core\Validator\Validator;
use RuntimeException;

abstract class AbstractController
{
    /**
     * Validate data against rules.
     *
     * @param array $data
     * @param array $rules
     * @return bool
     */
    protected function validate(array $data, array $rules): bool
    {
        return (new Validator())->validate($data, $rules);
    }

    /**
     * Renders a view and returns its content as a string.
     *
     * @param string $path The path to the view relative to the template directory (e.g., 'home/index' ou 'home/index.php').
     * @param array $data The data to pass to the view.
     * @return string
     * @throws RuntimeException If the template file is not found.
     */
    protected function renderView(string $path, array $data = []): string
    {
        $templatePath = dirname(__DIR__, 2) . DIRECTORY_SEPARATOR . 'template' . DIRECTORY_SEPARATOR . ltrim($path, DIRECTORY_SEPARATOR);

        if (!str_ends_with($templatePath, '.php')) {
            $templatePath .= '.php';
        }

        if (!file_exists($templatePath)) {
            throw new RuntimeException("Template file not found: {$templatePath}");
        }

        extract($data);

        ob_start();
        require $templatePath;
        return ob_get_clean();
    }

    /**
     * Renders a view and outputs its content.
     *
     * @param string $path The path to the view relative to the template directory.
     * @param array $data The data to pass to the view.
     * @return void
     */
    protected function render(string $path, array $data = []): void
    {
        echo $this->renderView($path, $data);
    }
}