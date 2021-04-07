<?php
include("db.php");

if (empty($_SESSION['users'])) {
    $url = 'http://' . $_SERVER['SERVER_NAME'] . '/';
    header("Location:" . $url);
}

include('class/dbClass.php');
$ec = new dbClass();
$get = $ec->getAll('staff');
?>

<? $title = 'Перечень сотрудников' ?>
<? include 'components/header.php' ?>

    <div class="container">
        <h1 class="text-center m-5">Перечень сотрудников</h1>
        <button type="button" class="btn btn-primary mt-3 btn-block" data-toggle="modal" data-target="#exampleModal">
            Добавить
        </button>
        <? foreach ($get as $equip): ?>
            <div class="card my-4">
                <form action="Add/updateRemove.php" method="POST">
                    <div class="card-header"><?= $equip['FIO'] ?></div>
                    <div class="d-flex justify-content-between align-items-center p-2">
                        <div>
                            <p class="px-3 py-1">ИНН: <?= $equip['INN'] ?></p>
                            <p class="px-3 py-1">Телефон: <?= $equip['phone'] ?></p>
                            <p class="px-3 py-1">Почта: <?= $equip['email'] ?></p>
                            <p class="px-3 py-1">Должность: <?= $equip['post'] ?></p>
                            <p class="px-3 py-1">Отдел: <?= $equip['department'] ?></p>
                        </div>
                        <div>
                            <a href="/spisok.php?FILTER%5Bstaff_id%5D=<?=$equip['id']?>&FILTER%5Bequipment_id%5D=" class="btn btn-dark">Использование оборудования</a>
                            <input type="hidden" name="id" value="<?= $equip['id'] ?>">
                            <input type="hidden" name="fio" value="<?= $equip['FIO'] ?>">
                            <input type="hidden" name="inn" value="<?= $equip['INN'] ?>">
                            <input type="hidden" name="phone" value="<?= $equip['phone'] ?>">
                            <input type="hidden" name="email" value="<?= $equip['email'] ?>">
                            <input type="hidden" name="post" value="<?= $equip['post'] ?>">
                            <input type="hidden" name="department" value="<?= $equip['department'] ?>">
                            <input type="hidden" name="table" value="staff">
                            <button type="submit" class="btn btn-danger" name="removeStaff" value="true">Удалить
                            </button>
                            <button type="submit" class="btn btn-primary" name="updateTwo" value="true">Изменить
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
                            <label for="fio" class="form-label">ФИО</label>
                            <input type="text" class="form-control" id="fio" placeholder="fio" name="fio">
                        </div>
                        <div class="mb-3">
                            <label for="inn" class="form-label">ИНН</label>
                            <input type="text" class="form-control" id="inn" placeholder="inn" name="inn">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label">Телефон</label>
                            <input type="text" class="form-control" id="phone" placeholder="phone" name="phone">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail</label>
                            <input type="text" class="form-control" id="email" placeholder="email" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="post" class="form-label">Должность</label>
                            <input type="text" class="form-control" id="post" placeholder="post" name="post">
                        </div>
                        <div class="mb-3">
                            <label for="department" class="form-label">Отдел</label>
                            <input type="text" class="form-control" id="department" placeholder="department"
                                   name="department">
                        </div>
                        <button type="submit" class="btn btn-dark btn-block" name="addStaff" value="true">Добавить
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<? include 'components/footer.php' ?>