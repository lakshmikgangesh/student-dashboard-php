<?php
include_once 'db.php';
$sql = mysqli_query($conn,"DELETE FROM projects WHERE user_id = '".$_GET['userid']."' AND name = '".$_GET['name']."' ");
if (mysqli_query($conn, $sql)) {
echo "Record deleted successfully";
} else {
echo "Error deleting record: " . mysqli_error($conn);
}
header('Location: project.php');
mysqli_close($conn);
?>