<html>
<head>
	<title>Company</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        #submit{
            cursor: pointer;
        }
    </style>
</head>
<body>
	<form method="post" action="insert-company.php" enctype="multipart/form-data">
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
			<label>Image</label>
			<input type="file" name="image" value="">
		</div>
		<div class="input-group">
        <input type="submit" class="btn btn-info" id='submit' value="submit" name="save">
		</div>
	</form>
</body>
</html>