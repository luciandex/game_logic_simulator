<?php declare(strict_types=1);

define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);


spl_autoload_register(function (string $className) {
    $className = str_replace("App\\", "src\\", $className);
    $className = str_replace("\\", DIRECTORY_SEPARATOR, $className);

    $classFile = ROOT_PATH . $className . ".php";
    if (file_exists($classFile) && is_readable($classFile)) {
        require_once $classFile;
    } else {
        error_log("Class $className not found in path: $classFile");
    }
});


if (!isset($_SESSION)) {
    session_start();
}
