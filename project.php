<?php session_start();
include_once 'db.php';
$img = mysqli_query($conn,"SELECT * FROM user_info WHERE user_id = '".$_SESSION["username"]."' ") or die( mysqli_error($conn));
$project = mysqli_query($conn,"SELECT * FROM projects WHERE user_id = '".$_SESSION["username"]."' ") or die( mysqli_error($conn));
if(count($_POST)>0) {
  mysqli_query($conn,"INSERT INTO projects VALUES('" . $_SESSION["username"] . "','" . $_POST['project'] . "', '" . $_POST['details'] . "')") or die( mysqli_error($conn));
  header('Location: project.php');
  }
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="proj.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script async="" defer="" src="https://buttons.github.io/buttons.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  </head>
  <body>
    <section id="sideMenu">
      <nav>
        <a href="home.php"><i class="fa fa-home"></i>Home</a>
        <a href="timetable.php"><i class="fa fa-sticky-note"></i>Timetable</a>
        <a href="attendance.php"><i class="fa fa-bookmark"></i>Attendance</a>
        <a href="calendar.php"><i class="fa fa-calendar"></i>Calendar</a>
        <a href="project.php" class="active"><i class="fa fa-percent"></i>Project</a>
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
              <h1>Projects</h1>
              <p>Welcome to Your Project Manager</p>
            </div>
          </div>
        </div>

        <div class="page"><!--page-->
          
          <div class="sidebar"><!--start sidebar-->
          <form method="post" action="">
            <div class="project-input-form">
            <h4>Project</h4>
              <input type="text" name="project">
              <h4>Details:</h4>
              <textarea  name="details" rows="6"></textarea>
            <button class="submit">Submit</button>
            </div>
          </form>
            
        </div><!--end sidebar-->
          
          <div class="projects"><!--start projects-->
          <?php
            while($y = mysqli_fetch_array($project))
            {
          ?>
          <div class="project">
            <h2><?php echo $y["name"];?></h2>
            <span class="close"><a href="delete.php?name=<?php echo $y["name"]; ?>&userid=<?php echo $_SESSION["username"];?>">X</a></span>
            <p><?php echo $y["descrip"];?></p>
            <br><h4>Priority</h4> 
            <div id="priority">
              <span id="priority" class="priority"></span>
              <span class="priority-label" id="<?php echo $y["name"];?>">Very Low</span>
            </div><input class="priority-slider" type ="range" value= "1" min ="1" max="5" step ="1" onChange="rangeSliderValue(value,'<?php echo $y["name"]; ?>')">
          </div>
          <?php
            }
          ?>
        </div><!--end projects-->
        </div><!--end page-->
        <script type="text/javascript" src="proj.js"></script>
      </section>

  </body>
</html>
