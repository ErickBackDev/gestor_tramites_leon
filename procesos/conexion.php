<?php

require_once dirname(__DIR__) . '/vendor/autoload.php'; // Importar autoload absolutamente

// Cargar las variables de entorno solo en desarrollo
if (getenv('APP_ENV') === 'development') {
    $dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__)); // Carga desde la raíz
    $dotenv->load();
}

// Conectar a la base de datos usando variables de entorno
if (getenv('APP_ENV') === 'production') {
    // Conexión en producción
    $conectar = mysqli_connect(
        getenv('DB_HOST'),
        getenv('DB_USER'),
        getenv('DB_PASS'),
        getenv('DB_NAME')
    );
} else {
    // Conexión en desarrollo
    $conectar = mysqli_connect(
        $_ENV['DB_HOST'],
        $_ENV['DB_USER'],
        $_ENV['DB_PASS'],
        $_ENV['DB_NAME']
    );
}

$conectar->set_charset('utf8mb4'); // Hacer que la base de datos reconozca caracteres especiales

if (!$conectar) {
    die("No se Pudo Conectar con el Servidor: " . mysqli_connect_error());
}

?>