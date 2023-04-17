<?php
session_start();
if($_SERVER["REQUEST_METHOD"]!=="POST"){
    header("Location: /seproject/flone/");
}

$index=$_POST["index"];

$arr=array();
foreach($_SESSION["items"] as $inde=>$item){
    if($inde!=$index){
        $arr[]=$item;
    }
}
$_SESSION["items"]=$arr;
echo "he;;";



