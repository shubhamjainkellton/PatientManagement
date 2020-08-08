<?php session_start(); ?>

<?php   


$_SESSION['name'] = null;
$_SESSION['aadhar_no'] = null;
$_SESSION['role'] = null;
$_SESSION['email'] = null;
$_SESSION['specialisation'] = null;             
header("Location: ./login.php");

?>