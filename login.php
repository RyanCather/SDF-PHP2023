<!--
Analysis
This script takes the username and password fields, sanitises the data (check template.php for the explanation)
Then it loads, or attempts to load the record for that username from the database.
If the count > 0, that means the username is found in the emailaddress field.
If the user is found then the password field data is hashed, and checked against what is in the password field.
If the password is correct, then user details are stored in session variables.


Critical Analysis
Why hash passwords?

What is a session variable?

-->

<?php

/**  @var $conn */

if (isset($_POST['login'])) {
    $username = sanitiseData($_POST['username']);
    $password = sanitiseData($_POST['password']);


    $query = $conn->query("SELECT COUNT(*) as count, * FROM Customers WHERE `EmailAddress`='$username'");
    $row = $query->fetchArray();
    $count = $row['count'];

    if ($count > 0) {
        if (password_verify($password, $row['HashedPassword'])) {
            $_SESSION["FirstName"] = $row['FirstName'];
            $_SESSION['EmailAddress'] = $row['EmailAddress'];
            $_SESSION['AccessLevel'] = $row['AccessLevel'];
            $_SESSION['CustomerID'] = $row['CustomerID'];
            $_SESSION["flash_message"] = "<div class='bg-success'>Login Successful</div>";
            header("location:index.php");
        } else {
            echo "<div class='alert alert-danger'>Invalid username or password</div>";
            $_SESSION["flash_message"] = "<div class='bg-danger'>Invalid Username or Password</div>";
            header("location:index.php");
        }
    } else {
        echo "<div class='alert alert-danger'>Invalid username or password</div>";
    }
}
?>
