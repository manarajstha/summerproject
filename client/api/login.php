<?php session_start();
require("../connection.php");
if($_SERVER["REQUEST_METHOD"]!="POST"){
  header("Location: /summerproject/admin/");
}
  $email=$_POST["email"];
  $password=$_POST["password"];
  $find=$conn->prepare("select * from users where email=:email");
  $find->execute(["email"=>$email]);
  $count=$find->rowCount();
  if($count>0){
$result=$find->fetch(PDO::FETCH_ASSOC);
$status=password_verify($password,$result["password"]);
  if($status){
    $_SESSION["user_login"]=true;
    $_SESSION["user_id"]=$result["id"];
    $_SESSION["user_username"]=$result["username"];
    
echo json_encode(array("message"=>"success","code"=>200));
  }
  else{
    echo json_encode(array("message"=>"invalid credentials","code"=>300));
  }
  }
  else{
   
    echo json_encode(array("message"=>"user does not exists","code"=>300)); 
  }


?>