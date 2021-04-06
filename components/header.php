<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
</head>

<body>
    <ul class="nav justify-content-center bg-dark p-2">
        <li class="nav-item">
            <a class="nav-link text-light" aria-current="page" href="/main.php">Главная</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-light" aria-current="page" href="/equipment.php">Оборудование</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-light" href="/staff.php">Сотрудники</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-light" href="/spisok.php">Список</a>
        </li>
        <li class="nav-item">
            <a class="nav-link text-light" href="/logout.php">Выход</a>
        </li>
    </ul>