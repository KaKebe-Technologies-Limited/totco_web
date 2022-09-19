<?php

include 'session.php';
include 'functions.php';

$user_data = check_login();

// if ($user_data->admin_roles == 1) {
//     return $user_data;
// } else {
//     $admin_error = "You need ADMIN privileges to access other pages";
//     // echo '<script>alert("' . $admin_error . '")</script>';
//     $_SESSION['admin_error'] =  $admin_error;
//     //redirect to orders
//     header("Location:http://localhost/totco_web/pages/orders/order.php");
//     die;
// }
