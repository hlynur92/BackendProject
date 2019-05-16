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
//$specialofferid = $_GET['offerid'];

$prodcontroller = new ProductController();

//$specialoffer = $prodcontroller->getSpecificSpecialOffer($specialofferid);
//$specialoffer = $specialoffer[0];
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
                    Add Special offers administration</div>
                <div class="card-body">
                    <form enctype="" method="post">
                        <div class="form-group">
                            <label for="discount" class="font-weight-bold">Discount percentage</label>
                            <input type="text" class="form-control" name="discount" id="discount" placeholder="Discount" value="">
                        </div>
                        <div class="form-group date">
                            <label for="startdate" class="font-weight-bold">Start date (YYYY-DD-MM)</label>
                            <input type="text" class="form-control date" name="startdate" id="startdate datepicker" placeholder="Start Date" value="">

                        </div>
                        <div class="form-group">
                            <label for="enddate" class="font-weight-bold">End date (YYYY-DD-MM)</label>
                            <input type="text" class="form-control" name="enddate" id="enddate" placeholder="End Date" value="">
                        </div>

                        <button class="btn btn-primary mt-5" name="submit" type="submit">Submit form</button>
                    </form>
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
<?php
if(isset($_POST['submit'])){
    $discount = $_REQUEST['discount'];
    $startdate = $_REQUEST['startdate'];
    $enddate = $_REQUEST['enddate'];

    if ($discount != null && $startdate != null && $enddate != null){
        $prodcontroller->createNewSpecialOffer($discount, $startdate, $enddate);
    }
}
?>

