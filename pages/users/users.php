<?php include '../loadUser.php'; ?>
<?php include 'userfunctions.php'; ?>



<!DOCTYPE html>
<html lang="en">

<?php include '../head.php'; ?>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php include '../navbar.php'; ?>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <?php include '../sidebar.php'; ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper" style="background-color:#bddcff;">
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <button type="button" class="btn btn-primary btn-icon-text btn-rounded btn-sm" data-toggle="modal" data-target="#add-Users">
                    <i class="ti-plus btn-icon-prepend"></i>Add User
                  </button>
                </div>
                <div>

                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">
                    Users
                  </p>

                  <div class=" flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <table id="example3" class="table table-hover">
                      <thead style="font-size:10px">
                        <tr>
                          <th>ID</th>
                          <th>Full Name</th>
                          <th>Username</th>
                          <th>User Type</th>
                          <th>Extra Roles</th>
                          <th>Contact Number</th>
                          <th>Email</th>
                          <th>Update</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php loadUsers();
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- <input type="text" style="display: none;"> -->
        <?php include '../modals.php'; ?>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php include '../footer.php'; ?>
        <!-- partial -->
      </div>
      <!-- <button onclick="captureUserId(id)"></button> -->
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <?php include '../scripts.php'; ?>
  <!--Sharing Script-->
  <script>
    function captureUserId(id) {
      // console.log(id);
      // alert("Delete User " + id);
      document.getElementById("UserNameDelete").value = id;
      document.getElementById('deleteAddon').innerHTML = id;
      $(document).ready(function() {
        $('#delete-User').modal('show');
      });

    }

    function captureUserEditId(id) {
      document.getElementById("UserNameUpdate").value = id;
      document.getElementById('updateAddon').innerHTML = id;
      $(document).ready(function() {
        $('#edit-Users').modal('show');
      });
    }
  </script>
</body>

</html>