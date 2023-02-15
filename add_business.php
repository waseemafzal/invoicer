<?php
include_once 'config.php';
error_reporting(1);
?>
<html>
<head>
	<title>Businesses</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        #submit{
            cursor: pointer;
        }
    </style>
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


        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
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
        /********/

        // $image = 'noimg.png';



        $sql = "INSERT INTO `businesses`(name,email,phone,address,city,image)
    VALUES('" . $name . "','" . $email . "','" . $phone . "','" . $address . "','" . $city . "','" . $image . "')";
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
	<form method="post" action="<?= $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
		<div class="input-group">
			<label>Name</label>
			<input type="text" name="name" value="">
		</div>
		<div class="input-group">
			<label>Email</label>
			<input type="email" name="email" value="">
		</div>
        <div class="input-group">
			<label>Phone</label>
			<input type="number" name="phone" value="">
		</div>
		<div class="input-group">
			<label>Address</label>
			<input type="text" name="address" value="">
		</div>
        <div class="input-group">
			<label>City</label>
			<input type="text" name="city" value="">
		</div>
		<div class="input-group">
			<label>Image</label>
			<input type="file" name="image" value="">
		</div>
		<div class="input-group">
        <input type="submit" class="btn btn-info" id='submit' value="submit" name="done">
		</div>
	</form>
</body>
</html>