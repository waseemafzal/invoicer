<html>
  <head>
    <title>Invoice</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    .remove_button{ 
      top: 375px;
    position: absolute;
    left: 9%;
    }
    .add_button{position: relative;top: 25px;left: 0; top: -30px;}

   </style>
   </head>
<div class="container">
    <!-- Content Header (Page header) -->
    
<section class="content">
                 <form method='post' action='index.php'>
<div class="alert hidden"></div>
      <div class="row" style="margin-right: -15px;
    margin-left: -15px;">
        <div style="width: 100%;" >
          <div class="box">
            <div class="box-header">
            
              
            </div>
            <!-- /.box-header -->
            <div class="box-body" id="invoice">
  
  <section class="invoice">
      <!-- title row -->
      <a href='businesses.php' class='btn btn-info'>Home</a>
<br><br>
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
              <?php include_once 'config.php';
              $setting = "select * from company";
              $query = mysqli_query($conn, $setting);
              if($query){
                $result = mysqli_fetch_assoc($query);}?>
            <img height="60" src="<?php echo $result['image'];?>">
            Client Invoices
              </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
          From:
          
            <strong><?php echo $result['name'];?></strong><br>
           Address: <?php echo $result['address'];?><br>
            Phone: <?php echo $result['phone'];?><br>
            Email: <?php echo $result['email'];?>
          
        </div>
       
        <div class="col-sm-4 invoice-col">
                    
           
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
        <label>Bill to:</label>  
        <select id="billtoselect" name='business_id'>
          <option selected>Choose</option>
         <?php 
         $business = 'select * from businesses';
         $query = mysqli_query($conn, $business);
         while($data = mysqli_fetch_array($query)){
         ?>      
         <option data-headers="<?php echo $data['headers'];?>" value='<?php echo $data['id']?>'><?php echo $data['name'];?>
         </option>
         <?php }?>
         </select>  
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
<br>
      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-bordered" id="items" border="1">
            <thead>
            <tr id="itemDetail">
            
              <th >Item Details</th>
              <th>Qty</th>
              <th>Rate</th>
              <th>Subtotal</th>
            </tr>
            </thead>
            <tbody class="field_wrapper">
            
            <tr id="row_0">
            
              <td><input type="text" class="form-control" name="item[]" /></td>
              <td><input type="number" class="form-control quantity" name="quantity[]" /></td>
              <td><input type="number" class="form-control rate" name="rate[]" /></td>
              <td><input type="text" class="form-control subtotal" readonly name="subtotal[]" /></td>
            </tr>
           </tbody>
            <tfoot>
            <tr>
              <td colspan="3" id="taxRow" style="text-align: right;">Tax %</td>
              <td><input type="number" class="form-control noprint" id="tax"  name="tax" value="<?php if(isset($row)){echo $row['tax'];}?>">
                </td>
            </tr>
           <tr>
              <td colspan="3" id="discountRow" style="text-align: right;">Discount</td>
              <td><input type="number" class="form-control" id="discount" name="discount" value="<?php if(isset($row)){echo $row['discount'];}?>"></td>
            </tr>
           <tr>
              <td colspan="3" id="totalRow" style="text-align: right;">Total</td>
              <td>
                <div class="input-group">
                <span class="input-group-prepand"><i class="fa fa-dollar mt-2" style='margin-right:7px'></i></span>
                <input type="text" class="form-control noprint" id="total" name="total" value="<?php if(isset($row)){echo $row['amount'];}?>">
                
              </div>
                </td>
            </tr>
         <tr class="noprint">
              <td colspan="2" ><a class="btn btn-success add_button noprint"><i class="fa fa-plus"></i>Add Line</a></td>
              </tr>   
         <tr>
              <td colspan="4" ><b>Payment Terms</b>
                <textarea class="form-control noprint" id="payment_terms"  name="payment_terms" rows="2" /><?php if(isset($row)){echo $row['payment_terms'];}?></textarea>
              
                </td>
            </tr>
        <tr>
              <td colspan="4" ><b>Notes</b>
                <textarea class="form-control noprint" id="notes" name="notes" rows="2" /><?php if(isset($row)){echo $row['notes'];}?></textarea>
                
                </td>
            </tr>
        <tr>
              <td colspan="4" class="noprint" >
            </tr>
                   
            </tfoot>
            
          </table>
      
      
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->


      <!-- this row will not appear when printing -->
      <div class="row no-print" style="margin-right: -15px;
    margin-left: -15px;">
        <div style="width: 100%;">         
           <button type="submit" class="btn btn-success pull-right noprint" onClick="submitform(0)"><i class="fa fa-save"></i> Save
          </button>
          <?php /*?> <button type="button" class="btn btn-primary pull-right" id="downloadPdf" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button><?php */?>
        </div>
      </div>
    </section>
     </div>
                <div class="clearfix">&nbsp;</div>
                  <div class="clearfix">&nbsp;</div>
                
            </div>
          
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      </form>
    </section>
    <!-- /.content -->
  </div>
    <!-- /.content -->
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script type="text/javascript">
   
  
  $('#items').change(function(){
   var sum = 0;
   /***********loop through trs****************/
    $('#items > tbody  > tr').each(function() {
        var qty = $(this).find(".quantity").val();
        var price = $(this).find('.rate').val();
        if(qty==undefined){
        qty=0;
        }
        if(price==undefined){
        price=0;
        }
        var amount = (qty*price);
        $(this).find('.subtotal').val(amount);
        sum+=amount;
         $('#total').val(sum);
   if($('#tax, #discount').val()!=''){
        var tax = parseInt($('#tax').val());
        var total = parseInt($('#total').val());
        var discount = $('#discount').val();
        var taxamount = total - discount + (total*tax)/100;

        $('#total').val(taxamount);
        }
  // if($('#discount').val()!=''){
  //       var total = $('#total').val();
  //       var discount = $(this).val();
  //       var discounted = total - discount;
  //       $('#total').val(discounted);
  // }
        
//         if($('#tax').val()!=''){
//        // var total = parseInt( $('#total').val());
// var taxRate = parseInt( $(this).val());
// var disc = parseInt( $('#discount').val());

// var taxAmount = total * (taxRate/parseInt("100")); //15000 * .1

// var sum = total + (taxAmount) - (disc);

// //update div with the val
// $('#total').val(sum);
// }
    });
  });
  //$(document).ready(function(){
           //         $("#tax").on('kepress', function(){
           //          var amt = parseInt($("#total").val());
           //          var tax = parseInt($(this).val()); 
           //    var total = (amt * tax)/100;
           //    //alert(total);
           //    //$("#tax_amount").val(total);
           //    var grand_total = amt + total;
           //    $("#total").val(grand_total);
           // });


    /***********loop through trs end****************/
   
    //just subtract discount  
    // $('#discount').on('click', function(){
    //     var total = parseInt($("#total").val());
    //     var discount = parseInt($(this).val());
    //     var discounted=total-discount;
    //     $('#total').val(discounted);
    //   });
 /***********Add tax start****************/
   
     // $('#tax').on('keyup', function(){
     //    var taxRate = parseInt( $('#tax').val());
     //    var total = parseInt($("#total").val());
     //    var taxAmount = total * (taxRate/parseInt("100")); //15000 * .1
     //    //console.log(disc);
     //    var totaltax = sum + taxAmount;
     //    $("#total").val(totaltax);
     //  }
 /***********Add tax end ****************/
   

  
