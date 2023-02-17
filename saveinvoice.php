<?php 
 include_once 'config.php';
  if(isset($_POST['submit'])){
    $business_id = $_POST['business_id'];
    $created_date = $_POST['created_date'];
    $due_date = $_POST['due_date'];
    $notes = $_POST['notes'];
    $terms = $_POST['terms'];

    $invoice_details = json_encode($_POST['invoice']);
    $tax=$_POST['tax'];
    //$rate=$_POST['rate'];
    $total=$_POST['total'];
      echo   $insert = "INSERT INTO `invoice` (`business_id`,`created_date`,`due_date`,`notes`,`terms`,`invoice_detail`,`tax`,`total`) VALUES ('$business_id','$created_date','$due_date','$notes','$terms',`$invoice_details`,`$tax`,`$total`)";
		$query = mysqli_query($conn, $insert);
    if($query){ 
      echo "Inserted Successfully";
    }
  }