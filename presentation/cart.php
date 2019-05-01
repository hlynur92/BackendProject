<?php include '../includes/settings.php'; ?>
<?php include 'partials/header.php';?>

<body>

<?php include 'partials/navigation.php';?>
<?php include '../business/CartController.php' ?>
<?php include '../business/ProductController.php'?>

<?php
    $productcontroller = new ProductController();
    $cartcontroller = new CartController();

    $products = $productcontroller->getCartProducts();
    var_dump($products);
    var_dump($_SESSION);
?>


<section class="jumbotron text-center">
    <div class="container">
        <h1 class="jumbotron-heading">E-COMMERCE CART</h1>
     </div>
</section>

<div class="container mb-4">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"> </th>
                            <th scope="col">Product</th>
                            <th scope="col">Available</th>
                            <th scope="col" class="text-center">Quantity</th>
                            <th scope="col" class="text-right">Price</th>
                            <th> </th>
                        </tr>
                    </thead>
                    <?php
                        foreach ($products as $product){
                            foreach ($_SESSION['cart'] as $item){
                                if (!$item['specialofferid']){
                                    if ($product['ProductID'] == $item['productid']){
                                        $template = "
                                        <tr>
                                            <td><img src=\'" . $product['ImgPath'] . "'/> </td>
                                            <td>" . $product['ProductName'] . "</td>
                                            <td>In stock</td>
                                            <td><input class=\"form-control\" type=\"text\" value=" . $item['quantity'] . " /></td>
                                            <td class=\"text-right\">" . $product['Price'] . "</td>
                                            <td class=\"text-right\"><button class=\"btn btn-sm btn-danger\"><i class=\"fa fa-trash\"></i> </button> </td>
                                        </tr>";
                                        echo $template;
                                    }
                                }else{
                                    $discount = $product['Discount']/100;
                                    $discountPrice = $product['Price'] * ( 1 - $discount);
                                    if ($product['ProductID'] == $item['productid']){
                                        $template = "
                                        <tr>
                                            <td><img src=\'" . $product['ImgPath'] . "'/> </td>
                                            <td>" . $product['ProductName'] . "</td>
                                            <td>In stock</td>
                                            <td><input class=\"form-control\" type=\"text\" value=" . $item['quantity'] . " /></td>
                                            <td class=\"text-right\">" . round($discountPrice, 2) . "</td>
                                            <td class=\"text-right\"><button class=\"btn btn-sm btn-danger\"><i class=\"fa fa-trash\"></i> </button> </td>
                                        </tr>";
                                        echo $template;
                                    }
                                }
                            }
                        }
                    ?>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Sub-Total</td>
                            <td class="text-right">255,90 €</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Shipping</td>
                            <td class="text-right">6,90 €</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>Total</strong></td>
                            <td class="text-right"><strong>346,90 €</strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12  col-md-6">
                    <button onclick="window.location.href = 'shop.php';" class="btn btn-block btn-light">Continue Shopping</button>
                </div>
                <div class="col-sm-12 col-md-6 text-right">
                    <button onclick="window.location.href = 'checkout.php';" class="btn btn-lg btn-block btn-success text-uppercase">Checkout</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include '../presentation/partials/footer.php';?>

</body>

</html>