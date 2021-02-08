<?php include 'db.php';
if (isset($_Get['edit'])) {
     $id = $_Get['edit'];
     $edit_state = true;
     $rec = mysqli_query($conn, "SELECT * FROM renterform WHERE id=$id");
     $record = mysql_fetch_array($rec);
    $id = $record['id'];
    $name = $record['name'];
    $sex =$record['sex'];
    $date = $record['regday'];
    $room =$record['housetype'];
    $kilil =$record['region'];
    $city =$record['city'];
    $woreda =$record['woreda'];
    $kebele =$record['kebele'];
    $number = $record['phone_no'];
   }

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<title>renterdata</title>
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
    <h2>ተከራይ ዝርዝር</h2>
    <a href="rentersregistration.php">አዲስ ተከራይ ለማስገባት</a>
                <table>
                    <thead>
                        <th>ተ.ቁ</th>
                        <th>ሙሉ ስም</th>
                        <th>ጾታ</th>
                        <th>የቤት አይነት</th>
                        <th>የምዝገባ ቀን</th>
                        <th>ሰልክ ቁጥር</th>
                        <th>ክልል</th>
                        <th>ከተማ</th>
                        <th>ወረዳ</th>
                        <th>ቀበሌ</th>
                    </thead>
                    <tbody>
                      <?php while ($row = mysqli_fetch_array($reglist)) { ?>
                        <tr>
                            <td><?php echo $row['id'];?></td>
                            <td><?php echo $row['name'];?></td>
                            <td><?php echo $row['sex'];?></td>
                            <td><?php echo $row['housetype'];?></td>
                            <td><?php echo $row['regday'];?></td>
                            <td><?php echo $row['phone_no'];?></td>
                            <td><?php echo $row['region'];?></td>
                            <td><?php echo $row['city'];?></td>
                            <td><?php echo $row['woreda'];?></td>
                            <td><?php echo $row['kebele'];?></td>

                          
                            <td><a href="rentersregistration.php?edit=<?php echo $row['id'];?>" class="edit">ለማስተካከል</a></td>
                            <td><a href="renterlist.php?del=<?php echo $row['id'];?>" class="delete">ለማጥፋት</a></td>
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