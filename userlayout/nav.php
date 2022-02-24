<nav class="navbar navbar-expand-lg" style="margin-bottom: 0px; font-family: Kanit Light; color: black; background-color: white;">
  <a style="color: black;" class="navbar-brand" href="userindex.php">|Good Dog Home|</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <!-- <li class="nav-item">
        <a class="nav-link" href="userindex.php">Home </a>
      </li> -->
      <li class="nav-item">
        <a style="color: black; font-size: 20px; padding-top: 18%;" class="nav-link" href="usindex.php">ใช้บริการ</a>
      </li>
      <li class="nav-item">
        <div class="dropdown">
          <button class="btn btn-link dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-family: Kanit thin; padding-top: 7%;">
            การจองของท่าน
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="userdepositorder.php">ฝากเลี้ยง</a>
            <a class="dropdown-item" href="userserviceorder.php">สปาร์สุนัข</a>
          </div>
        </div>
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
        <a class="nav-link disabled" href="#" style="padding-top: 20%;">
          <p style="color: black;">คุณคือ : <strong><?php echo $_SESSION['username']; ?></p>
        </a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <a href="api/logout.php" type="button" class="btn btn-outline-danger" style="font-family: Kanit Thin;">ออกจากระบบ</a>
    </form>
  </div>
</nav>