<?php include '../header-staff.php'; ?>

<div class="container-fluid">
  <div class="row">
    <table class="table table-hover">
        <thead>
          <tr>
            <th>Category</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if (isset($_GET['username'])) {
            $username = $_GET['username'];
          }
          $sql = "SELECT * FROM category";

          $stmt = $GLOBALS['pdo']->prepare($sql);
          //Thiết lập kiểu dữ liệu trả về
          $stmt->setFetchMode(PDO::FETCH_ASSOC);
          $stmt->execute();
          $resultSet = $stmt->fetchAll();

          foreach ($resultSet as $row) {
            $category_name = $row['categoryname'];

            echo "
              <tr>
                  <td>
                    <p>{$category_name}</p>
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
