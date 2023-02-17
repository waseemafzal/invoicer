<!doctype html>
<html lang="en">

<head>
<?php include_once'head.php'; ?>
    <title>Update Business</title>
</head>

<body>
<?php
        include_once 'nav.php'
    ?>


    <div id="wrapper">

    <?php 
    if (isset($_GET['updateid'])) {
        $id = $_GET['updateid'];
    } else {
        $id = $_POST['id'];
    }
    $select = 'SELECT * from businesses where id =' . $_GET['updateid'];
    $sql = mysqli_query($conn, $select);
    $result = mysqli_fetch_assoc($sql);

    if (isset($_POST['update'])) {
        $destination='uploads/noimg.png';
        if(isset($_FILES['image']['name']) and $_FILES['image']['name']!=''){
        $image=$_FILES['image'];
        $filename=$image['name'];
        $temp=$image['tmp_name'];
        $fileext=explode('.',$filename);
        $check=strtolower(end($fileext));
        $reqext=array('jpg','jpeg', 'png');
        if(in_array($check,$reqext)){
        $destination='uploads/'.$filename;
        move_uploaded_file($temp, $destination);
        }}
        if($destination=='uploads/noimg.png'){
            $destination = $_POST['prefile'];
        }
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $account_number = $_POST['account_number'];
        $account_name = $_POST['account_name'];
        $sort_code = $_POST['sort_code'];
        $headers = implode(',',$_POST['headers']);

        // $image = 'noimg.png';

        $sql = "update businesses set
        name='" . $name . "',email='" . $email . "',phone='" . $phone . "',address='" . $address . "',city='" . $city . "',account_number='".$account_number."',account_name='".$account_name."',sort_code='".$sort_code."',headers='".$headers."', image='" . $destination . "'
 where id=" . $id;
        // //exit;
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<div class='alert-success alert'>updated successfully</div>";
            header("Location:businesses.php");
        } else {
            die(mysqli_error($conn));
        }
    }
    /*****************when button update presses end****************/

    ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- Begin Page Content -->
                <div class="container">


                    <!-- DataTales Example -->

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary" style="display: inline-block;">Update Business</h6>
                            <!-- <a href="addcategory.php" class="btn btn-primary " style="float: right;" ><i class="fa fa-plus"></i>Add New Record</a> -->

                        </div>
                        <div class="card-body">

                            <form action="<?php echo $_SERVER['PHP_SELF']?>?updateid=<?=$_GET['updateid']?>" method="post" enctype='multipart/form-data'>
                                <div class=" form-group">
                                    <div class='row'>
                                    <div class="col-md-6">

                                        <label for="cars">Business Name:</label>

                                        <input type="text" class="form-control" name="name" value="<?= $result['name'] ?>">



                                    </div>

                                    <div class="col-md-6">

                                        <label for="cars">Business Email:</label>

                                        <input type="text" class="form-control" name="email" value="<?= $result['email'] ?>">
                                    </div>
</div>
</div>                                    <div class="clearfix">&nbsp;</div>
                                   <div class='form-group'>
                                     <div class='row'>
                                    <div class="col-md-6">
                                    <label for="cars">Business City:</label>
                                        <input type="text" class="form-control" name="city" value="<?= $result['city'] ?>">
                                       </div>
                                       <div class="col-md-6">
                                         <label for="cars">Business Phone:</label>
                                            <input type="text" class="form-control" name="phone" value="<?= $result['phone'] ?>">
                                         </div>
</div></div>
                                    <div class="clearfix">&nbsp;</div>
                                   <div class='form-group'>
                                     <div class='row'>
                                    <div class="col-md-6">
                                    <label for="cars">Business Address:</label>
                                        <textarea class="form-control" name="address" rows="4"><?php echo $result['address'] ?></textarea>
                                    </div>
                                     <div class="col-md-6">
                                        <label for="cars">Business Logo:</label>
                                          <input type="file" name="image" class='form-control'>
                                            <input type='hidden' name='prefile' value='<?php echo $result['image']?>'>
                                    </div>
</div></div>
<div class='form-group'>
                                    <div class='row'>
                                        <div class='col-md-6'>
                                            <label>Account Name</label>
                                            <input type='text' name='account_name' value='<?php echo $result['account_name']?>' class='form-control'>
</div>
                                <div class='col-md-6'>
                                <label>Account Number</label>
                                            <input type='number' name='account_number' class='form-control' value='<?php echo $result['account_number']?>'>
</div>
</div></div>
                                <div class='form-group'>
                                    <div class='row'>
                                        <div class='col-md-6'>
                                            <label>Sort Code</label>
                                              <input type='number' name='sort_code' value='<?php echo $result['sort_code']?>' class='form-control'>
</div>
</div></div>
<br>
  
            <div id="inputFormRow" class='col-md-12'>
            
            <?php if($result['headers']!=''){
				$headers = explode(',',$result['headers']);
				foreach($headers as $key=>$header){
				 ?>
                 <div class="input-group mb-3">
                    <input type="text" name="headers[]" class="form-control m-input" placeholder="Enter header" autocomplete="off" value="<?=$header?>">
                    <div class="input-group-append">
                        <button id="removeRow" type="button" class="btn btn-danger">Remove</button>
                    </div>
                </div>
            
            <?php } }else { ?>
                <div class="input-group mb-3">
                    <input type="text" name="headers[]" class="form-control m-input" placeholder="Enter header" autocomplete="off">
                    <div class="input-group-append">
                        <button id="removeRow" type="button" class="btn btn-danger">Remove</button>
                    </div>
                </div>
                <?php } ?>
            </div>

            <div id="newRow"></div>
            <button id="addRow" type="button" class="btn btn-info btn-sm">Add Row</button>
        </div>
                                <div class='form-group'>
                                    <div class='row'>
                                    <div class="col-md-12">
                                        <input type="hidden" name="id" value="<?= $_GET['updateid'] ?>">
                                        <button type="submit" class="btn btn-dark btn-lg m-2" name="update">Update</button>
                                    </div>
</div></div>

                            </form>
                        </div>


                        </div>

                        </form>
                    </div>
                </div>
            </div>

                        </div>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js" integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

                <script type="text/javascript">
        // add row
        $("#addRow").click(function () {
            var html = '';
            html += '<div id="inputFormRow">';
            html += '<div class="input-group mb-3">';
            html += '<input type="text" name="headers[]" class="form-control" placeholder="Enter header" autocomplete="off">';
            html += '<div class="input-group-append">';
            html += '<button id="removeRow" type="button" class="btn btn-danger">Remove</button>';
            html += '</div>';
            html += '</div>';

            $('#newRow').append(html);
        });

        // remove row
        $(document).on('click', '#removeRow', function () {
            $(this).closest('#inputFormRow').remove();
        });
</script>