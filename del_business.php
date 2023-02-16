<?php

include_once 'config.php';
$id = $_GET['id'];
if(unlinkimage($id,$conn)){
    $sql = "DELETE FROM businesses WHERE id = $id";
    $result= mysqli_query($conn,$sql);
    if($result){
    header('Location:businesses.php');
    }
}else{
    die(mysqli_error($conn));
}
function unlinkimage($id,$conn){
    $query="select * FROM businesses WHERE id=".$id;
    $query=mysqli_query($conn,$query);
    $result=mysqli_fetch_assoc($query);
    $image =$result['image'];
$response=1;
   // echo $image;exit;
    if($image=='noimg.png'){
$response=1;
    }
    elseif(unlink($image)){
     $response=1;
    }else{
        $response=1;
    }
 return    $response;
}
?>