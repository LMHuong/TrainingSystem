<?php require '../header-admin.php'; ?>
<?php
  if (isset($_GET['trainer_id'])) {
    $trainer_id = $_GET['trainer_id'];

    $sql = "DELETE FROM trainer WHERE trainerid LIKE '{$trainer_id}'";
    $stmt = $pdo->prepare($sql);
    //Thiết lập kiểu dữ liệu trả về
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    $resultSet = $stmt->fetchAll();

    header('Location: view-trainer.php');
    exit();
  }
?>
<?php require '../footer-admin.php'; ?>
