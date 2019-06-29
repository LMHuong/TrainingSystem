<?php require '../header-staff.php'; ?>

<?php
  if (isset($_GET['username'])) {
    $username = $_GET['username'];
  }
  if (isset($_POST['submit'])) {
    $topic_id = $_POST['topic_id'];
    $topic_name = $_POST['topic_name'];
    $topic_description = $_POST['topic_description'];

    $trainer_username = $_POST['trainer_username'];
    $course_name = $_POST['course_name'];


    $sql1 = "SELECT courseid FROM course WHERE coursename LIKE '$course_name'";
    $stmt = $GLOBALS['pdo']->prepare($sql1);
    //Thiết lập kiểu dữ liệu trả về
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    $resultSet1 = $stmt->fetchAll();
    $course_id = $resultSet1[0]["courseid"];

    $sql2 = "SELECT trainerid FROM trainer WHERE trainerusername LIKE '$trainer_username'";
    $stmt = $GLOBALS['pdo']->prepare($sql2);
    //Thiết lập kiểu dữ liệu trả về
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    $resultSet2 = $stmt->fetchAll();
    $trainer_id = $resultSet2[0]["trainerid"];

    $sql3 = "SELECT staffid FROM staff WHERE staffusername LIKE '$username'";
    $stmt = $GLOBALS['pdo']->prepare($sql3);
    //Thiết lập kiểu dữ liệu trả về
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    $resultSet3 = $stmt->fetchAll();
    $staff_id = $resultSet3[0]["staffid"];

    $topic_course_id = "$topic_id" . "$course_id" . "$staff_id" . "$trainer_id";

    $data4 = [
        'topicourseid' => $topic_course_id,
        'topicid' => $topic_id,
        'courseid' => $course_id,
        'staffid' => $staff_id,
        'trainerid' => $trainer_id,
    ];
    $data5 = [
        'topicid' => $topic_id,
        'topicname' => $topic_name,
        'topicdesc' => $topic_description,
    ];
    $sql5 = "INSERT INTO topic(topicid, topicname, topicdesc) VALUES (:topicid, :topicname, :topicdesc)";
    //$sql4 = "INSERT INTO topiccourse(topiccourseid, topicid, courseid, staffid, trainerid) VALUES (" . "'$topic_course_id'" . "," . "'$topic_id'". "," . "'$course_id'" . "," . "'$staff_id'" . "," . "'$trainer_id'" . ");";
    $sql4 = "INSERT INTO topiccourse(topiccourseid, topicid, courseid, staffid, trainerid) VALUES (:topicourseid, :topicid, :courseid, :staffid, :trainerid)";
    //$sql5 = "INSERT INTO topic(topicid, topicname, topicdesc) VALUES (" . "'$topic_id'" .", ". "'$topic_name'" .", ". "'$topic_description'" . ")";


    // echo $sql4;
    // dfasasd();
    $stmt = $GLOBALS['pdo']->prepare($sql5);
    $stmt->execute($data5);

    $stmt = $GLOBALS['pdo']->prepare($sql4);
    $stmt->execute($data4);



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
      <input type="text" name="topic_name" class="form-control" placeholder="Topic Name">
    </div>
    <div class="form-group">
    <label for="user-title">Topic Description</label>
      <input type="text" name="topic_description" class="form-control" placeholder="Topic Description">
    </div>
    <div>
      <label for='user-title'>Course</label>
      <select name='course_name' id='' class='form-control'>
        <?php
          $sql6 = "SELECT * FROM course";

          $stmt = $GLOBALS['pdo']->prepare($sql6);
          //Thiết lập kiểu dữ liệu trả về
          $stmt->setFetchMode(PDO::FETCH_ASSOC);
          $stmt->execute();
          $resultSet6 = $stmt->fetchAll();

          foreach ($resultSet6 as $row) {
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
      <select name='trainer_username' id='' class='form-control'>
        <?php
          $sql7 = "SELECT * FROM trainer";

          $stmt = $GLOBALS['pdo']->prepare($sql7);
          //Thiết lập kiểu dữ liệu trả về
          $stmt->setFetchMode(PDO::FETCH_ASSOC);
          $stmt->execute();
          $resultSet7 = $stmt->fetchAll();

          foreach ($resultSet7 as $row) {
            $trainer_username = $row['trainerusername'];

            echo "
              <option value='{$trainer_username}'>{$trainer_username}</option>
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
