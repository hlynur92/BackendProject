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
$companycontroller = new CompanyController();
//$company = $instance->getCompanyInfo();

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
                    <form method="post">
                        <div class="form-group">
                            <label for="companyName" class="font-weight-bold">Company name</label>
                            <input type="text" class="form-control" name="companyname" id="companyName" placeholder="Company Name" value="">
                        </div>
                        <div class="form-group">
                            <label for="phone" class="font-weight-bold">Phone no.</label>
                            <input type="text" class="form-control" name="phonenr" id="phone" placeholder="Phone no." value="">
                        </div>
                        <div class="form-group">
                            <label for="email" class="font-weight-bold">E-mail</label>
                            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="">
                        </div>
                        <div class="form-group">
                            <label for="hours" class="font-weight-bold">Opening hours</label>
                            <input type="text" class="form-control" name="openinghours" id="hours" placeholder="Opening hours" value="">
                        </div>
                        <div class="form-group">
                            <label for="street" class="font-weight-bold">Street</label>
                            <input type="text" class="form-control" name="street" id="street" placeholder="Street" value="">
                        </div>
                        <div class="form-group">
                            <label for="zip" class="font-weight-bold">Zip code</label>
                            <input type="text" class="form-control" name="zipcode" id="zip" placeholder="Zip code" value="">
                        </div>
                        <div class="form-group">
                            <label for="city" class="font-weight-bold">City</label>
                            <input type="text" class="form-control" name="city" id="city" placeholder="City" value="">
                        </div>

                        <div class="form-group">
                            <label for="country" class="font-weight-bold">Country</label>
                            <select class="custom-select d-block w-100" name="country" id="country" required="">
                                <option value="">Choose...</option>
                                <option>Denmark</option>
                                <option>Iceland</option>
                                <option>England</option>
                                <option>Germany</option>
                                <option>France</option>
                                <option>Spain</option>
                                <option>Poland</option>
                                <option>Sweden</option>
                                <option>Norway</option>
                                <option>Finland</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid country.
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="description" class="font-weight-bold">Description</label>
                            <textarea type="text" class="form-control text-dark" name="description" id="description" rows="6">
                            </textarea>
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
    $companyname = $_REQUEST['companyname'];
    $phonenr = $_REQUEST['phonenr'];
    $email = $_REQUEST['email'];
    $openinghours = $_REQUEST['openinghours'];
    $street = $_REQUEST['street'];
    $zipcode = $_REQUEST['zipcode'];
    $city = $_REQUEST['city'];
    $country = $_REQUEST['country'];
    $description = $_REQUEST['description'];

    if ($companyname != null && $phonenr != null && $email != null && $openinghours != null && $street != null && $zipcode != null && $city != null && $country != null && $description != null){
        if ($country != "Choose..."){
            if (filter_var($email, FILTER_VALIDATE_EMAIL)){
                $companycontroller->createNewCompany($companyname, $phonenr, $email, $openinghours, $street, $zipcode, $city, $country, $description);

            }
        }
    }
}
?>

