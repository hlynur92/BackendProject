<?php
/**
 * Created by PhpStorm.
 * User: lund
 * Date: 04/04/2019
 * Time: 11.04
 */

?>

<?php include '../../includes/settings.php'; ?>
<?php include '../partials/header-admin.php';?>
<?php

$product_controller_path = __DIR__ . "../../business/ProductController.php";

require $product_controller_path;
?>


<?php
$instance = new ProductController();
$products = $instance->getAllProducts();

?>

<body id="page-top">

<?php include '../partials/navigation-admin.php';?>


<div id="wrapper">

    <!-- Sidebar include -->

    <?php include '../partials/sidebar-admin.php';?>

    <div id="content-wrapper">

        <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="#">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Overview</li>
            </ol>


            <!-- DataTables Example -->
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fa fa-table"></i>
                    Product administration</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Decription</th>
                                <th>Price</th>
                                <th>Edit</th>
                                <th>Remove</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Decription</th>
                                <th>Price</th>
                                <th>Edit</th>
                                <th>Remove</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            <tr>
                                <td>001</td>
                                <td>Image here</td>
                                <td>Title here</td>
                                <td>Description here</td>
                                <td>800 DKK</td>
                                <td><a href="#" class="btn btn-primary">Edit</a></td>
                                <td><a href="#" class="btn btn-primary">Remove</a></td>
                            </tr>
                            <tr>
                                <td>001</td>
                                <td>Image here</td>
                                <td>Title here</td>
                                <td>Description here</td>
                                <td>800 DKK</td>
                                <td><a href="#" class="btn btn-primary">Edit</a></td>
                                <td><a href="#" class="btn btn-primary">Remove</a></td>
                            </tr>
                            <tr>
                                <td>001</td>
                                <td>Image here</td>
                                <td>Title here</td>
                                <td>Description here</td>
                                <td>800 DKK</td>
                                <td><a href="#" class="btn btn-primary">Edit</a></td>
                                <td><a href="#" class="btn btn-primary">Remove</a></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
            </div>

        </div>
        <!-- /.container-fluid -->

        <!-- Sticky Footer -->
        <?php include '../partials/footer-admin.php';?>

    </div>
    <!-- /.content-wrapper -->

</div>
<!-- /#wrapper -->


<?php include '../partials/logout-admin.php';?>


</body>

</html>

