<?php
          if (isset($_GET['username'])) {
            $username = $_GET['username'];
          }
?>
<?php include '../header-admin.php'; ?>

<div class="container-fluid">
  <div class="row">
    <table class="table table-hover">
        <thead>
          <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Name</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th>Educational Background</th>
            <th>Working Place</th>
            <th>Employment Type</th>
            <th>Delete</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $sql = "SELECT * FROM trainer";
          $stmt = $GLOBALS['pdo']->prepare($sql);
          //Thiết lập kiểu dữ liệu trả về
          $stmt->setFetchMode(PDO::FETCH_ASSOC);
          $stmt->execute();
          $resultSet = $stmt->fetchAll();

          foreach ($resultSet as $row) {
            $trainer_id = $row['trainerid'];
            $trainer_username = $row['trainerusername'];
            $trainer_name = $row['trainername'];
            $trainer_phone = $row['trainerphone'];
            $trainer_email = $row['traineremail'];
            $trainer_educationalbg = $row['trainereducationalbg'];
            $trainer_workingplace = $row['trainerworkingplace'];
            $trainer_employmenttype = $row['employmenttype'];

            $stringid = '"' . $trainer_id . '"';
            echo "
              <tr>
                  <td>{$trainer_id}</td>
                  <td>
                    <a href='edit-trainer.php?trainer_id=$trainer_id'><p>{$trainer_username}</p></a>
                  </td>
                  <td>
                    <p>{$trainer_name}</p>
                  </td>
                  <td>
                    <p>{$trainer_phone}</p>
                  </td>
                  <td>
                    <p>{$trainer_email}</p>
                  </td>
                  <td>
                    <p>{$trainer_educationalbg}</p>
                  </td>
                  <td>
                    <p>{$trainer_workingplace}</p>
                  </td>
                  <td>
                    <p>{$trainer_employmenttype}</p>
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
  function confirmation() {
    var confirmmessage = "Are you sure to delete this profile?";
    var message = "Action Was Cancelled";
    if (confirm(confirmmessage)) {
      $(".validate").attr("href", "delete-trainer.php?trainer_id=123");
    } else {
         alert(message);
    }
  }
</script>
<!-- href='delete-user.php?user_id={$user_id}' -->
<?php require '../footer-admin.php' ?>
