
<?php
    if (!isset($_SESSION['username'])){
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    }
    
    include ('userlayout/header.php');
?>
<body class="">
    <?php include ('userlayout/nav.php') ?>
    <div class="container-fluid bg-warning">
        <div class="row">
             <div class="col-xl-4 mt-4 mx-auto text-center">
            
                <p>img</p>
            </div>
            <div class="col-xl-8 mt-4 mx-auto text-center">
            <div class="d-flex">
                <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#useservice" data-whatever="@mdo">จอง</button>
                </div>
                <p>จองบริการ</p>
            </div>
        </div>
    </div>







<?php include ('userlayout/footer.php') ?>
</body>

</html>