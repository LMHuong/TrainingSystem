<?php require '../header-admin.php'; ?>

<form action="" method="POST" enctype="multipart/form-data">
  <div class="col-md-8">

    <?php
    ob_start();
      if (isset($_GET['trainer_id'])) {
        $trainer_id = $_GET['trainer_id'];
      }
      $sql = "SELECT * FROM trainer WHERE trainerid LIKE '$trainer_id'";
      $stmt = $pdo->prepare($sql);
      //Thiết lập kiểu dữ liệu trả về
      $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $stmt->execute();
      $resultSet = $stmt->fetchAll();

      foreach ($resultSet as $row) {
        $trainer_id = $row['trainerid'];
      $trainer_username = $row['trainerusername'];
      $trainer_password = $row['trainerpassword'];

      echo "
      <form action='' method='POST' enctype='multipart/form-data'>
        <div class='col-md-8'>
          <br>
          <div class='form-group'>
          <label for='user-title'>ID</label>
            <input type='text' name='trainer_id' class='form-control' value='$trainer_id'>
          </div>
          <div class='form-group'>
          <label for='user-title'>Username</label>
            <input type='text' name='trainer_username' class='form-control' value='$trainer_username'>
          </div>
          <div>
          <label for='user-title'>Password</label>
            <input type='text' name='trainer_password' class='form-control' value='$trainer_password'>
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
        $trainer_id = $_POST['trainer_id'];
        $trainer_username = $_POST['trainer_username'];
        $trainer_password = $_POST['trainer_password'];

        $data = [
        'id' => $trainer_id,
        'username' => $trainer_username,
        'password' => $trainer_password,
        ];

        $sql = "UPDATE trainer
                SET trainerid = :id, trainerusername = :username, trainerpassword = :password
                WHERE trainerid LIKE '$trainer_id'";

        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);

        header('Location: view-trainer.php');
        exit();
      }
      ob_end_flush();
    ?>
  </div>
</form>
<?php require '../footer-admin.php'; ?>
