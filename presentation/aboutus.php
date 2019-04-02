
<?php include '../includes/settings.php'; ?>
<?php include 'partials/header.php';?>

<body>

<?php include 'partials/navigation.php';?>


<main role="main">

    <section class="jumbotron jumbotron-fluid text-center mb-lg-5 bg-light">
        <div class="container">
            <h1 class="jumbotron-heading">About us</h1>
            <p class="lead text-muted">
                Welcome to our online duck store and meet the cutest rubber ducks. They’re all premium ducks made of high quality materials and CE approved. Discover the hand painted details and special finishing. Absolute collectors items. Take your pick. Have a nice duck!</p>
        </div>
    </section>

    <div class="container pb-md-4">
        <!-- Example row of columns -->
        <div class="row border-0">
            <div class="col-md-6">
                <h3>Company information</h3>
                <p class="mr-4">Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
            </div>
            <div class="col-md-6">
                <h3 class="ml-4">Contact us</h3>
                <p><form>
                    <div class="form-group ml-4">
                        <label for="name">Name</label>
                        <input class="form-control" type="text" id="name" placeholder="Name">
                    </div>
                    <div class="form-group ml-4">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" placeholder="name@example.com">
                    </div>

                    <div class="form-group ml-4">
                        <label for="message">Message</label>
                        <textarea class="form-control" id="email" rows="3"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary ml-4">Send</button>
                </form></p>
            </div>
        </div>

    </div>

</main>
<?php include '../presentation/partials/footer.php';?>

</html>
