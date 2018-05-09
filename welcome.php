<?php
session_start();
include_once("header.php");
include_once("slider.php");
include_once("navBar.php");
if(!isset($_SESSION['registerDone'])){
    header('Location: index.php');
    exit();
}else{
    unset($_SESSION['registerDone']);
}
?>

<h2>Witamy w serwisie.

<?php
include_once("footer.php");