<?php require '..\header-admin.php'; ?>

<form action="" method="POST" enctype="multipart/form-data">
  <div class="col-md-8">

    <?php
      if (isset($_GET['trainer_id'])) {
        $trainer_id = $_GET['trainer_id'];
      }
      $sql = "SELECT * FROM trainer WHERE trainerid = $trainer_id";
      $stmt = $pdo->prepare($sql);
      //Thiết lập kiểu dữ liệu trả về
      $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $stmt->execute();
      $resultSet = $stmt->fetchAll();

      foreach ($resultSet as $row) {

      $trainer_username = $row['trainerusername'];
      $trainer_password = $row['trainerpassword'];
      $trainer_name = $row['trainername'];
      $trainer_phone = $row['trainerphone'];
      $trainer_email = $row['traineremail'];
      $trainer_educationalbg = $row['trainereducationalbg'];
      $trainer_workingplace = $row['trainerworkingplace'];
      $trainer_employmenttypeid = $row['employmenttypeid'];

      echo "
      <form action='' method='POST' enctype='multipart/form-data'>
        <div class='col-md-8'>
          <br>
          <div class='form-group'>
          <label for='user-title'>Username</label>
            <input type='text' name='trainer_username' class='form-control' value='$trainer_username'>
          </div>
          <div>
          <label for='user-title'>Password</label>
            <input type='text' name='trainer_password' class='form-control' value='$trainer_password'>
          </div>
          <div>
          <label for='user-title'>Name</label>
            <input type='text' name='trainer_name' class='form-control' value='$trainer_name'>
          </div>
          <div>
          <label for='user-title'>Phone Number</label>
            <input type='text' name='trainer_phone' class='form-control' value='$trainer_phone'>
          </div>
          <div>
            <label for='user-title'>Email</label>
            <input type='text' name='trainer_email' class='form-control' placeholder='Email'>
          </div>
          <div>
            <label for='user-title'>Educational Background</label>
            <input type='text' name='trainer_educationalbg' class='form-control' placeholder='Educational'>
          </div>
          <div>
            <label for='user-title'>Working place</label>
            <input type='text' name='trainer_workingplace' class='form-control' placeholder='Working'>
          </div>
          <div>
            <label for='user-title'>Employment type ID</label>
            <input type='number' name='trainer_employmenttypeid' class='form-control' placeholder='Employment'>
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
        $trainer_username = $_POST['trainer_username'];
        $trainer_password = $_POST['trainer_password'];
        $trainer_name = $_POST['trainer_name'];
        $trainer_phone = $_POST['trainer_phone'];

        $data = [
        'id' => $trainer_id,
        'username' => $trainer_username,
        'password' => $trainer_password,
        'name' => $trainer_name,
        'phone' => $trainer_phone,
        'email' => $trainer_email,
        'educationalbg' => $trainer_educationalbg,
        'workingplace' => $trainer_workingplace,
        'employmenttypeid' => $trainer_employmenttypeid
        ];

        $sql = "UPDATE trainer
                SET trainerid = :id, trainerusername = :username, trainerpassword = :password, trainername = :name, trainerphone = :phone, traineremail = :email, trainereducationalbg = :educationalbg, trainerworkingplace = :workingplace, employmenttypeid = :employmenttypeid
                WHERE trainerid = $trainer_id";

        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);

        header('Location: view-trainers.php');
        exit();
      }
    ?>
  </div>
</form>
<?php require '..\footer-admin.php'; ?>
