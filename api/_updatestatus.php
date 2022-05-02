

<?php
 include 'server.php';


    $user_id = $_REQUEST["user_id"];
    $sql = "UPDATE user SET status= 1 WHERE user_id='$user_id' " ;
    $query = mysqli_query($conn,$sql) ;

    echo "<script>";
    echo "alert(\"ยืนยันสิทธิ์เสร็จสิ้น\");";
    echo "window.location=\"../backend/adminindex.php\"";
    echo "</script>";

?> 