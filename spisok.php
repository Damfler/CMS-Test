<?php
include("db.php");

if (empty($_SESSION['users'])) {
    $url = 'http://' . $_SERVER['SERVER_NAME'] . '/';
    header("Location:" . $url);
}

include('class/dbClass.php');
$ec = new dbClass();
$get = $ec->getAllList();
$staff = $ec->getAll('staff');
$equipment = $ec->getAll('equipment');
?>

<? $title = 'Список обордования' ?>
<? include 'components/header.php' ?>

    <div class="container">
        <h1 class="text-center m-5">Перечень оборудования</h1>
        <button type="button" class="btn btn-primary mt-3 btn-block" data-toggle="modal" data-target="#exampleModal">
            Добавить
        </button>
        <? foreach ($get as $equip): ?>
            <div class="card my-4">
                <form action="Add/updateRemove.php" method="POST">
                    <div class="card-header"><?= $equip['inv_num'] ?></div>
                    <div class="d-flex justify-content-between p-2">
                        <p class="px-3 py-1"><?= $equip['FIO'] ?> - <?= $equip['name'] ?></p>
                        <div>
                            <input type="hidden" name="id" value="<?= $equip['id'] ?>">
                            <button type="submit" class="btn btn-danger" name="removeList" value="true">На склад
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
                            <label for="code" class="form-label">Сотрудник</label>
                            <select class="form-select" name="staff_id">
                                <? foreach ($staff as $equip): ?>
                                    <option value="<?=$equip['id']?>"><?=$equip['FIO']?></option>
                                <? endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="code" class="form-label">Сотрудник</label>
                            <select class="form-select" name="equipment_id">
                                <? foreach ($equipment as $equip): ?>
                                    <option value="<?=$equip['id']?>"><?=$equip['name']?></option>
                                <? endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="code" class="form-label">Инвентарный номер</label>
                            <input type="text" class="form-control" id="code" placeholder="code" name="code">
                        </div>

                        <button type="submit" class="btn btn-dark btn-block" name="addList" value="true">Добавить
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<? include 'components/footer.php' ?>