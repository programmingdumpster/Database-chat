<?php
// Połączenie z bazą danych
include 'connect.php';



    // Połączenie z bazą danych
    $conn = connectToDatabase();

// Pobieranie wiadomości z bazy danych
$sql = "SELECT * FROM chat_messages ORDER BY id ASC";
$result = mysqli_query($conn, $sql);

// Tworzenie tablicy na wiadomości
$messages = array();

// Dodawanie wiadomości do tablicy
while ($row = mysqli_fetch_assoc($result)) {
    $message = array(
        'sender' => $row['sender'],
        'message' => $row['message']
    );
    array_push($messages, $message);
}

// Zamykanie połączenia z bazą danych
mysqli_close($conn);

// Zwracanie wiadomości jako JSON
header('Content-Type: application/json');
echo json_encode(array('messages' => $messages));
?>
