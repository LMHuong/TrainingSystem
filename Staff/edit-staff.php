<?php require '..\header-admin.php'; ?>

<form action="" method="POST" enctype="multipart/form-data">
  <div class="col-md-8">

    <?php
      if (isset($_GET['staff_id'])) {
        $staff_id = $_GET['staff_id'];
      }
      $sql = "SELECT * FROM staff WHERE staffid LIKE '$staff_id'";
      $stmt = $pdo->prepare($sql);
      //Thiết lập kiểu dữ liệu trả về
      $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $stmt->execute();
      $resultSet = $stmt->fetchAll();

      foreach ($resultSet as $row) {
      $staff_id = $row['staffid'];
      $staff_username = $row['staffusername'];
      $staff_password = $row['staffpassword'];
      $staff_name = $row['staffname'];
      $staff_phone = $row['staffphone'];

      echo "
      <form action='' method='POST' enctype='multipart/form-data'>
        <div class='col-md-8'>
          <br>
          <div class='form-group'>
          <label for='user-title'>ID</label>
            <input type='text' name='staff_id' class='form-control' value='$staff_id'>
          </div>
          <div class='form-group'>
          <label for='user-title'>Username</label>
            <input type='text' name='staff_username' class='form-control' value='$staff_username'>
          </div>
          <div>
          <label for='user-title'>Password</label>
            <input type='text' name='staff_password' class='form-control' value='$staff_password'>
          </div>
          <div>
          <label for='user-title'>Name</label>
            <input type='text' name='staff_name' class='form-control' value='$staff_name'>
          </div>
          <div>
          <label for='user-title'>Phone Number</label>
            <input type='text' name='staff_phone' class='form-control' value='$staff_phone'>
          </div>
          <br>
          <hr>
          <br>
          <input type='submit' name='update' class='btn btn-primary btn-lg'>
        </div>
      </form>
      ";
      }

      if (isset($_POST['update'])) {
        $staff_id = $_POST['staff_id'];
        $staff_username = $_POST['staff_username'];
        $staff_password = $_POST['staff_password'];
        $staff_name = $_POST['staff_name'];
        $staff_phone = $_POST['staff_phone'];

        $data = [
        'id' => $staff_id,
        'username' => $staff_username,
        'password' => $staff_password,
        'name' => $staff_name,
        'phone' => $staff_phone,
        ];

        $sql = "UPDATE staff
                SET staffid = :id, staffusername = :username, staffpassword = :password, staffname = :name, staffphone = :phone
                WHERE staffid LIKE '$staff_id'";

        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);

        header('Location: view-staff.php');
        exit();
      }
    ?>
  </div>
</form>
<?php require '..\footer-admin.php'; ?>
