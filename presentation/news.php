
<?php include '../includes/settings.php'; ?>
<?php include 'partials/header.php';?>

<body>

<?php include 'partials/navigation.php';?>
<?php
$product_controller_path = __DIR__ . "/../business/NewsController.php";

require $product_controller_path;
?>


<?php
$instance = new NewsController();
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
            // var_dump($news);
            foreach ($news as $post){
                $template = "
                        <div class=\"card-group col-md-6\">
                            <div class=\"card mb-2\">
                                <img name=\"productimg\" class=\"card-img-top\" width=\"10%\" height=\"10%\" src=" . $GLOBALS['URL'] . $post['TitleImg'] . " preserveAspectRatio=\"xMidYMid slice\" focusable=\"false\" role=\"img\" aria-label=\"Placeholder: Thumbnail\">          
                                <div class=\"card-body d-flex flex-column align-items-start\">
                                        <h3 class=\"card-title\" name=\"productname\">
                                            <a class='text-dark' href=''>" . $post['Title'] . "</a>
                                        </h3>
                                    <p class=\"mb-1 card-text text-muted\">" . $post['CreationDate'] . "</p>
                                    <p name=\"description\" class=\"card-text mb-auto\">" . $post['Content'] . "</p>
                                        <a href=''>Continue Reading></a> 
                                        
                                        <button type=\"button\" class=\"btn btn-sm btn-success\" onclick=\"location.href='" . $GLOBALS['URL'] . "Presentation/news-detail.php?newsid=" . $news[0]  . "  '\">View more</button>
                                 </div>    
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
