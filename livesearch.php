<?php
$products = $_REQUEST['item'];

search($products);

function search($item){
  $servername = "localhost";
$username = "root";
$password = "";
$databse = "shoppn";

    $conn = new mysqli($servername, $username, $password, $databse);
  if ($conn->connect_error){
    die("Database was not connected:" . $conn->connect_error);
    
  }

    $item = "%".$item."%";
    $sql = "SELECT * FROM products WHERE product_title LIKE '$item'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) <=0) {
    $error= "Item not found in inventory";
    echo "<p style='font-size:18px; text-align:center; color:blue;'>".$error."</p>";
    }
    else {
    $row = array();
    while($x = mysqli_fetch_assoc($result)) {
    $row[] = $x;
    }
    echo json_encode($row);
    }
}
?>
