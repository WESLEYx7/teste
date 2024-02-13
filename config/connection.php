<?php
require_once ('parameters.php');
// Set error reporting and display errors for development purposes
error_reporting(-1);
ini_set('display_errors', 1);

// Set the character set to match your database table(s)
$charset = 'utf8mb4';

// Set the database credentials
$dsn = "mysql:host=$host;dbname=$database;charset=$charset";
$username = "$user";
$password = "$pass";

// Create a new PDO instance with error mode set to exceptions
try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    echo "Conectado ao banco de dados com sucesso!";

    // Prepare a SQL statement using a placeholder for user input
    $stmt = $pdo->prepare("SELECT * FROM users WHERE name = :name");

    // Bind a value to the placeholder
    $stmt->bindValue(':name', 'John Doe');

    // Execute the prepared statement
    $stmt->execute();

    // Fetch the results
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Print the results
    print_r($results);

} catch(PDOException $e) {
    // Log the error for debugging purposes
    error_log("Falha na conexão: " . $e->getMessage());
    echo 'Falha na conexão!';
}