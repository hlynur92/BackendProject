
<?php include '../includes/settings.php'; ?>
<?php include 'partials/header.php';?>

<body>

<?php include 'partials/navigation.php';?>

<?php
    require __DIR__ . "../../business/ProductController.php";
?>
<?php
    $productid = $_GET['productid'];
    $specialofferid = $_GET['specialofferid'];

    $prodcontroller = new ProductController();
    $products = $prodcontroller->getSpecificProduct($productid, $specialofferid);
    $product = $products[0];
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

        <div class="container dark-grey-text mt-5">

            <div class="row wow fadeIn">

                <?php

                $discount = $product['Discount']/100;
                $discountPrice = $product['Price'] * ( 1 - $discount);

                $template = "
                    <div class=\"col-md-6 mb-4\">
                        <img src=" . $GLOBALS['URL'] . $product['ImgPath'] . " class=\"img-fluid\" alt=\"\">
                    </div>
                    <div class=\"col-md-6 mb-4\">

                        <div class=\"p-4\">

                            <div class=\"mb-3\">
                                <a href=\"\">
                                    <span class=\"badge purple mr-1\">Category 2</span>
                                </a>
                                <a href=\"\">
                                    <span class=\"badge blue mr-1\">New</span>
                                </a>
                                <a href=\"\">
                                    <span class=\"badge red mr-1\">Bestseller</span>
                                </a>
                            </div>

                            <p class=\"lead\">
                            <span class=\"mr-1\">
                                <del>" . $product['Price'] . "$</del>
                            </span>
                            <span>Discount: " . $product['Discount'] . "% " . round($discountPrice, 2) . "$</span>
                            </p>
                            <p class=\"lead font-weight-bold\">Description</p>
                            <p>" . $product['Description'] . "</p>
                            <form class=\"d-flex justify-content-left\">
                                <input type=\"number\" value=\"1\" aria-label=\"Search\" class=\"form-control\" style=\"width: 100px\">
                                <button class=\"btn btn-primary ml-4\" type=\"submit\">Add to cart
                                    <i class=\"fa fa-cart-plus fa-lg\"></i>
                                </button>
                            </form>
                        </div>
                    </div>";
                echo $template;
                ?>

            </div>

            <hr>

            <div class="row d-flex justify-content-center wow fadeIn">

                <div class="col-md-6 text-center">

                    <h4 class="my-4 h4">Related products</h4>

                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus suscipit modi sapiente illo soluta odit
                        voluptates,
                        quibusdam officia. Neque quibusdam quas a quis porro? Molestias illo neque eum in laborum.</p>

                </div>

            </div>
            <div class="row wow fadeIn">

                <div class="col-lg-4 col-md-12 mb-4">

                    <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/11.jpg" class="img-fluid" alt="">

                </div>
                <div class="col-lg-4 col-md-6 mb-4">

                    <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/12.jpg" class="img-fluid" alt="">

                </div>
                <div class="col-lg-4 col-md-6 mb-4">

                    <img src="https://mdbootstrap.com/img/Photos/Horizontal/E-commerce/Products/13.jpg" class="img-fluid" alt="">

                </div>

            </div>

        </div>

</main>
<?php include '../presentation/partials/footer.php';?>
</body>

</html>
