<?php
if($_SERVER["REQUEST_METHOD"]!="POST"){
    header("Location: /summerproject/admin/index.php");
}
require("../connection.php");
$sql=$conn->prepare("update orders set status=:status where id=:id");
$sql->execute(["id"=>$_POST["id"],"status"=>$_POST["status"]]);
echo json_encode(array("name"=>$_POST["status"]));