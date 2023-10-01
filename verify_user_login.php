			<?php
session_start();
include 'admin/db.php';
$error = '';
if (isset($_POST['submit'])) {
    if (empty($_POST['name']) || empty($_POST['password'])) {
        $error = "<font color='red'>username or password is invalid</font>";
    } else {

        $name = $_POST['name'];
        $password = $_POST['password'];

        $query = mysqli_query($con, "select * from pharmacy_register where name='$name' AND password='$password'");
        $rows = mysqli_num_rows($query);
        $rows_data = mysqli_fetch_assoc($query);
        if ($rows == 1) {
            $_SESSION['name'] = $name;
            $root = $_SERVER['DOCUMENT_ROOT'];
            header('location: gallery.php');
        } else {
            //mysqli_query($con,"UPDATE register SET login_valid = login_valid + 1 WHERE name = '$name'");
            $error = "<font color='red'>username or password is invalid</font>";
        }
        mysqli_close($con);
    }
}
?>