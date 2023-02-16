<?php
include_once 'config.php';
       $id=1;
   $select = "SELECT * from company where id='".$id."'";
   include_once 'nav.php';
//    echo $select;exit;
    $sql = mysqli_query($conn, $select);
    $result = mysqli_fetch_assoc($sql);
//error_reporting(1);
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link src="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css">
    <link src="https://cdn.datatables.net/responsive/2.4.0/css/responsive.bootstrap5.min.css">
    <title>Settings</title>
</head>

<body>


    <?php 
//print_r($result);exit;
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
        $update = "update company set
        name='".$name."',email='".$email."',phone='".$phone."',address='".$address."',image='".$destination."'
 where id='".$id."'";
 //print_r($_POST);exit;
    //exit;
        $updated = mysqli_query($conn, $update);
        if ($updated) {
            echo "<div class='alert-success alert'>updated successfully</div>";
            header("Location:businesses.php");
        } else {
            die(mysqli_error($conn));
        }
    }
    /*****************when button update presses end****************/

    ?>


    <div id="wrapper">



        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

<br>

                <!-- Begin Page Content -->
                <div class="container">


                    <!-- DataTales Example -->

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary" style="display: inline-block;">Settings Page</h6>
                            <!-- <a href="addcategory.php" class="btn btn-primary " style="float: right;" ><i class="fa fa-plus"></i>Add New Record</a> -->

                        </div>
                        <div class="card-body">

                            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype='multipart/form-data'>
                                <div class=" form-group">
<div class='row'>
                                    <div class="col-md-6">

                                        <label for="cars">Company Name:</label>

                                        <input type="text" class="form-control" name="name" value="<?= $result['name'] ?>">
</div>

                                    <div class="col-md-6">

                                        <label for="cars">Email:</label>

                                        <input type="text" class="form-control" name="email" value="<?= $result['email'] ?>">

                                    </div>
</div></div>
            <div class='form-group'>
                <div class='row'>
                                <div class="col-md-6">
                                <label for="cars">Phone:</label>

                              <input type="text" class="form-control" name="phone" value="<?= $result['phone'] ?>">



</div>
                            <div class='col-md-6'>
                            <label for="cars">Choose a image:</label>
                                        <input type="file" name="image" class='form-control'>
                                        <input type='hidden' name='prefile' value='<?php echo $result['image']?>'>
</div></div></div>
                            <div class='form-group'>
                                <div class='row'>
                                    <div class='col-md-6'>
                                        <label for="cars">Address:</label>
                                        <textarea class="form-control" name="address" rows="4"><?php echo $result['address'] ?></textarea>
                                    </div>
</div></div>
                                    <div class='form-group'>
                                      <div class='row'>
                                        <div class="col-md-12">
                                        <button type="submit" class="btn btn-dark btn-lg m-2" name="update">Update</button>
                                    </div>
</div></div>

                            </form>







                            <!-- <button type="submit" class="btn btn-dark btn-lg" style="float:right;" name="add">add</button> -->


                        </div>
                        <!-- <div class="clearfix">&nbsp;</div>
                        <div class="col-md-12">


                        </div> -->

                        </form>
                    </div>
                </div>
            </div>