<!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="javascript:;">คุณคือ : <strong><?php echo $_SESSION['username']; ?></a>
    <li class="nav-item active">
      <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Features</a>
    </li>
    <a href="api/logout.php" type="button" class="btn btn-outline-danger">ออกจากระบบ</a>

  </div>
</nav>
</div>
</nav> -->
<nav class="navbar navbar-expand-lg navbar-light bg-dark" style="margin-bottom: 0px;">
  <a class="navbar-brand" href="#">|Good Dog Home|</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="userindex.php">Home </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="userorder.php">การจองของท่าน</a>
      </li>
      <!-- <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Dropdown
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li> -->
      <li class="nav-item">
        <a class="nav-link disabled" href="#"><p>คุณคือ : <strong><?php echo $_SESSION['username'];?></p></a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
    <a href="api/logout.php"  type="button" class="btn btn-outline-danger">ออกจากระบบ</a>
    </form>
  </div>
</nav>