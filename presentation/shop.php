
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
$products = $instance->getAllProducts();

?>

<main role="main">

    <section class="jumbotron jumbotron-fluid text-center mb-0">
        <div class="container">
            <h1 class="jumbotron-heading">Welcome to our duck store</h1>
            <p class="lead text-muted">
                Welcome to our online duck store and meet the cutest rubber ducks. They’re all premium ducks made of high quality materials and CE approved. Discover the hand painted details and special finishing. Absolute collectors items. Take your pick. Have a nice duck!</p>
            <p>
                <a href="#" class="btn btn-primary my-2">Main call to action</a>
                <a href="#" class="btn btn-secondary my-2">Secondary action</a>
            </p>
        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row equal">
                <?php
                foreach ($products as $product){
                    $template = "
                        <div class=\"col-md-3 card-deck\">
                            <div class=\"card mb-4 shadow-sm\">
                                    <image name=\"productimg\" class=\"bd-placeholder-img card-img-top h-50 d-inline-block\" width=\"100%\" height=\"100%\" src=" . $GLOBALS['URL'] . $product['ImgPath'] . " preserveAspectRatio=\"xMidYMid slice\" focusable=\"false\" role=\"img\" aria-label=\"Placeholder: Thumbnail\">
                                    <title>Placeholder</title>
                                    <rect width=\"100%\" height=\"100%\" fill=\"#55595c\"/><text x=\"50%\" y=\"50%\" fill=\"#eceeef\" dy=\".3em\"></text>
                                    </image>
                                <div class=\"card-body bg-light text-dark h-25 d-inline-block\">
                                    <h3 name=\"productname\">" . $product['ProductName'] . "</h3>
                                    <p name=\"description\" class=\"card-text\">" . $product['Description'] . "</p>
                                    <p class=\"justify-content-between text-right\">
                                        <small name=\"price\" class=\"text-info\"><del> " . $product['Price'] . "<br><h3> </h3></small>
                                    </p>
                                </div>    
                                <div class=\"card-footer h-25\">
                                       
                                  <button type=\"button\" class=\"btn btn-sm btn-success\" onclick=\"location.href='" . $GLOBALS['URL'] . "Presentation/shop-detail.php?productid=" . $product['ProductID'] . "  '\">View more</button>
                                        
                                </div>
                            </div>
                        </div>
                    ";
                    echo $template;
                }
                ?>
            </div>
        </div>
    </div>

</main>
<?php include '../presentation/partials/footer.php';?>
</body>
</html>
