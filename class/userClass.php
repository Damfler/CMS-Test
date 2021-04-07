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

    public function passwordSwitch($password, $id) {
        try {
            $db = getDB();
//            $password = md5($password); //При необходимости можно раскомментировать
            $stmt = $db->prepare("UPDATE `users` SET `password` = :password WHERE `users`.`id` = :id");
            $stmt->bindParam("password", $password,PDO::PARAM_STR);
            $stmt->bindParam("id", $id,PDO::PARAM_INT);
            $stmt->execute();
            return true;
        }
        catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}';
        }
    }
}