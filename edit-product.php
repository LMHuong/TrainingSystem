<?php require 'header-admin.php'; ?>
<?
  $db = parse_url(getenv("DATABASE_URL"));
  $pdo = new PDO("pgsql:" . sprintf(
      "host=%s;port=%s;user=%s;password=%s;dbname=%s",
      $db["host"],
      $db["port"],
      $db["user"],
      $db["pass"],
      ltrim($db["path"], "/")
  ));
?>

<form action="" method="POST" enctype="multipart/form-data">
  <div class="col-md-8">

    <?php
      if (isset($_GET['product_id'])) {
        $product_idd = $_GET['product_id'];
      }
      $sql = "SELECT * FROM product WHERE product_id = $product_idd";
      $stmt = $pdo->prepare($sql);
      //Thiết lập kiểu dữ liệu trả về
      $stmt->setFetchMode(PDO::FETCH_ASSOC);
      $stmt->execute();
      $resultSet = $stmt->fetchAll();

      foreach ($resultSet as $row) {

      $product_id = $row['product_id'];
      $product_name = $row['product_name'];
      $short_description = $row['short_description'];
      $price = $row['price'];
      $product_image = $row['product_image'];

      echo "
        <div class='col-md-8'>
          <br>
          <div class='form-group'>
          <label for='user-title'>Product ID</label>
            <input type='text' name='product_id' class='form-control' value='$product_id'>
          </div>
          <div class='form-group'>
          <label for='user-title'>Product name</label>
            <input type='text' name='product_name' class='form-control' value='$product_name'>
          </div>
          <div>
          <label for='user-title'>Description</label>
            <input type='text' name='short_description' class='form-control' value='$short_description'>
          </div>
          <div>
          <label for='user-title'>Price</label>
            <input type='text' name='price' class='form-control' value='$price'>
          </div>
          <div>
          <label for='user-title'>Product Image</label>
            <input type='text' name='product_image' class='form-control' value='$product_image'>
          </div>
          <br>
          <hr>
          <br>
          <input type='submit' name='update' class='btn btn-primary btn-lg'>
        </div>
      ";
      }

      if (isset($_POST['update'])) {
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $short_description = $_POST['short_description'];
        $price = $_POST['price'];
        $product_image = $_POST['product_image'];

        $data = [
        'id' => $product_id,
        'name' => $product_name,
        'description' => $short_description,
        'price' => $price,
        'image' => $product_image,
        ];

        $sql = "UPDATE product
                SET product_id = :id, product_name = :name, short_description = :description,price = :price, product_image = :image
                WHERE product_id = $product_idd";

        $stmt = $pdo->prepare($sql);
        $stmt->execute($data);

        header('Location: view-product.php');
        exit();
      }
    ?>
  </div>
</form>
<?php require 'footer-admin.php'; ?>
