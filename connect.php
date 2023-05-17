<?php
// Parametry połączenia z bazą danych
$servername = "sql100.epizy.com";
$username = 'epiz_34224914';
$password = 'JhYxU1yHe4Mo';
$database = "epiz_34224914_chat";

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