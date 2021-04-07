<?php
include("../db.php");

include('../class/dbClass.php');
$ec = new dbClass();
if (!empty($_POST['addEquip']) && $_POST['addEquip'] == true) {
    $create = $ec->createEquip($_POST['name'], $_POST['code']);
    if ($create) {
        $url = 'http://' . $_SERVER['SERVER_NAME'] . '/equipment.php';
        header("Location:" . $url);
    } else {
        $errorMsg = 'Ошибка, попробуйте повторить позже';
    }
}
if (!empty($_POST['addStaff']) && $_POST['addStaff'] == true) {
    $create = $ec->createStaff($_POST['fio'], $_POST['inn'], $_POST['phone'], $_POST['email'], $_POST['post'], $_POST['department']);
    if ($create) {
        $url = 'http://' . $_SERVER['SERVER_NAME'] . '/staff.php';
        header("Location:" . $url);
    } else {
        $errorMsg = 'Ошибка, попробуйте повторить позже';
    }
}
if (!empty($_POST['addList']) && $_POST['addList'] == true) {
    $create = $ec->createList($_POST['staff_id'], $_POST['equipment_id'], $_POST['code']);
    if ($create) {
        $url = 'http://' . $_SERVER['SERVER_NAME'] . '/spisok.php';
        header("Location:" . $url);
    } else {
        $errorMsg = 'Ошибка, попробуйте повторить позже';
    }
}
?>
<? $title = 'Добавление данных' ?>
<? include '../components/header.php' ?>

<div class="container">

    <? if(strlen($errorMsg) > 0) {
        echo '<div class="alert alert-danger mt-5">'.$errorMsg.'</div>';
    }?>

</div>

<? include '../components/footer.php' ?>
