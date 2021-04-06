<?php
include("../db.php");

include('../class/dbClass.php');
$ec = new dbClass();
?>
<?
// Оборудование
if (!empty($_POST['updateEquip']) && $_POST['updateEquip'] == true) {
    $update = $ec->updateEquip($_POST['name'], $_POST['code'], $_POST['id']);
    $url = 'http://' . $_SERVER['SERVER_NAME'] . '/equipment.php';
    header("Location:" . $url);
}

if (!empty($_POST['removeEquip']) && $_POST['removeEquip'] == true) {
    $remove = $ec->remove($_POST['table'], $_POST['id']);
    $url = 'http://' . $_SERVER['SERVER_NAME'] . '/equipment.php';
    header("Location:" . $url);
}

// Сотрудники
if (!empty($_POST['updateStaff']) && $_POST['updateStaff'] == true) {
    $update = $ec->updateStaff($_POST['fio'], $_POST['inn'], $_POST['phone'], $_POST['email'], $_POST['post'], $_POST['department'], $_POST['id']);
    $url = 'http://' . $_SERVER['SERVER_NAME'] . '/staff.php';
    header("Location:" . $url);
}

if (!empty($_POST['removeStaff']) && $_POST['removeStaff'] == true) {
    $remove = $ec->remove($_POST['table'], $_POST['id']);
    $url = 'http://' . $_SERVER['SERVER_NAME'] . '/staff.php';
    header("Location:" . $url);
}

// Список
if (!empty($_POST['removeList']) && $_POST['removeList'] == true) {
$remove = $ec->removeList($_POST['id']);
$url = 'http://' . $_SERVER['SERVER_NAME'] . '/spisok.php';
header("Location:" . $url);
}
?>

<? $title = 'Изменение данных' ?>
<? include '../components/header.php' ?>

<div class="container">

    <? if (!empty($_POST['updateOne']) && $_POST['updateOne'] == true) { ?>
        <div class="row mt-5 justify-content-center">
            <div class="col-5 card p-5 m-2">
                <form action="updateRemove.php" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Название</label>
                        <input type="text" class="form-control" id="name" placeholder="name" name="name"
                               value="<?= $_POST['name']; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="code" class="form-label">Код</label>
                        <input type="text" class="form-control" id="code" placeholder="code" name="code"
                               value="<?= $_POST['code']; ?>">
                    </div>
                    <input type="hidden" name="id" value="<?= $_POST['id']; ?>">
                    <button type="submit" class="btn btn-dark btn-block" name="updateEquip" value="true">Изменить
                    </button>
                </form>
            </div>
        </div>
    <? } ?>
    <? if (!empty($_POST['updateTwo']) && $_POST['updateTwo'] == true) { ?>
        <div class="row mt-5 justify-content-center">
            <div class="col-5 card p-5 m-2">
                <form action="updateRemove.php" method="POST">
                    <div class="mb-3">
                        <label for="fio" class="form-label">ФИО</label>
                        <input type="text" class="form-control" id="fio" placeholder="fio" name="fio" value="<?=$_POST['fio']?>">
                    </div>
                    <div class="mb-3">
                        <label for="inn" class="form-label">ИНН</label>
                        <input type="text" class="form-control" id="inn" placeholder="inn" name="inn" value="<?=$_POST['inn']?>">
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Телефон</label>
                        <input type="text" class="form-control" id="phone" placeholder="phone" name="phone" value="<?=$_POST['phone']?>">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">E-mail</label>
                        <input type="text" class="form-control" id="email" placeholder="email" name="email" value="<?=$_POST['email']?>">
                    </div>
                    <div class="mb-3">
                        <label for="post" class="form-label">Должность</label>
                        <input type="text" class="form-control" id="post" placeholder="post" name="post" value="<?=$_POST['post']?>">
                    </div>
                    <div class="mb-3">
                        <label for="department" class="form-label">Отдел</label>
                        <input type="text" class="form-control" id="department" placeholder="department"
                               name="department" value="<?=$_POST['department']?>">
                    </div>
                    <input type="hidden" name="id" value="<?= $_POST['id']; ?>">
                    <button type="submit" class="btn btn-dark btn-block" name="updateStaff" value="true">Изменить
                    </button>
                </form>
            </div>
        </div>
    <? } ?>

</div>

<? include '../components/footer.php' ?>
