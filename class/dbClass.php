<?php

class dbClass
{

    //    Для всех
    public function getAll($who)
    {
        try {
            $db = getDB();
            $stmt = $db->prepare("SELECT * FROM $who");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }

    //    Только для Оборудования
    public function createEquip($name, $code)
    {
        $db = getDB();
        $stmt = $db->prepare("INSERT INTO `equipment` (name, code) VALUES (:name, :code)");
        $stmt->bindParam("name", $name, PDO::PARAM_STR);
        $stmt->bindParam("code", $code, PDO::PARAM_STR);
        $stmt->execute();
    }

    //    Только для Сотрудников
    public function createStaff($name, $inn, $phone, $email, $post, $department)
    {
        $db = getDB();
        $stmt = $db->prepare("INSERT INTO `staff` (`FIO`, `INN`, `phone`, `email`, `post`, `department`) VALUES (:name, :inn, :phone, :email, :post, :department)");
        $stmt->bindParam("name", $name, PDO::PARAM_STR);
        $stmt->bindParam("inn", $inn, PDO::PARAM_STR);
        $stmt->bindParam("phone", $phone, PDO::PARAM_STR);
        $stmt->bindParam("email", $email, PDO::PARAM_STR);
        $stmt->bindParam("post", $post, PDO::PARAM_STR);
        $stmt->bindParam("department", $department, PDO::PARAM_STR);
        $stmt->execute();
    }

    //    Только для Оборудования
    public function updateEquip($name, $code, $id)
    {
        $db = getDB();
        $stmt = $db->prepare("UPDATE `equipment` SET name = :name, code = :code WHERE id = :id");
        $stmt->bindParam("name", $name, PDO::PARAM_STR);
        $stmt->bindParam("code", $code, PDO::PARAM_STR);
        $stmt->bindParam("id", $id, PDO::PARAM_STR);
        $stmt->execute();
    }

    //    Только для Сотрудников
    public function updateStaff($name, $inn, $phone, $email, $post, $department, $id)
    {
        $db = getDB();
        $stmt = $db->prepare("UPDATE `staff` SET FIO = :name, INN = :inn, phone = :phone, email = :email, post = :post, department = :department WHERE id = :id");
        $stmt->bindParam("name", $name, PDO::PARAM_STR);
        $stmt->bindParam("inn", $inn, PDO::PARAM_STR);
        $stmt->bindParam("phone", $phone, PDO::PARAM_STR);
        $stmt->bindParam("email", $email, PDO::PARAM_STR);
        $stmt->bindParam("post", $post, PDO::PARAM_STR);
        $stmt->bindParam("department", $department, PDO::PARAM_STR);
        $stmt->bindParam("id", $id, PDO::PARAM_STR);
        $stmt->execute();
    }

    //    Для всех
    public function remove($who, $id)
    {
        $db = getDB();
        $stmt = $db->prepare("DELETE FROM $who WHERE id = :id");
        $stmt->bindParam("id", $id, PDO::PARAM_STR);
        $stmt->execute();
    }

    // Список
    public function getAllList()
    {
        try {
            $db = getDB();
            $stmt = $db->prepare("SELECT list.id, staff.FIO, equipment.name, list.inv_num FROM `list` INNER JOIN `staff` ON staff.id = staff_id INNER JOIN `equipment` ON equipment.id = equipment_id");
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }

    // Список
    public function createList($staff_id, $equipment_id, $inv_num)
    {
        $db = getDB();
        $stmt = $db->prepare("INSERT INTO `list` (`staff_id`, `equipment_id`, `inv_num`) VALUES (:si, :ei, :in)");
        $stmt->bindParam("si", $staff_id, PDO::PARAM_STR);
        $stmt->bindParam("ei", $equipment_id, PDO::PARAM_STR);
        $stmt->bindParam("in", $inv_num, PDO::PARAM_STR);
        $stmt->execute();
    }

    //    Список
    public function removeList($id)
    {
        $db = getDB();
        $stmt = $db->prepare("UPDATE `list` SET `staff_id` = NULL WHERE id = :id");
        $stmt->bindParam("id", $id, PDO::PARAM_STR);
        $stmt->execute();
    }

}