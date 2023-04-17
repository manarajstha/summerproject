<?php
require("../connection.php");
$query="delete from brands where id=:id";
$stmt=$conn->prepare($query);
$stmt->bindParam(":id",$id);
$id=$_POST["id"];
$status=$stmt->execute();
if($status){
    echo json_encode(array("message"=>"Hello world","code"=>200));
}
else{
    echo json_encode(array("message"=>"Hello world","code"=>400));
}
