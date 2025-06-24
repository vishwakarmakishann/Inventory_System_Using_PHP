<?php
include 'db.php';
if (!isset($_SESSION["role"]) || $_SESSION["role"] !== "admin") {
    header("Location: login.php");
    exit;
}
$id = isset($_GET["id"]) ? $_GET["id"] : null;
if(isset($_GET["id"])){
    $result = $conn -> prepare("delete from product where id = ?");
    $result -> bind_param("i", $_GET["id"]);
    $result -> execute();
    header("Location:view_products.php");
}
?>