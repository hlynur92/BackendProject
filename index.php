<?php include 'includes/settings.php'; ?>
<?php include 'presentation/partials/header.php';?>
<body>

<?php
    include 'presentation/partials/navigation.php';
    require __DIR__ . "/business/ProductController.php";
    require __DIR__ . "/business/NewsController.php";
    require __DIR__ . "/business/CompanyController.php";

    include 'business/ProductController.php';

?>

<?php
$instance = new ProductController();
$products = $instance->getLatestSpecialOffers();



$instance = new NewsController();
$news = $instance->getAllNews();

$instance = new CompanyController();
$company = $instance->getCompanyInfo();

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
        <div class="container border-1">
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
                                            <button type=\"button\" class=\"btn btn-sm btn-success\" onclick=\"location.href='" . $GLOBALS['URL'] . "presentation/shop-detail-so.php?productid=" . $product['ProductID'] . "&specialofferid=" . $product['SpecialOfferID'] . "  '\">View more</button>
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
            <h2 class="text-center m-5">Latest News from DuckWorld</h2>
            <div class="row equal">

                <?php
                // var_dump($news);
                foreach ($news as $post){

                    $template = "
                        <div class=\"card-group col-md-3\">
                            <div class=\"card mb-2 d-flex flex-column d-inline-block h-100\">
                                <img name=\"productimg\" class=\"bd-placeholder-img card-img-top h-25 d-inline-block\" width=\"10%\" height=\"10%\" src=" . $GLOBALS['URL'] . $post['TitleImg'] . " preserveAspectRatio=\"xMidYMid slice\" focusable=\"false\" role=\"img\" aria-label=\"Placeholder: Thumbnail\">          
                                <div class=\"card-body d-flex flex-column\">
                                        <h3 class=\"card-title\" name=\"productname\">
                                            <a class='text-dark' href='". $GLOBALS['URL'] . "Presentation/news-detail.php?newsid=" . $post['NewsID']  ."'>" . $post['Title'] . "</a>
                                        </h3>
                                    <p class=\"mb-2 card-text text-muted\">" . $post['CreationDate'] . "</p>
                                    <p name=\"description\" class=\"card-text mb-2\">" . substr($post['Content'],0,100) . "[...]</p>
                              
                                 </div>
                                 <div
                                 <div class=\"card-footer bg-transparent border-top-0 d-flex flex-column\">
                                  <button type=\"button\" class=\"btn btn-sm btn-success align-bottom p-2\" onclick=\"location.href='" . $GLOBALS['URL'] . "Presentation/news-detail.php?newsid=" . $post['NewsID']  . "'\">Continue reading</button>

                                 </div>   
                              </div>
                        </div>
                    ";
                    echo $template;
                }
                ?>
            </div>

            <div class="row border-0 bg-white border border-dark p-5 mt-5">

                <div class="col-md-6">
                    <p>
                        <rect width="100%" height="100%" fill="#777">
                            <img class="bd-placeholder-img rounded-circle" width="400" height="400" src="includes/images/about-us-web.jpg">
                        </rect>
                    </p>

                </div>
                <div class="col-md-6">
                    <h2 class="text-left pb-5">About us</h2>
                    <h4> <?php echo $company[0]['Title']?></h4>
                    <p class="mr-4"><?php echo $company[0]['Content'] ?></p>
                    <p>Opening Hours: <?php echo $company[0]['OpeningHours'] ?></p>
                    <h5 class="mt-2">Contact Information</h5>
                    <p>Email: <?php echo $company[0]['Email'] ?></p>
                    <p>PhoneNr: <?php echo $company[0]['PhoneNr'] ?></p>
                    <h5 class="mt-2">Address</h5>
                    <p>Street: <?php echo $company[0]['Street'] ?></p>
                    <p>City: <?php echo $company[0]['City'] ?></p>
                    <p>ZipCode: <?php echo $company[0]['ZipCode'] ?></p>
                </div>
            </div>
        </div>
    </div>

</main>
<?php include 'presentation/partials/footer.php';?>

</body>
</html>
