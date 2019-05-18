
<?php include '../../includes/settings.php'; ?>
<?php include '../partials/header.php';?>
<?php require  __DIR__ . "/../../business/AccountController.php"; ?>
<?php

if ($_SESSION['loggedin'] == 1){
    header("Location: " . $GLOBALS['URL'] . "presentation/admin/dashboard.php");
    exit;
}

?>

<body>

<div class="container">
    <div class="row justify-content-md-center mb-5 mt-5">
        <form method="post" class="form-signin mb-5 mt-5 p-5 bg-light border border-dark">
            <a href="<?php echo $GLOBALS['URL']; ?>index.php"><img border="0" alt="Home" src="<?php echo $GLOBALS['URL']; ?>includes/images/duckworld-logo.png" class="mb-5"></a>
            <h1 class="h3 mb-3 font-weight-normal text-center">Admin sign in</h1>
            <label for="inputEmail" class="sr-only">Email address</label>
            <input name="email" type="email" id="inputEmail" class="form-control mb-3" placeholder="Email address" required="" autofocus="">
            <label for="inputPassword" class="sr-only">Password</label>
            <input name="password" type="password" id="inputPassword" class="form-control mb-3" placeholder="Password" required="">
            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="signinbtn">Sign in</button>
            <p class="mt-5 mb-3 text-muted text-center">© 2017-2019</p>
        </form>
        <?php
        if (isset($_POST['signinbtn'])){
            $email = $_REQUEST['email'];
            $password = $_REQUEST['password'];

            htmlspecialchars(trim($email));
            htmlspecialchars(trim($password));

            if (filter_var($email, FILTER_VALIDATE_EMAIL)){
                $uppercase = preg_match('@[A-Z]@', $password);
                $lowercase = preg_match('@[a-z]@', $password);
                $number    = preg_match('@[0-9]@', $password);

                if($uppercase || $lowercase || $number || strlen($password) >= 8) {
                    $accountcontroller = new AccountController();

                    $accountcontroller->login($email, $password);
                }
            }
        }
        ?>

    </div>
</div>

</body>
</html>