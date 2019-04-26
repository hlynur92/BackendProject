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
<?php require  __DIR__ . "/../../business/ProductController.php"; ?>

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
                                <th width="10%">Id</th>
                                <th width="10%">Image</th>
                                <th width="15%">Product name</th>
                                <th width="25%">Description</th>
                                <th width="10%">Price</th>
                                <th width="10%">Edit Image</th>
                                <th width="10%">Edit</th>
                                <th width="10%">Remove</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                                foreach ($products as $product){
                                    $template = "
                            <tr>
                                <td>" . $product['ProductID'] . "</td>
                                <td style=\"max-width: 100px\"><image name=\"productimg\" class=\"bd-placeholder-img card-img-top\" max-width=\"100px\" height=\"100px\" src=" . $GLOBALS['URL'] . $product['ImgPath'] . " preserveAspectRatio=\"xMidYMid slice\" focusable=\"false\" role=\"img\" aria-label=\"Placeholder: Thumbnail\"></td>
                                <td><strong>" . $product['ProductName'] . "</td>
                                <td>" . $product['Description'] . "</td>
                                <td>" . $product['Price'] . "</td>
                                <td><a href='#'>Edit Image</a></td>
                                <td><a href='#'>Edit</a></td>
                                <td><a href='#'>Remove</a></td>

                            </tr>
                            ";
                            echo $template;
                            }
                            ?>

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

