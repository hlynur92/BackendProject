
<?php include '../includes/settings.php'; ?>
<?php include 'partials/header.php';?>

<body>

<?php include 'partials/navigation.php';?>
<?php
    require __DIR__ . "../../business/MailController.php";
    require __DIR__ . "/../business/CompanyController.php.php";


?>
<?php
    $instance = new CompanyController();
    $company = $instance->getCompanyInfo();

?>

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
                <h4></h4>
                <p class="mr-4">Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
            </div>
            <div class="col-md-6">
                <h3 class="ml-4">Contact us</h3>
                <p><form action="aboutus.php" method="post">
                    <div class="form-group ml-4">
                        <label for="name">Name</label>
                        <input name="name" class="form-control" type="text" id="name" placeholder="Name">
                    </div>
                    <div class="form-group ml-4">
                        <label for="email">Email address</label>
                        <input name="email" type="email" class="form-control" id="email" placeholder="name@example.com">
                    </div>

                    <div class="form-group ml-4">
                        <label class="mr-sm-2" for="inlineFormCustomSelect">Subject</label>
                        <select name="subject" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                            <option selected>Please select subject</option>
                            <option value="feedback">Feedback</option>
                            <option value="reclamations">Reclamations</option>
                            <option value="other">Other</option>
                        </select>
                    </div>

                    <div class="form-group ml-4">
                        <label for="message">Message</label>
                        <textarea name="message" class="form-control" id="email" rows="3"></textarea>
                    </div>
                    <button name="submit" type="submit" class="btn btn-primary ml-4">Send</button>
                </form></p>
                <?php
                if(isset($_POST['submit'])){
                    $name = $_REQUEST['name'];
                    $email = $_REQUEST['email'];
                    $message = $_REQUEST['message'];
                    $subject = $_REQUEST['subject'];

                    if ($subject != "Please select subject" && $name != null && $email != null && $message != null){
                        htmlspecialchars(trim($name));
                        htmlspecialchars(trim($email));
                        htmlspecialchars(trim($message));
                        htmlspecialchars(trim($subject));

                        $mailcontroller = new MailController();

                        $mailcontroller->contactFormMail($email, $name, $subject, $message);
                    }else if ($subject == "Please select subject"){
                        echo "<script type='text/javascript'>";
                        echo "alert('Please Select a Subject');";
                        echo "</script>";
                    }
                }
                ?>
            </div>
        </div>

    </div>

</main>
<?php include '../presentation/partials/footer.php';?>

</body>

</html>
