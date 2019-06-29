<?php include '../header-trainer.php'; ?>

<div class="container-fluid">
  <div class="row">
    <table class="table table-hover">
        <thead>
          <tr>
            <th>Topic</th>
            <th>Course</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (isset($_GET['username'])) {
            $username = $_GET['username'];
          }
          $sql = "SELECT topic.topicname, course.coursename
          FROM ((topiccourse INNER JOIN topic ON topic.topicid LIKE topiccourse.topicid)
          INNER JOIN course ON course.courseid LIKE topiccourse.courseid)
          WHERE topiccourse.trainerid LIKE (SELECT trainer.trainerid FROM trainer WHERE trainerusername LIKE '$username')";

          $stmt = $GLOBALS['pdo']->prepare($sql);
          //Thiết lập kiểu dữ liệu trả về
          $stmt->setFetchMode(PDO::FETCH_ASSOC);
          $stmt->execute();
          $resultSet = $stmt->fetchAll();

          foreach ($resultSet as $row) {
            $topic = $row['topicname'];
            $course = $row['coursename'];

            echo "
              <tr>
                  <td>
                    <p>{$topic}</p>
                  </td>
                  <td>
                    <p>{$course}</p>
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
