<?php include '../header-staff.php'; ?>

<div class="container-fluid">
  <div class="row">
    <table class="table table-hover">
        <thead>
          <tr>
            <th>Topic</th>
          </tr>
          <tr>
            <th>Course</th>
          </tr>
          <tr>
            <th>Trainer</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (isset($_GET['username'])) {
            $username = $_GET['username'];
          }
          $sql = "SELECT * FROM topic";

          $stmt = $GLOBALS['pdo']->prepare($sql);
          //Thiết lập kiểu dữ liệu trả về
          $stmt->setFetchMode(PDO::FETCH_ASSOC);
          $stmt->execute();
          $resultSet = $stmt->fetchAll();


          foreach ($resultSet as $row) {
            $topic_name = $row['topicname'];
            $course_id = $row['courseid'];
            $trainer_id = $row['trainerid'];


            $sql1 = "SELECT coursename FROM course WHERE courseid LIKE '$course_id'";

            $stmt = $GLOBALS['pdo']->prepare($sql);
            //Thiết lập kiểu dữ liệu trả về
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $resultSet1 = $stmt->fetchAll();

            foreach ($resultSet1 as $row) {
              $course_name = $row['coursename'];
            }

            $sql2 = "SELECT coursename FROM course WHERE courseid LIKE '$trainer_id'";

            $stmt = $GLOBALS['pdo']->prepare($sql);
            //Thiết lập kiểu dữ liệu trả về
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $resultSet2 = $stmt->fetchAll();

            foreach ($resultSet1 as $row) {
              $trainer_name = $row['trainername'];
            }

            echo "
              <tr>
                  <td>
                    <p>{$topic_name}</p>
                  </td>
                  <td>
                    <p>{$course_name}</p>
                  </td>
                  <td>
                    <p>{$trainer_name}</p>
                  </td>
              </tr>
            ";
          }
          ?>
      </tbody>
    </table>
  </div>
</div>
<!-- href='delete-user.php?user_id={$user_id}' -->
<?php require '../footer-admin.php' ?>
