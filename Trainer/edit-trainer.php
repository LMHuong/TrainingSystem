<?php require '..\header-admin.php'; ?>

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
      $trainer_name = $row['trainername'];
      $trainer_phone = $row['trainerphone'];
      $trainer_email = $row['traineremail'];
      $trainer_educationalbg = $row['trainereducationalbg'];
      $trainer_workingplace = $row['trainerworkingplace'];
      $trainer_employmenttype = $row['employmenttype'];

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
            <input type='text' name='trainer_email' class='form-control' placeholder='$trainer_email'>
          </div>
          <div>
            <label for='user-title'>Educational Background</label>
            <input type='text' name='trainer_educationalbg' class='form-control' placeholder='$trainer_educationalbg'>
          </div>
          <div>
            <label for='user-title'>Working place</label>
            <input type='text' name='trainer_workingplace' class='form-control' placeholder='$trainer_workingplace'>
          </div>
          <div>
            <label for='user-title'>Employment type</label>
            <select name='trainer_employmenttype' id='' class='form-control'>
                  <option value='$trainer_employmenttype'>$trainer_employmenttype</option>
                  <option value='Part-time'>Part-time</option>
                  <option value='Full-time'>Full-time</option>
                  <option value='Associated'>Associated</option>
            </select>
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
        $trainer_name = $_POST['trainer_name'];
        $trainer_phone = $_POST['trainer_phone'];
        $trainer_email = $_POST['trainer_email'];
        $trainer_educationalbg = $_POST['trainer_educationalbg'];
        $trainer_workingplace = $_POST['trainer_workingplace'];
        $trainer_employmenttype = $_POST['trainer_employmenttype'];

        $data = [
        'id' => $trainer_id,
        'username' => $trainer_username,
        'password' => $trainer_password,
        'name' => $trainer_name,
        'phone' => $trainer_phone,
        'email' => $trainer_email,
        'educationalbg' => $trainer_educationalbg,
        'workingplace' => $trainer_workingplace,
        'employmenttype' => $trainer_employmenttype
        ];

        $sql = "UPDATE trainer
                SET trainerid = :id, trainerusername = :username, trainerpassword = :password, trainername = :name, trainerphone = :phone, traineremail = :email, trainereducationalbg = :educationalbg, trainerworkingplace = :workingplace, employmenttype = :employmenttype
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
<?php require '..\footer-admin.php'; ?>
