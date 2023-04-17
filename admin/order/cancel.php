<?php
if($_SERVER["REQUEST_METHOD"]!="POST"){
    echo "Hello";
}
require("../connection.php");
$sql=$conn->prepare("update orders set status='cancelled' where id=:id");
$sql->execute(["id"=>$_POST["id"]]);
echo json_encode(array("name"=>"he"));