<?php include "template.php" ?>
<?php include 'login.php'; ?>
<title>PHP Template</title>
<body>
<h1>Heading</h1>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <p>username: admin</p>
            <p>Password: admin</p>
            <p>username: user</p>
            <p>Password: user</p>
        </div>
        <div class="col-md-6">
            <!--            Login Form-->
            <?php if (!isset($_SESSION["EmailAddress"])) : ?>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" required="required"/>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required="required"/>
                    </div>

                    <center>
                        <button name="login" class="btn btn-primary"><span
                                    class="glyphicon glyphicon-log-in"></span> Login
                        </button>
                    </center>
                </form>
            <?php endif; ?>

        </div>
    </div>
</div>

<?php
echo "First Name: ". $_SESSION["FirstName"] ."<br>";
echo "Email Address:" .$_SESSION["EmailAddress"]."<br>";
?>

<?php echo footer(); ?>
</body>
<script src="js/bootstrap.bundle.min.js"></script>
</html>