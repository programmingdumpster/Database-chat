<?php
// Połączenie z bazą danych
include 'connect.php';

// Sprawdzenie, czy dane zostały przesłane metodą POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pobranie danych z formularza
    $sender = $_POST['sender'];
    $message = $_POST['message'];

    // Połączenie z bazą danych
    $conn = connectToDatabase();

    // Wstawienie wiadomości do bazy danych
    $sql = "INSERT INTO chat_messages (sender, message) VALUES ('$sender', '$message')";
    mysqli_query($conn, $sql);

    // Zamykanie połączenia z bazą danych
    mysqli_close($conn);
    header('Location: index.php');
}
?>
