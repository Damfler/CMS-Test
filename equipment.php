<?php
include("db.php");

if (empty($_SESSION['users'])) {
    $url = 'http://' . $_SERVER['SERVER_NAME'] . '/';
    header("Location:" . $url);
}

include('class/dbClass.php');
$ec = new dbClass();
$get = $ec->getAll('equipment');
?>

<? $title = 'Перечень оборудования' ?>
<? include 'components/header.php' ?>

    <div class="container">
        <h1 class="text-center m-5">Перечень оборудования</h1>
        <button type="button" class="btn btn-primary mt-3 btn-block" data-toggle="modal" data-target="#exampleModal">
            Добавить
        </button>
        <? foreach ($get as $equip): ?>
            <div class="card my-4">
                <form action="Add/updateRemove.php" method="POST">
                    <div class="card-header"><?= $equip['id'] ?> - <?= $equip['name'] ?></div>
                    <div class="d-flex justify-content-between p-2">
                        <p class="px-3 py-1">Code: <?= $equip['code'] ?></p>
                        <div>
                            <a href="/spisok.php" class="btn btn-dark">Использование оборудования</a>
                            <input type="hidden" name="id" value="<?= $equip['id'] ?>">
                            <input type="hidden" name="name" value="<?= $equip['name'] ?>">
                            <input type="hidden" name="code" value="<?= $equip['code'] ?>">
                            <input type="hidden" name="table" value="equipment">
                            <button type="submit" class="btn btn-danger" name="removeEquip" value="true">Удалить
                            </button>
                            <button type="submit" class="btn btn-primary" name="updateOne" value="true">Изменить
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        <? endforeach; ?>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Добавить оборудование</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="Add/add.php" method="POST">
                        <div class="mb-3">
                            <label for="name" class="form-label">Название</label>
                            <input type="text" class="form-control" id="name" placeholder="name" name="name">
                        </div>
                        <div class="mb-3">
                            <label for="code" class="form-label">Код</label>
                            <input type="text" class="form-control" id="code" placeholder="code" name="code">
                        </div>
                        <button type="submit" class="btn btn-dark btn-block" name="addEquip" value="true">Добавить
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<? include 'components/footer.php' ?>