<?php
session_start();
session_destroy();
header("Location:index.php");
$_SESSION["flash_message"] = "<div class='bg-success'>Logout Successful</div>";

?>

</body>
</html>



