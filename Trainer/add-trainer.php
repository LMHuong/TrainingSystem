<?php require '..\header-admin.php'; ?>

<?php
  if (isset($_POST['submit'])) {
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

    $sql = "INSERT INTO trainer(trainerid, trainerusername, trainerpassword, trainername, trainerphone, traineremail, trainereducationalbg, trainerworkingplace, employmenttype) VALUES (:id, :username,:password,:name,:phone,:email,:educationalbg,:workingplace, :employmenttype)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute($data);

    header('Location: view-trainer.php');
    exit();
  }

?>

<form action="" method="POST" enctype="multipart/form-data">
  <div class="col-md-8">
    <br>
    <div class="form-group">
    <label for="user-title">ID</label>
      <input type="text" name="trainer_id" class="form-control" placeholder="ID">
    </div>
    <div class="form-group">
    <label for="user-title">Username</label>
      <input type="text" name="trainer_username" class="form-control" placeholder="Username">
    </div>
    <div>
    <label for="user-title">Password</label>
      <input type="text" name="trainer_password" class="form-control" placeholder="Password">
    </div>
    <div>
    <label for="user-title">Name</label>
      <input type="text" name="trainer_name" class="form-control" placeholder="Name">
    </div>
    <div>
    <label for="user-title">Phone Number</label>
      <input type="text" name="trainer_phone" class="form-control" placeholder="Phone">
    </div>
    <div>
      <label for="user-title">Email</label>
      <input type="text" name="trainer_email" class="form-control" placeholder="Email">
    </div>
    <div>
      <label for="user-title">Educational Background</label>
      <input type="text" name="trainer_educationalbg" class="form-control" placeholder="Educational">
    </div>
    <div>
      <label for="user-title">Working place</label>
      <input type="text" name="trainer_workingplace" class="form-control" placeholder="Working">
    </div>
    <div>
      <label for="user-title">Employment type</label>
      <select name='trainer_employmenttype' id='' class='form-control'>
            <option value='Part-time'>Part-time</option>
            <option value='Full-time'>Full-time</option>
            <option value='Associated'>Associated</option>
      </select>
    </div>
    <br>
    <hr>
    <br>
    <input type="submit" name="submit" class="btn btn-primary btn-lg">
  </div>
</form>
<?php require '..\footer-admin.php' ?>
