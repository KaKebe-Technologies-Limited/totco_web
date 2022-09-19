<?php

function loadUsers()
{
  // $jsonobj =  file_get_contents("https://www.clavicar.com/campusweekly/api/inv/api/uZ3Rs/l1sTALLUs3rZ.php");
  // $jsonobj =  file_get_contents("https://api.campusweekly.info/inventorySystem/api/users/loadAllUsers.php");
  $jsonobj =  file_get_contents("http://localhost/api_TotcoOffline/api/users/listAllUsers.php");

  $PHPusersObj = json_decode($jsonobj);

  // echo $PHPobj->success;
  if ($PHPusersObj->success == 0) {
    $users_error = $PHPusersObj->message;
  } else {
    $users_data = $PHPusersObj->users;
    $users_total = $PHPusersObj->totalCount;
  }
  for ($x = 0; $x < $users_total; $x++) {
    echo '
        <tr>

          <td>' . $users_data[$x]->user_credentials->user_id . '</td>
          <td>' . $users_data[$x]->firstname . '</td>
          <td>' . $users_data[$x]->username . '</td>
          <td>' . $users_data[$x]->user_credentials->user_type . '</td>
          <td>' . $users_data[$x]->user_credentials->isAdmin . '</td>
          <td>' . $users_data[$x]->phone_number . '</td>
          <td>' . $users_data[$x]->email . '</td>
          
         
          
          <td>
            
              <button title="Edit" name="updateUserSubmit" onclick="captureUserEditId(`' . $users_data[$x]->username . '`)" class="btn btn-primary btn-sm btn-rounded" ><i class="ti-pencil-alt btn-icon-prepend"></i></button>
            
          </td>
          <td>
            
              <button title="Delete" name="deleteUserSubmit" onclick="captureUserId(`' . $users_data[$x]->username . '`)" class="btn btn-danger btn-sm btn-rounded" ><i class="ti-trash btn-icon-prepend"></i></button>
            
          </td>
        </tr>

        ';
  }
}
