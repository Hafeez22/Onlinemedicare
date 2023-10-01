<?php
include('../admin/db.php');
ob_start();
session_start();
echo $_SESSION['user'];
?>