document.getElementById('contact-form').addEventListener('submit', function(event) {
    event.preventDefault();
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var message = document.getElementById('message').value;
    // Здесь можно добавить валидацию данных перед отправкой на сервер
    // ...
    // Отправка данных на сервер с помощью AJAX или другими методами
});