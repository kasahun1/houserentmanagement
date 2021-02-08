<?php include 'db.php';?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>paidrenters</title>
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
<div class="main-content unique">
<h2>የክፍያ control</h2>
    <a href="payment.php">ወደ የክፍያ መሰብሰቢያ</a>
                <table>
                    <thead>
                        <th>ተ.ቁ</th>
                        <th>ሙሉ ስም</th>
                        <th>የቤት አይነት</th>
                        <th>የክፍያ ወር</th>
                        <th>ክፍያ መጠን</th>
                        <th>የከፈለበት ቀን</th>
                    </thead>
                    <tbody>
                      <?php while ($row = mysqli_fetch_array($paylist)) { ?>
                        <tr>
                            <td><?php echo $row['id'];?></td>
                            <td><?php echo $row['name'];?></td>
                            <td><?php echo $row['housetype'];?></td>
                            <td><?php echo $row['regmonth'];?></td>
                            <td><?php echo $row['amount'];?></td>
                            <td><?php echo $row['regday'];?></td>
                          
                            <td><a href="#" class="edit">ለማስተካከል</a></td>
                            <td><a href="#" class="delete">ለማጥፋት</a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
</div>
</div>
<div class="footer">
  <p>&copy;Copyright 2020 |Designed by Kasahun Abebe</p>
</div>
</body>
</html>