<?php include '../header-admin.php'; ?>

<div class="container-fluid">
  <div class="row">
    <table class="table table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Username</th>
            <th>Phone Number</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql = "SELECT * FROM staff";
          $stmt = $GLOBALS['pdo']->prepare($sql);
          //Thiết lập kiểu dữ liệu trả về
          $stmt->setFetchMode(PDO::FETCH_ASSOC);
          $stmt->execute();
          $resultSet = $stmt->fetchAll();

          foreach ($resultSet as $row) {
            $staff_id = $row['staffid'];
            $staff_username = $row['staffusername'];
            $staff_name = $row['staffname'];
            $staff_phone = $row['staffphone'];
            $stringid = '"' . $staff_id . '"';
            echo "
              <tr>
                  <td>{$staff_id}</td>
                  <td>
                    <a href='edit-staff.php?staff_id=$staff_id'><p>{$staff_username}</p></a>
                  </td>
                  <td>
                    <p>{$staff_name}</p>
                  </td>
                  <td>
                    <p>{$staff_phone}</p>
                  </td>
                  <td>
                    <a onClick='confirmation({$stringid})' class='btn btn-danger validate' ><span class='glyphicon glyphicon-remove'></span></a>
                  </td>
              </tr>
            ";
          }
          ?>
      </tbody>
    </table>
  </div>
</div>
<script type="text/javascript">
  function confirmation(id) {
    var confirmmessage = "Are you sure to delete this product?";
    var message = "Action Was Cancelled";
    if (confirm(confirmmessage)) {
      var deleteURL = "delete-staff.php?staff_id=";
      deleteURL += id;
      $(".validate").attr("href", deleteURL);
    } else {
         alert(message);
    }
  }
</script>
<!-- href='delete-user.php?user_id={$user_id}' -->
<?php require '../footer-admin.php' ?>
