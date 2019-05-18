<?php
/**
 * Created by PhpStorm.
 * User: lund
 * Date: 04/04/2019
 * Time: 12.10
 */
?>


<nav class="navbar navbar-expand navbar-dark bg-dark static-top">

    <a class="navbar-brand mr-1" href="<?php echo $GLOBALS['URL']; ?>presentation/admin/dashboard.php">DuckWorld Admin area</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
        <i class="fa fa-bars" aria-hidden="true"></i>
    </button>


    <ul class="navbar-nav ml-auto float-right">
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-user-circle fa-fw"></i>
            </a>
            <form method="post">
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="<?php echo $GLOBALS['URL']; ?>index.php">Home</a>
                    <a class="dropdown-item" href="#">Activity Log</a>
                    <div class="dropdown-divider"></div>
                    <button class="dropdown-item" name="logout">Logout</button>
                </div>
            </form>
        </li>
    </ul>

</nav>
<?php

if (isset($_POST['logout'])) {
    $_SESSION['loggedin'] = 0;
    if ($_SESSION['loggedin'] == 0){
        header("Location: " . $GLOBALS['URL'] . "index.php");
        exit;
    }
}

?>
