
<?php include 'includes/settings.php'; ?>
<?php include 'presentation/partials/header.php';?>
<body>


<?php include 'presentation/partials/navigation.php';?>
<?php

    $product_controller_path = __DIR__ . "/business/ProductController.php";

    //echo "Path: $product_controller_path <br>";

    require $product_controller_path;
?>


<?php
$instance = new ProductController();
$products = $instance->GetProducts();
//var_dump($products);

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

            <div class="row">

                <?php
                    foreach ($products as $product){
                        echo $product;
                    }
                ?>

            </div>
        </div>
    </div>

</main>
<?php include 'presentation/partials/footer.php';?>

</html>
</body>