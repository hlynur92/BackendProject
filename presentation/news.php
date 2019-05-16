
<?php include '../includes/settings.php'; ?>
<?php include 'partials/header.php';?>

<body>

<?php include 'partials/navigation.php';?>
<?php require __DIR__ . "/../business/NewsController.php"; ?>

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
                        <div class=\"col-sm-3 mh-25 d-flex\" style=\"height:700px\">
                            <div class=\"card mb-4 shadow-sm mh-100\">
                                <img name=\"productimg\" class=\"bd-placeholder-img card-img-top h-25 d-inline-block\" width=\"100%\" height=\"100%\" src=" . $GLOBALS['URL'] . $post['TitleImg'] . " preserveAspectRatio=\"xMidYMid slice\" focusable=\"false\" role=\"img\" aria-label=\"Placeholder: Thumbnail\">          
                                <div class=\"card-body d-flex flex-column\">
                                        <h3 class=\"card-title\" name=\"productname\">
                                            <a class='text-dark' href='". $GLOBALS['URL'] . "Presentation/news-detail.php?newsid=" . $post['NewsID']  ."'>" . $post['Title'] . "</a>
                                        </h3>
                                    <p class=\"mb-2 card-text text-muted\">" . $post['CreationDate'] . "</p>
                                    <p name=\"description\" class=\"card-text mb-2\">" . substr($post['Content'],0,200) . "[...]</p>
                              
                                 </div>
                                 <div
                                 <div class=\"card-footer bg-transparent border-top-0 d-flex flex-column\">
                                  <button type=\"button\" class=\"btn btn-sm btn-success align-bottom p-2\" onclick=\"location.href='" . $GLOBALS['URL'] . "presentation/news-detail.php?newsid=" . $post['NewsID']  . "'\">Continue reading</button>

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
