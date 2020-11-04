<?php session_start();
include_once 'db.php';
$img = mysqli_query($conn,"SELECT * FROM user_info WHERE user_id = '".$_SESSION["username"]."' ") or die( mysqli_error($conn));
$todo = mysqli_query($conn,"SELECT * FROM todo WHERE user_id = '".$_SESSION["username"]."' AND stat = 'todo' ") or die( mysqli_error($conn));
$completed = mysqli_query($conn,"SELECT * FROM todo WHERE user_id = '".$_SESSION["username"]."' AND stat = 'completed' ") or die( mysqli_error($conn));
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
        <a href="attendance.php"><i class="fa fa-bookmark"></i>Attendance</a>
        <a href="calendar.php" class="active"><i class="fa fa-calendar"></i>Calendar</a>
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
            <h1>Calendar</h1>
            <p>Welcome to Your Calendar</p>
          </div>
        </div>
      </div>

      <div class="container col-sm-4 col-md-7 col-lg-8 xl-5">
        <div id="content">

        <div class="buttons" id="container">
            <button class="btn button-style" id="previous">&lt;</button>

            <button class="btn button-style" id="next"> &gt;</button>

        </div>
        </div>
      <script type="text/javascript" src="script.js"></script>
      </div>
      </div>
     </div>

      <div class="cards">
        <div class="row">
          <div class="col-sm- 10 col-md-4 col-lg-4 col-xl-1">
            <div class="card todo">

              <p>
        <label for="new-task">Add Item</label><input id="new-task" type="text"><button>Add</button>
      </p>

      <h3>Todo</h3>
      <ul id="incomplete-tasks">
      <?php
            while($y = mysqli_fetch_array($todo))
            {
          ?>
              <li><input type="checkbox"><label><?php echo $y["item"] ?></label><input type="text"><button class="edit">Edit</button><button class="delete">Delete</button></li>
          <?php
            }
          ?>
      </ul>

      <h3>Completed</h3>
      <ul id="completed-tasks">
        <?php
            while($z = mysqli_fetch_array($completed))
            {
          ?>
              <li><input type="checkbox" checked><label><?php echo $z["item"] ?></label><input type="text"><button class="edit">Edit</button><button class="delete">Delete</button></li>
          <?php
            }
          ?>
      </ul>

    <script type="text/javascript" src="app.js"></script>

            </div>
          </div>
        </div>
      </div>


    </section>
  </body>
</html>
