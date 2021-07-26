<?php
session_start();
if (!$_SESSION['user']) {
    header('Location: /');
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Авторизация и регистрация</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <!-- Профиль -->


        <img class="avatar" src="<?= $_SESSION['user']['avatar'] ?>" width="200"  alt="avatar">
        <a  href="#"><?= $_SESSION['user']['email'] ?></a>
        <a class="out" href="vendor/logout.php" class="logout">Выход</a>
    

</body>
</html>