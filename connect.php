<?php
// Parametry połączenia z bazą danych
$servername = "YOURSERVERNAME";
$username = 'USERNAME';
$password = 'PASSWORD';
$database = "DB";

// Funkcja łącząca z bazą danych
function connectToDatabase() {
    global $servername, $username, $password, $database;

    // Nawiąż połączenie z bazą danych
    $conn = new mysqli($servername, $username, $password, $database);

    // Sprawdź czy połączenie się udało
    if ($conn->connect_error) {
        die("Błąd połączenia z bazą danych: " . $conn->connect_error);
    }

    return $conn;
}

// Wywołanie funkcji łączącej (opcjonalne)
//$conn = connectToDatabase();
?>
