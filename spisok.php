<?php
include("db.php");

if (empty($_SESSION['users'])) {
    $url = 'http://' . $_SERVER['SERVER_NAME'] . '/';
    header("Location:" . $url);
}

include('class/dbClass.php');
$ec = new dbClass();
$get = $ec->getAllList($_GET['FILTER']);

$staff = $ec->getAll('staff');
$equipment = $ec->getAll('equipment');
?>

<? $title = 'Список обордования' ?>
<? include 'components/header.php' ?>

    <div class="container">
        <h1 class="text-center m-5">Использование оборудования</h1>
        <form action="" method="">
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="code" class="form-label">Сотрудник</label>
                        <select class="form-select" id="staff_id" name="FILTER[staff_id]">
                            <option></option>
                            <? foreach ($staff as $staffItem): ?>
                                <option <?=(($_GET['FILTER']['staff_id'] == $staffItem['id']) ? 'selected' : '')?> value="<?=$staffItem['id']?>"><?= $staffItem['FIO'] ?></option>
                            <? endforeach; ?>
                        </select>
                    </div>

                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="code" class="form-label">Оборудование</label>
                        <select class="form-select" id="equipment_id" name="FILTER[equipment_id]">
                            <option></option>
                            <? foreach ($equipment as $equip): ?>
                                <option <?=(($_GET['FILTER']['equipment_id'] == $equip['id']) ? 'selected' : '')?> value="<?= $equip['id'] ?>"><?= $equip['name'] ?></option>
                            <? endforeach; ?>
                        </select>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-secondary mt-3 btn-block">
                Найти
            </button>
        </form>
        <button type="button" class="btn btn-primary mt-3 btn-block" data-toggle="modal" data-target="#exampleModal">
            Добавить
        </button>
        <? foreach ($get as $equip): ?>
        <? if ($equip['staff_id'] != NULL): ?>
            <div class="card my-4 name equip">
                <form action="Add/updateRemove.php" method="POST">
                    <div class="card-header"><?= $equip['inv_num'] ?> - <?= $equip['create_time'] ?></div>
                    <div class="d-flex justify-content-between p-2">
                        <p class="px-3 py-1"><?= $equip['staff_name'] ?> - <?= $equip['equipment_name'] ?></p>
                        <div>
                            <input type="hidden" name="id" value="<?= $equip['id'] ?>">
                            <button type="submit" class="btn btn-danger" name="removeList" value="true">На склад
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <? else: ?>
                <div class="card my-4 name equip">
                    <form action="Add/updateRemove.php" method="POST">
                        <div class="card-header"><?= $equip['inv_num'] ?> - <?= $equip['create_time'] ?></div>
                        <div class="d-flex justify-content-between p-2">
                            <p class="px-3 py-1"><?= $equip['equipment_name'] ?></p>
                            <div>
                                <input type="hidden" name="id" value="<?= $equip['id'] ?>">
                                <button type="submit" class="btn btn-success" name="updateThree" value="true">Выдать
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            <? endif;?>
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
                                    <option value="<?= $equip['id'] ?>"><?= $equip['FIO'] ?></option>
                                <? endforeach; ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="code" class="form-label">Оборудование</label>
                            <select class="form-select" name="equipment_id">
                                <? foreach ($equipment as $equip): ?>
                                    <option value="<?= $equip['id'] ?>"><?= $equip['name'] ?></option>
                                <? endforeach; ?>
                            </select>
                        </div>
                            <input type="hidden" name="code" value="#">
                        <button type="submit" class="btn btn-dark btn-block" name="addList" value="true">Добавить
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<? include 'components/footer.php' ?>