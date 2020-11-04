<?php
    include_once 'db.php';
    $cal = mysqli_query($conn, "SELECT * FROM calendar") or die( mysqli_error($conn));
    $i=0;
    while($row = mysqli_fetch_array($cal)){
    if (date("d-m-Y") == $row["day"]) {
        
        echo $row["ocassion"];
        $i++;
        echo "<br>";
        continue;
        
    }
    if($i>0){
    echo $row["day"];
    echo $row["ocassion"];
    break;
    }
}
?>