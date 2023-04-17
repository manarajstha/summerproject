<?php
require("../connection.php");
$insertquery = " insert into brands(name) values(:name) ";
$stmt = $conn->prepare($insertquery);
$stmt->bindParam(":name",$name);
$name=$_POST["name"];
$status=$stmt->execute();
if($status){
    echo json_encode(array("message"=>"Hello world","code"=>200));
}
else{
    echo json_encode(array("message"=>"Hello world","code"=>400));
}