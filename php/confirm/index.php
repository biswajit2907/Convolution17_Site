<?php
/**
 * Created by PhpStorm.
 * User: Subhashis
 * Date: 01-02-2017
 * Time: 21:13
 */
$email="";
$con="";
if (isset($_REQUEST['id'])) $name = sanitizeString($_REQUEST['id']);
if ($email === "") die('Invalid Request');
if (isset($_REQUEST['con'])) $con = urldecode($_REQUEST['con']);
if ($con === "") die('Invalid Request');
$sql="SELECT `id` FROM `users` WHERE `email`='$email' AND `confirmation` = '$con'";
$result=sql($sql);
if($result->num_rows>0){
    $sql="UPDATE `users` SET `confirmation`=NULL WHERE WHERE `email`='$email'";
    //TODO:Make login
    $token=randomString(64);
//    sql("DELETE FROM `cookie` WHERE 'email'='$email'");
    $result=sql("INSERT INTO `cookie` (`mail`,`token`) VALUES ('$email','$token')");
    $_COOKIE['convo_mail']=$email;
    $_COOKIE['convo_token']=$token;
    $_SESSION['on']='1';
    header("Location: ../");
}else{
    die('Invalid confirmation link');
}