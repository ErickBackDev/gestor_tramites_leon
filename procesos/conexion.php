<?php

require_once dirname(__DIR__) . '/vendor/autoload.php'; // Import autoload absolutely

// Load environment variables only in development
if (getenv('APP_ENV') === 'development') {
    $dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__)); // Load from root
    $dotenv->load();
}

// Connect to the database using environment variables
if (getenv('APP_ENV') === 'production') {
    // Connection in production
    $conectar = mysqli_connect(
        getenv('DB_HOST'),
        getenv('DB_USER'),
        getenv('DB_PASS'),
        getenv('DB_NAME')
    );
} else {
    // Connection in development
    $conectar = mysqli_connect(
        $_ENV['DB_HOST'],
        $_ENV['DB_USER'],
        $_ENV['DB_PASS'],
        $_ENV['DB_NAME']
    );
}

$conectar->set_charset('utf8mb4'); // Make the database recognize special characters

if (!$conectar) {
    die("No se Pudo Conectar con el Servidor: " . mysqli_connect_error());
}

?>