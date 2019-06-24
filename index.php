<?php require 'header.php'; ?>

<?php
  $sql = "SELECT adminusername, adminpassword FROM admin";
  $stmt = $GLOBALS['pdo']->prepare($sql);
  //Thiết lập kiểu dữ liệu trả về
  $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $stmt->execute();
  $resultSet = $stmt->fetchAll();

  if (isset($_POST['submit1'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    foreach ($resultSet as $row) {
      if ($username == $row['adminusername'] && $password ==  $row['adminpassword']){
        header("Location: Staff/view-staff.php?username={$username}");
      }else{
        echo '
          <script>
            alert("WRONG! Wanna try again?");
          </script>
        ';
      }
    }
  }
?>


<!--Trainer-->
<?php
  $sql = "SELECT trainerusername, trainerpassword FROM trainer";
  $stmt = $GLOBALS['pdo']->prepare($sql);
  //Thiết lập kiểu dữ liệu trả về
  $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $stmt->execute();
  $resultSet = $stmt->fetchAll();

  if (isset($_POST['submit2'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    foreach ($resultSet as $row) {
      if ($username == $row['trainerusername'] && $password ==  $row['trainerpassword']){
        header("Location: Trainer/view-topic.php?username={$username}");
      }else{
        echo '
          <script>
            alert("WRONG! Wanna try again?");
          </script>
        ';
      }
    }
  }
?>

<!--Staff-->
<?php
  $sql = "SELECT staffusername, staffpassword FROM staff";
  $stmt = $GLOBALS['pdo']->prepare($sql);
  //Thiết lập kiểu dữ liệu trả về
  $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $stmt->execute();
  $resultSet = $stmt->fetchAll();

  if (isset($_POST['submit3'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    foreach ($resultSet as $row) {
      if ($username == $row['staffusername'] && $password ==  $row['staffpassword']){
        header("Location: Staff/view-category.php?username={$username}");
      }else{
        echo '
          <script>
            alert("WRONG! Wanna try again?");
          </script>
        ';
      }
    }
  }
?>
  <div class="container">
    <header>
      <div class="row">
        <div class="col-sm-4"></div>

        <div class="col-sm-4">
          <h1 class="text-center">Welcome</h1>
          <form class="text-center" method="post" enctype="multipart/form-data">

            <div class="form-group">
              <label>Username</label>
              <input type="text" name="username" class="form-control">
            </div>

            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" class="form-control">
            </div>

            <div class="form-group">
              <input type="submit" name="submit1" class="btn btn-primary" value="Login as Admin">
            </div>
            <div class="form-group">
              <input type="submit" name="submit2" class="btn btn-primary" value="Login as Trainer">
            </div>
            <div class="form-group">
              <input type="submit" name="submit3" class="btn btn-primary" value="Login as Staff">
            </div>
          </form>
          <br>
        </div>
        <div class="col-sm-4"></div>
      </div>
    </header>
  </div>
<?php require 'footer.php'; ?>
