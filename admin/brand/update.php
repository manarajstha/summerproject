<?php
require("../connection.php");
$insertquery = " update brands set name=:name where id=:id ";
$stmt = $conn->prepare($insertquery);
$stmt->bindParam(":name",$name);
$stmt->bindParam(":id",$id);
$name=$_POST["name"];
$id=$_POST["id"];
$status=$stmt->execute();
if($status){
    echo json_encode(array("message"=>"Hello world","code"=>200));
}
else{
    echo json_encode(array("message"=>"Hello world","code"=>400));
}