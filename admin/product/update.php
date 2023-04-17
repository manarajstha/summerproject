<?php
require("../connection.php");
if( !function_exists('random_bytes') )
{
    function random_bytes($length = 6)
    {
        $characters = '0123456789';
        $characters_length = strlen($characters);
        $output = '';
        for ($i = 0; $i < $length; $i++)
            $output .= $characters[rand(0, $characters_length - 1)];

        return $output;
    }
}
if(isset($_FILES["image"])){
    $uploads = "../uploads/";
 $query="select * from products where id=:id";
$stmt = $conn->prepare($query);
$stmt->bindParam(":id",$_POST["id"]);
$stmt->execute();
$result=$stmt->fetch(PDO::FETCH_ASSOC);
    if(file_exists($uploads.$result["image"])){
unlink($uploads.$result["image"]);
     }
 
$filename = $_FILES["image"]["name"];

$tempname = $_FILES["image"]["tmp_name"];  



$fileTmpPath = $_FILES['image']['tmp_name'];
$originalfile = $_FILES['image']['name'];
$fileExt = explode(".", $_FILES['image']['name']);
$fileName = bin2hex(random_bytes(10));
$newfile = $fileName . "." . array_pop($fileExt);
move_uploaded_file($fileTmpPath, $uploads.$newfile);
$query="update products set name=:name,brand=:brand,price=:price,stock=:stock,
rating=:rating,description=:description,image=:image where id=:id";

$stmt = $conn->prepare($query);
$stmt->bindParam(":name",$name);
$stmt->bindParam(":price",$price);
$stmt->bindParam(":brand",$brand);
$stmt->bindParam(":stock",$stock);
$stmt->bindParam(":rating",$rating);
$stmt->bindParam(":description",$description);
$stmt->bindParam(":image",$file);
$stmt->bindParam(":id",$id);

$name=$_POST["name"];
$price=$_POST["price"];
$brand=$_POST["brand"];
$stock=$_POST["stock"];
$rating=$_POST["rating"];
$description=$_POST["description"];
$id=$_POST["id"];
$file=$newfile;
$status=$stmt->execute();



if($status){
    echo json_encode(array("message"=>"Message updated successfully","code"=>200));
}
else{
    echo json_encode(array("code"=>400));
}
}
else{
$query="update products set name=:name,brand=:brand,price=:price,stock=:stock,
rating=:rating,description=:description where id=:id";

$stmt = $conn->prepare($query);
$stmt->bindParam(":name",$name);
$stmt->bindParam(":price",$price);
$stmt->bindParam(":brand",$brand);
$stmt->bindParam(":stock",$stock);
$stmt->bindParam(":rating",$rating);
$stmt->bindParam(":description",$description);
$stmt->bindParam(":id",$id);

$name=$_POST["name"];
$id=$_POST["id"];
$price=$_POST["price"];
$brand=$_POST["brand"];
$stock=$_POST["stock"];
$rating=$_POST["rating"];
$description=$_POST["description"];
$status=$stmt->execute();

if($status){
    echo json_encode(array("message"=>"updated successfully","code"=>200));
}
else{
    echo json_encode(array("code"=>400));
}


}


