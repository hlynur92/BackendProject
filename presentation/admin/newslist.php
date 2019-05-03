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
$instance = new NewsController();
$news = $instance->getAllNews();

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
                    News administration</div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th width="10%">Id</th>
                                <th width="10%">Image</th>
                                <th width="15%">Title</th>
                                <th width="25%">Content</th>
                                <th width="10%">Date</th>
                                <th width="10%">Edit</th>
                                <th width="10%">Remove</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            foreach ($news as $post){
                                $template = "
                            <form method='post'>
                            <tr>
                                <td name='productid'>" . $post['NewsID'] . "</td>
                                <td style=\"max-width: 100px\"><image name=\"productimg\" class=\"bd-placeholder-img card-img-top\" max-width=\"100px\" height=\"100px\" src=" . $GLOBALS['URL'] . $post['TitleImg'] . " preserveAspectRatio=\"xMidYMid slice\" focusable=\"false\" role=\"img\" aria-label=\"Placeholder: Thumbnail\"></td>
                                <td><strong>" . $post['Title'] ."</td>
                                <td>" . substr($post['Content'],0,100) . "</td>
                                <td>" . $post['CreationDate'] . "</td>
         
                                <td><button type='button' class='btn btn-warning' onclick=\"location.href='" . $GLOBALS['URL'] . "presentation/admin/editnews.php?newsid=" . $post['NewsID']  . "'\">Edit</button></td>
                                <td><button type='button' href='#' name='removenews' class='btn btn-danger'>Remove</button></td>

                            </tr>
                            </form>
                            ";
                                echo $template;
                                if (isset($_POST['removenews'])) {

                                    $instance->deleteNews($_POST['newsid']);
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