<?php include 'db.php';?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>payment</title>
</head>
<body>
<header>
   <div class="container">
   	<div class="logo">
   	 		<a href="index.php"><img src="images/house13.png"><span>HRMS</span></a>
   	</div>
   </div>
</header>
<div class="home">	
<div class="left-sidebar">
  		<input type="text" class="searchbox" name="search" placeholder="Search..." data-toggle="tooltip" title="search here!" autocomplete="off">
  		<button class="search">Search</button>
  		<ul>
  			<li><a href="index.php">መግቢያ</a></li>
  			<li><a href="rentersregistration.php">አዲስ ተከራይ ማስገቢያ</a></li>
  			<li><a href="renterlist.php">ተከራይ ዝርዝር </a></li>
  			<li><a href="payment.php">የክፍያ መሰብሰቢያ</a></li>
        <li><a href="paymentlist.php">የክፍያ መከታተያ</a></li>
  			<li><a href="logout.php">Logout</a></li>
  		</ul>
</div>
<div class="main-content">
  <h2>የክፍያ መሰብሰቢያ</h2>
  <a href="paymentlist.php">ወደ ዝርዝር ለመመለስ</a>
  <form action="payment.php" method="post" enctype="multipart/form-data">
    <!-- display validation errors-->
    <?php include('errors.php'); ?>
  <input type="hidden" name="id" value="<?php echo $id; ?>">
  	<div class="renterinfo">
	<label>ሙሉ ስም</label><br>
	<select name="fullname" class="textinput">
    <option>Select Renter name</option>
    <?php while ($row = mysqli_fetch_array($reglist)) { ?>
     <option><?php echo $row['name'];?></option>
    <?php } ?>
  </select>
    </div>
    
  <div class="renterinfo">
	<label>የቤት አይነት </label><br>
	<select name="room" class="textinput">
     <option>Select house type</option>
     <option>One Room</option>
     <option>Two Room</option>
  </select>
  </div>

  <div class="renterinfo">
  <label>የክፍያ ወር</label><br>
  <select name="month" class="textinput">
     <option>Select month</option>
     <option>september</option>
     <option>october</option>
     <option>november</option>
     <option>december</option>
     <option>january</option>
     <option>februarry</option>
     <option>march</option>
     <option>april</option>
     <option>may</option>
     <option>june</option>
     <option>july</option>
     <option>august</option>
  </select>
  </div>

	<div class="renterinfo">
	<label>ክፍያ መጠን</label><br>
	<input type="text" name="amount" class="textinput">
	</div>

  <div class="renterinfo">
  <label>የከፈለበት ቀን</label><br>
  <input type="date" name="date" class="textinput">
  </div>

	<div class="renterinfo">
	<input type="submit" value="ክፈል/Pay" name="pay" class="textinput">
	</div>
  </form>
</div>
</div>
<div class="footer">
  <p>&copy;Copyright 2020 |Designed by Kasahun Abebe</p>
</div>
</body>
</html>