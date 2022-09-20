<?php

function loadProducts()
{
    // $jsonobj =  file_get_contents("https://www.clavicar.com/campusweekly/api/inv/api/9r0DUctS/lIStaIIpr0dnctz.php");
    // $jsonobj =  file_get_contents("https://api.campusweekly.info/inventorySystem/api/products/listAllProducts.php");
    // https://totco.kakebe.com/api/api/sales_orders/createSalesOrder.php
    $jsonobj =  file_get_contents("https://totco.kakebe.com/api/api/product/listAllProducts.php");

    $PHPpdtsObj = json_decode($jsonobj);

    if ($PHPpdtsObj->success == 0) {
        $pdts_error = $PHPpdtsObj->message;
    } elseif ($PHPpdtsObj->success == 1) {
        $pdts_data = $PHPpdtsObj->products;
        // $pdts_total = $PHPpdtsObj->totalResults;

        for ($x = 0; $x < count($pdts_data); $x++) {
            echo '
            <tr>
              <td>
                  <a href="#" data-toggle="tooltip" title="Edit">
                      <button type="button" class="btn btn-primary btn-sm btn-rounded" data-toggle="modal" data-target="#edit-Product"><i class="ti-pencil-alt btn-icon-prepend"></i></button>
                  </a>
              </td>
              <td>' . $pdts_data[$x]->product_id . '</td>
              <td>' . $pdts_data[$x]->pdt_name . '</td>
              <td>' . $pdts_data[$x]->unit_price . '</td>
              <td>' . $pdts_data[$x]->createdAt . '</td>
              
              

            </tr>

            ';
        }
    } else {
        $pdts_error = "An unknown error";
    }
}
