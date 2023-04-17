<?php
require_once("../connection.php");
$id = $_POST["id"];
$sql = "SELECT `image` FROM `products` WHERE id=$id;";
$data = $conn->prepare($sql);
$data->execute();
$result = $data->fetch(PDO::FETCH_ASSOC);

$uploads = "../uploads/";
$file = $uploads . $result["image"];
if (file_exists($file)) {
    unlink($file);
}

$query = "DELETE FROM `products` WHERE `id`=$id";
$stmt = $conn->prepare($query);
$status=$stmt->execute();
if($status){
    echo json_encode(array("message" => "deleted","code"=>200));
}
else{
    echo json_encode(array("message" => "canot delete","code"=>400));
}
