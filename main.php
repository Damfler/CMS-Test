<?php
include("db.php");

if (empty($_SESSION['users'])) {
    $url = 'http://' . $_SERVER['SERVER_NAME'] . '/';
    header("Location:" . $url);
}
?>

<? $title = 'Главная страница' ?>
<? include 'components/header.php' ?>

    <div class="container">
        <div class="row mt-5">
            <div class="col-4">
                <a href="/equipment.php" class="text-decoration-none text-dark">
                    <div class="card">
                        <div class="card-header bg-dark text-warning">Перечень оборудования</div>
                        <div class="card-body">
                            <p class="card-text">Список оборудования организации с возможностью добавления, изменения и удаления</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-4">
                <a href="/staff.php" class="text-decoration-none text-dark">
                    <div class="card">
                        <div class="card-header bg-dark text-warning">Перечень сотрудников</div>
                        <div class="card-body">
                            <p class="card-text">Список сотрудников организации с возможностью добавления, изменения и удаления</p>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-4">
                <a href="spisok.php" class="text-decoration-none text-dark">
                    <div class="card">
                        <div class="card-header bg-dark text-warning">Использование оборудования</div>
                        <div class="card-body">
                            <p class="card-text">Список записей использования оборудования персоналом. Каждой выданной позиции присвоен Инвентарный номер (текст вида ИЛ000001), который в последующем физически наносится на оборудование.
                                Есть возможность списания и помещения позиции «на склад», для отвязки оборудования от сотрудника, при которых инвентарный номер сохраняется.
                            </p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>

<? include 'components/footer.php' ?>