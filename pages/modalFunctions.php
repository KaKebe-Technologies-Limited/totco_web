<?php
// ----- users ------

// updateUserSubmit
if (isset($_POST['updateUserSubmit'])) {
    if ($_POST['user_name'] != "") {
        $user_name = urlencode($_POST['user_name']);

        // check fields have data and handle the situation
        $full_name = isset($_POST['full_name']) && $_POST['full_name'] != "" ? urlencode($_POST['full_name']) : "";
        $contact = isset($_POST['contact']) && $_POST['contact'] != "" ? urlencode($_POST['contact']) : "";
        $email = isset($_POST['email']) && $_POST['email'] != "" ? urlencode($_POST['email']) : "";
        $admin_roles = isset($_POST['admin_roles']) && $_POST['admin_roles'] != "" ? urlencode($_POST['admin_roles']) : "";
        $advanced_roles = isset($_POST['advanced_roles']) && $_POST['advanced_roles'] != "" ? urlencode($_POST['advanced_roles']) : "";
        $password = isset($_POST['password']) && $_POST['password'] != "" ? urlencode($_POST['password']) : "";
        $passwordConfirm = isset($_POST['passwordConfirm']) && $_POST['passwordConfirm'] != "" ? urlencode($_POST['passwordConfirm']) : "";

        // clear the _POST array data
        $_POST = array();

        $jsonobj =  file_get_contents("https://api.campusweekly.info/inventorySystem/api/users/updateUser.php?user_name=$user_name&full_name=$full_name&contact=$contact&email=$email&admin_roles=$admin_roles&advanced_roles=$advanced_roles&password=$password&passwordConfirm=$passwordConfirm");

        // https://www.clavicar.com/campusweekly/api/inv/api/uZ3Rs/updateUSEr.php
        // https://api.campusweekly.info/inventorySystem/api/users/updateUser.php

        $PHPobj = json_decode($jsonobj);

        if ($PHPobj->success == 0) {
            $reg_error = $PHPobj->message;
            echo '<script>alert("' . $reg_error . '")</script>';
        } else {
            $reg_message = $PHPobj->message;
            echo '<script>alert("' . $reg_message . '")</script>';
        }
    } else {
        $reg_error = "Select User to update";
        echo '<script>alert("' . $reg_error . '")</script>';
    }
}

// deleteUserSubmit
if (isset($_POST['deleteUserSubmit'])) {
    if ($_POST['user_name'] != "") {
        $user_name = urlencode($_POST['user_name']);
        $_POST = array();

        $jsonobj =  file_get_contents("https://api.campusweekly.info/inventorySystem/api/users/deleteUser.php?user_name=$user_name");

        // https://www.clavicar.com/campusweekly/api/inv/api/uZ3Rs/deletenZ3r.php
        // https://api.campusweekly.info/inventorySystem/api/users/deleteUser.php

        $PHPobj = json_decode($jsonobj);

        if ($PHPobj->success == 0) {
            $reg_error = $PHPobj->message;
            echo '<script>alert("' . $reg_error . '")</script>';
        } else {
            $reg_message = $PHPobj->message;
            echo '<script>alert("' . $reg_message . '")</script>';
        }
    } else {
        $reg_error = "Select User to delete";
        echo '<script>alert("' . $reg_error . '")</script>';
    }
}

// create / add new user
if (isset($_POST['add_user_submit'])) {
    // once the submit button is hit
    if ($_POST['first_name'] != "" && $_POST['user_name'] != "" && $_POST['password'] != "" && $_POST['passwordConfirm'] != "") {

        $firstName = urlencode($_POST['first_name']);
        $lastName = urlencode($_POST['last_name']);
        $user_name = urlencode($_POST['user_name']);
        $password = urlencode($_POST['password']);
        $passwordConfirm = urlencode($_POST['passwordConfirm']);
        $_POST = array();

        $jsonobj =  file_get_contents("https://totco.kakebe.com/api/api/users/createUser.php?first_name=$firstName&last_name=$lastName&user_name=$user_name&password=$password&passwordConfirm=$passwordConfirm");

        $PHPobj = json_decode($jsonobj);

        if ($PHPobj->success == 0) {
            $reg_error = $PHPobj->message;
            echo '<script>alert("' . $reg_error . '")</script>';
        } else {
            $reg_message = $PHPobj->message;
            echo '<script>alert("' . $reg_message . '")</script>';
        }
    } else {
        $reg_error = "Please fill all fields";
        echo '<script>alert("' . $reg_error . '")</script>';
    }
}

// ---- products -----

// addProductSubmit
if (isset($_POST['addProductSubmit'])) {
    // once the submit button is hit
    if ((isset($_POST['pdt_name']) && $_POST['pdt_name'] != "") || (isset($_POST['pdt_code']) && $_POST['pdt_code'] != "")) {

        // check fields have data and handle the situation
        $pdt_code = isset($_POST['pdt_code']) && $_POST['pdt_code'] != "" ? urlencode($_POST['pdt_code']) : "";
        $pdt_name = isset($_POST['pdt_name']) && $_POST['pdt_name'] != "" ? urlencode($_POST['pdt_name']) : "";
        $stock_quantity = isset($_POST['stock_quantity']) && $_POST['stock_quantity'] != "" ? urlencode($_POST['stock_quantity']) : "";
        $net_price = isset($_POST['net_price']) && $_POST['net_price'] != "" ? urlencode($_POST['net_price']) : "";
        $sales_price = isset($_POST['sales_price']) && $_POST['sales_price'] != "" ? urlencode($_POST['sales_price']) : "";
        $expiry_date = isset($_POST['expiry_date']) && $_POST['expiry_date'] != "" ? urlencode($_POST['expiry_date']) : "";
        $unit_price = isset($_POST['unit_price']) && $_POST['unit_price'] != "" ? urlencode($_POST['unit_price']) : "";
        $unit_measurement = isset($_POST['unit_measurement']) && $_POST['unit_measurement'] != "" ? urlencode($_POST['unit_measurement']) : "";
        $discount = isset($_POST['discount']) && $_POST['discount'] != "" ? urlencode($_POST['discount']) : "";
        $discount_price = isset($_POST['discount_price']) && $_POST['discount_price'] != "" ? urlencode($_POST['discount_price']) : "";
        $description = isset($_POST['description']) && $_POST['description'] != "" ? urlencode($_POST['description']) : "";

        // clear the _POST array data
        $_POST = array();

        $jsonobj =  file_get_contents("https://api.campusweekly.info/inventorySystem/api/products/createProduct.php?pdt_code=$pdt_code&pdt_name=$pdt_name&stock_quantity=$stock_quantity&net_price=$net_price&sales_price=$sales_price&expiry_date=$expiry_date&unit_price=$unit_price&unit_measurement=$unit_measurement&discount=$discount&discount_price=$discount_price&description=$description");

        // https://www.clavicar.com/campusweekly/api/inv/api/9r0DUctS/2R3at39R0DnCt.php
        // https://api.campusweekly.info/inventorySystem/api/products/createProduct.php

        $PHPobj = json_decode($jsonobj);

        if ($PHPobj->success == 0) {
            $reg_error = $PHPobj->message;
            echo '<script>alert("' . $reg_error . '")</script>';
        } else {
            $reg_message = $PHPobj->message;
            echo '<script>alert("' . $reg_message . '")</script>';
        }
    } else {
        $reg_error = "Please enter either the product name or product code";
        echo '<script>alert("' . $reg_error . '")</script>';
    }
}
