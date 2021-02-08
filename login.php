<?php include 'db.php';?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1"> 
    <link rel="stylesheet" type="text/css" href="style.css">
	<title>#login</title>
</head>
<body style="background-color: rgb(214, 214, 214);">
<div class="container">
	<div class="title">
		<h2>Login</h2>
	</div>
	<form action="login.php" method="post" enctype="multipart/form-data" class="logform">
        <!-- display validation errors-->
        <?php include('errors.php'); ?>
        
		<div class="input-group">
        <label>username</label>
        <input type="text" name="username" autocomplete="off">
        </div>
        <div class="input-group">
        <label>Password</label>
        <input type="Password" name="password">
        </div>
        <div class="input-group">
        <button type="submit" name="login" class="btn">Login</button>
        </div>
        <p>Not yet a memeber?<a href="register.php">Sign up</a></p>
	</form>
</div>
</body>
</html>