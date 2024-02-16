<?php
include $_SERVER['DOCUMENT_ROOT'] . "/admin/include/protect.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/admin/include/connect.php";

if (isset($_POST['product_id']) && $_POST['product_id'] > 0) {
	$sql = "UPDATE table_product SET product_name = :product_name , product_serie = :product_serie, product_price = :product_price ,product_type_id= :product_type_id WHERE product_id= :product_id";
	$stmt = $db->prepare($sql);
	$stmt->bindValue(":product_id", $_POST['product_id']);

} else {
	$sql = "INSERT INTO table_product (product_name, product_serie, product_price , product_type_id) VALUES (:product_name, :product_serie, :product_price , :product_type_id)";
	$stmt = $db->prepare($sql);

}


$stmt->bindValue(":product_name", $_POST['product_name']);
$stmt->bindValue(':product_serie', $_POST['product_serie']);
$stmt->bindValue(":product_price", $_POST['product_price']);
$stmt->bindValue(":product_type_id", $_POST['product_type_id']);
$stmt->execute();


header("Location: index.php");
