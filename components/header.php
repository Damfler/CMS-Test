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
<nav class="navbar navbar-expand-lg navbar-light bg-dark">
    <div class="container-fluid">
                <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
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

                </ul>
            <ul class="navbar-nav">
                <? if ($_SESSION['users']): ?>
                <li class="nav-item">
                    <button type="button" class="btn text-light" data-toggle="modal" data-target="#password">
                        Сменить пароль
                    </button>
                </li>
                <? endif; ?>
                <li class="nav-item">
                    <a class="nav-link text-light" href="/logout.php">Выход</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Modal -->
<div class="modal fade" id="password" tabindex="-1" aria-labelledby="password" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Смена пароля</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="../Add/updateRemove.php" method="POST">
                    <div class="form-group m-3">
                        <label for="old_password">Введите старый пароль</label>
                        <input type="text" class="form-control" id="old_password" name="old_password">
                    </div>
                    <div class="form-group m-3">
                        <label for="password">Введите новый пароль</label>
                        <input type="text" class="form-control" id="password" name="password">
                    </div>
                    <button type="submit" name="passwordSwitch" class="btn btn-dark mt-3" value="true">Сменить пароль</button>
                </form>
            </div>
        </div>
    </div>
</div>