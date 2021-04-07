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
        try {
            $db = getDB();
            $stmt = $db->prepare("INSERT INTO `equipment` (name, code) VALUES (:name, :code)");
            $stmt->bindParam("name", $name, PDO::PARAM_STR);
            $stmt->bindParam("code", $code, PDO::PARAM_STR);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }

    //    Только для Сотрудников
    public function createStaff($name, $inn, $phone, $email, $post, $department)
    {
        try {
            $db = getDB();
            $stmt = $db->prepare("INSERT INTO `staff` (`FIO`, `INN`, `phone`, `email`, `post`, `department`) VALUES (:name, :inn, :phone, :email, :post, :department)");
            $stmt->bindParam("name", $name, PDO::PARAM_STR);
            $stmt->bindParam("inn", $inn, PDO::PARAM_STR);
            $stmt->bindParam("phone", $phone, PDO::PARAM_STR);
            $stmt->bindParam("email", $email, PDO::PARAM_STR);
            $stmt->bindParam("post", $post, PDO::PARAM_STR);
            $stmt->bindParam("department", $department, PDO::PARAM_STR);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }

    //    Только для Оборудования
    public function updateEquip($name, $code, $id)
    {
        try {
            $db = getDB();
            $stmt = $db->prepare("UPDATE `equipment` SET name = :name, code = :code WHERE id = :id");
            $stmt->bindParam("name", $name, PDO::PARAM_STR);
            $stmt->bindParam("code", $code, PDO::PARAM_STR);
            $stmt->bindParam("id", $id, PDO::PARAM_STR);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }

    //    Только для Сотрудников
    public function updateStaff($name, $inn, $phone, $email, $post, $department, $id)
    {
        try {
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
            return true;
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }

    //    Для всех
    public function remove($who, $id)
    {
        try {
            $db = getDB();
            $stmt = $db->prepare("UPDATE $who SET active = 0 WHERE id = :id");
            $stmt->bindParam("id", $id, PDO::PARAM_STR);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }

    // Список
    public function getAllList($arFilter = [])
    {
        $sql = "SELECT list.*, s.FIO AS staff_name, e.name as equipment_name FROM `list` LEFT JOIN `staff` s ON s.id = list.staff_id LEFT JOIN `equipment` e ON e.id = list.equipment_id";
        if (!empty($arFilter)) {
            $sql .= ' WHERE 1 ';
            $arFilter = array_filter($arFilter);

            foreach ($arFilter as $filterKey => $filterVal)
                $sql .= " AND list.`$filterKey` = '$filterVal'";
        }


        try {
            $db = getDB();
            $stmt = $db->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }

    }

    // Список
    public function createList($staff_id, $equipment_id, $inv_num)
    {
        try {
            $db = getDB();
            $stmt = $db->prepare("INSERT INTO `list` (`staff_id`, `equipment_id`, `inv_num`) VALUES (:si, :ei, :in)");
            $stmt->bindParam("si", $staff_id, PDO::PARAM_INT);
            $stmt->bindParam("ei", $equipment_id, PDO::PARAM_INT);
            $stmt->bindParam("in", $inv_num, PDO::PARAM_STR);
            $stmt->execute();

            $id = $db->lastInsertId();
            $inv_num = 'ИН';
            $num = 1000000 + $id;
            $num = strval($num);
            $num = substr($num, 1);
            $inv_num .= $num;

            $stmt = $db->prepare("UPDATE `list` SET `inv_num` = :inv_num WHERE id = :id");
            $stmt->bindParam("inv_num", $inv_num, PDO::PARAM_STR);
            $stmt->bindParam("id", $id, PDO::PARAM_STR);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }

    //    Список
    public function removeList($id)
    {
        try {
            $db = getDB();
            $stmt = $db->prepare("UPDATE `list` SET `staff_id` = NULL WHERE id = :id");
            $stmt->bindParam("id", $id, PDO::PARAM_STR);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }

    //    Список
    public function updateList($staff_id, $id)
    {
        try {
            $db = getDB();
            $stmt = $db->prepare("UPDATE `list` SET `staff_id` = :staff_id WHERE id = :id");
            $stmt->bindParam("staff_id", $staff_id, PDO::PARAM_STR);
            $stmt->bindParam("id", $id, PDO::PARAM_INT);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }
    }

}