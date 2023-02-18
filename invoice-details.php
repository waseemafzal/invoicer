<!doctype html>
<html lang="en">
<head>
<?php include_once'head.php'; ?>
  <title>Invoice Details</title>
  <style>
    .image{
      height:50px;
      width:50px;
    }
	#table_filter{ float:right;}
	nav{ margin-bottom:10px;}
  </style>
</head>

<body>
  <div class="container">
    <?php
        include_once 'nav.php'
    ?>

<section>
    <div class="row">
    <div class="col-md-12">
    <a href ='generate-invoice.php' class='btn btn-dark mt-2' style='float:right'>+Add Invoice</a>
    </div>
    </div>
    <table class="table table-striped" id="table">
      <thead>
   
        <tr>
          <th scope="col">Created Date</th>
          <th scope="col">Due Date</th>
          <th scope="col">Tax</th>
          <th scope="col">Discount</th>
          <th scope="col">Total</th>
          <th scope="col">Terms</th>
          <th scope="col">Notes</th>
          <th scope="col">Action</th>

        </tr>
      </thead>
      <tbody>
        <?php
		if(isset($_GET['business_id'])){
			$sql = "SELECT * FROM invoice where business_id=".$_GET['business_id'];
			}else{
        $sql = "SELECT * FROM invoice";
			}
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          // output data of each row
          while ($row = $result->fetch_assoc()) { ?>
            <tr>
                          <th scope="row"><?php echo $row['created_date'] ?></th>
              <td><?php echo $row['due_date'] ?></td>

              <td><?php echo $row['tax'] ?></td>
              <td><?php echo $row['discount'] ?></td>
              <td><?php echo $row['total'] ?></td>
                            <th scope="row"><?php echo $row['terms'] ?></th>
              <td><?php echo $row['notes'] ?></td>
<td><a href="printinvoice.php?id=<?php echo $row['id'] ?>" class="btn btn-sm btn-success"><i class="fa fa-print"></i> Print</a></td>
              <!--<td>
                <?php /*$json = json_decode($row['invoice_detail']);
				foreach($json as $key=>$val){
					echo '<p>'.$key.' : '.implode(',',$val).'</p>';
					}*/
				 ?>
              </td>-->
            </tr>
        <?php }
        } ?>
      </tbody>
    </table>

</section>
  </div>
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <!-- Option 2: Separate Popper and Bootstrap JS -->
  <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
</body>

</html>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js" integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  $(document).ready(function() {
	  $('.fancybox').fancybox();
	  
    $('#table').DataTable({
    "bPaginate": false,
    "bLengthChange": false,
    "bFilter": true,
    "bInfo": false,
    "bAutoWidth": false });
  });
</script>