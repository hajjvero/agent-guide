<?php

declare(strict_types=1);

// Load Composer's autoloader
require_once dirname(__DIR__) . '/vendor/autoload.php';

use Core\Kernel;

// Initialize the Kernel
$kernel = new Kernel(dirname(__DIR__));

// Boot the application and handle the request
$kernel->boot()->handle();

