
<?php include '../../includes/settings.php'; ?>
<?php include '../partials/header.php';?>

<body>

<div class="container">
    <div class="row justify-content-md-center mb-5 mt-5">
        <form class="form-signin mb-5 mt-5 p-5 bg-light border border-dark">
            <img src="<?php echo $GLOBALS['URL']; ?>includes/images/duckworld-logo.png" alt="" class="mb-5">
            <h1 class="h3 mb-3 font-weight-normal text-center">Admin sign in</h1>
            <label for="inputEmail" class="sr-only">Email address</label>
            <input type="email" id="inputEmail" class="form-control mb-3" placeholder="Email address" required="" autofocus="">
            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control mb-3" placeholder="Password" required="">
            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
            <p class="mt-5 mb-3 text-muted text-center">© 2017-2019</p>
        </form>

    </div>
</div>

</body>
</html>