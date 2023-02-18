<!doctype html>
<html lang="en">
<head>
<?php 
include_once'config.php';
$setting = "select * from company";
$query = mysqli_query($conn, $setting);
if($query){
$result = mysqli_fetch_assoc($query);
}

// get invoice data from invoice table
$invoice = "SELECT i.*,b.* FROM `invoice` as i 
JOIN businesses as b on b.id=i.business_id where i.id=".$_GET['id'];
$query2 = mysqli_query($conn, $invoice);
if($query2){
$row = mysqli_fetch_assoc($query2);
}
				?>  
<title>Invoice</title>
  
</head>

<body>
  
<section style="padding:2%">
<section class="invoice">
    
      <!-- info row -->
      <div class="row invoice-info">
      <div style="width: 50%;display:inline-block;float: left;">
            <img height="60" src="<?php echo $result['image'];?>">
          <p>
          From:
            <strong style="text-transform:uppercase"><?php echo $result['name'];?></strong><br>
           Address: <?php echo $result['address'];?><br>
            Phone: <?php echo $result['phone'];?><br>
            Email: <?php echo $result['email'];?>
          </p>
          <h5 style="font-size: 18px;margin: 0;">
          <?=date("F j, Y",strtotime($row['due_date'])) ;?>
          </h5>
        </div>
       
        <div style="width:49%;display:inline-block;float:right">
            <div style="float:right">
            <img height="60" src="<?php echo $row['image'];?>">
          <p>
          TO:
            <strong style="text-transform:uppercase"><?php echo $row['name'];?></strong><br>
            Phone: <?php echo $row['phone'];?><br>
            Email: <?php echo $row['email'];?><br>
            City: <?php echo $row['city'];?><br>
            Address: <?php echo $row['address'];?><br>

          </p>
            </div>
          
        </div>
        <div style="float:left;width:100%;text-align: center;margin: 0 0 10px 0;">
        <h3 style="color:#F66;font-size: 30px;margin: 0;">
         Pro-Forma Invoice
       </h3>
        </div>
        <!-- /.col -->
        
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
      <?php 
		$arr=	json_decode($row['invoice_detail']);
		
			$count = count($arr->subtotal);
			
			?>
        <div class="col-xs-12 table-responsive">
          <table style="width:100%" bordercolor="#CCCCCC" border="1" cellpadding="5" cellspacing="0" id="items" >
            <thead>
            <tr id="itemDetail" bgcolor="#CCCCCC">
            <?php
			$colspan=0;
			foreach($arr as $key=>$val){
				$heading =ucfirst($key);
			echo ' <th >'.$heading.'</th>';
			$colspan++;
			}
			 ?>
             
             
            </tr>
            </thead>
            <tbody class="field_wrapper">
            
            
            
              <?php
			  for($i=0;$i<$count;$i++){
				  echo '<tr id="row_0">';
			foreach($arr as $key=>$val){
				$v =$val[$i];
			echo ' <td >'.$v.'</td>';
			}	
			echo '</tr>';
			}
			   ?>
            
           </tbody>
            <tfoot>
            <tr>
              <th colspan="<?=$colspan-1?>" id="taxRow" style="text-align: right;">Tax %</th>
              <td><?php if(isset($row)){echo $row['tax'];}?>
                </td>
            </tr>
           <tr>
              <th colspan="<?=$colspan-1?>" id="discountRow" style="text-align: right;">Discount</th>
              <td><?php if(isset($row)){echo $row['discount'];}?></td>
            </tr>
           <tr>
              <th colspan="<?=$colspan-1?>" id="totalRow" style="text-align: right;">Total</th>
              <td>
               <?php if(isset($row)){echo $row['total'];}?>
                </td>
            </tr>
            
         <tr>
              <td colspan="<?=$colspan?>" id="paymentTermsTD" ><b>Payment Terms</b>
               <p style="margin:0"><?php if(isset($row)){echo $row['terms'];}?></p>
                </td>
            </tr>
        <tr>
              <td colspan="<?=$colspan?>" id="notesTD" >
              <b>Addition Notes</b>
              <p style="margin:0"><?php if(isset($row)){echo $row['notes'];}?></p>
                </td>
            </tr>
             
                   
            </tfoot>
            
          </table>
      <?php if(isset($row)){
				  echo '<p style="margin:0"><b>Account number</b> '. $row['account_number'] .'</p>';
				  echo '<p style="margin:0"><b>Account Name</b> '. $row['account_name'] .'</p>';
				  echo '<p style="margin:0"><b>Sort code</b> '. $row['sort_code'] .'</p>';
				  
				  } ?>
      
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

</div>

    </section>
    </section>



</body>

</html>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script>
  $(document).ready(function() {
	 window.print() ;
  });
</script>