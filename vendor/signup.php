<?php
 session_start();
 require_once 'connect.php';

 $full_name = $_POST['full_name'];
 $login = $_POST['login'];
 $email = $_POST['email'];
 $password = $_POST['password'];
 $password_confirm = $_POST['password_confirm'];

 if (mb_strlen($full_name) < 4 || mb_strlen($full_name) > 90) {
    $_SESSION['message'] = 'Недопустимая длина имени';
    header('Location: ../register.php');
    exit();
} elseif (mb_strlen($login) < 6 || mb_strlen($login) > 50) {
    $_SESSION['message'] = 'Недопустимая длина логина';
    header('Location: ../register.php');
    exit();
} elseif (mb_strlen($email) < 10 || mb_strlen($email) > 80) {
    $_SESSION['message'] = 'Недопустимая длина email';
    header('Location: ../register.php');
    exit();
} elseif (mb_strlen($password) < 2 || mb_strlen($password) > 6) {
    $_SESSION['message'] = 'Недопустимая длина пароля (от 2 до 6 символов)';
    header('Location: ../register.php');
    exit();

}




 if ($password === $password_confirm) {

     $path = 'uploads/' . time() . $_FILES['avatar']['name'];
     if (!move_uploaded_file($_FILES['avatar']['tmp_name'], '../' . $path)) {
         $_SESSION['message'] = 'Ошибка при загрузке сообщения';
         header('Location: ../register.php');
     }

     $password = md5($password);

     mysqli_query($connect, "INSERT INTO `users` (`id`, `full_name`, `login`, `email`, `password`, `avatar`) VALUES (NULL, '$full_name', '$login', '$email', '$password', '$path')");

     $_SESSION['message'] = 'Регистрация прошла успешно!';
     header('Location: ../index.php');


 } else {
     $_SESSION['message'] = 'Пароли не совпадают';
     header('Location: ../register.php');
 }

?>


