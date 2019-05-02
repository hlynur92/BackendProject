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
$products = $instance->getAllProductVariations();

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
                    Edit Product administration</div>
                <div class="card-body">
                    <form enctype="" method="post">
                        <div class="form-group">
                            <label for="productImage">Product Image</label>
                            <img src="<?php echo $GLOBALS['URL'] . $products[0]['ImgPath']?>">
                            <input type="text" class="form-control" id="productImage" placeholder="Image">
                        </div>
                        <div class="form-group">
                            <label for="productName">Product name</label>
                            <input type="text" class="form-control" id="productName" placeholder="Product Name">
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="text" class="form-control" id="price" placeholder="Price">
                        </div>
                        <div class="form-group">
                            <label for="formcolour">Select colour</label>
                            <select class="form-control" id="formcolour">
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="formsize">Select size</label>
                            <select class="form-control" id="formsize">
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea type="text" class="form-control" id="description" placeholder="Description" rows="3">
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="fileinput">File input</label>
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

