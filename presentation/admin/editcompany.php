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
<?php require  __DIR__ . "/../../business/CompanyController.php"; ?>

<?php
$instance = new CompanyController();
$company = $instance->getCompanyInfo();

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
                    Edit Company administration</div>
                <div class="card-body">
                    <form enctype="" method="post">
                        <div class="form-group">
                            <label for="companyName" class="font-weight-bold">Company name</label>
                            <input type="text" class="form-control" id="companyName" placeholder="Company Name" value="<?php echo $company[0]['Title']?>">
                        </div>
                        <div class="form-group">
                            <label for="phone" class="font-weight-bold">Phone no.</label>
                            <input type="text" class="form-control" id="phone" placeholder="phone" value="<?php echo $company[0]['PhoneNr']?>">
                        </div>
                        <div class="form-group">
                            <label for="email" class="font-weight-bold">E-mail</label>
                            <input type="text" class="form-control" id="email" placeholder="email" value="<?php echo $company[0]['Email']?>">
                        </div>
                        <div class="form-group">
                            <label for="hours" class="font-weight-bold">Opening hours</label>
                            <input type="text" class="form-control" id="hours" placeholder="hours" value="<?php echo $company[0]['OpeningHours']?>">
                        </div>
                        <div class="form-group">
                            <label for="street" class="font-weight-bold">Street</label>
                            <input type="text" class="form-control" id="street" placeholder="street" value="<?php echo $company[0]['Street']?>">
                        </div>
                        <div class="form-group">
                            <label for="zip" class="font-weight-bold">Zip code</label>
                            <input type="text" class="form-control" id="zip" placeholder="zip" value="<?php echo $company[0]['ZipCode']?>">
                        </div>
                        <div class="form-group">
                            <label for="city" class="font-weight-bold">City</label>
                            <input type="text" class="form-control" id="city" placeholder="city" value="<?php echo $company[0]['City']?>">
                        </div>

                        <div class="form-group">
                            <label for="description" class="font-weight-bold">Description</label>
                            <textarea type="text" class="form-control text-dark" id="description" rows="6"><?php echo $company[0]['Content']?>
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="fileinput" class="font-weight-bold">File input</label>
                            <input type="file" class="form-control-file" id="fileinput">
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
