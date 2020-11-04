<?php
session_start();
include_once 'db.php';
$img = mysqli_query($conn,"SELECT * FROM user_info WHERE user_id = '".$_SESSION["username"]."' ") or die( mysqli_error($conn));
$result = mysqli_query($conn,"SELECT * FROM courses") or die( mysqli_error($conn));
$result1 = mysqli_query($conn,"SELECT * FROM attendance WHERE user_id = '".$_SESSION["username"]."' ") or die( mysqli_error($conn));
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="styles.css">
    <script async="" defer="" src="https://buttons.github.io/buttons.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  </head>
  <body>
    <section id="sideMenu">
      <nav>
        <a href="home.php"><i class="fa fa-home"></i>Home</a>
        <a href="timetable.php"><i class="fa fa-sticky-note"></i>Timetable</a>
        <a href="attendance.php" class="active"><i class="fa fa-bookmark"></i>Attendance</a>
        <a href="calendar.php"><i class="fa fa-calendar"></i>Calendar</a>
        <a href="project.php"><i class="fa fa-percent"></i>Project</a>
        <a href="contact.php"><i class="fa fa-user"></i>Contact Book</a>
      </nav>
    </section>

    <header>
      <div class="search-area">
        <i class="fa fa-search" aria-hidden="true"></i>
        <input type="text" name="" value="">
      </div>
      <div class="user-area">
        <a href="logout.php" class="add">Logout</a>
        <a href="#">
        <div class="user-img" style="background: url(<?php $k = mysqli_fetch_array($img); echo $k["img_url"]; ?>) no-repeat center center;background-size:cover;"></div>
        </a>

      </div>
    </header>
    <section id="content-area">
      <div class="col-md-12">
        <div class="row">
          <div class="heading">
            <h1>Dashboard</h1>
            <p>Welcome to Student Dashboard V1.0</p>
          </div>
        </div>
      </div>

    <div class="col-md-12">
      <div class="row">
      <table>
        <thead>
          <tr>
            <th>COURSE</th>
            <th>PRESENT</th>
            <th>ATTENDANCE</th>
            <th>ABSENT</th>
            <th>CALCULATE</th>
          </tr>
        </thead>
        <tbody>
        <?php
          $i=1;
          while($row = mysqli_fetch_array($result1)) {
            if($row["user_id"]=== $_SESSION["username"]){
            $j=0;
            while($row1 = mysqli_fetch_array($result)){
                if($row1["course_code"]===$row["course_id"]){
                  $name = $row1["course_name"];
                  $present = $row["present"];
                  $absent = $row["absent"];
                  $percent = ceil(($present/($present + $absent))*100);
                  $id = $row["course_id"];
                  break;
                }
              $j++;
              break;
            }
          }
        ?>
          <tr>
            <td style="text-align: left;"><span class="logo">LS</span><?php echo $name; ?></td>
            <td><input type="text" id="t<?php echo $i; ?>" value= "<?php echo $present; ?>" name = "present<?php echo $id; ?>"></td>
            <td class="percent" id="c<?php echo $i; ?>"><?php echo $percent; ?></td>
            <td><input type="text" id="k<?php echo $i; ?>" value= "<?php echo $absent; ?>" name = "absent<?php echo $id; ?>"></td>
            <td><a href="update.php?course_id=<?php echo $row["course_id"];?>" style="color:  #6C7882;text-decoration: none;">Update</a></td>
          </tr>
          <?php
            $i++;
            }
          ?>
        </tbody>
      </table>
     </div>
   </div>
    </section>
  </body>
</html>
