<?php
include_once 'config.php';
       $id=1;
   $select = "SELECT * from company where id='".$id."'";
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
    <title>Business</title>
</head>

<body>


    <?php 
//print_r($result);exit;
    if (isset($_POST['update'])) {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $image = $_FILES['image'];
        $filename = $image['name'];
        $tmpname = $image['tmp_name'];
        $fileext = explode('.', $filename);
        $filecheck = strtolower(end($fileext));
        $requiredextensions = array('jpg', 'jpeg', 'png', 'PNG', 'GIF');
        if(in_array($filecheck,$requiredextensions)){
           $destination = 'uploads/'.$filename;
           move_uploaded_file($tmpname, $destination);
        }   
        $update = "update company set
        name='".$name."',email='".$email."',phone='".$phone."',address='".$address."',image='".$image."'
 where id='".$id."'";
 //echo $sql;exit;
        // //exit;
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



                <!-- Begin Page Content -->
                <div class="container-fluid">


                    <!-- DataTales Example -->

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary" style="display: inline-block;">Update Business</h6>
                            <!-- <a href="addcategory.php" class="btn btn-primary " style="float: right;" ><i class="fa fa-plus"></i>Add New Record</a> -->

                        </div>
                        <div class="card-body">

                            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype='multipart/form-data'>
                                <div class=" form-group row">


                                    <div class="clearfix">&nbsp;</div>

                                    <div class="col-md-6 form-group row">

                                        <label for="cars">Company Name:</label>

                                        <input type="text" style="width: 50%;" class="form-control" name="name" value="<?= $result['name'] ?>">



                                    </div>
                                    <div class="clearfix">&nbsp;</div>

                                    <div class="col-md-6 form-group row">

                                        <label for="cars">Email:</label>

                                        <input type="text" style="width: 50%;" class="form-control" name="email" value="<?= $result['email'] ?>">



                                    </div>
                                    <div class="clearfix">&nbsp;</div>

                                    <div class="col-md-12">
                                        <label for="cars">Address:</label>
                                        <textarea class="form-control" style="width: 30%;" name="address" rows="4"><?php echo $result['address'] ?></textarea>
                                    </div>
                                    <div class="clearfix">&nbsp;</div>

                                    <div class="col-md-6 form-group row">

                                        <label for="cars">Phone:</label>

                                        <input type="text" style="width: 50%;" class="form-control" name="phone" value="<?= $result['phone'] ?>">



                                    </div>
                                    <div class="clearfix">&nbsp;</div>

                                    <div class="col-md-12">

                                        <label for="cars">Choose a image:</label>
                                        <input type="file" name="image">
                                    </div>

                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-dark btn-lg" name="update">Update</button>
                                    </div>


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