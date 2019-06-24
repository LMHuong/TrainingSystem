<?php include '../header-staff.php'; ?>

<div class="container-fluid">
  <div class="row">
    <table class="table table-hover">
        <thead>
          <tr>
            <th>Course</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (isset($_GET['username'])) {
            $username = $_GET['username'];
          }
          $sql = "SELECT * FROM course";

          $stmt = $GLOBALS['pdo']->prepare($sql);
          //Thiết lập kiểu dữ liệu trả về
          $stmt->setFetchMode(PDO::FETCH_ASSOC);
          $stmt->execute();
          $resultSet = $stmt->fetchAll();

          foreach ($resultSet as $row) {
            $course_name = $row['coursename'];

            echo "
              <tr>
                  <td>
                    <p>{$course_name}</p>
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
