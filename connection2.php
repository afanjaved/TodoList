<?php
$server="localhost";
$user="root";
$password="";
$dbname="todolist";
$conn=mysqli_connect($server,$user,$password,$dbname);
if($conn->connect_error){
   die("conection fail". $conn->connect_error);
}
echo "success";