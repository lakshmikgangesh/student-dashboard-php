<?php
session_start();
include_once 'db.php';
$img = mysqli_query($conn,"SELECT * FROM user_info WHERE user_id = '".$_SESSION["username"]."' ") or die( mysqli_error($conn));
$monday = mysqli_query($conn,"SELECT * FROM monday") or die( mysqli_error($conn));
$tuesday = mysqli_query($conn,"SELECT * FROM tuesday") or die( mysqli_error($conn));
$wednesday = mysqli_query($conn,"SELECT * FROM wednesday") or die( mysqli_error($conn));
$thursday = mysqli_query($conn,"SELECT * FROM thursday") or die( mysqli_error($conn));
$friday = mysqli_query($conn,"SELECT * FROM friday") or die( mysqli_error($conn));
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="styles.css">
    <script async src="https://cse.google.com/cse.js?cx=0d8bd3e4319d22809"></script>
    <script async="" defer="" src="https://buttons.github.io/buttons.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  </head>
  <body>
    <section id="sideMenu">
      <nav>
        <a href="home.php"><i class="fa fa-home"></i>Home</a>
        <a href="timetable.php" class="active"><i class="fa fa-sticky-note"></i>Timetable</a>
        <a href="attendance.php"><i class="fa fa-bookmark"></i>Attendance</a>
        <a href="calendar.php"><i class="fa fa-calendar"></i>Calendar</a>
        <a href="project.php"><i class="fa fa-percent"></i>Project</a>
        <a href="contact.php"><i class="fa fa-user"></i>Contact Book</a>
      </nav>
    </section>
    <header>
      <div class="search-area gcse-search">
        <i class="fa fa-search" aria-hidden="true"></i>
        <input type="text" name="" value="">
      </div>
      <div class="user-area">
        <a href="#" class="add">Logout</a>
        <a href="#">
        <div class="user-img" style="background: url(<?php $k = mysqli_fetch_array($img); echo $k["img_url"]; ?>) no-repeat center center;background-size:cover;"></div>
        </a>

      </div>
    </header>
    <section id="content-area">
      <div class="col-md-12">
        <div class="row">
          <div class="heading">
            <h1>Time Table</h1>
            <p>Welcome to Your Time Table</p>
          </div>
        </div>
      </div>
      <div class="wrapper">
    <table style="text-align:left;">
        <tr>
            <th>DAYS</th>
            <th>8:00</th>
            <th>9:00</th>
            <th>10:00</th>
            <th>11:00</th>
            <th>12:00</th>
            <th>14:00</th>
            <th>15:00</th>
            <th>16:00</th>            
        </tr>
          <?php
          $i=1;
          while($row = mysqli_fetch_array($monday)) {
            if($row["userid"] === $_SESSION["username"])
            {
        ?>
        <tr>
          <td>MONDAY</td>
          <td><?php if ($row["eight"]==NULL) { echo " ";} else {echo $row["eight"];}?></td>
          <td><?php if ($row["nine"]==NULL) { echo " ";} else {echo $row["nine"];}?></td>
          <td><?php if ($row["ten"]==NULL) { echo " ";} else {echo $row["ten"];}?></td>
          <td><?php if ($row["eleven"]==NULL) { echo " ";} else {echo $row["eleven"];}?></td>
          <td><?php if ($row["twelve"]==NULL) { echo " ";} else {echo $row["twelve"];}?></td>
          <td><?php if ($row["two"]==NULL) { echo " ";} else {echo $row["two"];}?></td>
          <td><?php if ($row["three"]==NULL) { echo " ";} else {echo $row["three"];}?></td>
          <td style="color: #6C7882;"><?php if ($row["four"]==NULL) { echo " ";} else {echo $row["four"];}?></td>
        </tr>
        <?php
            break;
            }
            $i++;
          }
        ?>
        <?php
          $i=1;
          while($row = mysqli_fetch_array($tuesday)) {
            if($row["userid"] === $_SESSION["username"])
            {
        ?>
        <tr>
          <td>TUESDAY</td>
          <td><?php if ($row["eight"]==NULL) { echo " ";} else {echo $row["eight"];}?></td>
          <td><?php if ($row["nine"]==NULL) { echo " ";} else {echo $row["nine"];}?></td>
          <td><?php if ($row["ten"]==NULL) { echo " ";} else {echo $row["ten"];}?></td>
          <td><?php if ($row["eleven"]==NULL) { echo " ";} else {echo $row["eleven"];}?></td>
          <td><?php if ($row["twelve"]==NULL) { echo " ";} else {echo $row["twelve"];}?></td>
          <td><?php if ($row["two"]==NULL) { echo " ";} else {echo $row["two"];}?></td>
          <td><?php if ($row["three"]==NULL) { echo " ";} else {echo $row["three"];}?></td>
          <td style="color: #6C7882;"><?php if ($row["four"]==NULL) { echo " ";} else {echo $row["four"];}?></td>
        </tr>
        <?php
            break;
            }
            $i++;
          }
        ?>
        <?php
          $i=1;
          while($row = mysqli_fetch_array($wednesday)) {
            if($row["userid"] === $_SESSION["username"])
            {
        ?>
        <tr>
          <td>WEDNESDAY</td>
          <td><?php if ($row["eight"]==NULL) { echo " ";} else {echo $row["eight"];}?></td>
          <td><?php if ($row["nine"]==NULL) { echo " ";} else {echo $row["nine"];}?></td>
          <td><?php if ($row["ten"]==NULL) { echo " ";} else {echo $row["ten"];}?></td>
          <td><?php if ($row["eleven"]==NULL) { echo " ";} else {echo $row["eleven"];}?></td>
          <td><?php if ($row["twelve"]==NULL) { echo " ";} else {echo $row["twelve"];}?></td>
          <td><?php if ($row["two"]==NULL) { echo " ";} else {echo $row["two"];}?></td>
          <td><?php if ($row["three"]==NULL) { echo " ";} else {echo $row["three"];}?></td>
          <td style="color: #6C7882;"><?php if ($row["four"]==NULL) { echo " ";} else {echo $row["four"];}?></td>
        </tr>
        <?php
            break;
            }
            $i++;
          }
        ?>
        <?php
          $i=1;
          while($row = mysqli_fetch_array($thursday)) {
            if($row["userid"] === $_SESSION["username"])
            {
        ?>
        <tr>
          <td>THURSDAY</td>
          <td><?php if ($row["eight"]==NULL) { echo " ";} else {echo $row["eight"];}?></td>
          <td><?php if ($row["nine"]==NULL) { echo " ";} else {echo $row["nine"];}?></td>
          <td><?php if ($row["ten"]==NULL) { echo " ";} else {echo $row["ten"];}?></td>
          <td><?php if ($row["eleven"]==NULL) { echo " ";} else {echo $row["eleven"];}?></td>
          <td><?php if ($row["twelve"]==NULL) { echo " ";} else {echo $row["twelve"];}?></td>
          <td><?php if ($row["two"]==NULL) { echo " ";} else {echo $row["two"];}?></td>
          <td><?php if ($row["three"]==NULL) { echo " ";} else {echo $row["three"];}?></td>
          <td style="color: #6C7882;"><?php if ($row["four"]==NULL) { echo " ";} else {echo $row["four"];}?></td>
        </tr>
        <?php
            break;
            }
            $i++;
          }
        ?>
        <?php
          $i=1;
          while($row = mysqli_fetch_array($friday)) {
            if($row["userid"] === $_SESSION["username"])
            {
        ?>
        <tr>
          <td>FRIDAY</td>
          <td><?php if ($row["eight"]==NULL) { echo " ";} else {echo $row["eight"];}?></td>
          <td><?php if ($row["nine"]==NULL) { echo " ";} else {echo $row["nine"];}?></td>
          <td><?php if ($row["ten"]==NULL) { echo " ";} else {echo $row["ten"];}?></td>
          <td><?php if ($row["eleven"]==NULL) { echo " ";} else {echo $row["eleven"];}?></td>
          <td><?php if ($row["twelve"]==NULL) { echo " ";} else {echo $row["twelve"];}?></td>
          <td><?php if ($row["two"]==NULL) { echo " ";} else {echo $row["two"];}?></td>
          <td><?php if ($row["three"]==NULL) { echo " ";} else {echo $row["three"];}?></td>
          <td style="color: #6C7882;"><?php if ($row["four"]==NULL) { echo " ";} else {echo $row["four"];}?></td>
        </tr>
        <?php
            break;
            }
            $i++;
          }
        ?>

        <!--
        <?php /*
          $i=1;
          while($row = mysqli_fetch_array($tuesday)) {
            if($row["userid"]=== $_SESSION["username"])
            {
        ?>
        <tr>
          <td><?php if ($row["eight"]==NULL) { echo " ";} else {echo $row["eight"];}?></td>
          <td><?php if ($row["nine"]==NULL) { echo " ";} else {echo $row["nine"];}?></td>
          <td><?php if ($row["ten"]==NULL) { echo " ";} else {echo $row["ten"];}?></td>
          <td><?php if ($row["eleven"]==NULL) { echo " ";} else {echo $row["eleven"];}?></td>
          <td><?php if ($row["twelve"]==NULL) { echo " ";} else {echo $row["twelve"];}?></td>
          <td><?php if ($row["two"]==NULL) { echo " ";} else {echo $row["two"];}?></td>
          <td><?php if ($row["three"]==NULL) { echo " ";} else {echo $row["three"];}?></td>
          <td><?php if ($row["four"]==NULL) { echo " ";} else {echo $row["four"];}?></td>
        </tr>
        <?php
            break;
            }
            $i++;
          }
        ?>
        <?php
          $i=1;
          while($row = mysqli_fetch_array($wednesday)) {
            if($row["user_id"]=== $_SESSION["username"])
            {
        ?>
        <tr>
          <td><?php if ($row["eight"]==NULL) { echo " ";} else {echo $row["eight"];}?></td>
          <td><?php if ($row["nine"]==NULL) { echo " ";} else {echo $row["eight"];}?></td>
          <td><?php if ($row["ten"]==NULL) { echo " ";} else {echo $row["eight"];}?></td>
          <td><?php if ($row["eleven"]==NULL) { echo " ";} else {echo $row["eight"];}?></td>
          <td><?php if ($row["twelve"]==NULL) { echo " ";} else {echo $row["eight"];}?></td>
          <td><?php if ($row["two"]==NULL) { echo " ";} else {echo $row["eight"];}?></td>
          <td><?php if ($row["three"]==NULL) { echo " ";} else {echo $row["eight"];}?></td>
          <td><?php if ($row["four"]==NULL) { echo " ";} else {echo $row["eight"];}?></td>
        </tr>
        <?php
            break;
            }
            $i++;
        ?>
        <?php
          $i=1;
          while($row = mysqli_fetch_array($thursday)) {
            if($row["user_id"]=== $_SESSION["username"])
            {
        ?>
        <tr>
          <td><?php if ($row["eight"]==NULL) { echo " ";} else {echo $row["eight"];}?></td>
          <td><?php if ($row["nine"]==NULL) { echo " ";} else {echo $row["eight"];}?></td>
          <td><?php if ($row["ten"]==NULL) { echo " ";} else {echo $row["eight"];}?></td>
          <td><?php if ($row["eleven"]==NULL) { echo " ";} else {echo $row["eight"];}?></td>
          <td><?php if ($row["twelve"]==NULL) { echo " ";} else {echo $row["eight"];}?></td>
          <td><?php if ($row["two"]==NULL) { echo " ";} else {echo $row["eight"];}?></td>
          <td><?php if ($row["three"]==NULL) { echo " ";} else {echo $row["eight"];}?></td>
          <td><?php if ($row["four"]==NULL) { echo " ";} else {echo $row["eight"];}?></td>
        </tr>
        <?php
            break;
            }
            $i++;
          }
        ?>
        <?php
          $i=1;
          while($row = mysqli_fetch_array($friday)) {
            if($row["user_id"]=== $_SESSION["username"])
            {
        ?>
        <tr>
          <td><?php if ($row["eight"]==NULL) { echo " ";} else {echo $row["eight"];}?></td>
          <td><?php if ($row["nine"]==NULL) { echo " ";} else {echo $row["eight"];}?></td>
          <td><?php if ($row["ten"]==NULL) { echo " ";} else {echo $row["eight"];}?></td>
          <td><?php if ($row["eleven"]==NULL) { echo " ";} else {echo $row["eight"];}?></td>
          <td><?php if ($row["twelve"]==NULL) { echo " ";} else {echo $row["eight"];}?></td>
          <td><?php if ($row["two"]==NULL) { echo " ";} else {echo $row["eight"];}?></td>
          <td><?php if ($row["three"]==NULL) { echo " ";} else {echo $row["eight"];}?></td>
          <td><?php if ($row["four"]==NULL) { echo " ";} else {echo $row["eight"];}?></td>
        </tr>
        <?php
            break;
            }
            $i++;
          }*/
        ?>-->         
    </table>
</div>
</section>
</body>
</html>