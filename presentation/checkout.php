
<?php include '../includes/settings.php'; ?>
<?php include 'partials/header.php';?>

<body>

<?php include 'partials/navigation.php';?>
<?php include '../business/ProductController.php'?>
<?php
$productcontroller = new ProductController();

$products = $productcontroller->getCartProducts();
?>


<main role="main">
    <div class="container mb-5">
        <div class="py-5 text-center">
            <h2>Checkout form</h2>
            <p class="lead">Below is an example form built entirely with Bootstrap's form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
        </div>
        <div class="row">
            <div class="col-md-4 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Your cart</span>
                    <span class="badge badge-secondary badge-pill"><?php echo count($_SESSION['cart'])?></span>
                </h4>
                <ul class="list-group mb-3">
                    <?php
                    foreach ($products as $product){
                        foreach($_SESSION['cart'] as $item){
                            if ($product['ProductID'] == $item['productid']){
                                    if ($item['specialofferid'] == null){
                                        $price = $product['Price'] * $item['quantity'];
                                        $template = "
                                        <li class=\"list-group-item d-flex justify-content-between lh-condensed\">
                                            <div>
                                                <h6 class=\"my-0\">" . $product['ProductName'] . "</h6>
                                                <small class=\"text-muted\">" . $product['Description'] . "</small>
                                            </div>
                                            <span class=\"text-muted\">" . $price . "</span>
                                        </li>";
                                        echo $template;
                                    }elseif ($item['specialofferid'] != null){
                                        $discount = $product['Discount']/100;
                                        $discountPrice = $product['Price'] * ( 1 - $discount);
                                        $discountPrice *= $item['quantity'];
                                        $template = "
                                        <li class=\"list-group-item d-flex justify-content-between lh-condensed\">
                                            <div>
                                                <h6 class=\"my-0\">" . $product['ProductName'] . "</h6>
                                                <small class=\"text-muted\">" . $product['Description'] . "</small>
                                            </div>
                                            <span class=\"text-muted\">" . round($discountPrice, 2) . "</span>
                                        </li>";
                                        echo $template;
                                    }
                                }
                            }
                        }
                    ?>

                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total (USD)</span>
                        <strong><?php
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
                            echo round($subtotal, 2) . " €";
                            ?></strong>
                    </li>
                </ul>

            </div>
            <div class="col-md-8 order-md-1">
                <h4 class="mb-3">Billing address</h4>
                <form method="post" class="needs-validation" novalidate="">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="firstName">First name</label>
                            <input type="text" class="form-control" name="firstname" id="firstName" placeholder="" value="" required="">
                            <div class="invalid-feedback">
                                Valid first name is required.
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName">Last name</label>
                            <input type="text" class="form-control" name="lastname" id="lastName" placeholder="" value="" required="">
                            <div class="invalid-feedback">
                                Valid last name is required.
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="you@example.com">
                        <div class="invalid-feedback">
                            Please enter a valid email address for shipping updates.
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" name="address" id="address" placeholder="1234 Main St" required="">
                        <div class="invalid-feedback">
                            Please enter your shipping address.
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-5 mb-3">
                            <label for="country">Country</label>
                            <select class="custom-select d-block w-100" id="country" required="">
                                <option value="">Choose...</option>
                                <option>United States</option>
                            </select>
                            <div class="invalid-feedback">
                                Please select a valid country.
                            </div>
                        </div>

                        <div class="col-md-3 mb-3">
                            <label for="zip">Zip</label>
                            <input type="text" class="form-control" id="zip" placeholder="" required="">
                            <div class="invalid-feedback">
                                Zip code required.
                            </div>
                        </div>
                    </div>

                    <h4 class="mb-3">Payment</h4>

                    <div class="d-block my-3">
                        <div class="custom-control custom-radio">
                            <input id="credit" name="paymentMethod" type="radio" class="custom-control-input" checked="" required="">
                            <label class="custom-control-label" for="credit">Credit card</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input id="debit" name="paymentMethod" type="radio" class="custom-control-input" required="">
                            <label class="custom-control-label" for="debit">Debit card</label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="cc-name">Name on card</label>
                            <input type="text" class="form-control" id="cc-name" placeholder="" required="">
                            <small class="text-muted">Full name as displayed on card</small>
                            <div class="invalid-feedback">
                                Name on card is required
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="cc-number">Credit card number</label>
                            <input type="text" class="form-control" id="cc-number" placeholder="" required="">
                            <div class="invalid-feedback">
                                Credit card number is required
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <label for="cc-expiration">Expiration</label>
                            <input type="text" class="form-control" id="cc-expiration" placeholder="" required="">
                            <div class="invalid-feedback">
                                Expiration date required
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <label for="cc-expiration">CVV</label>
                            <input type="text" class="form-control" id="cc-cvv" placeholder="" required="">
                            <div class="invalid-feedback">
                                Security code required
                            </div>
                        </div>
                    </div>
                    <hr class="mb-4">
                    <button onclick="window.location.href = 'payment.php';" class="btn btn-primary btn-lg btn-block" type="submit" name="checkout">Continue to checkout</button>
                </form>
            </div>
        </div>
    </div>
</main>
<?php include '../presentation/partials/footer.php';?>

</body>

</html>
