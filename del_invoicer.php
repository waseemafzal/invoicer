<?php

include_once 'config.php';

$id = $_GET['id'];
$sql = "DELETE FROM businesses WHERE id = $id";
$result= mysqli_query($conn,$sql);
if($result){
    header('Location:businesses.php');
}else{
    die(mysqli_error($conn));
}
?>