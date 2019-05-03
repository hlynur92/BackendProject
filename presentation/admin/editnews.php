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

<?php
$newsid = $_GET['newsid'];

$newscontroller = new NewsController();
$news = $newscontroller->getSpecificNews($newsid);

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
                    Edit News administration</div>
                <div class="card-body">
                    <form enctype="" method="post">
                        <div class="form-group mb-4 mt-4">
                            <img src="<?php echo $GLOBALS['URL'] . $news[0]['TitleImg']?>" class="img-thumbnail" width="10%" height="10%">
                        </div>
                        <div class="form-group">
                            <label for="productName"  class="font-weight-bold">Product name</label>
                            <input type="text" class="form-control" id="productName" placeholder="Product Name" value="<?php echo $news[0]['Title']?>">
                        </div>
                        <div class="form-group">
                            <label for="price" class="font-weight-bold">Creation Date</label>
                            <input type="text" class="form-control" id="creationdate" placeholder="creationdate" value="<?php echo $news[0]['CreationDate']?>">
                        </div>

                        <div class="form-group">
                            <label for="description" class="font-weight-bold">Description</label>
                            <textarea type="text" class="form-control text-dark" id="description" rows="6"><?php echo $news[0]['Content']?>
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

