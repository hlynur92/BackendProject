<?php
/**
 * Created by PhpStorm.
 * User: lund
 * Date: 04/04/2019
 * Time: 12.14
 */
?>

<!-- Sidebar -->
<ul class="sidebar navbar-nav">
    <li class="nav-item active">
        <a class="nav-link" href="<?php echo $GLOBALS['URL']; ?>presentation/admin/dashboard.php">
            <i class="fa fa-tachometer" aria-hidden="true"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-shopping-cart"></i>
            <span>Products</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="dashboard.php">Product list</a>
            <a class="dropdown-item" href="addproduct.php">Add Product</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-newspaper-o"></i>
            <span>News</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="newslist.php">News list</a>
            <a class="dropdown-item" href="addnews.php">Add News</a>
        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-building-o"></i>
            <span>Company</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="companylist.php">Company list</a>
            <a class="dropdown-item" href="addcompany.php">Add Company details</a>

        </div>
    </li>
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-tag"></i>
            <span>Special Offers</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="pagesDropdown">
            <a class="dropdown-item" href="specialofferlist.php">Special Offer list</a>
            <a class="dropdown-item" href="addoffer.php">Add Special Offer</a>

        </div>
    </li>
</ul>
