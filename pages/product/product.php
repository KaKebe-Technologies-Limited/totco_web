<?php include '../loadUser.php'; ?>
<?php include 'productFunctions.php'; ?>

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
                  <button type="button" class="btn btn-primary btn-icon-text btn-rounded btn-sm" data-toggle="modal" data-target="#add-Product">
                    <i class="ti-plus btn-icon-prepend"></i>Add Product
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
                  <p class="card-title text-md-center text-xl-left">Product</p>
                  <div class=" flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <table id="example3" class="table table-hover">
                      <thead style="font-size:10px">
                        <tr>
                          <th></th>
                          <th>Pdt Code</th>
                          <th>Pdt Name</th>
                          <!-- <th>Stocks Quantity</th> -->
                          <!-- <th>Net Price</th> -->
                          <!-- <th>Sales Price</th> -->
                          <!-- <th>Expiry Date</th> -->
                          <th>Unit Price</th>
                          <!-- <th>Unit Measurement</th> -->
                          <th>Date Recorded</th>
                          <!-- <th>Discount</th> -->
                          <!-- <th>Discount Price</th> -->
                          <!-- <th>Description</th> -->
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        loadProducts();
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <p class="card-title text-md-center text-xl-left">Expiring Items</p>
                  <div class=" flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                    <table class="table table-hover">
                      <thead style="font-size:10px">
                        <tr>
                          <th>Product Code</th>
                          <th>Product Name</th>
                          <th>Inventory Count</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>

                          <td>Data</td>
                          <td>Data</td>
                          <td>Data</td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php include '../modals.php'; ?>
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <?php include '../footer.php'; ?>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <?php include '../scripts.php'; ?>
</body>

</html>