<?php
// Подключаемся к базе данных
include("db_connect.php");

// Проверяем, была ли отправлена форма
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Получаем значения из формы
  $email = $_POST["email"];
  $nickname = $_POST["nickname"];
  $password = $_POST["password"];
  $confirm_password = $_POST["confirm-password"];

  // Проверяем, что все поля заполнены
  if (!empty($email) && !empty($nickname) && !empty($password) && !empty($confirm_password)) {
    // Проверяем, что пароль и подтверждение пароля совпадают
    if ($password == $confirm_password) {
      // Хешируем пароль
      $hashed_password = password_hash($password, PASSWORD_DEFAULT);

      // Добавляем новую запись в базу данных
      $query = "INSERT INTO users (email, nickname, password) VALUES ('$email', '$nickname', '$hashed_password')";
      if (mysqli_query($db, $query)) {
        // Если запись успешно добавлена, перенаправляем пользователя на страницу авторизации
        header("Location: pages/autorisation.html");
        exit();
      } else {
        // Если произошла ошибка, выводим сообщение об ошибке
        echo "Ошибка: " . mysqli_error($db);
      }
    } else {
      echo "Пароль и подтверждение пароля не совпадают";
    }
  } else {
    echo "Все поля должны быть заполнены";
  }
}

// Закрываем соединение с базой данных
mysqli_close($db);
?>
