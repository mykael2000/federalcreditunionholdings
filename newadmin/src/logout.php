<?php 
include('../../user-area/user/dashboard/includes/connection.php');
ob_start();
session_start();
if (!isset($_SESSION['email'])) {
    header('location: login.php');

}
session_destroy();
header('location: login.php');
?>