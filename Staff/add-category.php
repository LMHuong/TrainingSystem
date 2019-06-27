<?php require '../header-staff.php'; ?>

<?php
  if (isset($_GET['username'])) {
    $username = $_GET['username'];
  }
  if (isset($_POST['submit'])) {
    $category_id = $_POST['category_id'];
    $category_name = $_POST['category_name'];

    $data = [
      'id' => $category_id,
        'categoryname' => $category_name,
    ];

    $sql = "INSERT INTO category(categoryid, categoryname) VALUES (:id, :categoryname)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute($data);

    header("Location: view-category.php?username={$username}");
    exit();
  }

?>

<form action="" method="POST" enctype="multipart/form-data">
  <div class="col-md-8">
    <br>
    <div class="form-group">
    <label for="user-title">ID</label>
      <input type="text" name="category_id" class="form-control" placeholder="ID">
    </div>
    <div class="form-group">
    <label for="user-title">Category Name</label>
      <input type="text" name="category_name" class="form-control" placeholder="Category Name">
    </div>
    <br>
    <hr>
    <br>
    <input type="submit" name="submit" class="btn btn-primary btn-lg">
  </div>
</form>
<?php require '../footer-admin.php' ?>
