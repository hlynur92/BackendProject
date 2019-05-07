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
$products = $instance->getAllSpecialOffers();

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
                    Special offer products administration</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th width="10%">Id</th>
                                <th width="15%">Discount in percent</th>
                                <th width="25%">Start date</th>
                                <th width="10%">End date</th>
                                <th width="10%">Edit</th>
                                <th width="10%">Remove</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            foreach ($products as $product){
                                $template = "
                            <form method='post'>
                            <tr>
                                <td name='productid'>" . $product['SpecialOfferID'] . "</td>
                           
                                <td><strong>" . $product['Discount'] . "</td>
                                <td>" . $product['StartDate'] . "</td>
                                <td>" . $product['EndDate'] . "</td>
         
                                <td><button type='button' class='btn btn-warning' onclick=\"location.href='" . $GLOBALS['URL'] . "presentation/admin/editoffer.php?offerid=" . $product['SpecialOfferID']  . "'\">Edit</button></td>
                                
                                <td><button type='button' href='#' name='removeoffer' class='btn btn-danger'>Remove</button></td>

                            </tr>
                            </form>
                            ";
                                echo $template;
                                if (isset($_POST['removeoffer'])) {

                                    $instance->deleteOffer($_POST['specialofferid']);
                                }

                            }
                            ?>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer small text-muted"></div>
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

