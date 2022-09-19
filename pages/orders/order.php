<?php include '../loadNonAdmin.php'; ?>
<?php include 'orderFunctions.php'; ?>

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
                            <?php
                            if (isset($_SESSION['admin_error']) && $_SESSION['admin_error'] !== "") {
                                echo '<span style="color: red;">' . $_SESSION['admin_error'] . '</span>';
                                $_SESSION['admin_error'] = "";
                            }
                            ?>
                        </div>
                    </div>
                    <div class="row">

                        <!-- Shopping Cart Table -->
                   
                        <!-- Products Table -->
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-title text-md-center text-xl-left">Products Table</p>
                                    <div class=" flex-wrap justify-content-between justify-content-md-center justify-content-xl-between align-items-center">
                                        <table id='example3' class="table table-hover">
                                            <thead style="font-size:10px">
                                                <tr>
                                                    <th></th>
                                                    <th>ID</th>
                                                    <th>Item</th>
                                                    <th>Price</th>
                                                    <th></th>

                                                </tr>
                                            </thead>
                                            <tbody class="shop-items">
                                                <?php
                                                loadProducts();
                                                ?>
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
    <?php include 'orderScript.php'; ?>

</body>

</html>