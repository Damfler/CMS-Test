<?php
Class UserClass
{
//   Авторизация
    public function userLogin($login, $password)
    {
        try {
            $db = getDB();
//            $password = md5($password); //При необходимости можно раскомментировать
            $stmt = $db->prepare("SELECT * FROM users WHERE login=:login AND password=:password");
            $stmt->bindParam("login", $login,PDO::PARAM_STR) ;
            $stmt->bindParam("password", $password,PDO::PARAM_STR) ;
            $stmt->execute();

            $count=$stmt->rowCount();
            $data=$stmt->fetch();
            $db = null;
            if($count)
            {
                $_SESSION['users']=$data['id'];
                $_SESSION['users_login']=$data['login'];
                return true;
            }
            else
            {
                return false;
            }
        }
        catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }

    public function passwordSwitch($oldPassword ,$password, $id) {
        try {
            $db = getDB();
//            $password = md5($password); //При необходимости можно раскомментировать
            $stmt = $db->prepare("SELECT `password` FROM `users` WHERE `password` = :password");
            $stmt->bindParam("password", $oldPassword,PDO::PARAM_STR);
            $res = $stmt->execute();
            if ($res) {
                $db = getDB();
//            $password = md5($password); //При необходимости можно раскомментировать
                $stmt = $db->prepare("UPDATE `users` SET `password` = :password WHERE `users`.`id` = :id");
                $stmt->bindParam("password", $password,PDO::PARAM_STR);
                $stmt->bindParam("id", $id,PDO::PARAM_INT);
                $res = $stmt->execute();
                return true;
            } else {
                return false;
            }
        }
        catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }
}