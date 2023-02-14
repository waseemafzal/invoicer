<?php

error_reporting(1);
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


<?php include_once 'config.php';

$select = 'SELECT * FROM `businesses` WHERE id=' . $_GET['updateid'];
$sql = mysqli_query($conn, $select);
$result = mysqli_fetch_assoc($sql);
//  echo "<pre>";
//     print_r($_POST);

//     exit;

if (isset($_POST['update'])) {
    // echo "<pre>";
    // print_r($_POST);

    // exit;

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $image = $_POST['image'];

    // $image = 'noimg.png';

    $sql = "update `businesses` set
        name='" . $name . "',email='" . $email . "',phone='" . $phone . "',address='" . $address . "',city='" . $city . "',image='" . $image . "'
 where id=" . $id;
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
                            

                        </div>
                        <div class="card-body">







                           


                    
                </div>
            </div>