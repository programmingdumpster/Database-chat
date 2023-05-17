# Database-chat
chat based on MySQL and JS  all what u need to setup is database

The chat page uses a database to enable real-time communication, eliminating the need for technologies like WebSocket or Node.js. Messages are stored in the database, allowing users to access and exchange information without relying on continuous connections. This approach ensures efficient message handling and scalability. The chat interface is built using standard web technologies like HTML, CSS, and JavaScript, providing a responsive and interactive user experience without requiring additional server-side frameworks or technologies. It's important to note that the chat page is still a work in progress, with ongoing improvements planned for the visual design and user interface.



<?php
$servername = "yourservername";
$username = 'username';               <<<<<<           when  you fill in the required fields, paste it into connect.php.
$password = 'passwd';
$database = "db";
function connectToDatabase() {
    global $host, $username, $password, $dbname;

    // Nawiąż połączenie z bazą danych
    $conn = new mysqli($host, $username, $password, $dbname);

    // Sprawdź czy połączenie się udało
    if ($conn->connect_error) {
        die("Błąd połączenia z bazą danych: " . $conn->connect_error);
    }

    return $conn;
}


$conn = connectToDatabase();
?>