$(document).ready(function(){

  
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
      var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
       var fieldHTML = '<tr id="row_'+x+'"><td><input type="text" class="form-control" name="item[]" /></td><td><input type="number" class="form-control quantity" onChange="update_amounts()" name="quantity[]" /></td><td><input type="text" class="form-control rate" onChange="update_amounts()" name="rate[]" /></td><td><input type="text" class="form-control subtotal" readonly="readonly" name="subtotal[]" /><a data-id="'+x+'" href="javascript:void(0);" class="remove_button"><i class="fa  fa-minus-circle"></i></a></td></tr>'; //New input field html 
 
      
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
    var id = $(this).attr('data-id');
    //alert($(this).attr('data-id'));      
        $('#row_'+id).remove(); //Remove field html
        x--; //Decrement field counter
    update_amounts();
    });
});
 $("#billtoselect").change(function(){
	var headers= $("#billtoselect option:selected").attr('data-headers');
		 var formData = new FormData();
		formData.append('headers',headers);
	// ajax start
		    $.ajax({
			type: "POST",
			url: "ajax/setheaders.php",
			data: formData,
			cache: false,
			contentType: false,
			processData: false,
			dataType: 'JSON',
			success: function(data) {
            if (data.status == 200)
            {   
				$('#itemDetail').prepend(data.headers);
								$('#row_0').prepend(data.tableRowInputs);
								if(data.colspan>3){
								$("#discountRow").attr("colspan",data.colspan+3);
								$("#taxRow").attr("colspan",data.colspan+3);
								$("#totalRow").attr("colspan",data.colspan+3);
								}

            }
           }
	 });

	//ajax end 
	 
});
</script>
  