<?php
/**
 * Created by PhpStorm.
 * User: Subhashis
 * Date: 01-02-2017
 * Time: 21:13
 */
require_once "../functions.php";
$email="";
$con="";
if (isset($_REQUEST['id'])) $email = sanitizeString(sanitizeString($_REQUEST['id']));
if ($email === "") die('Invalid Request');
if (isset($_REQUEST['con'])) $con = urldecode(sanitizeString($_REQUEST['con']));
if ($con === "") die('Invalid Request');
$sql="SELECT `id` FROM `users` WHERE `email`='$email' AND (`confirmation` = '$con' OR `confirmation` = '0')";
$result=sql($sql);
if($result->num_rows>0){
    $sql="UPDATE `users` SET `confirmation`='0' WHERE `email`='$email'";
    sql($sql);
    $token=randomString(64);
//    sql("DELETE FROM `cookie` WHERE 'email'='$email'");
    $result=sql("INSERT INTO `cookie` (`mail`,`token`) VALUES ('$email','$token')");
//    $_COOKIE['convo_mail']=$email;
//    $_COOKIE['convo_token']=$token;
    setcookie('convo_mail',$email,time() + (86400 * 30), "/");
    setcookie('convo_token',$token,time() + (86400 * 30), "/");

    $_SESSION['on']='1';
//    header("Location: ../");
}else{
    die('Invalid confirmation link');
}
header('Location: ../../');

