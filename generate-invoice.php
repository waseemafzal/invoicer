<html>
  <head>
    <title>Invoice</title>
<?php include_once 'head.php'; ?>
<style>
    .remove_button{ 
      top: 375px;
    position: absolute;
    left: 9%;
    }
    .add_button{position: relative;left: 0; top: 0;}

   </style>
   </head>
   <body>
<div class="container">
<?php include_once 'nav.php';
$business = 'select * from businesses';
         $queryB = mysqli_query($conn, $business);
 ?>

    <!-- Content Header (Page header) -->
    
<section class="content">
                 <form method='post' action='saveinvoice.php'>
<div class="alert hidden"></div>
      <div class="row" >
        <div class="col-sm-3" >
        <label>Bill From:</label>  
        <select class="form-control" id="business_from_id" name='business_from_id'>
          <option selected>Choose</option>
         <?php 
         
         while($data = mysqli_fetch_array($queryB)){
         ?>      
         <option data-headers="<?php echo $data['headers'];?>" data-name="<?php echo $data['name']?>" data-email="<?php echo $data['email']?>" data-phone="<?php echo $data['phone']?>" data-address="<?php echo $data['address']?>" data-city="<?php echo $data['city']?>" value='<?php echo $data['id']?>'><?php echo $data['name'];?>
         </option>
         <?php }?>
         </select>  
         </div>
         <div class="col-sm-3" >
                 <label>Bill to:</label>  
        <select class="form-control" id="billtoselect" name='business_id'>
          <option selected>Choose</option>
         <?php 
         $business = 'select * from businesses';
         $queryB = mysqli_query($conn, $business);

         while($data = mysqli_fetch_array($queryB)){
         ?>      
         <option data-headers="<?php echo $data['headers'];?>" data-name="<?php echo $data['name']?>" data-email="<?php echo $data['email']?>" data-phone="<?php echo $data['phone']?>" data-address="<?php echo $data['address']?>" data-city="<?php echo $data['city']?>" value='<?php echo $data['id']?>'><?php echo $data['name'];?>
         </option>
         <?php }?>
         </select>  
         </div>
         <div class="col-sm-3" >
<label>Created Date:</label>
        <input class="form-control" type='date' name='created_date'>
       
        </div>
         <div class="col-sm-3" >
          <label>Due Date:</label>
        <input class="form-control" name='due_date' type='date'>
        </div>
         
      </div>
            <div class="box-header">
            
              
            </div>
            <!-- /.box-header -->
            <div class="box-body" id="invoice">
  
  <section class="invoice">
      <!-- title row -->

      <!-- info row -->
      <div class="row invoice-info">
      
       
        <div class="col-sm-4 invoice-col">
                    
           
        </div>
        <!-- /.col -->
        
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
            
              <td><input type="text" class="form-control" name="invoice[item][]" /></td>
              <td><input type="number" class="form-control quantity" name="invoice[quantity][]" /></td>
              <td><input type="number" class="form-control rate" name="invoice[rate][]" /></td>
              <td><input type="text" class="form-control subtotal" readonly name="invoice[subtotal][]" /></td>
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
              <td colspan="2" id="btnAdd" ><a class="btn btn-success add_button noprint"><i class="fa fa-plus"></i>Add Line</a></td>
              </tr>   
         <tr>
              <td colspan="4" id="paymentTermsTD" ><b>Payment Terms</b>
                <textarea class="form-control noprint" id="payment_terms"  name="terms" rows="2" /><?php if(isset($row)){echo $row['payment_terms'];}?></textarea>
              
                </td>
            </tr>
        <tr>
              <td colspan="4" id="notesTD" ><b>Notes</b>
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
           <button type="submit" style="margin:0 0 0 10px" name='submitprint' class="btn btn-info pull-right"><i class="fa fa-print"></i> Save & Print
          </button>&nbsp;
          <button type="submit" name='submit' class="btn btn-success pull-right"><i class="fa fa-save"></i> Save
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
  </body>
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
   

  
// $(document).ready(function(){

  
//     var maxField = 10; //Input fields increment limitation
//     var addButton = $('.add_button'); //Add button selector
//     var wrapper = $('.field_wrapper'); //Input field wrapper
//       var x = 1; //Initial field counter is 1
    
//     //Once add button is clicked
//     $(addButton).click(function(){
//         //Check maximum number of input fields
//         if(x < maxField){ 
//             x++; //Increment field counter
//        var fieldHTML = '<tr id="row_'+x+'"><td><input type="text" class="form-control" name="item[]" /></td><td><input type="number" class="form-control quantity" onChange="update_amounts()" name="quantity[]" /></td><td><input type="text" class="form-control rate" onChange="update_amounts()" name="rate[]" /></td><td><input type="text" class="form-control subtotal" readonly="readonly" name="subtotal[]" /><a data-id="'+x+'" href="javascript:void(0);" class="remove_button"><i class="fa  fa-minus-circle"></i></a></td></tr>'; //New input field html 
 
      
//             $(wrapper).append(fieldHTML); //Add field html
//         }
//     });
    
//     //Once remove button is clicked
//     $(wrapper).on('click', '.remove_button', function(e){
//         e.preventDefault();
//     var id = $(this).attr('data-id');
//     //alert($(this).attr('data-id'));      
//         $('#row_'+id).remove(); //Remove field html
//         x--; //Decrement field counter
//     update_amounts();
//     });
// });
$("#btnAdd").on("click",function(){
        $tableBody = $("#row_0").clone().insertAfter($('#row_0'));       
        $tableBody.append("<td><a href='javascript:void(0)' class='rmv' >Remove</a></td>");
              //  $trLast = $tableBody.find("tr:last"),
              //  $trNew = $trLast.clone();
              //  $trNew.append("<td><a href='' class='rmv' >Remove</a></td>");
              //  $trLast.after($trNew);
       });
//$('#items').on('click', '.rmv', function () {
  $(document).on('click', '.rmv', function(){
    $(this).parents('tr').remove();
});  
  //alert("wee");
    // $(this).parents('tr').remove();
//});
 $("#billtoselect").change(function(){
	var headers= $("#billtoselect option:selected").attr('data-headers');
	var name= $("#billtoselect option:selected").attr('data-name');
	var email= $("#billtoselect option:selected").attr('data-email');
	var phone= $("#billtoselect option:selected").attr('data-phone');
	var address= $("#billtoselect option:selected").attr('data-address');
	var city= $("#billtoselect option:selected").attr('data-city');
	
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
								$("#addLineTD").attr("colspan",data.colspan+2);
								$("#paymentTermsTD").attr("colspan",data.colspan+4);
								$("#notesTD").attr("colspan",data.colspan+4);
								
								//  
								}

            }
           }
	 });

	//ajax end 
	 
});
</script>
  