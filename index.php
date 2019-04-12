
<?php include 'includes/settings.php'; ?>
<?php include 'presentation/partials/header.php';?>
<body>


<?php include 'presentation/partials/navigation.php';?>
<?php
    require __DIR__ . "/business/ProductController.php";
?>


<?php
$instance = new ProductController();
$products = $instance->getLatestSpecialOffers();

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
            <h2 class="text-center mb-5">Featured products</h2>

            <div class="row">

                <?php
                foreach ($products as $product){
                    $discount = $product['Discount']/100;
                    $discountPrice = $product['Price'] * ( 1 - $discount);
                    $template = "
                        <div class=\"col-md-3 card-group\">
                            <div class=\"card mb-4 shadow-sm\">
                                    <img name=\"productimg\" class=\"bd-placeholder-img card-img-top h-50 d-inline-block\" width=\"100%\" height=\"100%\" src=" . $GLOBALS['URL'] . $product['ImgPath'] . " preserveAspectRatio=\"xMidYMid slice\" focusable=\"false\" role=\"img\" aria-label=\"Placeholder: Thumbnail\">        
                                    </img>
                                <div class=\"card-body bg-light text-dark h-25 d-inline-block\">
                                    <h3 name=\"productname\">" . $product['ProductName'] . "</h3>
                                    <p name=\"description\" class=\"card-text\">" . $product['Description'] . "</p>
                                    <div class=\"justify-content-between text-right\">
                                        <small name=\"price\" class=\"text-info\"><del> " . $product['Price'] . " </del>Discount: " . $product['Discount'] . "% <br></small>
                                    </div>
                                </div>
                                <div class=\"card-footer\">
                                        <div class=\"btn-group\">
                                            <button type=\"button\" class=\"btn btn-sm btn-success\" onclick=\"location.href='" . $GLOBALS['URL'] . "Presentation/shop-detail-so.php?productid=" . $product['ProductID'] . "&specialofferid=" . $product['SpecialOfferID'] . "  '\">View more</button>
                                        </div>
                                        <h3 name=\"price\" class=\"text-info float-right\">" . round($discountPrice, 2) . " </h3>
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
<?php include 'presentation/partials/footer.php';?>

</body>
</html>
