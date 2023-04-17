<?php
session_start();
require("../connection.php");
if($_SERVER["REQUEST_METHOD"]!=="POST"){
    header("Location: /seproject/flone/");
}
$sql=$conn->prepare("INSERT INTO orders (user_id, first_name, last_name, street, city, contact, total,status) VALUES (:id,:first,:last,:street,:city,:contact,:total,:status)");
$sql->execute(["id"=>$_SESSION["user_id"],"first"=>$_POST["first_name"],"last"=>$_POST["last_name"],"street"=>$_POST["street"],"city"=>$_POST["city"],"total"=>$_POST["total"],"contact"=>$_POST["contact"],"status"=>"processing"]);
$order_id=$conn->lastInsertId();


foreach($_SESSION["items"] as $item){
    $sql=$conn->prepare("INSERT INTO carts (order_id, item, price, quantity) VALUES (:id,:item,:price,:quantity)");
    $sql->execute(["id"=>$order_id,"item"=>$item["name"],"price"=>$item["price"],"quantity"=>$item["quantity"]]);
}
unset($_SESSION["items"]);
echo "hello";