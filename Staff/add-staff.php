<?php require '..\header-admin.php'; ?>

<?php
  if (isset($_POST['submit'])) {
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

    $sql = "INSERT INTO staff(staffid, staffusername, staffpassword, staffname, staffphone) VALUES (:id, :username,:password,:name,:phone)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute($data);

    header('Location: view-staff.php');
    exit();
  }
?>

<form action="" method="POST" enctype="multipart/form-data">
  <div class="col-md-8">
    <br>
    <div class="form-group">
    <label for="user-title">ID</label>
      <input type="text" name="staff_id" class="form-control" placeholder="ID">
    </div>
    <div class="form-group">
    <label for="user-title">Username</label>
      <input type="text" name="staff_username" class="form-control" placeholder="Username">
    </div>
    <div class="form-group">
    <label for="user-title">Password</label>
      <input type="text" name="staff_password" class="form-control" placeholder="Password">
    </div>
    <div class="form-group">
    <label for="user-title">Name</label>
      <input type="text" name="staff_name" class="form-control" placeholder="Name">
    </div>
    <div class="form-group">
    <label for="user-title">Phone Number</label>
      <input type="text" name="staff_phone" class="form-control" placeholder="Phone">
    </div>
    <br>
    <hr>
    <br>
    <input type="submit" name="submit" class="btn btn-primary btn-lg">
  </div>
</form>
<?php require '..\footer-admin.php' ?>
