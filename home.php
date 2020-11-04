<?php
session_start();
include_once 'db.php';
$result = mysqli_query($conn,"SELECT * FROM courses") or die( mysqli_error($conn));
$result1 = mysqli_query($conn,"SELECT * FROM user_info WHERE user_id = '".$_SESSION["username"]."' ") or die( mysqli_error($conn));
$cal = mysqli_query($conn, "SELECT * FROM calendar") or die( mysqli_error($conn));
$teacher = mysqli_query($conn,"SELECT * FROM teacher WHERE user_id = '".$_SESSION["username"]."' ") or die( mysqli_error($conn));
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
        <a href="home.php" class="active"><i class="fa fa-home"></i>Home</a>
        <a href="timetable.php"><i class="fa fa-sticky-note"></i>Timetable</a>
        <a href="attendance.php"><i class="fa fa-bookmark"></i>Attendance</a>
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
        <div class="user-img" style="background: url(<?php $k = mysqli_fetch_array($result1); echo $k["img_url"]; ?>) no-repeat center center;background-size:cover;"></div>
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

      <div class="cards">
        <div class="row calendar">
          <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
            <div class="card">
            <div class="user-img" style="background: url(<?php echo $k["img_url"]; ?>) no-repeat center center;background-size:cover;"></div>
                <span class="user-name"><?php echo $k["name"]; ?></span>
                <span class="user-title"><?php echo $k["course"]; ?></span>
                <hr>
                <div class="col-md-3">
                  <span class="education">Education</span>
                </div>
                <div class="col-md-9">
                  <span class="schools"><?php echo $k["education"]; ?></span>
                </div>
                  <div class="col-md-3">
                    <span class="education">Reg. No</span>
                  </div>
                  <div class="col-md-9">
                    <span class="schools"><?php echo $k["regno"]; ?></span>
                </div>
              </div>
            </div>

          <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4">
            <div class="card home">
              <h6>Schedule</h6>
              <span class="date">
                <?php
                  $current_date = date('d F Y');
                  echo $current_date;
                ?>
              </span>
              <div class="col-md-2">
                <?php
                    $i=1;
                    while($row = mysqli_fetch_array($cal)){
                      if (date("d-m-Y") == $row["day"]) {
                ?>
                <span class="job-type"><?php echo $i; ?></span>
              </div>
              <div class="col-md-10">
                <span class="location">VIT University</span>
                <span class="position"><?php echo $row["ocassion"]; ?></span>
                <span class="time">General Semester</span>
              </div>
              <?php
                    $i++;
                    }
                  }
                  if ($i===2) {
                    $date = date("l");
                    if($date == "saturday" || $date == "sunday")
                    {
              ?>
                  <div class="col-md-2">
                    <span class="job-type"><?php echo $i; ?></span>
                    </div>
                    <div class="col-md-10">
                  <span class="location">VIT University</span>
                  <span class="position">Holiday - No instruction day</span>
                  <span class="time">General Semester</span>
                    </div>
                  <?php
                    }
                    else{
                  ?>
                  <div class="col-md-2">
                    <span class="job-type"><?php echo $i; ?></span>
                    </div>
                    <div class="col-md-10">
                  <span class="location">VIT University</span>
                  <span class="position">Instructional Day</span>
                  <span class="time">General Semester</span>
                    </div>
                  <?php
                    }
                  }
                  ?>
              </div>
            </div>

          </div>
        </div>
      </div>

    <div class="col-md-12">
      <div class="row">
      <table>
        <thead>
          <tr>
            <th>COURSE CODE</th>
            <th>COURSE NAME</th>
            <th>TEACHER</th>
            <th>CREDITS</th>
          </tr>
        </thead>
        <tbody>
        <?php
          $i=0;
          while($row = mysqli_fetch_array($result)) {
            while($teach= mysqli_fetch_array($teacher))
            {
              if($teach["course_id"]==$row["course_code"]){
              ?>
              <tr>
              <td>
                <span class="logo"><?php echo $row["shortcut"]; ?></span>
                <?php echo $row["course_code"]; ?>
              </td>
              <td><?php echo $row["course_name"]; ?></td>
              <td><?php echo $teach["teacher"]; ?></td>
              <td><?php echo $row["credits"]; ?></td>
              <tr>
              <?php
              break;
              }
            }
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
