<?php include '../header-staff.php'; ?>

<div class="container-fluid">
  <div class="row">
    <table class="table table-hover">
        <thead>
          <tr>
            <th>Topic</th>
            <th>Course</th>
            <th>Trainer</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (isset($_GET['username'])) {
            $username = $_GET['username'];
          }

          $sql = "SELECT * FROM topiccourse";

          $stmt = $GLOBALS['pdo']->prepare($sql);
          //Thiết lập kiểu dữ liệu trả về
          $stmt->setFetchMode(PDO::FETCH_ASSOC);
          $stmt->execute();
          $resultSet = $stmt->fetchAll();


          foreach ($resultSet as $row) {
            $topic_id = $row['topicid'];
            $course_id = $row['courseid'];
            $trainer_id = $row['trainerid'];

            $sql0 = "SELECT topicname FROM topic WHERE topicid LIKE '$topic_id'";

            $stmt = $GLOBALS['pdo']->prepare($sql0);
            //Thiết lập kiểu dữ liệu trả về
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $resultSet0 = $stmt->fetchAll();

            foreach ($resultSet0 as $row) {
              $topic_name = $row['topicname'];
              echo"
              <tr>
                  <td>
                    <p>{$topic_name}</p>
                  </td>
              ";
            }



            $sql1 = "SELECT coursename FROM course WHERE courseid LIKE '$course_id'";

            $stmt = $GLOBALS['pdo']->prepare($sql1);
            //Thiết lập kiểu dữ liệu trả về
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $resultSet1 = $stmt->fetchAll();

            foreach ($resultSet1 as $row) {
              $course_name = $row['coursename'];
              echo"
                <td>
                  <p>{$course_name}</p>
                </td>
              ";
            }

            $sql2 = "SELECT trainerusername FROM trainer WHERE trainerid LIKE '$trainer_id'";

            $stmt = $GLOBALS['pdo']->prepare($sql2);
            //Thiết lập kiểu dữ liệu trả về
            $stmt->setFetchMode(PDO::FETCH_ASSOC);
            $stmt->execute();
            $resultSet2 = $stmt->fetchAll();

            foreach ($resultSet2 as $row) {
              $trainer_username = $row['trainerusername'];
              echo"
                  <td>
                    <p>{$trainer_username}</p>
                  </td>
              </tr>
              ";
            }
          }
          ?>
      </tbody>
    </table>
  </div>
</div>
<!-- href='delete-user.php?user_id={$user_id}' -->
<?php require '../footer-admin.php' ?>
