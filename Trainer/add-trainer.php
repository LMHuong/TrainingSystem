<?php require '..\header-admin.php'; ?>

<?php
  if (isset($_POST['submit'])) {
    $trainer_id = $_POST['trainer_id'];
    $trainer_username = $_POST['trainer_username'];
    $trainer_password = $_POST['trainer_password'];

    $data = [
      'id' => $trainer_id,
        'username' => $trainer_username,
        'password' => $trainer_password,
    ];

    $sql = "INSERT INTO trainer(trainerid, trainerusername, trainerpassword) VALUES (:id, :username,:password)";
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
    <br>
    <hr>
    <br>
    <input type="submit" name="submit" class="btn btn-primary btn-lg">
  </div>
</form>
<?php require '..\footer-admin.php' ?>
