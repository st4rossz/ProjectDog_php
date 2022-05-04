<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php include 'userlayout/header.php' ?>

<body>
    <script>
        var res = "success";
    </script>
    <?php
    $test = "<script>document.writeln(res);</script>";
    echo $test;
    ?>

    <?php include 'userlayout/footer.php' ?>
</body>

</html>