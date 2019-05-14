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
<?php require  __DIR__ . "/../../business/NewsController.php"; ?>
<?php require __DIR__ . "/../../business/ImageController.php"; ?>

<?php
//$newsid = $_GET['newsid'];
$newscontroller = new NewsController();
//$news = $newscontroller->getSpecificNews($newsid);

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
                    Add News administration</div>
                <div class="card-body">
                    <form enctype="multipart/form-data" method="post">
                        <div class="form-group">
                            <label for="title"  class="font-weight-bold">Title</label>
                            <input type="text" class="form-control" name="title" id="title" placeholder="News title" value="">
                        </div>
                        <div class="form-group">
                            <label for="creationdate" class="font-weight-bold">Creation Date</label>
                            <input type="text" class="form-control" name="creationdate" id="creationdate" placeholder="Creation Date" value="">
                        </div>

                        <div class="form-group">
                            <label for="description" class="font-weight-bold">Description</label>
                            <textarea type="text" class="form-control text-dark" name="description" id="description" rows="6">
                            </textarea>
                        </div>
                        <div class="form-group">
                            <label for="fileinput" class="font-weight-bold">File input</label>
                            <input type="file" class="form-control-file" id="fileinput" name="imgfile">
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
    $imagecontroller = new ImageController();
    $uploadpath = $imagecontroller->uploadImage("news");

    if ($uploadpath != null){
        $title = $_REQUEST['title'];
        $creationdate = $_REQUEST['creationdate'];
        $description = $_REQUEST['description'];

        if ($title != null && $creationdate != null && $description != null){
            $newscontroller->createNewNews($title, $creationdate, $description, $uploadpath);
        }
    }else{
        echo "Unsuccessful Submit";
    }
}
?>
