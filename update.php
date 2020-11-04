<?php
session_start();
include_once 'db.php';
if(count($_POST)>0) {
mysqli_query($conn,"UPDATE attendance set course_id='" . $_POST['course_id'] . "', present='" . $_POST['present'] . "', absent='" . $_POST['absent'] . "' WHERE course_id='" . $_POST['course_id'] . "'");
$message = "Attendance Modified Successfully";
}
$result = mysqli_query($conn,"SELECT * FROM attendance WHERE course_id='" . $_GET['course_id'] . "'");
$row= mysqli_fetch_array($result);
?>
<html>
<head>
<title>Update Attendance</title>
<style>
body{
    background-color: #F4F6F9;
}
form{
text-align: center;
margin: 170px;
color: #6C7882;
}
input[type="text"]{
border: 2px solid #92CF48;
width: 500px;
height: 50px;
border-radius : 5px;
background-color: #F4F6F9;
}
input[type="submit"]{
background-color:#92CF48;
padding: 5px;
border-radius: 5px;
text-decoration: none;
color: white;
border: none;
width: 500px;
height:30px;
}
</style>
</head>
<body>
<form method="post" action="">
<div><?php if(isset($message)) { echo $message; } ?>
</div>
Course Code <br>
<input type="text" name="course_id" class="txtField" value="<?php echo $row['course_id']; ?>">
<br>
<br>
Present: <br>
<input type="text" name="present" class="txtField" value="<?php echo $row['present']; ?>">
<br>
<br>
Absent:<br>
<input type="text" name="absent" class="txtField" value="<?php echo $row['absent']; ?>">
<br>
<br>
<br>
<input type="submit" name="submit" value="Submit">
<br>
<a href="attendance.php">Go Back to Attendance Page</a>
</form>
</body>
</html>