<?php

require "../vendor/autoload.php"; 

$conn = new ListaCompras\Database\DBOperations();

$sql = "SELECT * FROM products";

$products = $conn->select($sql);

?>





