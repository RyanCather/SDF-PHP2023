<?php include "template.php";
/**  @var $conn */
?>
<title>Remove Product</title>


<?php
// Check to see if User is Administrator (level 1)
// If they are, allow functionality, otherwise redirect them back to the front page.
if ($_SESSION['AccessLevel'] == 1) {

    if (isset($_GET["prodCode"])) {
        // delete user from database
        $productToDelete = $_GET["prodCode"];
        $query = "DELETE FROM products WHERE code='$productToDelete'";
        $sqlstmt = $conn->prepare($query);
        $sqlstmt->execute();
        $_SESSION["flash_message"] = "<div class='bg-success'>Product ".$productToDelete. " deleted from the system.</div>";
    } else {
        $_SESSION["flash_message"] = "<div class='bg-success'>No product Code Found</div>";

    }

} else {
    $_SESSION["flash_message"] = "<div class='bg-success'>Product Added</div>";
    header("location:index.php");
}
?>



