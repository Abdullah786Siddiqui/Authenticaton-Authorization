<?php

include("./dashboard.php");
require "../config/Connection.php";

$product_id = $_GET['id'];

$sql = "DELETE FROM products where id = $product_id ";
$conn->query($sql);
// id reset automatically
// mysqli_query($conn, "SET @count = 0");
// mysqli_query($conn, "UPDATE products SET id = (@count := @count + 1)");
// mysqli_query($conn, "ALTER TABLE products AUTO_INCREMENT = 1");
header("Location: ./View_products.php");



?>

</div>
</div>
</div>
</main>

<?php
include_once("../Components/Footer.html");
?>