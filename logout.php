<?php
include('db.php');
$_SESSION['users']='';
if(empty($_SESSION['users']))
{
    $url = 'http://' . $_SERVER['SERVER_NAME'] . '/';
    header("Location:" . $url);
}