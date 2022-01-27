<?php
include("connection.php");
$id=$_GET['con'];


$sql="delete from user_data where ID=$id";
$arr=$conn->query($sql);
header("location:details.php")
?>