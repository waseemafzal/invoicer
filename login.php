<?php 
include_once'config.php';
error_reporting(1);
if(isset($_POST['btnSubmit'])){
  $password=  md5($_POST['password']);
 	$select = "select * from users where email='".$_POST['email']."' and password='".$password."'";
//exit;
$result	= $conn->query($select);
if ($result->num_rows > 0) {
$row =  $result->fetch_assoc();
session_start();
$_SESSION['login']=1;
$_SESSION['email']=$row->email;
header("Location:index.php");
}
	}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>

<body>
<div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-md-9 col-lg-6 col-xl-6 my-lg-5 py-lg-5">
            <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp" class="img-fluid" alt="Sample image">
          </div>
          <div class="col-md-8 col-lg-6 col-xl-5 offset-xl-1 my-lg-5 py-lg-5">
            <form method="post">
              <div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
                <p class="lead fw-normal mb-0 me-3">Sign in with</p>
                <button type="button" class="btn btn-primary btn-floating mx-1">
                  <i class="fab fa-facebook-f"></i>
                </button>

                <button type="button" class="btn btn-primary btn-floating mx-1">
                  <i class="fab fa-twitter"></i>
                </button>

                <button type="button" class="btn btn-primary btn-floating mx-1">
                  <i class="fab fa-linkedin-in"></i>
                </button>
              </div>

              <div class="divider d-flex align-items-center my-4">
                <p class="text-center fw-bold mx-3 mb-0">Or</p>
              </div>

              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="email" id="form3Example3" required="required" name="email" class="form-control form-control-lg" placeholder="Enter a valid email address">
                <label class="form-label" for="form3Example3" style="margin-left: 0px;">Email address</label>
              <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 88.8px;"></div><div class="form-notch-trailing"></div></div></div>

              <!-- Password input -->
              <div class="form-outline mb-3">
                <input type="password" name="password" required="required" id="form3Example4" class="form-control form-control-lg" placeholder="Enter password">
                <label class="form-label" for="form3Example4" style="margin-left: 0px;">Password</label>
              <div class="form-notch"><div class="form-notch-leading" style="width: 9px;"></div><div class="form-notch-middle" style="width: 64px;"></div><div class="form-notch-trailing"></div></div></div>

              <div class="d-flex justify-content-between align-items-center">
                <!-- Checkbox -->
                <div class="form-check mb-0">
                  <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3">
                  <label class="form-check-label" for="form2Example3">
                    Remember me
                  </label>
                </div>
               <!-- <a href="#!" class="text-body">Forgot password?</a>-->
              </div>

              <div class="text-center text-lg-start mt-4 pt-2">
                <button type="submit" class="btn btn-primary btn-lg" name="btnSubmit" style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
                <!--<p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="#!" class="link-danger">Register</a></p>-->
              </div>

            </form>
          </div>
        </div>
</body>
</html>