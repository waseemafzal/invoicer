<?php 
	session_start();
include_once 'config.php';
	
	if (isset($_POST['save'])) {
		$name = $_POST['name'];
		$email = $_POST['email'];
    $phone = $_POST['phone'];
		$address = $_POST['address'];
        $image = $_FILES['image'];
     $filename = $image['name'];
     $tmpname = $image['tmp_name'];
     $fileext = explode('.', $filename);
     $filecheck = strtolower(end($fileext));
     $requiredextensions = array('jpg', 'jpeg', 'png', 'PNG', 'GIF');
     if(in_array($filecheck,$requiredextensions)){
        $destination = 'uploads/'.$filename;
        move_uploaded_file($tmpname, $destination);
     }

     $insert = "INSERT INTO `company` (`name`,`email`,`phone`,`address`,`image`) VALUES ('$name','$email','$phone','$address','$destination')";
		$query = mysqli_query($conn, $insert);
    if($query){ 
      echo "Inserted Successfully";
    }
	}
