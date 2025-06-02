<?php
require "../config/Connection.php";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  $title = $_POST['title'];
  $description = $_POST['description'];
  $price = $_POST['price'];
  

  $imageName = $_FILES['image']['name'];
  $tmpImage = $_FILES['image']['tmp_name'];
  $uploadsDir = "./uploads/";
  if (!is_dir($uploadsDir)) {
    mkdir($uploadsDir);
  }
  $new_file = time() . "-" . basename($imageName);
  $destination = $uploadsDir . $new_file;
  if (move_uploaded_file($tmpImage, $destination)) {
    $sql = "INSERT INTO  products(title,description,price,image) values ('$title','$description','$price','$new_file')";
    $result = $conn->query($sql);
    if ($result) {
      header("Location: ../Admin-panel/Add_products.php?add=true");
      exit();
    } else {
      
      header("Location: ./Add_products.php?add=false");
      exit();
    }
  }
}else{
  echo "error on post";
}
