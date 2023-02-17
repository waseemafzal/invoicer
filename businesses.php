<!doctype html>
<html lang="en">
<head>
<?php include_once'head.php'; ?>
  <title>Business</title>
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
    <a href ='add_business.php' class='btn btn-dark mt-2' style='float:right'>+Add Business</a>
    </div>
    </div>
    <table class="table table-striped" id="table">
      <thead>
   
        <tr>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Phone</th>
          <th scope="col">City</th>
          <th scope="col">Address</th>
          <th scope="col">Image</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sql = "SELECT * FROM businesses";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
          // output data of each row
          while ($row = $result->fetch_assoc()) { ?>
            <tr>
              <th scope="row"><?php echo $row['name'] ?></th>
              <td><?php echo $row['email'] ?></td>
              <td><?php echo $row['phone'] ?></td>
              <td><?php echo $row['city'] ?></td>
              <td><?php echo $row['address'] ?></td>
             
    <?php if($row['image']!==''){?>
      <td>
     <a href="<?php echo $row['image'];?>" class="fancybox"> <img class='image' src='<?php echo $row['image'];?>'></a>
      </td>
      <?php } else{?>
      <td> 
      <img  class='image' src='uploads/noimg.png'>
     </td>  
     <?php }?>
              <td>
                <a href="edit_business.php?updateid=<?php echo $row['id'] ?>" class="btn btn-sm btn-dark"><i class="fa fa-pencil"></i></a>

                <a href="del_business.php?id=<?php echo $row['id']; ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
              </td>
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