<?php

function loadProducts()
{
    // $jsonobj =  file_get_contents("http://localhost/api_TotcoOffline/api/product/listAllProducts.php");
    $jsonobj =  file_get_contents("http://localhost/api_TotcoOffline/api/sales_orders/listAllSalesOrders.php");

    $PHPsalesObj = json_decode($jsonobj);

    if ($PHPsalesObj->success == 0) {
        $pdts_error = $PHPsalesObj->message;
    } elseif ($PHPsalesObj->success == 1) {
        $sales_orders = $PHPsalesObj->orders;
        // $pdts_total = $PHPpdtsObj->totalCount;

        for ($x = 0; $x < count($sales_orders); $x++) {

            echo '
            <tr class="shop-item">
                <td>
                    <img class="shop-item-image" src="Images/Shirt.png">
                </td>
                <td class="shop-item-id">
                    <span>' . $sales_orders[$x]->product_id . '</span>
                </td>
                <td class="shop-item-title">
                    <span>' . $sales_orders[$x]->pdt_name . '</span>
                </td>
                <td class="shop-item-details">
                    <span class="shop-item-price">Shs. ' . $sales_orders[$x]->quantity . '</span>
                </td>
                <td>
                    <button class="btn btn-primary shop-item-button" type="button">ADD TO CART</button>
                </td>
            </tr>
            
            
            ';
        }
    } else {
        $pdts_error = "An unknown error";
    }
}


// create / add new order
if (isset($_POST['createOrderSubmit'])) {
    // once the submit button is hit
    if (isset($_POST['product']) && $_POST['product'] != "" && isset($_POST['quantity']) && $_POST['quantity'] != "") {

        function clean_input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        if ($username = clean_input($user_data->username)) {
            $productArray = $_POST['product'];
            $quantityArray = $_POST['quantity'];
            $_POST = array();
            $pdtQntyArray = array();

            if (count($productArray) ===  count($quantityArray)) {

                for ($i = 0; $i < count($productArray); $i++) {
                    $rowInNewArray['product_id'] = $productArray[$i];
                    $rowInNewArray['quantity'] = $quantityArray[$i];

                    array_push($pdtQntyArray, $rowInNewArray);
                }
                $response['username'] = $username;
                $response['totalCount'] = count($pdtQntyArray);
                $response['order_data'] = $pdtQntyArray;
                $JsonEconded = json_encode($response);

                // https://www.clavicar.com/campusweekly/api/inv/api/0rD3Rz/cR3ate0Rd3r.php
                // https://api.campusweekly.info/inventorySystem/api/orders/createOrder.php

                if ($jsonobj =  file_get_contents("https://api.campusweekly.info/inventorySystem/api/orders/createOrder.php?raw_data=$JsonEconded")) {

                    if ($PHPobj = json_decode($jsonobj)) {
                        if ($PHPobj->success == 0) {
                            $order_error = $PHPobj->message;
                            echo '<script>alert("' . $order_error . '")</script>';
                        } elseif ($PHPobj->success == 1) {
                            $order_message = $PHPobj->message;
                            echo '<script>alert("' . $order_message . '")</script>';
                        } else {
                            $order_message = "Unknown Error!";
                            echo '<script>alert("' . $order_message . '")</script>';
                        }
                    } else {
                        $order_error = "Internal Error";
                        echo '<script>alert("' . $order_error . '")</script>';
                    }
                } else {
                    $order_error = "Error receiving response";
                    echo '<script>alert("' . $order_error . '")</script>';
                }
            } else {
                $order_error = "Your order seems to have had an error. please try again.";
                echo '<script>alert("' . $order_error . '")</script>';
            }
        } else {
            $order_error = "Username error";
            echo '<script>alert("' . $order_error . '")</script>';
        }
    } else {
        $order_error = "Empty Cart";
        echo '<script>alert("' . $order_error . '")</script>';
    }
}
