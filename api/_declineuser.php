
<?php
 include 'server.php';


    $user_id = $_REQUEST["user_id"];
    $sql = "DELETE FROM user WHERE user_id='$user_id' " ;
    $query = mysqli_query($conn,$sql) ;

    echo "<script>";
    echo "alert(\"ลบคำขอสมัครสมาชิกแล้ว !\");";
    echo "window.location=\"../backend/adminindex.php\"";
    echo "</script>";

?> 