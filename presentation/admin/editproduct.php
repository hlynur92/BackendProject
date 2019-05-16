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
<?php require __DIR__ . "/../../business/ImageController.php"; ?>

<?php
$productid = $_GET['productid'];

$prodcontroller = new ProductController();

$products = $prodcontroller->getSpecificProduct($productid);
$product = $products[0];
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
                    <form enctype="multipart/form-data" method="post">
                        <div class="form-group mb-4 mt-4">
                            <img src="<?php echo $GLOBALS['URL'] . $product['ImgPath']?>" class="img-thumbnail" width="10%" height="10%">
                        </div>
                        <div class="form-group">
                            <label for="productName"  class="font-weight-bold">Product name</label>
                            <input type="text" class="form-control" name="productname" id="productName" placeholder="Product Name" value="<?php echo $product['ProductName']?>">
                        </div>
                        <div class="form-group">
                            <label for="price" class="font-weight-bold">Price</label>
                            <input type="text" class="form-control" name="price" id="price" placeholder="Price" value="<?php echo $product['Price']?>">
                        </div>
                        <div class="form-group">
                            <label for="formcolour" class="font-weight-bold">Select colour</label>
                            <select class="form-control" name="colour" id="formcolour">
                                <option>Choose Colour</option>
                                <option <?php if($product['Colour'] == 'Blue'){echo("selected");}?>>Blue</option>
                                <option <?php if($product['Colour'] == 'Green'){echo("selected");}?>>Green</option>
                                <option <?php if($product['Colour'] == 'Yellow'){echo("selected");}?>>Yellow</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="formsize" class="font-weight-bold">Select size</label>
                            <select class="form-control" name="size" id="formsize">
                                <option>Choose Size</option>
                                <option <?php if($product['Size'] == 'Small'){echo("selected");}?>>Small</option>
                                <option <?php if($product['Size'] == 'Medium'){echo("selected");}?>>Medium</option>
                                <option <?php if($product['Size'] == 'Large'){echo("selected");}?>>Large</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description" class="font-weight-bold">Description</label>
                            <textarea type="text" class="form-control text-dark" name="description" id="description" rows="3"><?php echo $product['Description']?>
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="fileinput" class="font-weight-bold">File input</label>
                            <input type="file" class="form-control-file" name="imgfile" id="fileinput">
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
if(isset($_POST['submit'])) {
    $imagecontroller = new ImageController();
    $uploadpath = $imagecontroller->uploadImage("product");

    $productid = $_GET['productid'];
    $productname = $_REQUEST['productname'];
    $price = $_REQUEST['price'];
    $colour = $_REQUEST['colour'];
    $size = $_REQUEST['size'];
    $description = $_REQUEST['description'];

    if ($productid != null && $productname != null && $price != null && $colour != null && $size != null && $description != null) {
        $prodcontroller->editProduct($productid, $productname, $price, $colour, $size, $description, $uploadpath);
    } else {
        echo "Unsuccessful Entry";
    }
}
