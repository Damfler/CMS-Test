<?
include("db.php");
include('class/userClass.php');
$userClass = new userClass();

if (!empty($_SESSION['users'])) {
    $url = 'http://' . $_SERVER['SERVER_NAME'] . '/main.php';
    header("Location:" . $url);
}

$errorMsgLogin='';;

/* Login Form */
$login=$_POST['login'];
$password=$_POST['password'];
if(strlen(trim($login))>1 && strlen(trim($password))>1 )
{
    $users=$userClass->userLogin($login,$password);
//    var_dump($_SESSION);
    if($users)
    {
        $url='http://' . $_SERVER['SERVER_NAME'] . '/' . 'main.php';
        header("Location:". $url);
    }
    else
    {
        $errorMsgLogin="Вы ввели неверные данные!";
    }
}
?>

<? $title = 'Авторизация' ?>
<? include 'components/header.php' ?>

<div class="container">
    <div class="row mt-5 justify-content-center">
        <div class="col-5 card p-5 m-2">
            <form action="index.php" method="POST">
                <? if(strlen($errorMsgLogin) > 0) {
                    echo '<div class="alert alert-danger">'.$errorMsgLogin.'</div>';
                }?>
                <div class="mb-3">
                    <label for="Login" class="form-label">Ваш логин</label>
                    <input type="text" class="form-control" id="Login" placeholder="login" name="login" value="<?=$_POST['login'];?>">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Ваш пароль</label>
                    <input type="password" class="form-control" id="password" placeholder="password" name="password" value="<?=$_POST['password'];?>">
                </div>
                <button type="submit" class="btn btn-dark btn-block">Войти</button>
            </form>
        </div>
    </div>
</div>

<? include 'components/footer.php' ?>