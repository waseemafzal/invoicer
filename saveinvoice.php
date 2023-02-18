<?php 
 include_once 'config.php';
  if(isset($_POST['submit'])){
    $business_id = $_POST['business_id'];
    $created_date = $_POST['created_date'];
    $due_date = $_POST['due_date'];
    $notes = $_POST['notes'];
    $terms = $_POST['terms'];

   // $invoice_details = base64_encode($_POST['invoice']);
	$invoice_details=json_encode($_POST['invoice']);
    $tax=$_POST['tax'];
    //$rate=$_POST['rate'];
    $total=$_POST['total'];
         $insert = "INSERT INTO `invoice` (`business_id`,`created_date`,`due_date`,`notes`,`terms`,`invoice_detail`,`tax`,`total`) VALUES ('".$business_id."','".$created_date."','".$due_date."','".$notes."','".$terms."','".$invoice_details."','".$tax."','".$total."')";
		$query = mysqli_query($conn, $insert);
    if($query){ 
      //echo "Inserted Successfully";
	 header("Location:invoice-details.php");
    }
  }
  
  elseif(isset($_POST['submitprint'])){
    $business_id = $_POST['business_id'];
    $created_date = $_POST['created_date'];
    $due_date = $_POST['due_date'];
    $notes = $_POST['notes'];
    $terms = $_POST['terms'];
    $business_from_id = $_POST['business_from_id'];

   // $invoice_details = base64_encode($_POST['invoice']);
	$invoice_details=json_encode($_POST['invoice']);
    $tax=$_POST['tax'];
    //$rate=$_POST['rate'];
    $total=$_POST['total'];
         $insert = "INSERT INTO `invoice` (`business_from_id`,`business_id`,`created_date`,`due_date`,`notes`,`terms`,`invoice_detail`,`tax`,`total`) VALUES ('".$business_id."','".$business_from_id."','".$created_date."','".$due_date."','".$notes."','".$terms."','".$invoice_details."','".$tax."','".$total."')";
		$query = mysqli_query($conn, $insert);
    if($query){ 
      //echo "Inserted Successfully";
	   header("Location:printinvoice.php?id=".$conn->insert_id);
    }
  }
  