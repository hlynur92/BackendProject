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


//$prodcontroller = new ProductController();

//$products = $prodcontroller->addProduct();
//$product = $products[0];
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
                        Add Product administration</div>
                    <div class="card-body">
                        <form enctype="multipart/form-data" method="post" action="addproduct.php">

                            <div class="form-group">
                                <label for="productName"  class="font-weight-bold">Product name</label>
                                <input type="text" class="form-control" id="productName" placeholder="Product Name" value="">
                            </div>
                            <div class="form-group">
                                <label for="price" class="font-weight-bold">Price</label>
                                <input type="text" class="form-control" id="price" placeholder="Price" value="">
                            </div>
                            <div class="form-group">
                                <label for="formcolour" class="font-weight-bold">Select colour</label>
                                <select class="form-control" id="formcolour">
                                    <option>Blue</option>
                                    <option>Green</option>
                                    <option>Yellow</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="formsize" class="font-weight-bold">Select size</label>
                                <select class="form-control" id="formsize">
                                    <option>Small</option>
                                    <option>Medium</option>
                                    <option>Large</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="description" class="font-weight-bold">Description</label>
                                <textarea type="text" class="form-control text-dark" id="description" rows="3">
                            </textarea>
                            </div>
                            <div class="form-group">
                                <label for="fileinput" class="font-weight-bold">File input</label>
                                <input type="file" class="form-control-file" id="fileinput" name="imgfile">
                            </div>
                            <button name="submit_image" class="btn btn-primary mt-5" type="submit" value="Upload">Submit form</button>
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
if (isset($_POST['submit'])){
    if(($_FILES['imgfile']['type']=="image/jpeg" ||
            $_FILES['imgfile']['type']=="image/pjpeg" ||
            $_FILES['imgfile']['type']=="image/gif" ||
            $_FILES['imgfile']['type']=="image/jpg")&& (
            $_FILES['imgfile']['size']< 3000000
        )){
        if ($_FILES['imgfile']['error']>0){
            echo "Error: ". $_FILES['imgfile']['error'];
        }else{
            echo "Name: ".$_FILES['imgfile']['name']."<br>";
            echo "Type: ".$_FILES['imgfile']['type']."<br>";
            echo "Size: ".($_FILES['imgfile']['size']/1024)."<br>";
            echo "Tmp_name: ".$_FILES['imgfile']['tmp_name']."<br>";

            if (file_exists("upload/".$_FILES['imgfile']['name'])){
                echo "can't upload: ". $_FILES['imgfile']['name']. " Exists";
            }else{
                move_uploaded_file($_FILES['imgfile']['tmp_name'],
                    "upload/".$_FILES['imgfile']['name']);
                echo "stored in: upload/".$_FILES['imgfile']['name'];

                $sql = "INSERT INTO `Product` (`ImgPath`) VALUES 
                        (NULL, '". $_FILES['name']."')";
                echo $sql;
                mysqli_query($conn,$sql);

            }
        }
    }
}
