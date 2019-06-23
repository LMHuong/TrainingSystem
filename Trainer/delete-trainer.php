<?php require 'header-admin.php'; ?>
<?php
  $db = parse_url(getenv("DATABASE_URL"));
  $pdo = new PDO("pgsql:" . sprintf(
      "host=%s;port=%s;user=%s;password=%s;dbname=%s",
      $db["host"],
      $db["port"],
      $db["user"],
      $db["pass"],
      ltrim($db["path"], "/")
  ));

  if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];

    $sql = "DELETE FROM product WHERE product_id = {$product_id}";
    $stmt = $pdo->prepare($sql);
    //Thiết lập kiểu dữ liệu trả về
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $stmt->execute();
    $resultSet = $stmt->fetchAll();

    header('Location: view-trainers.php');
    exit();
  }
?>
<?php require 'footer-admin.php'; ?>
