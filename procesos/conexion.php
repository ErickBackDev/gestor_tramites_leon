<?php

	require_once dirname(__DIR__) . '/vendor/autoload.php'; // Import autolad absolutely
	$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
	$dotenv->load();

	// Connect to the database using environment variables
	$conectar = mysqli_connect(
		$_ENV['DB_HOST'],
		$_ENV['DB_USER'],
		$_ENV['DB_PASS'],
		$_ENV['DB_NAME']
	);

	$conectar->set_charset('utf8mb4'); // Make DB recognize special characters

	if(!$conectar){
		die("No se Pudo Conectar con el Servidor: " . mysqli_connect_error());
	}

?>