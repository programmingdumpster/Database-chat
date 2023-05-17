<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link rel="stylesheet" href="style.css">
    <style>

body.light-theme {
            background-color: #f2f2f2;
        }

        body.amoled-theme {
            background-color: #000000;
        }

        body.dark-theme {
            background-color: #333333;
        }

        .light-theme #chat-box {
            background-color: #ffffff;
        }

        .amoled-theme #chat-box {
            background-color: #111111;
        }

        .dark-theme #chat-box {
            background-color: #222222;
        }

        .light-theme #message-form {
            background-color: #ffffff;
        }

        .amoled-theme #message-form {
            background-color: #111111;
        }

        .dark-theme #message-form {
            background-color: #222222;
        }
    </style>
</head>
<body>
    <div id="container">
        <h1>Chat</h1>
        <div id="theme-buttons">
            <button class="theme-button" onclick="changeTheme('light')">Jasny</button>
            <button class="theme-button" onclick="changeTheme('amoled')">AMOLED</button>
            <button class="theme-button" onclick="changeTheme('dark')">Ciemny</button>
        </div>
        <?php
        session_start();

        // Sprawdzenie, czy nick jest już ustawiony
        if (isset($_SESSION['nickname'])) {
            $nickname = $_SESSION['nickname'];

            // Wyświetlenie nicku
            echo '<p>Nickname: ' . $nickname . '</p>';

            // Wyświetlenie formularza wiadomości
            echo '
            <form id="message-form" action="send_message.php" method="post" class="theme light-theme message-form" >
                <input type="hidden" name="sender" value="' . $nickname . '">
                <input type="text" name="message" placeholder="Type your message" required style="max-width: 97%;">
                <input type="submit" value="Send">
            </form>';
        } else {
            // Nick nie jest ustawiony, wyświetl formularz ustawiania nicku
            echo '
            <form id="nickname-form" action="" method="post">
                <input type="text" name="nickname" placeholder="Enter your nickname" required style="max-width: 97%;">
                <input type="submit" value="Set Nickname">
            </form>';

            // Sprawdzenie, czy formularz został przesłany
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Pobranie nicku z formularza
                $nickname = $_POST['nickname'];

                // Ustawienie nicku w sesji
                $_SESSION['nickname'] = $nickname;

                // Przekierowanie do bieżącej strony (aby odświeżyć widok)
                header("Location: " . $_SERVER['PHP_SELF']);
                exit();
            }
        }
        ?>

        <div id="chat-box" class="theme light-theme chat-box">
            <!-- Messages will be displayed here -->
        </div>
    </div>
    <div id="footer">
        &copy; 2023 Leksiu App. All rights reserved.
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        // Function to get messages from the server
        function getMessages() {
            $.ajax({
                url: 'get_messages.php',
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    var messages = response.messages;
                    var chatBox = $('#chat-box');

                    // Clear existing messages
                    chatBox.empty();

                    // Append new messages
                    $.each(messages, function(index, message) {
                        var sender = message.sender;
                        var content = message.message;
                        var messageHTML = '<div class="message"><strong>' + sender + ':</strong> ' + content + '</div>';
                        chatBox.append(messageHTML);
                    });

                    // Scroll to the bottom of the chat box
                    chatBox.scrollTop(chatBox[0].scrollHeight);
                }
            });
        }

        // Function to periodically refresh the chat messages
        function refreshChat() {
            getMessages();
            setTimeout(refreshChat, 3000); // Refresh every 3 seconds
        }

        // Call the refreshChat function to start retrieving messages
        refreshChat();
    </script>
    <script src="script.js"></script>
</body>

</html>