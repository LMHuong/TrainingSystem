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

  if (isset($_POST['submit'])) {
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
    'image' => $product_image
    ];

    $sql = "INSERT INTO product(product_id, product_name, price, short_description, product_image) VALUES (:id,:name,:price,:description,:image)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute($data);
  }
?>

<form action="" method="POST" enctype="multipart/form-data">
  <div class="col-md-8">
    <br>
    <div class="form-group">
    <label for="user-title">Product ID</label>
      <input type="text" name="product_id" class="form-control">
    </div>
    <div class="form-group">
    <label for="user-title">Product name</label>
      <input type="text" name="product_name" class="form-control">
    </div>
    <div>
    <label for="user-title">Description</label>
      <input type="text" name="short_description" class="form-control">
    </div>
    <div>
    <label for="user-title">Price</label>
      <input type="text" name="price" class="form-control">
    </div>
    <div>
    <label for="user-title">Product Image</label>
      <input type="text" name="product_image" class="form-control">
    </div>
    <br>
    <hr>
    <br>
    <input type="submit" name="submit" class="btn btn-primary btn-lg">
  </div>
</form>
<?php require 'footer-admin.php' ?>
