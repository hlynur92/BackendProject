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
$specialofferid = $_GET['offerid'];

$prodcontroller = new ProductController();

$specialoffer = $prodcontroller->getSpecificSpecialOffer($specialofferid);
$specialoffer = $specialoffer[0];
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
                    Edit Special offers administration</div>
                <div class="card-body">
                    <form enctype="" method="post">
                        <div class="form-group">
                            <label for="offerid"  class="font-weight-bold">Special Offer ID</label>
                            <input type="text" class="form-control" id="offerid" placeholder="Offer ID" value="<?php echo $specialoffer['SpecialOfferID']?>">
                        </div>
                        <div class="form-group">
                            <label for="discount" class="font-weight-bold">Discount percentage</label>
                            <input type="text" class="form-control" id="discount" placeholder="Discount" value="<?php echo $specialoffer['Discount']?>">
                        </div>
                        <div class="form-group date">
                            <label for="startdate" class="font-weight-bold">Start date</label>
                            <input type="text" class="form-control date" id="startdate" placeholder="Start Date" value="<?php echo $specialoffer['StartDate']?>">

                        </div>
                        <div class="form-group">
                            <label for="enddate" class="font-weight-bold">End date</label>
                            <input type="text" class="form-control" id="enddate" placeholder="End Date" value="<?php echo $specialoffer['EndDate']?>">

                        </div>

                        <button class="btn btn-primary mt-5" type="submit">Submit form</button>
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

