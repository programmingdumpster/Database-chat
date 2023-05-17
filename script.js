function changeTheme(theme) {
  var body = document.body;
  var chatBox = document.getElementById('chat-box');
  var messageForm = document.getElementById('message-form');
  var nicknameElement = document.querySelector('.nickname');
  
  // Usuwanie obecnych klas tematów
  body.classList.remove('light-theme', 'amoled-theme', 'dark-theme');
  chatBox.classList.remove('light-theme', 'amoled-theme', 'dark-theme');
  messageForm.classList.remove('light-theme', 'amoled-theme', 'dark-theme');
  
  // Dodawanie klas dla wybranego tematu
  if (theme === 'light') {
    body.classList.add('light-theme');
    chatBox.classList.add('light-theme');
    messageForm.classList.add('light-theme');
    nicknameElement.classList.remove('light-text'); // Usunięcie klasy dla białego koloru tekstu
  } else if (theme === 'amoled') {
    body.classList.add('amoled-theme');
    chatBox.classList.add('amoled-theme');
    messageForm.classList.add('amoled-theme');
    nicknameElement.classList.add('light-text'); // Dodanie klasy dla białego koloru tekstu
  } else if (theme === 'dark') {
    body.classList.add('dark-theme');
    chatBox.classList.add('dark-theme');
    messageForm.classList.add('dark-theme');
    nicknameElement.classList.add('light-text'); // Dodanie klasy dla białego koloru tekstu
  }
}
