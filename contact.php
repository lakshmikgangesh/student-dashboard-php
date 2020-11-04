<?php
session_start();
include_once 'db.php';
$result = mysqli_query($conn,"SELECT * FROM teachers") or die( mysqli_error($conn));
$img = mysqli_query($conn,"SELECT * FROM user_info WHERE user_id = '".$_SESSION["username"]."' ") or die( mysqli_error($conn));
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="contact.css">
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
        <a href="project.php"><i class="fa fa-percent"></i>Project</a>
        <a href="contact.php" class="active"><i class="fa fa-user"></i>Contact Book</a>
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
            <p>Welcome to Student Conatct Book</p>
          </div>
        </div>
      </div>

      <div class="col-md-12">
      <div class="row">
      <input type="text" id="myInput" onkeyup="myFunction()" placeholder= "Search for names.." title="Type in a name">
      <table id="myTable">
        <thead>
          <tr>
            <th>REG. NO</th>
            <th>NAME</th>
            <th>EMAIL ID</th>
          </tr>
        </thead>
        <tbody>
          <?php
            $i=0;
            while($row = mysqli_fetch_array($result)) {
          ?>
          <tr>
            <td><?php echo $row["regno"]; ?></td>
            <td><?php echo $row["name"]; ?></td>
            <td><?php echo $row["email"]; ?></td>
          </tr>
          <?php
            $i++;
            }
          ?>
        </tbody>
      </table>
      <script>
        function myFunction() {
          var input, filter, table, tr, td, i, txtValue;
          input = document.getElementById("myInput");
          filter = input.value.toUpperCase();
          table = document.getElementById("myTable");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1];
            if (td) {
              txtValue = td.textContent || td.innerText;
              if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }       
          }
        }
      </script>
     </div>
   </div>

</section>
  </body>
</html>
