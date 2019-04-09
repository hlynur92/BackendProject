<header>
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <img src="<?php echo $GLOBALS['URL']; ?>includes/images/duckworld-logo-white.png" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarsExample03">
            <ul class="navbar-nav justify-content-end">
                <li class="nav-item active">
                    <a class="nav-link" href="<?php echo $GLOBALS['URL']; ?>index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item ml-3">
                    <a class="nav-link" href="<?php echo $GLOBALS['URL']; ?>presentation/shop.php">Shop</a>
                </li>
                <li class="nav-item ml-3">
                    <a class="nav-link" href="<?php echo $GLOBALS['URL']; ?>presentation/aboutus.php">About us</a>
                </li>
                <li class="nav-item ml-3">
                    <a class="nav-link" href="<?php echo $GLOBALS['URL']; ?>presentation/news.php">News</a>
                </li>
                <li class="nav-item ml-3">
                    <a class="nav-link" href="<?php echo $GLOBALS['URL']; ?>presentation/admin/index.php">Log in</a>
                </li>
                <li class="nav-item dropdown ml-5">
                    <button onclick="window.location.href = 'cart.php';" class="btn btn-secondary dropdown bg-info" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Cart <i class="fa fa-shopping-cart fa-lg"></i>
                    </button>

                    <div class="dropdown-menu" aria-labelledby="dropdown04">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
</header>