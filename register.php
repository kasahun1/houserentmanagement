<?php include 'db.php';?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <link rel="stylesheet" type="text/css" href="style.css">
	<title>#register</title>
</head>
<body style="background-color: rgb(214, 214, 214);">
<div class="container">
	<div class="title">
		<h2>Register</h2>
	</div>
	<form action="register.php" method="post" enctype="multipart/form-data" class="logform">
        <!-- display validation errors-->
        <?php include('errors.php'); ?>

		<div class="input-group">
        <label>username</label>
        <input type="text" name="username" autocomplete="off">
        </div>
        <div class="input-group">
        <label>Password</label>
        <input type="Password" name="password_1">
        </div>
        <div class="input-group">
        <label>Confirm Password</label>
        <input type="Password" name="password_2">
        </div>
        <div class="input-group">
        <button type="submit" name="register" class="btn">Register</button>
        </div>
        <p>Already a memeber?<a href="login.php">Sign In</a></p>
	</form>
</div>
</body>
</html>