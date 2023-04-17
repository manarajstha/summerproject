<?php
session_start();
if($_SERVER["REQUEST_METHOD"]!="POST"){
  header("Location: /seproject/admin");
}
require("../connection.php");
  $email=$_POST["email"];
  $username=$_POST["username"];
  $password=password_hash($_POST["password"],PASSWORD_DEFAULT);
  $find=$conn->prepare("select * from admins where email=:email");
  $find->execute(["email"=>$email]);
  $count=$find->rowCount();
  if($count===0){
  $insertquery=$conn->prepare("insert into admins(email,username,password) values(:email,:username,:password)");
  
  $status=$insertquery->execute(["email"=>$email,"password"=>$password,"username"=>$username]);
  if($status){
    echo json_encode(array("message"=>"success","code"=>200));
  }
  else{
    echo json_encode(array("message"=>"cannot registerd","code"=>300));
  }
  }
  else{
    echo json_encode(array("message"=>"user already exists","code"=>300));
  }