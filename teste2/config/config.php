
<?php
// config/config.php

// Autoload para models e controllers
spl_autoload_register(function($class) {
    $paths = ['app/models/', 'app/controllers/'];
    foreach ($paths as $path) {
        $file = __DIR__ . '/../' . $path . strtolower($class) . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

// Sessão global
if (!isset($_SESSION)) {
    session_start();
}

// Definir BASE_URL para links e assets
define('BASE_URL', '/teste/public/');