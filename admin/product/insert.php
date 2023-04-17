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
$filename = $_FILES["image"]["name"];

$tempname = $_FILES["image"]["tmp_name"];  

 $folder = "../uploads/".$filename;   

 $uploads = "../uploads/";
$fileTmpPath = $_FILES['image']['tmp_name'];
$originalfile = $_FILES['image']['name'];
$fileExt = explode(".", $_FILES['image']['name']);
$fileName = bin2hex(random_bytes(10));
$newfile = $fileName . "." . array_pop($fileExt);
move_uploaded_file($fileTmpPath, $uploads . $newfile);
$query="insert into products(name,brand,price,description,image,stock,rating) 
values(:name,:brand,:price,:description,:image,:stock,:rating)";

$stmt = $conn->prepare($query);
$stmt->bindParam(":name",$name);
$stmt->bindParam(":price",$price);
$stmt->bindParam(":brand",$brand);
$stmt->bindParam(":stock",$stock);
$stmt->bindParam(":rating",$rating);
$stmt->bindParam(":description",$description);
$stmt->bindParam(":image",$file);

$name=$_POST["name"];
$price=$_POST["price"];
$brand=$_POST["brand"];
$stock=$_POST["stock"];
$rating=$_POST["rating"];
$description=$_POST["description"];
$file=$newfile;
$status=$stmt->execute();


if($status){
    echo json_encode(array("message"=>$_POST,"code"=>200));
}
else{
    echo json_encode(array("code"=>400));
}
