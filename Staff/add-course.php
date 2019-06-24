<?php require '..\header-staff.php'; ?>

<?php
  if (isset($_GET['username'])) {
    $username = $_GET['username'];
  }
  if (isset($_POST['submit'])) {
    $course_id = $_POST['course_id'];
    $course_name = $_POST['course_name'];
    $course_description = $_POST['course_description'];
    $category_name = $_POST['category_name'];

    $sql = "SELECT categoryid FROM category WHERE categoryname LIKE '$category_name'";
    $stmt = $GLOBALS['pdo']->prepare($sql);
    //Thiết lập kiểu dữ liệu trả về
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    $resultSet = $stmt->fetchAll();

    foreach ($resultSet as $row) {
      $category_id = $row['categoryid'];
    }

    $data = [
        'id' => $course_id,
        'coursename' => $course_name,
        'coursedesc' => $course_description,
        'categoryid' => $category_id,
    ];

    $sql = "INSERT INTO course(courseid, coursename, coursedesc, categoryid) VALUES (:id, :coursename, :coursedesc, :categoryid)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute($data);

    header("Location: view-course.php?username={$username}");
    exit();
  }

?>

<form action="" method="POST" enctype="multipart/form-data">
  <div class="col-md-8">
    <br>
    <div class="form-group">
    <label for="user-title">ID</label>
      <input type="text" name="course_id" class="form-control" placeholder="ID">
    </div>
    <div class="form-group">
    <label for="user-title">Course Name</label>
      <input type="text" name="course_name" class="form-control" placeholder="Course Name">
    </div>
    <div class="form-group">
    <label for="user-title">Course Description</label>
      <input type="text" name="course_description" class="form-control" placeholder="Course Description">
    </div>
    <div>
      <label for='user-title'>Category</label>
      <select name='category_name' id='' class='form-control'>
        <?php
          $sql = "SELECT * FROM category";

          $stmt = $GLOBALS['pdo']->prepare($sql);
          //Thiết lập kiểu dữ liệu trả về
          $stmt->setFetchMode(PDO::FETCH_ASSOC);
          $stmt->execute();
          $resultSet = $stmt->fetchAll();

          foreach ($resultSet as $row) {
            $category_name = $row['categoryname'];

            echo "
              <option value='{$category_name}'>{$category_name}</option>
            ";
          }
        ?>

      </select>
    </div>
    <br>
    <hr>
    <br>
    <input type="submit" name="submit" class="btn btn-primary btn-lg">
  </div>
</form>
<?php require '..\footer-admin.php' ?>
