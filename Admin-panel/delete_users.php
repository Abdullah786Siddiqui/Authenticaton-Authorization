<?php

include("../Components/Header.html");
include("./sidebar.php");
require "../config/Connection.php";

$user_id = $_GET['id'];

$sql = "DELETE FROM users where id = $user_id ";
$conn->query($sql);
// id reset automatically
mysqli_query($conn, "SET @count = 0");
mysqli_query($conn, "UPDATE products SET id = (@count := @count + 1)");
mysqli_query($conn, "ALTER TABLE products AUTO_INCREMENT = 1");
header("Location: ./View_Users.php");



?>

</div>
</div>
</div>
</main>

<?php
include_once("../Components/Footer.html");
?>