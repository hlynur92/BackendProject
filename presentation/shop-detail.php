
<?php include '../includes/settings.php'; ?>
<?php include 'partials/header.php';?>

<body>

<?php include 'partials/navigation.php';?>
<?php include '../business/ProductController.php' ?>
<?php include '../business/CartController.php' ?>

<?php
    $productid = $_GET['productid'];

    $prodcontroller = new ProductController();
    $cartcontroller = new CartController();

    $products = $prodcontroller->getSpecificProduct($productid);
    $product = $products[0];
    $productname = $product['ProductName'];
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
            $template = "
                    <div class=\"col-md-6 mb-4\">
                        <img src=" . $GLOBALS['URL'] . $product['ImgPath'] . " class=\"img-fluid\" alt=\"\">
                    </div>
                    <div class=\"col-md-6 mb-4\">
                        <div class=\"p-4\">
                            <div class=\"mb-3\">
                                <a href=\"\"><span class=\"badge purple mr-1\">Category 2</span></a>
                                <a href=\"\"><span class=\"badge blue mr-1\">New</span></a>
                                <a href=\"\"><span class=\"badge red mr-1\">Bestseller</span></a>
                            </div>
                            <h3>" . $product['ProductName'] . "</h3>
                            <p class=\"lead\">
                            <span class=\"mr-1\"><del>" . $product['Price'] . "$</del></span>
                            </p>
                            <p class=\"lead font-weight-bold\">Description</p>
                            <p>" . $product['Description'] . "</p>
                             <form method='post' class=\"justify-content-left\">
                                <div class=\"form-group clearfix\">
                                    <input type=\"number\" value=\"1\" aria-label=\"Search\" class=\"form-control float-left\" style=\"width: 100px\" name='quantity'>
                        
                                    <button class=\"btn btn-primary ml-4 float-right\" type=\"submit\" name='addtocart'>Add to cart
                                        <i class=\"fa fa-cart-plus fa-lg\"></i>
                                    </button>
                                </div>   
                                <div class=\"form-group clearfix\">
                                    <select class=\"form-control\" name='size' id=\"formsize\">
                                      <option>Small</option>
                                      <option>Medium</option>
                                      <option>Large</option>
                                    </select>
                                </div>
                                <div class=\"form-group clearfix\">
                                    <select class=\"form-control\" name='colour' id=\"formcolour\">
                                        <option>Yellow</option>
                                        <option>Blue</option>
                                        <option>Green</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>";
            echo $template;
            if (isset($_POST['addtocart'])) {
                if(!empty($_POST['quantity'])){
                    if ($_POST['quantity'] != 0){
                        if ($_POST['colour'] == 'Yellow' && $_POST['Size'] == 'Medium'){
                            $quantity = $_POST['quantity'];
                            $cartcontroller->addToCart($productid, null, $quantity);
                        }else{
                            $variantProduct = $prodcontroller->getVariantSelection($productname, $_POST['colour'], $_POST['size']);
                            $variantProduct = $variantProduct[0];
                            $cartcontroller->addToCart($variantProduct['ProductID'], null, $_POST['quantity']);
                        }
                    }
                }
            }
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
<?php
include '../presentation/partials/footer.php';
?>
</body>

</html>
