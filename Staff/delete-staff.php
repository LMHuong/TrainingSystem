<?php require '../header-admin.php'; ?>
<?php
  if (isset($_GET['staff_id'])) {
    $staff_id = $_GET['staff_id'];

    $sql = "DELETE FROM staff WHERE staffid LIKE '{$staff_id}'";
    $stmt = $pdo->prepare($sql);
    //Thiết lập kiểu dữ liệu trả về
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    $resultSet = $stmt->fetchAll();

    header('Location: view-staff.php');
    exit();
  }
?>
<?php require '../footer-admin.php'; ?>
