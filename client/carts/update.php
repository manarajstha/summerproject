<?php
session_start();
if($_SERVER["REQUEST_METHOD"]!=="POST"){
    header("Location: /summerproject/client/");
}

$index=$_POST["index"];


  $arr= $_SESSION["items"][$index];
  $arr["quantity"]=$_POST["value"];
  $_SESSION["items"][$index]=$arr;
  echo "Hello world";



