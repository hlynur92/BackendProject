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

    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'remove') {
            $cartcontroller->removeFromCart($_GET['productid']);
        } elseif ($_GET['action'] == 'change') {
            $cartcontroller->changeQuantity($_GET['productid'], $_GET['quantity'], $_GET['type']);
        }
    }
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
                <form method="post">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th scope="col">Picture</th>
                            <th scope="col"> </th>
                            <th scope="col">Product</th>
                            <th scope="col">Available</th>
                            <th scope="col" class="text-center">Quantity</th>
                            <th scope="col" class="text-right">Price</th>
                            <th scope="col" class="text-right">Remove</th>
                            <th> </th>
                        </tr>
                        </thead>
                        <?php
                        foreach ($products as $product){
                            foreach ($_SESSION['cart'] as $item){
                                if ($product['ProductID'] == $item['productid']){
                                    if ($item['specialofferid'] == null){
                                        $price = $product['Price'] * $item['quantity'];
                                        $template = "
                                        <tr>
                                            <td><img src=" . $GLOBALS['URL'] . $product['ImgPath'] . " width='80px' height='80px'> </td>
                                            <td><input type='hidden' name='productid' value=" . $item['productid'] . "></td>
                                            <td>" . $product['ProductName'] . "</td>
                                            <td>In stock</td><td><a href=" . $GLOBALS['URL'] . "presentation/cart.php?action=change&productid=" . $item['productid'] . "&quantity=1&type=subtract><i class=\"fa fa-minus\"></i></a><input class=\"form-control\" type=\"text\" value=" . $item['quantity'] . " name='quantity' /><a href=" . $GLOBALS['URL'] . "presentation/cart.php?action=change&productid=" . $item['productid'] . "&quantity=1&type=add><i class=\"fa fa-plus\"></i></a></td>
                                            <td class=\"text-right\">" . $price . "$</td>
                                            <td class=\"text-right\"><a href=" . $GLOBALS['URL'] . "presentation/cart.php?action=remove&productid=" . $item['productid'] . "><i class=\"fa fa-trash\"></i></a></td>
                                        </tr>";
                                        echo $template;
                                    }else if ($item['specialofferid'] != null){
                                        $discount = $product['Discount']/100;
                                        $discountPrice = $product['Price'] * ( 1 - $discount);
                                        $discountPrice *= $item['quantity'];
                                        $template = "
                                        <tr>
                                            <td><img src=" . $GLOBALS['URL'] . $product['ImgPath'] . " width='80px' height='80px'> </td>
                                            <td><input type='hidden' name='productid' value=" . $item['productid'] . "></td>
                                            <td>" . $product['ProductName'] . "</td>
                                            <td>In stock</td>
                                            <td><a href=" . $GLOBALS['URL'] . "presentation/cart.php?action=change&productid=" . $item['productid'] . "&quantity=1&type=subtract><i class=\"fa fa-minus\"></i></a><input class=\"form-control\" type=\"text\" value=" . $item['quantity'] . " name='quantity' /><a href=" . $GLOBALS['URL'] . "presentation/cart.php?action=change&productid=" . $item['productid'] . "&quantity=1&type=add><i class=\"fa fa-plus\"></i></a></td>
                                            <td class=\"text-right\">" . round($discountPrice, 2) . "$</td>
                                            <td class=\"text-right\"><a href=" . $GLOBALS['URL'] . "presentation/cart.php?action=remove&productid=" . $item['productid'] . "><i class=\"fa fa-trash\"></i></a></td>
                                            <td class=\"text-right\"></td>
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
                            <td class="text-right">
                                <?php
                                $subtotal = 0;
                                foreach ($products as $product){
                                    foreach($_SESSION['cart'] as $item){
                                        if ($product['ProductID'] == $item['productid']){
                                            if($item['specialofferid'] == null){
                                                $price = $product['Price'] * $item['quantity'];
                                                $subtotal += $price;
                                            }
                                            if($item['specialofferid'] != null){
                                                $discount = $product['Discount']/100;
                                                $discountPrice = $product['Price'] * ( 1 - $discount);
                                                $discountPrice *= $item['quantity'];
                                                $subtotal += round($discountPrice, 2);
                                            }
                                        }
                                    }
                                }
                                echo round($subtotal, 2) . "$";
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Shipping</td>
                            <td class="text-right">6,90$</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>Total</strong></td>
                            <td class="text-right"><strong><?php echo round($subtotal + 6.90, 2) . "$"; ?></strong></td>
                        </tr>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>
        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12  col-md-6">
                    <button onclick='window.location.href ="<?php echo $GLOBALS['URL']; ?>presentation/shop.php";' class="btn btn-block btn-light">Continue Shopping</button>
                </div>
                <div class="col-sm-12 col-md-6 text-right">
                    <button onclick='window.location.href ="<?php echo $GLOBALS['URL']; ?>presentation/checkout.php";' class="btn btn-lg btn-block btn-success text-uppercase">Checkout</button>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include '../presentation/partials/footer.php';?>

</body>

</html>