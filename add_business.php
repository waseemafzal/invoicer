<?php
include_once 'config.php';
error_reporting(1);
include_once 'nav.php';
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    #submit{
            cursor: pointer;
        }
</style>
    <title>Add Business</title>
</head>
<body>
<?php 
    if (isset($_GET['updateid'])) {
        $id = $_GET['updateid'];
    }


    if (isset($_POST['done'])) {
        // echo "<pre>";
        // print_r($_POST);

        // exit;

print_r($_POST);exit;
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $account_number = $_POST['account_number'];
        $account_name = $_POST['account_name'];
        $sort_code = $_POST['sort_code'];
        $_POST['headers'] = implode($_POST['headers']);
        $headers = $_POST['headers'];
        //$headers = implode(',', $business_headers);
        $city = $_POST['city'];
        if (isset($_FILES['image']['name']) and $_FILES['image']['name'] != '') {

            $info = pathinfo($_FILES['image']['name']);

            $ext = $info['extension']; // get the extension of the file

            $newname = rand(5, 3456) * date(time()) . "." . $ext;

            $target = 'uploads/' . $newname;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {

                $image = $newname;
            }
        }
        $sql = "INSERT INTO `businesses`(name,email,phone,address,account_number,account_name,sort_code,headers,city,image)
    VALUES('" . $name . "','" . $email . "','" . $phone . "','" . $address . "','".$account_number."', '".$account_name."','".$sort_code."','".$headers."','" . $city . "','" . $image . "')";
        // //exit;
        $result = mysqli_query($conn, $sql);
        if ($result) {
            echo "<div class='alert-success alert'>inserted successfully</div>";
            header("Location:businesses.php");
        } else {
            die(mysqli_error($conn));
        }
    }
    /*****************when button update presses end****************/

    ?>
	<br><br>
    <div id="wrapper">



        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- Begin Page Content -->
                <div class="container">


                    <!-- DataTales Example -->

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary" style="display: inline-block;">Add Business</h6>
                            <!-- <a href="addcategory.php" class="btn btn-primary " style="float: right;" ><i class="fa fa-plus"></i>Add New Record</a> -->

                        </div>
                        <div class="card-body">

                            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype='multipart/form-data'>
                                <div class=" form-group">
                                    <div class='row'>
                                    <div class="col-md-6">

                                        <label for="cars">Business Name:</label>

                                        <input type="text" class="form-control" name="name">



                                    </div>

                                    <div class="col-md-6">

                                        <label for="cars">Business Email:</label>

                                        <input type="email" class="form-control" name="email">
                                    </div>
</div>
</div>                                    <div class="clearfix">&nbsp;</div>
                                   <div class='form-group'>
                                     <div class='row'>
                                    <div class="col-md-6">
                                    <label for="cars">Business City:</label>
                                        <input type="text" class="form-control" name="city">
                                       </div>
                                       <div class="col-md-6">
                                         <label for="cars">Business Phone:</label>
                                            <input type="number" class="form-control" name="phone">
                                         </div>
</div></div>
                                    <div class="clearfix">&nbsp;</div>
                                   <div class='form-group'>
                                     <div class='row'>
                                    <div class="col-md-6">
                                    <label for="cars">Business Address:</label>
                                        <textarea type='text' class="form-control" name="address" rows="4"></textarea>
                                    </div>
                                     <div class="col-md-6">
                                        <label for="cars">Business Logo:</label>
                                          <input type="file" name="image" class='form-control'>
                                    </div>
</div></div>
                                <div class='form-group'>
                                    <div class='row'>
                                        <div class='col-md-6'>
                                            <label>Account Name</label>
                                            <input type='text' name='account_name' class='form-control'>
</div>
                                <div class='col-md-6'>
                                <label>Account Number</label>
                                            <input type='number' name='account_number' class='form-control'>
</div>
</div></div>
                                <div class='form-group'>
                                    <div class='row'>
                                        <div class='col-md-6'>
                                            <label>Sort Code</label>
                                              <input type='number' name='sort_code' class='form-control'>
</div>
</div></div>
<br>
  
            <div id="inputFormRow" class='col-md-12'>
                <div class="input-group mb-3">
                    <input type="text" name="headers[]" class="form-control m-input" placeholder="Enter header" autocomplete="off">
                    <div class="input-group-append">
                        <button id="removeRow" type="button" class="btn btn-danger">Remove</button>
                    </div>
                </div>
            </div>

            <div id="newRow"></div>
            <button id="addRow" type="button" class="btn btn-info btn-sm">Add Row</button>
        </div>
                            
                                <div class='form-group m-3'>
                                    <div class='row'>
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-dark btn-lg" id='submit' name="update">Submit</button>
                                    </div>
</div></div>

                            </form>
                        </div>
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

                        </div>
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