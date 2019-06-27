<?php require '../header-staff.php'; ?>

<?php
  if (isset($_GET['username'])) {
    $username = $_GET['username'];
  }
  if (isset($_POST['submit'])) {
    $topic_id = $_POST['topic_id'];
    $topic_name = $_POST['topic_name'];
    $topic_description = $_POST['topic_description'];
    $trainer_name = $_POST['trainer_name'];
    $course_name = $_POST['course_name'];

    $sql1 = "SELECT courseid FROM course WHERE coursename LIKE '$course_name'";
    $stmt = $GLOBALS['pdo']->prepare($sql1);
    //Thiết lập kiểu dữ liệu trả về
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    $resultSet3 = $stmt->fetchAll();

    foreach ($resultSet3 as $row) {
      $course_id = $row['courseid'];
    }

    $sql2 = "SELECT trainerid FROM trainer WHERE trainerusername LIKE '$trainer_name'";
    $stmt = $GLOBALS['pdo']->prepare($sql2);
    //Thiết lập kiểu dữ liệu trả về
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    $resultSet4 = $stmt->fetchAll();

    foreach ($resultSet4 as $row) {
      $trainer_id = $row['trainerid'];
    }

    $data = [
        'id' => $topic_id,
        'topicname' => $topic_name,
        'topicdesc' => $topic_description,
        'courseid' => $course_id,
        'trainerid' => $trainer_id,
    ];

    $sql3 = "INSERT INTO topic(topicid, topicname, topicdesc, courseid, trainerid) VALUES (:id, :topicname, :topicdesc, :courseid, :trainerid)";
    $stmt = $pdo->prepare($sql3);
    $stmt->execute($data);

    $topic_course_id = $topic_id . $course_id . $trainer_id;
    $data1 = [
        'id' => $topic_course_id,
        'topicid' => $topic_id,
        'courseid' => $course_id,
        'trainerid' => $trainer_id,
    ];
    $sql4 = "INSERT INTO topiccourse(topiccourseid, topicid, courseid, trainerid) VALUES (:id, :topicid, :courseid, :trainerid)";
    $stmt = $pdo->prepare($sql4);
    $stmt->execute($data);

    header("Location: view-topic.php?username={$username}");
    exit();
  }

?>

<form action="" method="POST" enctype="multipart/form-data">
  <div class="col-md-8">
    <br>
    <div class="form-group">
    <label for="user-title">ID</label>
      <input type="text" name="topic_id" class="form-control" placeholder="ID">
    </div>
    <div class="form-group">
    <label for="user-title">Topic Name</label>
      <input type="text" name="topic_name" class="form-control" placeholder="topic Name">
    </div>
    <div class="form-group">
    <label for="user-title">Topic Description</label>
      <input type="text" name="topic_description" class="form-control" placeholder="topic Description">
    </div>
    <div>
      <label for='user-title'>Course</label>
      <select name='course_name' id='' class='form-control'>
        <?php
          $sql5 = "SELECT * FROM course";

          $stmt = $GLOBALS['pdo']->prepare($sql5);
          //Thiết lập kiểu dữ liệu trả về
          $stmt->setFetchMode(PDO::FETCH_ASSOC);
          $stmt->execute();
          $resultSet2 = $stmt->fetchAll();

          foreach ($resultSet2 as $row) {
            $course_name = $row['coursename'];

            echo "
              <option value='{$course_name}'>{$course_name}</option>
            ";
          }
        ?>
      </select>
    </div>
    <div>
      <label for='user-title'>Trainer</label>
      <select name='trainer_name' id='' class='form-control'>
        <?php
          $sql6 = "SELECT * FROM trainer";

          $stmt = $GLOBALS['pdo']->prepare($sql6);
          //Thiết lập kiểu dữ liệu trả về
          $stmt->setFetchMode(PDO::FETCH_ASSOC);
          $stmt->execute();
          $resultSet1 = $stmt->fetchAll();

          foreach ($resultSet1 as $row) {
            $trainer_name = $row['trainerusername'];

            echo "
              <option value='{$trainer_name}'>{$trainer_name}</option>
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
<?php require '../footer-admin.php' ?>
