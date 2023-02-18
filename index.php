<!doctype html>
<html lang="en">
<head>
<?php include_once 'head.php'; 
      include_once 'config.php';
?>
  <title>Business</title>
  <style>
    .image{
      height:50px;
      width:50px;
    }
	#table_filter{ float:right;}
	nav{ margin-bottom:10px;}
	.box{box-shadow: 3px 3px 3px 2px #a4a4a4;
    margin: 16px 0 0 0;
    padding: 20px 13px;
    border-radius: 6px;background-color: #d55c5c;}
		.box:hover{box-shadow: 3px 3px 3px 2px #a4a7a4;background-color: #f56a6a}

	.box h3{}
	.box h3 i{}
	.boxwrap a{ text-decoration:none; color:#fff}
  </style>
</head>

<body>
  <div class="container">
    <?php
        include_once 'nav.php'
    ?>

<section>
    <div class="row">
    <div class="col-md-4 boxwrap">
    <a href="add_business.php">
    <div class="box">
    <h3><i class="fa fa-briefcase"></i> Add Businesses</h3>
    
    </div>
    </a>
    </div>
    
    <div class="col-md-4 boxwrap">
    <a href="generate-invoice.php">
    <div class="box">
    <h3><i class="fa fa-plus"></i> Create Invoice</h3>
    
    </div>
    </a>
    </div>
    
    <div class="col-md-4 boxwrap">
    <a href="edit_company.php">
    <div class="box">
    <h3><i class="fa fa-list"></i> Company  Profile</h3>
    
    </div>
    </a>
    </div>


    <div class="col-md-4 boxwrap">
    <a href="businesses.php">
    <div class="box">
    <h3><i class="fa fa-list"></i> View  Business</h3>
    
    </div>
    </a>
    </div>
    <div class="col-md-4 boxwrap">
    <a href="">
      <?php
      $select = 'select * from businesses';
      $query = mysqli_query($conn, $select);
      $count = mysqli_num_rows($query);
      ?>
    <div class="box">
    <h3>Total Businesses (<?php echo $count?>)</h3>
    
    </div>
    </a>
    </div>
    <div class="col-md-4 boxwrap">
    <a href="">
    <?php
      $select = 'select * from invoice';
      $query = mysqli_query($conn, $select);
      $count = mysqli_num_rows($query);
      ?>
    <div class="box">
    <h3>Total Invoices (<?php echo $count?>)</h3>
    
    </div>
    </a>
    </div>
    </div>
    

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