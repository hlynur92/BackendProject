
<?php include '../includes/settings.php'; ?>
<?php include 'partials/header.php';?>

<body>

<?php include 'partials/navigation.php';?>

<?php
require __DIR__ . "../../business/NewsController.php";
?>
<?php
$newsid = $_GET['newsid'];

$newscontroller = new NewsController();
$news = $newscontroller->getSpecificNews($newsid);
$news = $news[0];
?>


<main role="main">
    <section class="jumbotron jumbotron-fluid text-center mb-lg-5 bg-white">
        <div class="container-fluid">
            <h1 class="text-uppercase mb-0"><?php echo $news['Title'];  ?></h1>
        </div>
    </section>

    <div class="container mb-5">
        <div class="blog-post">
            <h2 class="blog-post-title"></h2>
            <p class="text-muted text-right">Date: <?php echo $news['CreationDate'];  ?></p>

            <div class="row">
                <div class="col-6">
                    <img src="<?php echo $GLOBALS['URL'] . $news['TitleImg'] ?>" class="w-100 rounded float-left">
                </div>
                <div class="col-6">
                    <p><?php echo $news['Content'];  ?></p>
                </div>
            </div>
        </div>
    </div>

</main>
<?php include '../presentation/partials/footer.php';?>

</body>

</html>
