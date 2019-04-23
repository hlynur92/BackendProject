
<?php include '../includes/settings.php'; ?>
<?php include 'partials/header.php';?>

<body>

<?php include 'partials/navigation.php';?>
<?php
$product_controller_path = __DIR__ . "/../business/ProductController.php";

require $product_controller_path;
?>


<?php
$instance = new ProductController();
$news = $instance->getAllNews();

?>


<main role="main">

    <section class="jumbotron jumbotron-fluid text-center mb-lg-5 bg-light">
        <div class="container">
            <h1 class="jumbotron-heading">News</h1>
            <p class="lead text-muted">
                Get the latest news from DuckWorld and keep up to date. </p>
        </div>
    </section>

    <div class="container mb-5">
        <div class="row equal">
            <?php
            foreach ($news as $post){
                $template = "
                        <div class=\"col-md-6 card-group\">
                            <div class=\"card flex-md-row mb-4 box-shadow h-md-250\">
                                    
                                <div class=\"card-body d-flex flex-column align-items-start\">
                                    <h3 name=\"productname\">
                                        <a class='text-dark' href=''>" . $post['Title'] . "</a>
                                    </h3>
                                    <div class=\"mb-1 text-muted\">" . $post['CreationDate'] . "</div>
                                    <p name=\"description\" class=\"card-text mb-auto\">" . $post['Content'] . "</p>
                                    <a href=''>Continue Reading></a> 
                                </div>    
                                    <img name=\"productimg\" class=\"card-img-right flex-auto d-none d-md-block\" width=\"100%\" height=\"100%\" src=" . $GLOBALS['URL'] . $post['ImgPath'] . " preserveAspectRatio=\"xMidYMid slice\" focusable=\"false\" role=\"img\" aria-label=\"Placeholder: Thumbnail\">
                            </div>
                        </div>
                    ";
                echo $template;
            }
            ?>
        </div>
    </div>

</main>
<?php include '../presentation/partials/footer.php';?>

</body>
</html>
